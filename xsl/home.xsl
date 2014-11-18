<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/data">
    <html lang="en">
        <xsl:variable name="htmlHead" select="document('head.xsl')"/>
        <xsl:copy-of select="$htmlHead"/>
        <body>
        <xsl:variable name="htmlHeader" select="document('header.xsl')"/>
        <xsl:copy-of select="$htmlHeader"/>
        <div class="container pt">
		<div class="row">	
            
            <div class="row mt">
			<div class="col-lg-12">
				<h4>Notifications</h4>
                <hr></hr>  </div> </div>
                	
			
         
           <div class="col-lg-12">
         
         
            <xsl:if test="notifications">
            <div id="notification-area">
			<div class="ajax-link">
                <ul>
                <xsl:for-each select="notifications/notification">
                    <li>
                        <xsl:variable name="notificationId" select="id"/>
                        <xsl:value-of select="message"/> <span> - </span>
						<a class="btn btn-danger btn-xs ajax-link" href="readedNotification.php?id={$notificationId}" > close </a> 
                    </li><br></br>
                </xsl:for-each>
                </ul>
				</div>
            </div>
            </xsl:if>
            
            
           <xsl:variable name="htmlSearch" select="document('search.xsl')"/>
           <xsl:copy-of select="$htmlSearch"/>
            
            
            <!-- in student home page we show personal project, if exist, or applications -->
            <xsl:if test="studentProject">
            <div id="student-project-area">
                <ul>
                <xsl:for-each select="studentProject/project">
                    <div>
                    
                        <xsl:variable name="projectId" select="id"/>
							<h3> <xsl:value-of select="title"/> </h3>
							<h4>
								<span class="glyphicon glyphicon-user space-right"></span>
								<xsl:value-of select="coordinator"/>
							</h4>
							<h6>								  
                            <xsl:for-each select="keyword">
                                <span class="space-right">&#35;<xsl:value-of select="."/></span>
                            </xsl:for-each>
							</h6>

							<div>
								<p>
								<xsl:value-of select="description"/>
								</p>
							</div>
                        <p>
						  <span class="glyphicon glyphicon-info-sign space-right"></span>
                        Student accepted: <xsl:value-of select="numberOfStudent"/>/<xsl:value-of select="maxNumberOfStudent"/> 
						</p>
						<p>
						 <span class="glyphicon glyphicon-info-sign space-right"></span>
                        Student interested: <xsl:value-of select="numberOfApplication"/>
						</p>
                        <a class="btn btn-info" href="showProject.php?id={$projectId}"> Show project </a>
                    
                    </div>
                </xsl:for-each>
                </ul>
            </div>
            </xsl:if>
            <xsl:if test="studentApplications">
            <div id="student-application-area">
                <ul>
                <xsl:for-each select="studentApplications/project">
                    <div>
                        <xsl:variable name="projectId" select="id"/>
							<h3> <xsl:value-of select="title"/> </h3>
							<h4>
								<span class="glyphicon glyphicon-user space-right"></span>
								<xsl:value-of select="coordinator"/>
							</h4>
							<h6>								  
                            <xsl:for-each select="keyword">
                                <span class="space-right">&#35;<xsl:value-of select="."/></span>
                            </xsl:for-each>
							</h6>

							<div>
								<p>
								<xsl:value-of select="description"/>
								</p>
							</div>
						<br></br>
						<p>
						  <span class="glyphicon glyphicon-info-sign space-right"></span>
                        Student accepted: <xsl:value-of select="numberOfStudent"/>/<xsl:value-of select="maxNumberOfStudent"/>
						</p>
						<p>
                        Student interested: <xsl:value-of select="numberOfApplication"/> 
						</p>
                        <a class="btn btn-danger" href="showProject.php?id={$projectId}"> Show project </a>
                    </div> 
                </xsl:for-each>
                </ul>
            </div>
            </xsl:if>
            <!-- in coordinator home page we show project he coordinate -->
            <xsl:if test="projects">
            <div id="professor-project-area">
                <ul>
                <xsl:for-each select="projects/project">
                    <div>
                        <xsl:variable name="projectId" select="id"/>
							<h3> 
							<xsl:value-of select="title"/> 
							</h3>
							<h4>
								<span class="glyphicon glyphicon-user space-right"></span>
								<xsl:value-of select="coordinator"/>
							</h4>
							<h6>								  
                            <xsl:for-each select="keyword">
                                <span class="space-right">&#35;<xsl:value-of select="."/></span>
                            </xsl:for-each>
							</h6>

							<div>
								<p>
								<xsl:value-of select="description"/>
								</p>
							</div>
						
						
						<p>
						  <span class="glyphicon glyphicon-info-sign space-right"></span>
                        Student accepted: <xsl:value-of select="numberOfStudent"/>/<xsl:value-of select="maxNumberOfStudent"/>
						</p>
						 <p>
						  <span class="glyphicon glyphicon-info-sign space-right"></span>
                        Student interested: <xsl:value-of select="numberOfApplication"/> </p>
                        <a class="btn btn-info" href="showProject.php?id={$projectId}"> show project </a> 
						<hr></hr>
                    </div>
                </xsl:for-each>
                </ul>
            </div>
            </xsl:if>
            
            
            
                </div> 
         
             </div> </div>      
        <xsl:variable name="htmlFooter" select="document('footer.xsl')"/>
        <xsl:copy-of select="$htmlFooter"/>
        </body>
    </html>
    </xsl:template>
</xsl:stylesheet>