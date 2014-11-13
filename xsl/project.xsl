<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/data">
    <html lang="en">
        <head>
        <meta charset="utf-8" />
                <meta name="viewport"    content="width=device-width, initial-scale=1.0" />
                <title> Bachelor - project </title>
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
            
            <li><a href="projects.html">Projects</a></li>
            <li><a href="about.html">About</a></li>

            <li><a href="index.html">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
            
            
        <div class="container pt">
		<div class="row">	
            
            <div class="row mt">
			<div class="col-lg-12">
		    
				<h4>Project</h4>
                <hr></hr>  </div> </div>
            
            <div id="show-project">
                <ul>
                <xsl:for-each select="projects/project">
                        <li>
                            <xsl:variable name="projectId" select="id"/>
                            <xsl:value-of select="coordinator"/>
                            <xsl:value-of select="title"/>
                            <xsl:value-of select="description"/>
                            <xsl:for-each select="keyword">
                                <xsl:value-of select="."/>
                            </xsl:for-each>
                            <div class="pull-left">
                            Student accepted: <xsl:value-of select="numberOfStudent"/>/
                            <xsl:value-of select="maxNumberOfStudent"/>
                            Student interested: <xsl:value-of select="numberOfApplication"/>
                            <!--<xsl:choose>
                                <xsl:when test="student/available">
                                    blablabla
                                </xsl:when>
                            </xsl:choose>-->
							<div>
                            <xsl:if test="studentData">                                
                                <xsl:value-of select="studentData/studentMessage"/>
                                <xsl:if test="studentData/available">
                                    <a href="apply.php?projectId={$projectId}">apply</a>
                                </xsl:if>
                            </xsl:if>
							</div>
							
                            </div>
							<div>
							<br></br>
							</div>
						
                            <div >
                            <xsl:if test="applications">
                                <xsl:for-each select="applications/application">
                                   <div style="width:300px">
									<div class="pull-right">
								   <xsl:variable name="studentId" select="studentId"/>
                                   <xsl:value-of select="studentName"/> 
                                   
                                    <a class="btn btn-default" href="acceptApplication.php?studentId={$studentId}&amp;projectId={$projectId}">Accept</a> 
									<a class="btn btn-default" href="refuseApplication.php?studentId={$studentId}&amp;projectId={$projectId}">Refuse</a>
									
                                       </div>
									</div>
                                </xsl:for-each>
                            </xsl:if>
                                </div>
                        </li>
                </xsl:for-each>
                </ul>
            </div>
           
            </div> 
			 <a class="btn btn-primary" href="projects.php"> BACK </a>
			</div>
            
                 
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