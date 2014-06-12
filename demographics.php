<!DOCTYPE>
	<!--Wellesley HCI PGP summer 2014
	updated by Laura M. Ascher
	Demographics questions for user questionnaire 
	-->
<html>
	<head>
		<title>PGHCI: Questions</title>
				
		<link href="styles/bootswatch.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="vis_style.css">

		<!--jQuery & vis.js-->
		<script type="text/javascript" charset="utf8" src="../pghci/vis/resource/js/jquery-1.10.2.js"></script>
		<!--<script type="text/javascript" charset="utf8" src="vis_klu.js"></script>-->
		<script>
			$(function(){
				//Populate form
				$(function() {
					var formData = {"preQ_id":"72","signature":"aaa","q0":null,"q1":null,"q2":null,"q3":null,"q4":null,"q5":null,"q6":null, "personID":null,"time_elapsed":null};
					console.log(formData);
					if (formData != null) {
						$.each(formData, function(key,val) {
							var $el = $('[name="'+key+'"]'),
								type = $el.attr('type');
							
							//If updating personID field in questions.php
							if (key == 'personID') {
								if (val == 'default' || val == 'other') $el.filter('[value="'+val+'"]').prop('checked',true);
								else {
									$el.filter('[value="own"]').prop('checked',true);
									$('[name="personID_text"]').val(val);
								}
							} else {
								switch(type) {
									case 'hidden':
										//If column has non-empty value, user checked box
										//get checkbox assoc. with hidden input and set to checked
										//Note: checkboxes are written in hidden-checkbox pairs so $_POST will always 
										//have a value for a checkbox field, even if checkbox is unchecked 
										//(which would result in fields missing from $_POST)
										if (val !== '' && val !== null) {
											//Get checkbox (descendant of sibling <td>)
											$el = $el.next().find('[type=checkbox]');
											$el.prop('checked',true);
										}
										break;
									case 'checkbox':
										$el.prop('checked',true);
										break;
									case 'radio':
										$el.filter('[value="'+val+'"]').prop('checked',true);
										break;
									case 'select':
										$el.val('[value="'+val+'"]');
									default:
										$el.val(val);
								}
							}
						});
					}
				});
				
			});
		</script>
	</head>
	<body>
	<div class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<span class="brand"><img src="assets/img/dna.png"> PGHCI: Demographic Questions</span>
		</div>
	</div>
	</div>
	
	<div class="container" id="study_wrapper">
	<form id="preQ_form" method="POST" action=/~hcilab/pghci_NEW/thankyou.html><ol>
		<input type="submit" name="submit" value="Back to consent" class="submit_top">
		<input type="submit" name="submit" value="Continue to report" class="submit_top">
				<p>Your participant ID is 6a9384.
		<h2>Demographic Questions</h2>
		
		<label for="age"> <strong>How old are you?</strong> </label>
		<input type="number" name="q1" id="age" style="height:30px;">
		<p><strong>What is your gender?</strong></p>
			<label for="q2_F">
				<input id="q2_F" type="radio" name="q2" required value="female"> Female
			</label>
			<label for="q2_M">
				<input id="q2_M" type="radio" name="q2" value="male"> Male
			</label>
			<label for="q2_O">
				<input id="q2_O" type="radio" name="q2" value="other"> Other
			</label>
		<p><strong>Education:</strong></p>
			<select name="q3">
				<option value="some high-school">Some high-school</option>
				<option value="high-school diploma">High-school diploma</option>
				<option value="some college">Some college</option>
				<option value="bachelor degree">Bachelor degree</option>
				<option value="masters degree">Masters degree</option>
				<option value="doctoral degree">Doctoral degree</option>
			</select>
		<p><strong>Do you work in the life sciences?</strong></p>
			<label for="q4_Y">
				<input id="q4_Y" type="radio" name="q4" required value="yes"> Yes
			</label>
			<label for="q4_N">
				<input id="q4_N" type="radio" name="q4" value="no"> No
			</label>
		<p><strong>Did you study life sciences at a collegiate or higher level?</strong></p>
			<label for="q5_Y">
				<input id="q5_Y" type="radio" name="q5" required value="yes"> Yes
			</label>
			<label for="q5_N">
				<input id="q5_N" type="radio" name="q5" value="no"> No
			</label>
		
			
		</ol>
		<input type="submit" name="submit" value="Back to Privacy" id="back_demog" class="btn btn-primary">
		<input type="submit" name="submit" value="Submit" id="submit_demog" class="btn btn-primary submit-survey">
		</form>

	</div>

	</body>
</html>
