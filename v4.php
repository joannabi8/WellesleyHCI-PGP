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

		<!-- Google Bubble (core) chart API -->
		<!--<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
                google.load("visualization", "1", {packages:["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([                  
                                                                                       //color               //size
                       ['ID', '      Clinical Importance',  'Impact Quant',       'Impact Quant',    'Clinical Importance'],
                    
                      //Low Clinical Importance: (1 - 125)                                                  
                      ['',                  1.5,                 null,                     1,                    1], //DO NOT REMOVE 
                      ['SERPINA1-E288V',    80,                  9.0,                      9,                    5],
                      ['MTRR-I49M',         45,                  8.8,                      8,                    5],                         
                      ['RNASEL-R462Q',      110,                 7.9,                      7,                    5],                      
                      ['TGIF1-P83Shift',    100,                 7.4,                      7,                    5],                               
                      ['TLR5-R392X',        40,                  7.7,                      7,                    5],                            
                      ['SP110-L425S',       80,                  7.4,                      7,                    5],                                
                      ['WFS1-R611H',        60,                  7.5,                      7,                    5],                                
                      ['HFE-H63D',          10,                  7.6,                      7,                    5],                             
                      ['ACAD8-S171C',       25,                  7.4,                      7,                    5],                            
                      ['rs1544410',         60,                  5.5,                      5,                    5],                               
                      ['IL7R-T244I',        20,                  2.2,                      2,                    5],                               
                      ['KCNJ11-K23E',       40,                  2.6,                      2,                    5],                               
                      ['LIG4-A3V',          80,                  3.4,                      3,                    5],                               
                      ['DTNBP1-P272S',      50,                  3.9,                      3,                    5],                               
                      ['ARSA-N350S',        80,                  4.2,                      4,                    5],                            
                      ['MSH2-G322D',        10,                  5.5,                      5,                    5],                               
                      ['CACNA1S-L458H',     75,                  5.3,                      5,                    5],                               
                      ['ADA-K80R',          30,                  5.5,                      5,                    5],                              
                      ['COL9A2-T246M',      95,                  5.2,                      5,                    5],                               
                      ['FANCI-P55L',        110,                 5.3,                      5,                    5],                              
                      ['PKD1-A4059V',       45,                  5.7,                      5,                    5],                              
                      ['COL5A2-P460S',      15,                  6.2,                      6,                    5],                               
                      ['CASP8-M1T',         110,                 6.7,                      6,                    5],                            
                      ['PKP2-L366P',        120,                 6.2,                      6,                    5],                            
                      ['RP1-N985Y',         55,                  6.2,                      6,                    5],                            
                      ['DSP-R1537C',        105,                 6.0,                      6,                    5],                              
                      ['ELN-G581R',         45,                  6.7,                      6,                    5],                              
                      ['LYST-R159K',        85,                  6.8,                      6,                    5],                              
                      ['MAPT-R370W',        35,                  6.3,                      6,                    5],                             
                      ['TCIRG1-R56W',       75,                  6.1,                      6,                    5],                          
                      ['PTCH1-P1315L',      65,                  6.6,                      6,                    5],                               
                      ['TXNDC3-I338T',      95,                  6.4,                      6,                    5],                             
                      ['MUSK-T100M',        15,                  6.9,                      6,                    5],  
                      
                      //Medium Clinical Importance: (200- 225) 225 for Medium Label 
                      ['C3-R102G',          205,                 8.6,                      8,                    10],
                      ['MYO1A-S797F',       190,                 7.6,                      7,                    10],
                      ['WFS1-C426Y',        210,                 7.9,                      7,                    10],
                      ['SIAE-M89V',         210,                 7.1,                      7,                    10],
                      ['FIG4-K278Shift',    180,                 7.0,                      7,                    10], 
                      ['CYP2C9-R144C',      200,                 6.3,                      6,                    10],
                      ['FUT2-W154X',        195,                 1.6,                      1,                    10],
                      
                      //High Clinical Importance: (250 - 300) 275 for High Label 
                      ['SERPINA1-E366K',    285,                 9.9,                      9,                    20],                    
                      ['BBS7-D412G',        265,                 7.9,                      7,                    20],     
                      ['RYR2-G1885E',       280,                 7.0,                      7,                    20]     
                      
                      ]);
                
                  var options = {
                 //  tooltip: {trigger: 'none'}, 
                    //tooltip:{textStyle: {color:'red'}}, 
                   // tooltip:{isHTML: 'true'}, 
          
                  
                     title: 'Personal Genome Project',
                     height: 800,
                     width:  950,
                     colorAxis: {colors: ['green','gray', 'red']},
                     bubble: {textStyle: {color:'transparent'}}, 
                    // bubble:  {textStyle: {fontSize: 1}}, 
                     hAxis: {
                       title: 'Clinical Importance',
                       maxValue: 300,
                       titleTextStyle:{fontSize: 9}, 
                       textStyle: {color:'#000', fontName: 'Arial', fontSize: 9},
                       ticks: [0, {v:75, f:"Low Clinical Importance"}, {v:200, f:"Medium Clinical Importance"},{v:275, f:"High Clinical Importance"}],
                       gridlines:{color: 'transparent'}
                     },
                    
                     vAxis: {
                       title: 'Impact Quant', 
                       maxValue: 10.5,
                       titleTextStyle:{fontSize: 9}, 
                       textStyle: {color: '#000', fontName: 'Arial', fontSize: 9}, 
                       ticks: [{v:.5, f:" "}, {v:1.5, f:"Well-Established Protective"},{v:2.5, f:"Likely Protective"}, {v:3.5, f:"Well-Established Benign"},
                               {v:4.5, f:"Likely Benign"},{v:5.5, f:"Uncertain Protective"},{v:6.5, f:"Uncertain Benign"},
                               {v:7.5, f:"Uncertain Not Reviewed"},{v:8.5, f:"Uncertain Pathogenic"}, {v:9.5, f:"Likely Pathogenic"},
                                {v:10.5, f:"Well-Established Pathogenic"}],
                       gridlines:{color: 'transparent'}
                     }
                  };
                  
                  var chart = new google.visualization.BubbleChart(document.getElementById('bubble_chart_div'));
                 
                  chart.draw(data, options);
                
                }
       </script>-->
       <!-- END OF BUBBLE CHART CODE -->





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

				
									
       <embed width="900" height="800" src="http://savedbythegoog.appspot.com/?id=314b80be054ceefb90730c8733abc5e71ff612d1" scale="tofit" frameborder="5"></embed>
				
					
			

				<h2>Questions About the Report</h2>
				<p>Please answer the following questions based on Jamie's report. Feel free to <strong>revisit the report</strong> as needed in order to answer the questions correctly.</p>
				<form action="vis_process.php" method="post" id="v4_q">					
					<label for="v4_q1"><strong>The number of variants with low clinical importance:</strong></label><p>
					<input type="text" name="v4_q1" id="v4_q1"></p><p>
					
					<label for="v4_q2"><strong>The number of variants with high clinical importance:</strong></label></p><p>
					<input type="text" name="v4_q2" id="v4_q2"></p><p>
					
					<label for="v4_q3"><strong>The number of variants tat are well-established pathogenic:</strong></label></p><p>
					<input type="text" name="v4_q3" id="v4_q3"></p>

					<label for="v4_q4"><strong>The number of variants tat are uncertain pathogenic:</strong></label></p><p>
					<input type="text" name="v4_q4" id="v4_q4"></p>

					<p><strong>True or false: The number of potentially pathogenic variants in Jamie's report is higher than the number of potentially benign or protective variants</strong></p><p>
					
					<label class="radio" for="v4_q5_T">
						<input type="radio" name="v4_q5" id="v4_q5_T" value="True">True
					</label></p><p>
					<label class="radio" for="v4_q5_F">
						<input type="radio" name="v4_q5" id="v4_q5_F" value="False">False
					</label></p><p>


					<p><strong>Which of the following variants would Jaime be most likely to discuss with a healthcare provider?</strong></p><p>
					
					<label class="radio" for="v4_q6_A">
						<input type="radio" name="v4_q6" id="v4_q6_A" value="rs1544410">rs1544410
					</label></p><p>
					<label class="radio" for="v4_q6_B">
						<input type="radio" name="v4_q6" id="v4_q6_B" value="SERPINA1-E366K">SERPINA1-E366K
					</label></p><p>
					<label class="radio" for="v4_q6_C">
						<input type="radio" name="v4_q6" id="v4_q6_C" value="MTRR-I49M">MTRR-I49M
					</label></p><p>
					<label class="radio" for="v4_q6_D">
						<input type="radio" name="v4_q6" id="v4_q6_D" value="CACNA1S-L458H">CACNA1S-L458H
					</label></p><p>

					<p><strong>Is Jamie's risk of developing stomach flu greater than, equal to, or less than the average person?</strong></p><p>
					<label class="radio" for="v4_q7_A">
						<input type="radio" name="v4_q7" id="v4_q7_A" value="greater">Greater than
					</label></p><p>
					<label class="radio" for="v4_q7_B">
						<input type="radio" name="v4_q7" id="v4_q7_B" value="equal">Equal
					</label></p><p>
					<label class="radio" for="v4_q7_C">
						<input type="radio" name="v4_q7" id="v4_q7_C" value="less">Less than
					</label></p><p>
					<label class="radio" for="v4_q7_D">
						<input type="radio" name="v4_q7" id="v4_q7_D" value="dunno">I don't know
					</label></p><p>

					<p><strong>Based on the information above, is Jamie's risk of developing age-related macular degeneration greater than, equal to, or less than the average person?</strong></p><p>
					<label class="radio" for="v4_q8_A">
						<input type="radio" name="v4_q8" id="v4_q8_A" value="greater">Greater than
					</label></p><p>
					<label class="radio" for="v4_q8_B">
						<input type="radio" name="v4_q8" id="v4_q8_B" value="equal">Equal
					</label></p><p>
					<label class="radio" for="v4_q8_C">
						<input type="radio" name="v4_q8" id="v4_q8_C" value="less">Less than
					</label></p><p>
					<label class="radio" for="v4_q8_D">
						<input type="radio" name="v4_q8" id="v4_q8_D" value="dunno">I don't know
					</label></p><p>

					<p><strong>If you were Jamie, knowing this information, which of the following conditions would you be interested in learning more about? Select all that apply.</strong></p>
					<label class="checkbox" for="v4_q9_A">
						<input type="checkbox" name="v4_q9" id="v4_q9_A" value="alzheimers">Alzheimer's
					</label></p><p>
					<label class="checkbox" for="v4_q9_B">
						<input type="checkbox" name="v4_q9" id="v4_q9_B" value="parkinsons">Parkinson's
					</label></p><p>
					<label class="checkbox" for="v4_q9_C">
						<input type="checkbox" name="v4_q9" id="v4_q9_C" value="liver">Liver Disease
					</label></p><p>
					<label class="checkbox" for="v4_q9_D">
						<input type="checkbox" name="v4_q9" id="v4_q9_D" value="colon">Colon Cancer
					</label></p><p>
					<label class="checkbox" for="v4_q9_E">
						<input type="checkbox" name="v4_q9" id="v4_q9_E" value="diabetes">Diabetes
					</label></p><p>
					<label class="checkbox" for="v4_q9_F">
						<input type="checkbox" name="v4_q9" id="v4_q9_F" value="emphysema">Emphysema
					</label></p><p>
					<label class="checkbox" for="v4_q9_G">
						<input type="checkbox" name="v4_q9" id="v4_q9_G" value="tuberculosis">Tuberculosis
					</label></p><p>
					<label class="checkbox" for="v4_q9_H">
						<input type="checkbox" name="v4_q9" id="v4_q9_H" value="eye">Eye Disease
					</label></p><p>

					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th><strong>Statement</strong></th>
								<th><strong>Strongly disagree</strong></th>
								<th><strong>Disagree</strong></th>
								<th><strong>Somewhat disagree</strong></th>
								<th><strong>Neither agree or disagree</strong></th>
								<th><strong>Somewhat agree</strong></th>
								<th><strong>Agree</strong></th>
								<th><strong>Strongly Agree</strong></th>
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
								<td>The report results are uncertain.</td>
								<td><input type="radio" name="v4_q10_c" value="1"></td>
								<td><input type="radio" name="v4_q10_c" value="2"></td>
								<td><input type="radio" name="v4_q10_c" value="3"></td>
								<td><input type="radio" name="v4_q10_c" value="4"></td>
								<td><input type="radio" name="v4_q10_c" value="5"></td>
								<td><input type="radio" name="v4_q10_c" value="6"></td>
								<td><input type="radio" name="v4_q10_c" value="7"></td>
							</tr>
							<tr>
								<td>I need the help of a healthcare professional to understand the results in the report.</td>
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
								<td>If I were Jamie, I would show the results in the report to my doctor in my next appointment.</td>
								<td><input type="radio" name="v4_q10_f" value="1"></td>
								<td><input type="radio" name="v4_q10_f" value="2"></td>
								<td><input type="radio" name="v4_q10_f" value="3"></td>
								<td><input type="radio" name="v4_q10_f" value="4"></td>
								<td><input type="radio" name="v4_q10_f" value="5"></td>
								<td><input type="radio" name="v4_q10_f" value="6"></td>
								<td><input type="radio" name="v4_q10_f" value="7"></td>
							</tr>
							<tr>
								<td>If I were Jamie, I would schedule a special appointment with my doctor and discuss the results in the report with them.</td>
								<td><input type="radio" name="v4_q10_g" value="1"></td>
								<td><input type="radio" name="v4_q10_g" value="2"></td>
								<td><input type="radio" name="v4_q10_g" value="3"></td>
								<td><input type="radio" name="v4_q10_g" value="4"></td>
								<td><input type="radio" name="v4_q10_g" value="5"></td>
								<td><input type="radio" name="v4_q10_g" value="6"></td>
								<td><input type="radio" name="v4_q10_g" value="7"></td>
							</tr>
							<tr>
								<td>If I were Jamie, I would read more about the health issues concerning th results in this report.</td>
								<td><input type="radio" name="v4_q10_h" value="1"></td>
								<td><input type="radio" name="v4_q10_h" value="2"></td>
								<td><input type="radio" name="v4_q10_h" value="3"></td>
								<td><input type="radio" name="v4_q10_h" value="4"></td>
								<td><input type="radio" name="v4_q10_h" value="5"></td>
								<td><input type="radio" name="v4_q10_h" value="6"></td>
								<td><input type="radio" name="v4_q10_h" value="7"></td>
							</tr>
							<tr>
								<td>The report helps understand Jamie's health and biology.</td>
								<td><input type="radio" name="v4_q10_i" value="1"></td>
								<td><input type="radio" name="v4_q10_i" value="2"></td>
								<td><input type="radio" name="v4_q10_i" value="3"></td>
								<td><input type="radio" name="v4_q10_i" value="4"></td>
								<td><input type="radio" name="v4_q10_i" value="5"></td>
								<td><input type="radio" name="v4_q10_i" value="6"></td>
								<td><input type="radio" name="v4_q10_i" value="7"></td>
							</tr>
							<tr>
								<td>If I were Jamie, I would change my diet to a healthier one.</td>
								<td><input type="radio" name="v4_q10_j" value="1"></td>
								<td><input type="radio" name="v4_q10_j" value="2"></td>
								<td><input type="radio" name="v4_q10_j" value="3"></td>
								<td><input type="radio" name="v4_q10_j" value="4"></td>
								<td><input type="radio" name="v4_q10_j" value="5"></td>
								<td><input type="radio" name="v4_q10_j" value="6"></td>
								<td><input type="radio" name="v4_q10_j" value="7"></td>
							</tr>
							<tr>
								<td>If I were Jamie, I would do more physical activity.</td>
								<td><input type="radio" name="v4_q10_j" value="1"></td>
								<td><input type="radio" name="v4_q10_j" value="2"></td>
								<td><input type="radio" name="v4_q10_j" value="3"></td>
								<td><input type="radio" name="v4_q10_j" value="4"></td>
								<td><input type="radio" name="v4_q10_j" value="5"></td>
								<td><input type="radio" name="v4_q10_j" value="6"></td>
								<td><input type="radio" name="v4_q10_j" value="7"></td>
							</tr>
							<tr>
								<td>If I were Jamie, I would be less concered about my diet and exercise habits.</td>
								<td><input type="radio" name="v4_q10_j" value="1"></td>
								<td><input type="radio" name="v4_q10_j" value="2"></td>
								<td><input type="radio" name="v4_q10_j" value="3"></td>
								<td><input type="radio" name="v4_q10_j" value="4"></td>
								<td><input type="radio" name="v4_q10_j" value="5"></td>
								<td><input type="radio" name="v4_q10_j" value="6"></td>
								<td><input type="radio" name="v4_q10_j" value="7"></td>
							</tr>
						</tbody>
					</table>
					
					<label for="v4_q11">Please use the space below to tell us how the report might lead you to take actions (such as changing your diet, exercising more, or sharing the information with your doctor), and why:</label></p><p>
					<textarea name="v4_q11" id="v4_q11" cols="30" rows="5"></textarea>
					</p>

					<p>
					<label for="v4_q12">Please use the space below to tell us how we can improve the report to make it easier to understand:</label></p><p>
					<textarea name="v4_q11" id="v4_q11" cols="30" rows="5"></textarea>
					</p>

					<p>
					<input class="btn btn-primary submit-survey" type="submit" name="Submit" value="Submit" id="Submit_v4">
				</p></form>
			</div>
			
		
	</body>
	</html>
