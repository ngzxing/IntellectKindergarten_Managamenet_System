<?php

include "sessionTeac.php";

?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap5.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     
    </head>

    <body>
    
        
    <div class = "container">

    <?php
    
    include "dbconnect.php";

    $query = "SELECT * FROM Announcement WHERE annID = $_GET[annID]";
    $result = mysqli_fetch_array(mysqli_query($con, $query));

    echo"

    <main class='ttr-wrapper'>
		<div class='container-fluid'>
			<div class='row'>
					

						<div class='col-lg-12 m-b30'>
						<div class='widget-box'>
							<div class='wc-title'>
								<h3>$result[annTitle]</h3>
								<time>$result[annDate]</time>
							</div>
							<div class='widget-inner'>
								$result[annText]
							</div>

						</div>
						</div>
						
			</div>
		</div>
		
	</main>

    ";

    mysqli_close($con);
    
    ?>
            

    </body>


</html>