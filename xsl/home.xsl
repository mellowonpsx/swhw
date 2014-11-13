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
		<div class="row mt centered">	
            
            <div class="row mt">
			<div class="col-lg-12">
				<h4>Notifications</h4>
                <hr></hr>  </div> </div>
                
         
           <div class="col-lg-9">
         
         
            <xsl:if test="notifications">
            <div id="notification-area">
                <ul>
                <xsl:for-each select="notifications/notification">
                    <li>
                        <xsl:variable name="notificationId" select="id"/>
                        <xsl:value-of select="message"/><a href="readedNotification.php?id={$notificationId}"> readed </a>
                    </li>
                </xsl:for-each>
                </ul>
            </div>
            </xsl:if>
            
            
            <div id="search-area">
               <form action="">
                    Enter a search keyword:
                  <input type="text" name="SearchProject" />
                  <input type="submit" value="Search"/> 
                </form>
    
            </div>
            
            
            <!-- in student home page we show personal project, if exist, or applications -->
            <xsl:if test="studentProject">
            <div id="student-project-area">
                <ul>
                <xsl:for-each select="studentProject/project">
                    <li>
                    
                        <xsl:variable name="projectId" select="id"/> 
                        <xsl:value-of select="coordinator"/>
                        <xsl:value-of select="title"/>
                        <xsl:value-of select="description"/>
                        
                        <xsl:for-each select="keyword">
                        <xsl:value-of select="."/> 
                        </xsl:for-each>
             
                        
                        Student accepted: <xsl:value-of select="numberOfStudent"/>/
                        <xsl:value-of select="maxNumberOfStudent"/>
                        Student intrested: <xsl:value-of select="numberOfApplication"/>
                        <a href="showProject.php?id={$projectId}"> show project </a>
                    
                    </li>
                </xsl:for-each>
                </ul>
            </div>
            </xsl:if>
            <xsl:if test="studentApplications">
            <div id="student-application-area">
                <ul>
                <xsl:for-each select="studentApplications/project">
                    <li>
                        <xsl:variable name="projectId" select="id"/>
                        <xsl:value-of select="coordinator"/>
                        <xsl:value-of select="title"/>
                        <xsl:value-of select="description"/>
                        <xsl:for-each select="keyword">
                            <xsl:value-of select="."/>
                        </xsl:for-each>
                        Student accepted: <xsl:value-of select="numberOfStudent"/>/
                        <xsl:value-of select="maxNumberOfStudent"/>
                        Student intrested: <xsl:value-of select="numberOfApplication"/>
                        <a href="showProject.php?id={$projectId}"> show project </a>
                    </li> 
                </xsl:for-each>
                </ul>
            </div>
            </xsl:if>
            <!-- in coordinator home page we show project he coordinate -->
            <xsl:if test="projects">
            <div id="professor-project-area">
                <ul>
                <xsl:for-each select="projects/project">
                    <li>
                        <xsl:variable name="projectId" select="id"/>
                        <xsl:value-of select="title"/>
                        <xsl:value-of select="description"/>
                        <xsl:for-each select="keyword">
                            <xsl:value-of select="."/>
                        </xsl:for-each>
                        Student accepted: <xsl:value-of select="numberOfStudent"/>/
                        <xsl:value-of select="maxNumberOfStudent"/>
                        Student intrested: <xsl:value-of select="numberOfApplication"/>
                        <a href="showProject.php?id={$projectId}"> show project </a> 
                    </li>
                </xsl:for-each>
                </ul>
            </div>
            </xsl:if>
            
            
            
                </div> 
            
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
            
            
        </body>
    </html>
    </xsl:template>                         
</xsl:stylesheet>