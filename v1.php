<?php
	session_start();
	$_SESSION["vis"] = "v1";
	error_reporting(E_ERROR);
?>
<!--
	v1.php
	2/21/14
	Second visualization test for personal genomic project user test
	Nicole Francisco, Kara Lu
	for Wellesley College HCI Lab

	Updated by Claire Schlenker 
	5 June 2014
-->
<!DOCTYPE>
<html>
	<head>
		<title>PGP Visualization: Table</title>
		<!--Google TreeMap API-->
		<script type="text/javascript" src="http://www.google.com/jsapi"></script>

		<!--jQuery & vis.js-->
		<script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-1.10.2.js"></script>
		<script type="text/javascript" charset="utf8" src="scripts/vis.js"></script>

		<!-- jQuery UI -->
		<link rel="stylesheet" type="text/css" href="scripts/jquery/jquery-ui-1.10.4.custom.css" rel="stylesheet">
		<script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-ui-1.10.4.custom.js"></script>

		<link href="styles/bootswatch.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/style.css">

		<script>
			$(function(){
				//DataTable
				$('#gnm_table').dataTable( {
					"bProcessing": true,
					"sAjaxSource": "hu43860C_GenomeReport.json",
					"aoColumns": [
						{ "mData": "Variant" },
						{ "mData": "Clinical Importance Category" },
						{ "mData": "Impact" },
						{ "mData": "Status" },
						{ "mData": "Allele Frequency" },
						{ "mData": "Summary" }
					],
					"aoColumnDefs": [{
						'bSortable':false, 'aTargets':[5]
						}],
					"bJQueryUI": true,
					"bFilter": false,
					"aLengthMenu": [
						[25, 50, 100, -1],
						[25, 50, 100, "All"]
						],
					"iDisplayLength": -1,
					"bLengthChange": false,
					"bPaginate": false
				});
				//Form validation
				var submit_id = $("#Submit_v1");
				var form_id = $("#v1_q");
				var validateWarning = $("#validate_msg");

				validateForm_vis(submit_id,form_id,validateWarning);
				
			});
		</script>
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
			<h2>Instructions for the Study</h2>
			<p>Following is a report that is based on an individual's personal genomic information. 
					For the purpose of this study we will name this individual Jamie. Read the explanation 
					below carefully and then study Jamie's report. You will be asked questions about this report. 
					The report was created by comparing Jamie's genome and a database of gene variants that are known
					to be associated with medical conditions. Only gene variants that are found to be medically relevant
					are reported.The report displays a table of gene variants. For each gene variant the table presents
					its name, clinical importance, impact, allele frequency, and a summary about the medical conditions
					it is associated with. You can sort the table by clicking on the arrows in each of the table columns.
					Also, when hovering upon a column name, additional information about this information category is presented.</p>
			
			<h2>Your Results</h2>
			<div class="report_table_wrapper">
				<!-- GENOME REPORT TABLE -->
				<table id="gnm_table">
					<thead>
						<tr>
							<th class="sorting">Variant</th>
							<th class="sorting">Clinical Importance</th>
							<th class="sorting">Impact</th>
							<th class="sorting">Status</th>
							<th class="sorting">Allele <br> Frequency</th>
							<th>Summary</th>
						</tr>
					</thead>
				</table>
			</div>
			<h2>Questions About the Report</h2>
				<p>Please answer the following questions based on Jamie's report. Feel free to <strong>revisit the report</strong> as needed in order to answer the questions correctly.</p>
				<form action="vis_task.php" method="post" id="v1_q">
					
					<label for="v1_q1"><strong>The number of variants with low clinical importance:</strong></label><p>
					<input type="text" name="v1_q1" id="v1_q1"></p><p>
					
					<label for="v1_q2"><strong>The number of variants with high clinical importance:</strong></label></p><p>
					<input type="text" name="v1_q2" id="v1_q2"></p><p>
					
					<label for="v1_q3"><strong>The number of variants tat are well-established pathogenic:</strong></label></p><p>
					<input type="text" name="v1_q3" id="v1_q3"></p>

					<label for="v1_q4"><strong>The number of variants tat are uncertain pathogenic:</strong></label></p><p>
					<input type="text" name="v1_q4" id="v1_q4"></p>

					<p><strong>True or false: The number of potentially pathogenic variants in Jamie's report is higher than the number of potentially benign or protective variants</strong></p><p>
					
					<label class="radio" for="v1_q5_T">
						<input type="radio" name="v1_q5" id="v1_q5_T" value="True">True
					</label></p><p>
					<label class="radio" for="v1_q5_F">
						<input type="radio" name="v1_q5" id="v1_q5_F" value="False">False
					</label></p><p>


					<p><strong>Which of the following variants would Jaime be most likely to discuss with a healthcare provider?</strong></p><p>
					
					<label class="radio" for="v1_q6_A">
						<input type="radio" name="v1_q6" id="v1_q6_A" value="rs1544410">rs1544410
					</label></p><p>
					<label class="radio" for="v1_q6_B">
						<input type="radio" name="v1_q6" id="v1_q6_B" value="SERPINA1-E366K">SERPINA1-E366K
					</label></p><p>
					<label class="radio" for="v1_q6_C">
						<input type="radio" name="v1_q6" id="v1_q6_C" value="MTRR-I49M">MTRR-I49M
					</label></p><p>
					<label class="radio" for="v1_q6_D">
						<input type="radio" name="v1_q6" id="v1_q6_D" value="CACNA1S-L458H">CACNA1S-L458H
					</label></p><p>

					<p><strong>Is Jamie's risk of developing stomach flu greater than, equal to, or less than the average person?</strong></p><p>
					<label class="radio" for="v1_q7_A">
						<input type="radio" name="v1_q7" id="v1_q7_A" value="greater">Greater than
					</label></p><p>
					<label class="radio" for="v1_q7_B">
						<input type="radio" name="v1_q7" id="v1_q7_B" value="equal">Equal
					</label></p><p>
					<label class="radio" for="v1_q7_C">
						<input type="radio" name="v1_q7" id="v1_q7_C" value="less">Less than
					</label></p><p>
					<label class="radio" for="v1_q7_D">
						<input type="radio" name="v1_q7" id="v1_q7_D" value="dunno">I don't know
					</label></p><p>

					<p><strong>Based on the information above, is Jamie's risk of developing age-related macular degeneration greater than, equal to, or less than the average person?</strong></p><p>
					<label class="radio" for="v1_q8_A">
						<input type="radio" name="v1_q8" id="v1_q8_A" value="greater">Greater than
					</label></p><p>
					<label class="radio" for="v1_q8_B">
						<input type="radio" name="v1_q8" id="v1_q8_B" value="equal">Equal
					</label></p><p>
					<label class="radio" for="v1_q8_C">
						<input type="radio" name="v1_q8" id="v1_q8_C" value="less">Less than
					</label></p><p>
					<label class="radio" for="v1_q8_D">
						<input type="radio" name="v1_q8" id="v1_q8_D" value="dunno">I don't know
					</label></p><p>

					<p><strong>If you were Jamie, knowing this information, which of the following conditions would you be interested in learning more about? Select all that apply.</strong></p>
					<label class="checkbox" for="v1_q9_A">
						<input type="checkbox" name="v1_q9" id="v1_q9_A" value="alzheimers">Alzheimer's
					</label></p><p>
					<label class="checkbox" for="v1_q9_B">
						<input type="checkbox" name="v1_q9" id="v1_q9_B" value="parkinsons">Parkinson's
					</label></p><p>
					<label class="checkbox" for="v1_q9_C">
						<input type="checkbox" name="v1_q9" id="v1_q9_C" value="liver">Liver Disease
					</label></p><p>
					<label class="checkbox" for="v1_q9_D">
						<input type="checkbox" name="v1_q9" id="v1_q9_D" value="colon">Colon Cancer
					</label></p><p>
					<label class="checkbox" for="v1_q9_E">
						<input type="checkbox" name="v1_q9" id="v1_q9_E" value="diabetes">Diabetes
					</label></p><p>
					<label class="checkbox" for="v1_q9_F">
						<input type="checkbox" name="v1_q9" id="v1_q9_F" value="emphysema">Emphysema
					</label></p><p>
					<label class="checkbox" for="v1_q9_G">
						<input type="checkbox" name="v1_q9" id="v1_q9_G" value="tuberculosis">Tuberculosis
					</label></p><p>
					<label class="checkbox" for="v1_q9_H">
						<input type="checkbox" name="v1_q9" id="v1_q9_H" value="eye">Eye Disease
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
								<td><input type="radio" name="v1_q10_a" value="1"></td>
								<td><input type="radio" name="v1_q10_a" value="2"></td>
								<td><input type="radio" name="v1_q10_a" value="3"></td>
								<td><input type="radio" name="v1_q10_a" value="4"></td>
								<td><input type="radio" name="v1_q10_a" value="5"></td>
								<td><input type="radio" name="v1_q10_a" value="6"></td>
								<td><input type="radio" name="v1_q10_a" value="7"></td>
							</tr>
							<tr>
								<td>The results in the report make sense to me and I feel I understand all of it.</td>
								<td><input type="radio" name="v1_q10_b" value="1"></td>
								<td><input type="radio" name="v1_q10_b" value="2"></td>
								<td><input type="radio" name="v1_q10_b" value="3"></td>
								<td><input type="radio" name="v1_q10_b" value="4"></td>
								<td><input type="radio" name="v1_q10_b" value="5"></td>
								<td><input type="radio" name="v1_q10_b" value="6"></td>
								<td><input type="radio" name="v1_q10_b" value="7"></td>
							</tr>
							<tr>
								<td>The results in the report make very little sense to me and I do not feel I understand it.</td>
								<td><input type="radio" name="v1_q10_c" value="1"></td>
								<td><input type="radio" name="v1_q10_c" value="2"></td>
								<td><input type="radio" name="v1_q10_c" value="3"></td>
								<td><input type="radio" name="v1_q10_c" value="4"></td>
								<td><input type="radio" name="v1_q10_c" value="5"></td>
								<td><input type="radio" name="v1_q10_c" value="6"></td>
								<td><input type="radio" name="v1_q10_c" value="7"></td>
							</tr>
							<tr>
								<td>I will need the help of a healthcare professional to understand the results in the report.</td>
								<td><input type="radio" name="v1_q10_d" value="1"></td>
								<td><input type="radio" name="v1_q10_d" value="2"></td>
								<td><input type="radio" name="v1_q10_d" value="3"></td>
								<td><input type="radio" name="v1_q10_d" value="4"></td>
								<td><input type="radio" name="v1_q10_d" value="5"></td>
								<td><input type="radio" name="v1_q10_d" value="6"></td>
								<td><input type="radio" name="v1_q10_d" value="7"></td>
							</tr>
							<tr>
								<td>I intend to show the results in the report to my doctor next time I see them.</td>
								<td><input type="radio" name="v1_q10_e" value="1"></td>
								<td><input type="radio" name="v1_q10_e" value="2"></td>
								<td><input type="radio" name="v1_q10_e" value="3"></td>
								<td><input type="radio" name="v1_q10_e" value="4"></td>
								<td><input type="radio" name="v1_q10_e" value="5"></td>
								<td><input type="radio" name="v1_q10_e" value="6"></td>
								<td><input type="radio" name="v1_q10_e" value="7"></td>
							</tr>
							<tr>
								<td>I intend to schedule a special appointment with my doctor and discuss the results in the report with them.</td>
								<td><input type="radio" name="v1_q10_f" value="1"></td>
								<td><input type="radio" name="v1_q10_f" value="2"></td>
								<td><input type="radio" name="v1_q10_f" value="3"></td>
								<td><input type="radio" name="v1_q10_f" value="4"></td>
								<td><input type="radio" name="v1_q10_f" value="5"></td>
								<td><input type="radio" name="v1_q10_f" value="6"></td>
								<td><input type="radio" name="v1_q10_f" value="7"></td>
							</tr>
							<tr>
								<td>I intend to read more about the health issues concerning the results in the report I got.</td>
								<td><input type="radio" name="v1_q10_g" value="1"></td>
								<td><input type="radio" name="v1_q10_g" value="2"></td>
								<td><input type="radio" name="v1_q10_g" value="3"></td>
								<td><input type="radio" name="v1_q10_g" value="4"></td>
								<td><input type="radio" name="v1_q10_g" value="5"></td>
								<td><input type="radio" name="v1_q10_g" value="6"></td>
								<td><input type="radio" name="v1_q10_g" value="7"></td>
							</tr>
							<tr>
								<td>I intend to share the results in the report with family members.</td>
								<td><input type="radio" name="v1_q10_h" value="1"></td>
								<td><input type="radio" name="v1_q10_h" value="2"></td>
								<td><input type="radio" name="v1_q10_h" value="3"></td>
								<td><input type="radio" name="v1_q10_h" value="4"></td>
								<td><input type="radio" name="v1_q10_h" value="5"></td>
								<td><input type="radio" name="v1_q10_h" value="6"></td>
								<td><input type="radio" name="v1_q10_h" value="7"></td>
							</tr>
							<tr>
								<td>Starting today, I intend to change my diet.</td>
								<td><input type="radio" name="v1_q10_i" value="1"></td>
								<td><input type="radio" name="v1_q10_i" value="2"></td>
								<td><input type="radio" name="v1_q10_i" value="3"></td>
								<td><input type="radio" name="v1_q10_i" value="4"></td>
								<td><input type="radio" name="v1_q10_i" value="5"></td>
								<td><input type="radio" name="v1_q10_i" value="6"></td>
								<td><input type="radio" name="v1_q10_i" value="7"></td>
							</tr>
							<tr>
								<td>Starting today, I intend to do more physical activity.</td>
								<td><input type="radio" name="v1_q10_j" value="1"></td>
								<td><input type="radio" name="v1_q10_j" value="2"></td>
								<td><input type="radio" name="v1_q10_j" value="3"></td>
								<td><input type="radio" name="v1_q10_j" value="4"></td>
								<td><input type="radio" name="v1_q10_j" value="5"></td>
								<td><input type="radio" name="v1_q10_j" value="6"></td>
								<td><input type="radio" name="v1_q10_j" value="7"></td>
							</tr>
						</tbody>
					</table>
					
					<label for="v1_q11">Please use the space below to tell us how we can improve the report to make it easier to understand.</label></p><p>
					<textarea name="v1_q11" id="v1_q11" cols="30" rows="5"></textarea>
					</p><p>
				<input class="btn btn-primary submit-survey" type="submit" name="Submit" value="Submit" id="Submit_v1">
			</form>
		</div>
		<div class="alert alert-block" id='validate_msg'></div>
	</body>
</html>