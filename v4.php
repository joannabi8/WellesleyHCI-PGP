<!-- v4.php
	 Bubble Chart Visualization and questions
	 Wellesley HCI PGP
	 Laura M. Ascher-->


	<!DOCTYPE html> 
	<html>
	<head>
		<title>PGP Visualization: Bubble Chart</title>
		<!--jQuery & vis.js-->
		<script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-1.10.2.js"></script>
		<script type="text/javascript" charset="utf8" src="scripts/vis.js"></script>

		<!-- jQuery UI -->
		<link rel="stylesheet" type="text/css" href="scripts/jquery/jquery-ui-1.10.4.custom/css/smoothness/jquery-ui-1.10.4.custom.css">
		<script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-ui-1.10.4.custom.js"></script>

		<!--CSS-->
		<link href="styles/bootswatch.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/style.css">

		<script>
			$(function(){
				// Validate form
				var submit_id = $("#Submit_v4");
				var form_id = $("#v4_q");
				var validateWarning = $("#validate_msg");
				
				validateForm_vis(submit_id,form_id,validateWarning);

				// Load Google TreeMap
				google.load('visualization', '1', {
					"packages": ['bubble'],
					"callback": treeMapLoaded
				});

			});
			
		</script>
		<script type="text/javascript" src="http://www.google.com/uds/?file=visualization&amp;v=1&amp;packages=treemap&amp;async=2"></script>
		<link type="text/css" href="http://www.google.com/uds/api/visualization/1.0/ce05bcf99b897caacb56a7105ca4b6ed/ui+en.css" rel="stylesheet">
		<script type="text/javascript" src="http://www.google.com/uds/api/visualization/1.0/ce05bcf99b897caacb56a7105ca4b6ed/format+en,default+en,ui+en,treemap+en.I.js"></script>
	</head>
	<body>
			<div class="navbar navbar-fixed-top navbar-inverse">
				<div class="navbar-inner">
					<div class="container">
						<span class="brand"><img src="assets/img/dna.png"> Your Personal Genomics Report</span>
					</div>
				</div>
			</div>
			
			<div class="container" id="study_wrapper">
				<h2>Instructions</h2>
				<p>Following is a report that is based on an individual's personal genomic information. 
					For the purpose of this study we will name this individual Jamie. Read the explanation 
					below carefully and then study Jamie's report. You will be asked questions about this report. 
					The report was created by comparing Jamie's genome and a database of gene variants that are known
					to be associated with medical conditions. Only gene variants that are found to be medically relevant
					are reported.The report displays a bubble chart of gene variants. For each gene variant the bubble chart presents
					its name, clinical importance, impact, allele frequency, and a summary about the medical conditions
					it is associated with upon hovering your cursor over the bubble. On the x-axis of the bubble chart you will find a scale from Low Clinical Importance to High Clinical Importance, also demonstrated by the growing bubble size. 
					On the y-axis of the bubbe chart you will find a scale from Well-Established Protective to Well-Established Pathogenic, also demonstrated by the color gradient from green to neutral to red. 
					</p>

				
		<h2>Jamie's Results</h2>							
       <embed width="900" height="800" src="http://savedbythegoog.appspot.com/?id=314b80be054ceefb90730c8733abc5e71ff612d1" scale="tofit" frameborder="5"></embed>
				
					
			

			<h2>Questions About the Report</h2>
				<p>Please answer the following questions based on Jamie's report. Feel free to <strong>revisit the report</strong> as needed in order to answer the questions correctly.</p>
				<form action="vis_process.php" method="post" id="v4_q">
	
					<label for="v4_q1"><strong>The number of variants with high clinical importance:</strong></label>
					<input type="text" name="v4_q1" id="v4_q1">
					
					<label for="v4_q2"><strong>The number of variants that are well-established pathogenic:</strong></label>
					<input type="text" name="v4_q2" id="v4_q2">

					<label for="v4_q3"><strong>Based on the information above, the number of variants in Jamie's report with low clinical importance is <span id="v4_q3text">________</span> the number of variants with high clinical importance.</strong></label>
					<label class="radio" for="v4_q3_A">
						<input type="radio" name="v4_q3" id="v4_q3_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v4_q3_B">
						<input type="radio" name="v4_q3" id="v4_q3_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v4_q3_C">
						<input type="radio" name="v4_q3" id="v4_q3_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v4_q3_D">
						<input type="radio" name="v4_q3" id="v4_q3_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>

			
					<label for="v4_q4"><strong>Based on the information above, the number of uncertain pathogenic variants in Jamie's report is <span id="v4_q4text">________</span> the number of well established pathogenic variants.</strong></label>
					<label class="radio" for="v4_q4_A">
						<input type="radio" name="v4_q4" id="v4_q4_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v4_q4_B">
						<input type="radio" name="v4_q4" id="v4_q4_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v4_q4_C">
						<input type="radio" name="v4_q4" id="v4_q4_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v4_q4_D">
						<input type="radio" name="v4_q4" id="v4_q4_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>

					<p><strong>Based on the information above, the number of potentially pathogenic variants in Jamie's report is <span id="v4_q5text">________</span> the number of potentially benign or protective variants.</strong></p>
					
					<label class="radio" for="v4_q5_A">
						<input type="radio" name="v4_q5" id="v4_q5_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v4_q5_B">
						<input type="radio" name="v4_q5" id="v4_q5_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v4_q5_C">
						<input type="radio" name="v4_q5" id="v4_q5_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v4_q5_D">
						<input type="radio" name="v4_q5" id="v4_q5_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>


					<p><strong>Which variants would Jamie be most likely to discuss with a healthcare provider?</strong>
					<textarea name="v4_q6" id="v4_q6" cols="30" rows="5"></textarea>
					
					

					<p><strong>Based on the information above, Jamie's risk of developing stomach flu is <span id="v4_q7text">________</span> the average person.</strong>
					<label class="radio" for="v4_q7_A">
						<input type="radio" name="v4_q7" id="v4_q7_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v4_q7_B">
						<input type="radio" name="v4_q7" id="v4_q7_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v4_q7_C">
						<input type="radio" name="v4_q7" id="v4_q7_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v4_q7_D">
						<input type="radio" name="v4_q7" id="v4_q7_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>

					<p><strong>Based on the information above, Jamie's risk of developing age-related macular degeneration is <span id="v4_q8text">________</span> the average person?</strong>
					<label class="radio" for="v4_q8_A">
						<input type="radio" name="v4_q8" id="v4_q8_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v4_q8_B">
						<input type="radio" name="v4_q8" id="v4_q8_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v4_q8_C">
						<input type="radio" name="v4_q8" id="v4_q8_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v4_q8_D">
						<input type="radio" name="v4_q8" id="v4_q8_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>

					<p><strong>If you were Jamie, knowing this information, which of the following conditions would you be interested in learning more about? Select all that apply.</strong>
					<label class="checkbox" for="v4_q9_A">
						<input type="checkbox" name="v4_q9" id="v4_q9_A" value="alzheimers">Alzheimer's
					</label>
					<label class="checkbox" for="v4_q9_B">
						<input type="checkbox" name="v4_q9" id="v4_q9_B" value="parkinsons">Parkinson's
					</label>
					<label class="checkbox" for="v4_q9_C">
						<input type="checkbox" name="v4_q9" id="v4_q9_C" value="liver">Liver Disease
					</label>
					<label class="checkbox" for="v4_q9_D">
						<input type="checkbox" name="v4_q9" id="v4_q9_D" value="colon">Colon Cancer
					</label>
					<label class="checkbox" for="v4_q9_E">
						<input type="checkbox" name="v4_q9" id="v4_q9_E" value="diabetes">Diabetes
					</label>
					<label class="checkbox" for="v4_q9_F">
						<input type="checkbox" name="v4_q9" id="v4_q9_F" value="emphysema">Emphysema
					</label>
					<label class="checkbox" for="v4_q9_G">
						<input type="checkbox" name="v4_q9" id="v4_q9_G" value="tuberculosis">Tuberculosis
					</label>
					<label class="checkbox" for="v4_q9_H">
						<input type="checkbox" name="v4_q9" id="v4_q9_H" value="eye">Eye Disease
					</label>

					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th style="width:80px;"><strong>Statement</strong></th>
								<th style="width:80px;"><strong>Strongly disagree</strong></th>
								<th style="width:80px;"><strong>Disagree</strong></th>
								<th style="width:80px;"><strong>Somewhat disagree</strong></th>
								<th style="width:80px;"><strong>Neither agree or disagree</strong></th>
								<th style="width:80px;"><strong>Somewhat agree</strong></th>
								<th style="width:80px;"><strong>Agree</strong></th>
								<th style="width:80px;"><strong>Strongly Agree</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>The information in the report was presented in a very clear and accessible manner.</td>
								<td><input type="radio" name="v4_q10_a" value="1"></td>
								<td><input type="radio" name="v4_q10_a" value="2"></td>
								<td><input type="radio" name="v4_q10_a" value="3"></td>
								<td><input type="radio" name="v4_q10_a" value="4"></td>
								<td><input type="radio" name="v4_q10_a" value="5"></td>
								<td><input type="radio" name="v4_q10_a" value="6"></td>
								<td><input type="radio" name="v4_q10_a" value="7"></td>
							</tr>
							<tr>
								<td>The report is easy to understand.</td>
								<td><input type="radio" name="v4_q10_b" value="1"></td>
								<td><input type="radio" name="v4_q10_b" value="2"></td>
								<td><input type="radio" name="v4_q10_b" value="3"></td>
								<td><input type="radio" name="v4_q10_b" value="4"></td>
								<td><input type="radio" name="v4_q10_b" value="5"></td>
								<td><input type="radio" name="v4_q10_b" value="6"></td>
								<td><input type="radio" name="v4_q10_b" value="7"></td>
							</tr>
							<tr>
								<td>The report is predictive of Jamie's future medical conditions with high certainty.</td>
								<td><input type="radio" name="v4_q10_c" value="1"></td>
								<td><input type="radio" name="v4_q10_c" value="2"></td>
								<td><input type="radio" name="v4_q10_c" value="3"></td>
								<td><input type="radio" name="v4_q10_c" value="4"></td>
								<td><input type="radio" name="v4_q10_c" value="5"></td>
								<td><input type="radio" name="v4_q10_c" value="6"></td>
								<td><input type="radio" name="v4_q10_c" value="7"></td>
							</tr>
							<tr>
								<td>I would need the help of a healthcare professional to better understand Jamie's results.</td>
								<td><input type="radio" name="v4_q10_d" value="1"></td>
								<td><input type="radio" name="v4_q10_d" value="2"></td>
								<td><input type="radio" name="v4_q10_d" value="3"></td>
								<td><input type="radio" name="v4_q10_d" value="4"></td>
								<td><input type="radio" name="v4_q10_d" value="5"></td>
								<td><input type="radio" name="v4_q10_d" value="6"></td>
								<td><input type="radio" name="v4_q10_d" value="7"></td>
							</tr>
							<tr>
								<td>The scientific knowledge used to generate this report is well established.</td>
								<td><input type="radio" name="v4_q10_e" value="1"></td>
								<td><input type="radio" name="v4_q10_e" value="2"></td>
								<td><input type="radio" name="v4_q10_e" value="3"></td>
								<td><input type="radio" name="v4_q10_e" value="4"></td>
								<td><input type="radio" name="v4_q10_e" value="5"></td>
								<td><input type="radio" name="v4_q10_e" value="6"></td>
								<td><input type="radio" name="v4_q10_e" value="7"></td>
							</tr>
							<tr>
								<td>If I were Jamie, I would discuss the results in the report with my doctor.</td>
								<td><input type="radio" name="v4_q10_f" value="1"></td>
								<td><input type="radio" name="v4_q10_f" value="2"></td>
								<td><input type="radio" name="v4_q10_f" value="3"></td>
								<td><input type="radio" name="v4_q10_f" value="4"></td>
								<td><input type="radio" name="v4_q10_f" value="5"></td>
								<td><input type="radio" name="v4_q10_f" value="6"></td>
								<td><input type="radio" name="v4_q10_f" value="7"></td>
							</tr>
						
	
							<tr>
								<td>The report gives me a firm grasp of Jamie's health and biology.</td>
								<td><input type="radio" name="v4_q10_g" value="1"></td>
								<td><input type="radio" name="v4_q10_g" value="2"></td>
								<td><input type="radio" name="v4_q10_g" value="3"></td>
								<td><input type="radio" name="v4_q10_g" value="4"></td>
								<td><input type="radio" name="v4_q10_g" value="5"></td>
								<td><input type="radio" name="v4_q10_g" value="6"></td>
								<td><input type="radio" name="v4_q10_g" value="7"></td>
							</tr>
							
						</tbody>
					</table>
					
					<label for="v4_q11">Please use the space below to tell us which features were most helpful for understanding the report.</label>
					<textarea name="v4_q11" id="v4_q11" cols="30" rows="5"></textarea>
					

					<label for="v4_q12">Please use the space below to tell us how we can improve the report to make it easier to understand.</label>
					<textarea name="v4_q12" id="v4_q12" cols="30" rows="5"></textarea>
					
					
				<input class="btn btn-primary submit-survey" type="submit" name="Submit" value="Submit" id="Submit_v4">
			</form>
		</div>
		<div class="alert alert-block" id='validate_msg'></div>
	</body>
	<script>
		function changetext(name, value) {
			var spanid = name + "text"; 
			console.log(spanid);
			var el = document.getElementById(spanid);
			if (value === "greater") {
				el.innerHTML = "<strong>GREATER THAN</strong>";
				el.style.color = "red";
			} else if (value === "equal") {
				el.innerHTML = "<strong>EQUAL TO</strong>";
				el.style.color = "red";
			} else if (value === "less") {
				el.innerHTML = "<strong>LESS THAN</strong>";
				el.style.color = "red";
			} else if (value === "dunno") {
				el.innerHTML = "<strong>???</strong>";
				el.style.color = "red";
			}
		}
		</script>
</html>
