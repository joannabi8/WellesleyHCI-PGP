<?php
	session_start();
	error_reporting(E_ERROR);
?>

<html>
<head>
    <title>PGHCI: Done</title>
    <!--jQuery & vis.js-->
    <script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-1.10.2.js"></script>
    <script type="text/javascript" charset="utf8" src="scripts/vis.js"></script>
    <!--jQuery UI -->
    <link rel="stylesheet" type="text/css" href="scripts/jquery/jquery-ui-1.10.4.custom.css" rel="stylesheet">
    <script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-ui-1.10.4.custom.js"></script>

    <link rel="stylesheet" href="styles/bootswatch.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>

    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <span class="brand"><img src="assets/img/dna.png">PGHCI</span>
            </div>
        </div>
    </div>

    <div class="container" id="study_wrapper">
        <h1 style="padding-top:10%">Thank you for participating!</h1>
        <?php
		    echo "<h3> Your Amazon Mechanical Turk code is: <span style='color:blue'>" . $_SESSION['mturk_id'] . "</span>.</h3>" ;
		?>

    </div>

</body>
</html>
