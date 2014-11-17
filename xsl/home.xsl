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
                        <xsl:value-of select="message"/> 
						<a class="ajax-link" href="readedNotification.php?id={$notificationId}" > readed </a>
                    </li>
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
                        Student interested: <xsl:value-of select="numberOfApplication"/>
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
                        Student interested: <xsl:value-of select="numberOfApplication"/>
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
                        Student interested: <xsl:value-of select="numberOfApplication"/>
                        <a href="showProject.php?id={$projectId}"> show project </a> 
                    </li>
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