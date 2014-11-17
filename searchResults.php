<?php

require_once 'utils.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$searchString   = $_GET['searchArea'];

//$searchString = " java ";
$search = new Search($searchString);


$searchResults = $search->getSearchResults();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">


	
	<title> Bachelor - search results </title>

	<link rel="shortcut icon" href="assets/images/pic.png">


    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

  
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Bachelor</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
             <li><a href="projects.php">Projects</a></li>
            <li><a href="about.html">About</a></li>

            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- +++++ Welcome Section +++++ -->

	

	
	<div class="container pt">
		<div class="row">	
            
            <div class="row mt">
			<div class="col-lg-12">
			
			
			
			
				<h4>Search Results</h4>
				<hr></hr>
				<p>Description of search process </p>
			</div><!-- /colg-lg-6 -->
         
		
		</div><!-- /row -->
            
<?php
            foreach ($searchResults as $searchResult) {
    
                

                $searchResultTemplate = "
                                <div class=\"col-lg-6\">

                                    <div class=\"pull-left\"> 
										<div class=\"exoa\">
                                        <h2>  {$searchResult->getTitle()} </h2>
										<hr></hr>
                                        <p> <span class=\"glyphicon glyphicon-asterisk\"></span> {$searchResult->getKeywords()} </p>
                                        <p>  {$searchResult->getDescription()} </p>
										
                                        <p> <span class=\"glyphicon glyphicon-user\"></span> {$searchResult->getCoordinator()} </p>
										
										</div>
                                    </div>
                                </div>";

                                        
                echo $searchResultTemplate;
                                        
            }// end of foreach

?>
			<!--
			<div class="col-lg-4">
                
				
				<div class="pull-left"> 
         
				
                <p>  Title </p>
				<p>  Keywords </p>
				<p>  Description </p>
				<p>  Coordinator </p>
				

				</div>

            </div>
			
		<div class="col-lg-4">
                
				
				<div class="pull-left"> 
         
				
                <p>  Title </p>
				<p>  Keywords </p>
				<p>  Description </p>
				<p>  Coordinator </p>
				

				</div>

            </div>
			
			-->
			

		</div><!-- /row -->
		
		
	</div><!-- /container -->
	
	
	<!-- +++++ Footer Section +++++ -->
	
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Address</h4>
					<p>
						Some Address 987,<br/>
						+34 9054 5455, <br/>
						Madrid, Spain.
					</p>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4">
					<h4>My Links</h4>
					<p>
						<a href="#">Dribbble</a><br/>
						<a href="#">Twitter</a><br/>
						<a href="#">Facebook</a>
					</p>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4">
					<h4>About Bachelor</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div><!-- /col-lg-4 -->
			
			</div>
		
		</div>
	</div>
	

    <!-- Bootstrap JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>

	</body>
</html>
