/* vis.js
 * 2/24/14
 * Validates form in v2.php & creates Google TreeMap Visualization
 *
 * Nicole Francisco
 * for Wellesley College HCI Lab
 * /

/* ===== Form Validation ===== */

// Check if #validate_msg div box contains text parameter
function textInContainer(text) {
    return $("#validate_msg:contains('" + text + "')").length === 0;
}

// Check if all radio buttons have been checked
function radio_allChecked(form) {
    var checkedAll = true;

    var radioNames = [];

    $("#" + form + " :radio").each(function() {
        var name = $(this).attr("name");
        if (radioNames.indexOf(name) < 0) radioNames.push(name);
    });

    $.each(radioNames, function(key, value) {
        var radioChecked = $("input:radio[name='" + value + "']").is(":checked");
        checkedAll = checkedAll && radioChecked;
    });

    return checkedAll;
}

// Check if user inputted ints in all text inputs 
function text_allInts(form) {
    var intRegex = /^\d+$/;
    var textNames = [];
    var checkedAll = true;

    $("#" + form + " :text").each(function() {
        var name = $(this).attr("name");
        if (textNames.indexOf(name) < 0) textNames.push(name);
    });

    $.each(textNames, function(key, value) {
        var hasText = (intRegex.test($("input:text[name='" + value + "']").val()));
        checkedAll = checkedAll && hasText;
    });
    return checkedAll;
}

// Update pop-up validation message
function updateWarningText(container, text) {
    var text_newHtml = container.html().replace(text, '');
    container.html(text_newHtml);
}

// Form validation
function validateForm_vis(submit, form, container) {
    var startTime = (new Date()).getTime();

    var closeBtn = "<div id='exitBtn'>x</div>";
    container.hide();

    submit.click(function(event) {
        event.preventDefault();

        if (container.find($("#exitBtn")).size() === 0) {
            container.append(closeBtn);
        }

        //Check if form was filled out appropriately
        var txt_allInts = text_allInts($(form).attr('id'));
        var rd_allChecked = radio_allChecked($(form).attr('id'));
        var textarea = $(form).find("textarea");
        var textarea_filled = textarea.length === 0 ? true : textarea.val().length > 0;
        var education = $(form).find(":selected");
        var educSelected = education.length === 0 ? true : education.val() !== "";

        //Warning messages to appear if form was filled out incorrectly
        var textErr = "Please enter only numeric input";
        var textErr_none = textInContainer(textErr);

        var radioErr = "Please answer all the survey questions to continue.";
        var radioErr_none = textInContainer(radioErr);

        var textareaErr = "Please tell us how the report might lead you to take actions (such as changing your diet, exercising more, or sharing the information with your doctor), and why.";
        var taErr_none = textInContainer(textareaErr);

        var educSelErr = "Please select the highest level of education you completed.";
        var educSel_none = textInContainer(educSelErr);


        if (txt_allInts && rd_allChecked && textarea_filled && educSelected) {
            var timeSpent = (new Date()).getTime() - startTime;
            var input_time = $("<input>", {
                type: "hidden",
                name: "timeSpent",
                value: timeSpent
            });
            form.append($(input_time));

            form.submit();
        } else {
            /* ===== Customized warning message ===== */

            //Handles multiple submit button clicks
            if (!txt_allInts && textErr_none) container.append(textErr + "<p>");
            if (!rd_allChecked && radioErr_none) container.append(radioErr + "<p>");
            if (!educSelected && educSel_none) container.append(educSelErr + "<p>");
            if (!textarea_filled && taErr_none) container.append(textareaErr + "<p>");

            //Updates pop-up div box with appropriate message for every submit button click
            if (txt_allInts) updateWarningText(container, textErr);
            if (rd_allChecked) updateWarningText(container, radioErr);
            if (educSelected) updateWarningText(container, educSelErr);
            if (textarea_filled) updateWarningText(container, textareaErr);

            //Pop-up div box
            container.fadeIn(500, 0, function() {
                container.show();
            });

            $("#exitBtn").on('click', container, function() {
                container.fadeOut(300, 0, function() {
                    container.hide(function() {
                        container.html("");
                    });
                });
            });

        }

    });

}

/* ===== Google TreeMap Visualization ===== */

//TreeMap object definition

function TreeMap(pName) {
    this.importArr = []; //2D array of all Low/Mod/High nodes
    this.parentName = pName;
    this.objBelongs = false; //To categorize if JSON object (future TM node) is part of Low/Mod/High TreeMap
    this.tmData = new google.visualization.DataTable();
    this.tmContainer = new google.visualization.TreeMap(document.getElementById("visualization"));
    this.config = {
        headerHeight: 20,
        fontColor: "black"
    };

    //Convert 2D array of 2D arrays to DataTable for Google Vis
    this.arrayToDT = function() {
        this.tmData = google.visualization.arrayToDataTable(this.importArr);
    };
    //Defines element where TreeMap will be placed in
    this.defContainer = function(container) {
        this.tmContainer = new google.visualization.TreeMap(container);
    };
    //Draws the TreeMap
    this.drawTM = function() {
        this.tmContainer.draw(this.tmData, this.config);
    };
}

