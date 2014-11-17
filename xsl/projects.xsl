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
                            <h4>Projects</h4>
                            <hr />
                        </div>
                    </div>
                </div>
                <xsl:variable name="htmlSearch" select="document('search.xsl')"/>
                <xsl:copy-of select="$htmlSearch"/>
                <div>
                     <br />
                </div>
				
                <xsl:choose>
                <xsl:when test="projects">
				
                <div id="research-result">
						
                    <ul class="pull-left">
					
                    <xsl:for-each select="projects/project">
                        <li>
							
                            <xsl:variable name="projectId" select="id"/>
							<h3> <xsl:value-of select="title"/> </h3>
							<br></br>
							 <span class="glyphicon glyphicon-info-sign"></span>	
							<xsl:value-of select="description"/>
							<br></br>
							 <span class="glyphicon glyphicon-asterisk"></span>		
						    <xsl:for-each select="keyword">
                            <xsl:value-of select="."/>
                            </xsl:for-each>
							<br></br>
							<span class="glyphicon glyphicon-user"></span>
                            <xsl:value-of select="coordinator"/>
                           
                           
                           
							<br></br>
							
                            Student accepted: <xsl:value-of select="numberOfStudent"/>/
                            <xsl:value-of select="maxNumberOfStudent"/> <span> | </span>
                            Student interested: <xsl:value-of select="numberOfApplication"/>
							<br></br>
                            <a class="btn btn-info" href="showProject.php?id={$projectId}"> show project </a>
							<hr></hr>
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
            </div>
        <xsl:variable name="htmlFooter" select="document('footer.xsl')"/>
        <xsl:copy-of select="$htmlFooter"/>
        </body>
    </html>
    </xsl:template>
</xsl:stylesheet>
