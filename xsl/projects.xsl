<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/data">
    <html lang="en">
         <head>
        <meta charset="utf-8" />
                <meta name="viewport"    content="width=device-width, initial-scale=1.0" />
                <title> Home page</title>
                <link rel="shortcut icon" href="assets/images/pic.png" />
                <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
                <link rel="stylesheet" href="assets/css/main.css" />
                <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
                <link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css' />    
                <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
          
        </head>
        <body>
            
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
        <div class="container pt">
		<div class="row">	
            
            <div class="row mt">
			<div class="col-lg-12">
				<h4>Projects</h4>
                <hr></hr>  </div> </div>
            
            
            <div id="serach-area">
         <form action = 'searchResults.php' method = "GET">
                <input type="text" name="searchArea" />
                <input type="submit" value="Search" />
         </form>
            </div>
			<div>  <br></br> </div>
            <xsl:choose>
            <xsl:when test="projects">
            <div id="research-result">
                <ul class="pull-left">
                <xsl:for-each select="projects/project">
<!--                    <xsl:if test="projectAvailable">
                    <li class="available">
                    </xsl:if>
                    <xsl:if test="not(projectAvailable)">
                    <li>
                    </xsl:if>-->
                    <li class="">
                        <xsl:variable name="projectId" select="id"/>
                        <xsl:value-of select="coordinator"/>
                        <xsl:value-of select="title"/>
                        <xsl:value-of select="description"/>
                        <xsl:for-each select="keyword">
                            <xsl:value-of select="."/>
                        </xsl:for-each>
                       
                        Student accepted: <xsl:value-of select="numberOfStudent"/>/
                        <xsl:value-of select="maxNumberOfStudent"/>
                        Student interested: <xsl:value-of select="numberOfApplication"/>
                        <a href="showProject.php?id={$projectId}"> show project </a>
                       
                    </li>
                </xsl:for-each>
                </ul>
            </div>
            </xsl:when>
            <xsl:otherwise>
                <div>
                    Sorry, you have no project that 
                </div>
            </xsl:otherwise>
            </xsl:choose>
            
            
            </div> </div>
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
			
            <script src="assets/js/bootstrap.min.js"></script>
        </body>
    </html>
    </xsl:template>                         
</xsl:stylesheet>