//callback function when google visualization has loaded
//creates TreeMaps
function treeMapLoaded() {

    var personID = "hu43860C";

    // JSON data is asynchronously obtained (AJAX)
    $.getJSON(personID + "_GenomeReport.json", function(genomes) {

        var treeMap_Low = new TreeMap("Low Clinical Impact");
        var treeMap_Mod = new TreeMap("Medium Clinical Impact");
        var treeMap_High = new TreeMap("High Clinical Impact");

        var headers = ['Variant', 'Parent', 'Clinical Importance (size)', 'Impact quant (color)', 'Summary'];

        // Information to be added to "Summary" column:
        //var summHeaders = ['Variant Page', 'Clinical Importance Category', 'Impact', 'Status', 'Frequency', 'Allele Frequency', 'Summary'];
        var summHeaders = ['Variant Page', 'Clinical Importance Category', 'Impact', 'Status', 'Allele Frequency', 'Summary'];

        //Create parent array
        function parentArr(title) {
            return [title, null, 0, 0, 'Null'];
        }

        treeMap_Low.importArr.push(headers, parentArr(treeMap_Low.parentName));
        treeMap_Mod.importArr.push(headers, parentArr(treeMap_Mod.parentName));
        treeMap_High.importArr.push(headers, parentArr(treeMap_High.parentName));

        var counter = 0; //Keeps track of item in JSON array of objects
        // Create a Google-TreeMap-appropriate 2D array from JSON data
        $.each(genomes.aaData, function(key, value) {
            var variantArr = [];
            var newSummary = "<p><em>Variant Name</em>: <a href='" + genomes.aaData[counter]["Variant Page"] + "' target='_blank'>" + genomes.aaData[counter]["Variant"] + "</a><br>";

            var clinicImport = parseInt(genomes.aaData[counter]["Clinical Importance"]);

            if (!isNaN((clinicImport))) {
                treeMap_Low.objBelongs = (clinicImport === 1);
                treeMap_Mod.objBelongs = (clinicImport === 2);
                treeMap_High.objBelongs = (clinicImport === 3);
            }

            var link = "";

            $.each(value, function(key, value) {
                checkInt = parseFloat(value);
                newVal = checkInt;

                //If text has single quotes (') (which Google TreeMap uses to construct strings)
                if (isNaN(checkInt)) newVal = value.replace("'", "\\'");

                if (summHeaders.indexOf(key) > -1) {
                    if (key === "Summary") {
                        newSummary += "<em>" + key + "</em>: " + newVal + " <br> <a href='" + link + "' target='_blank'>[click here for more information]</a>";
                    } else if (key === "Variant Page") {
                        link = newVal;
                    } else if (key === "Clinical Importance Category") {
                        newSummary += "<em>Clinical Importance</em>: " + newVal + " <br>";
                    } else {
                        newVal = (key === "Allele Frequency") ? newVal + "%" : newVal;
                        newSummary += "<em>" + key + "</em>: " + newVal + " <br>";
                    }
                } else if (key === "Parent") {
                    if (treeMap_Low.objBelongs) variantArr.push(treeMap_Low.parentName);
                    else if (treeMap_Mod.objBelongs) variantArr.push(treeMap_Mod.parentName);
                    else variantArr.push(treeMap_High.parentName);
                } else {
                    if (key !== "Frequency")
                        variantArr.push(newVal);
                }

            });

            variantArr.push(newSummary);

            if (treeMap_Low.objBelongs) treeMap_Low.importArr.push(variantArr);
            else if (treeMap_Mod.objBelongs) treeMap_Mod.importArr.push(variantArr);
            else treeMap_High.importArr.push(variantArr);

            treeMap_Low.objBelongs = false;
            treeMap_Mod.objBelongs = false;
            treeMap_High.objBelongs = false;
            counter++;
        });

        treeMap_Low.arrayToDT();
        treeMap_Mod.arrayToDT();
        treeMap_High.arrayToDT();

        treeMap_Low.defContainer(document.getElementById('vis_low'));
        treeMap_Mod.defContainer(document.getElementById('vis_mod'));
        treeMap_High.defContainer(document.getElementById('vis_high'));

        //==================
        //Formats pop-up containers for node (variant) information
        function showFullTooltip(row, size, whichData) {
            /*return '<div style="background:#fd9; padding:10px; border-style:solid; width: 300px; font-size:70%">' +       
                '<span style="font-family:Courier"><b>' + whichData.getValue(row, 0) + '</b>, ' +
                whichData.getValue(row, 1) + ', ' +  whichData.getValue(row, 2) + ', ' + whichData.getValue(row, 3) +
                '</span><br>' +  whichData.getColumnLabel(2) + ' : ' + size + '<br>' +  whichData.getColumnLabel(3) + ' : ' +
                whichData.getValue(row, 3) + '<br>' + whichData.getColumnLabel(4) + ' : ' + whichData.getValue(row, 4) + '<br>' +
                ' </div>';*/


            return '<div style="background:#fd9; padding:10px; border-style:solid; width: 300px; font-size:70%">' + whichData.getValue(row, 4) + '</div>';
        }

        function showFullTooltip_Low(row, size, value) {
            return showFullTooltip(row, size, treeMap_Low.tmData);
        }

        function showFullTooltip_Mod(row, size, value) {
            return showFullTooltip(row, size, treeMap_Mod.tmData);
        }

        function showFullTooltip_High(row, size, value) {
            return showFullTooltip(row, size, treeMap_High.tmData);
        }

        //To ensure node color corresponds to the same Impact quantity across the three different trees (for this particular TreeMap)
        treeMap_Low.config.minColor = "#9df737";
        treeMap_Low.config.midColor = "#ddd";
        treeMap_Low.config.maxColor = "#f43";

        treeMap_Mod.config.minColor = "#8f0";
        treeMap_Mod.config.maxColor = "#f76659";

        treeMap_High.config.minColor = "#f0887f";
        treeMap_High.config.maxColor = "#ff4433";


        treeMap_Low.config.generateTooltip = showFullTooltip_Low;
        treeMap_Mod.config.generateTooltip = showFullTooltip_Mod;
        treeMap_High.config.generateTooltip = showFullTooltip_High;

        //==================

        treeMap_Low.drawTM();
        treeMap_Mod.drawTM();
        treeMap_High.drawTM();

    });
}