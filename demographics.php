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
					var formData = {"preQ_id":"72","signature":"aaa","q0":null,"q1":null,"q2":null,"q3":null,"q4":null,"q5":null,"q6":null, personID":null,"time_elapsed":null};
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
			<span class="brand"><img src="assets/img/dna.png"> PGHCI</span>
		</div>
	</div>
	</div>
	
	<div class="container" id="study_wrapper">
	<form id="preQ_form" method="POST" action=/~hcilab/pghci_NEW/thankyou.html><ol>
		<input type="submit" name="submit" value="Back to consent" class="submit_top">
		<input type="submit" name="submit" value="Continue to report" class="submit_top">
				<p>Your participant ID is 6a9384.
		<h2>Questions</h2>
		
		<li>How old are you? <input type="number" name="q1" id="age">
		<li>What is your gender?<br>
			<label><input type="radio" name="q2" required value="female">Female</label>
			<label><input type="radio" name="q2" value="male">Male</label>
			<label><input type="radio" name="q2" value="other">Other</label>
		<li>Education:
			<select name="q3" required>
				<option value="some high-school">Some high-school</option>
				<option value="high-school diploma">High-school diploma</option>
				<option value="some college">Some college</option>
				<option value="bachelor degree">Bachelor degree</option>
				<option value="masters degree">Masters degree</option>
				<option value="doctoral degree">Doctoral degree</option>
			</select>
		<li>Do you work in the life sciences?<br>
			<label><input type="radio" name="q4" required value="yes">Yes</label>
			<label><input type="radio" name="q4" value="no">No</label>
		<li>Did you study life sciences at a collegiate or higher level?<br>
			<label><input type="radio" name="q4" required value="yes">Yes</label>
			<label><input type="radio" name="q4" value="no">No</label>
		
			
		</ol>
		<input type="submit" name="submit" value="Back to Privacy" id="back_demog">
		<input type="submit" name="submit" value="Submit" id="submit_demog">
		</form>

	</div>

	</body>
</html>
