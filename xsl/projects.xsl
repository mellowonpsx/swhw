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
                            <h1>Projects</h1>
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
						
                    <ul class="">
					
                    <xsl:for-each select="projects/project">
                        <div>
							
                            <xsl:variable name="projectId" select="id"/>
                           
                           <h3>
                               <xsl:value-of select="title"/>
                               <xsl:choose>
                                    <xsl:when test="projectAvailable">
                                        - AVAILABLE
                                    </xsl:when>
                                    <xsl:otherwise>
                                        - FULL
                                    </xsl:otherwise>
                               </xsl:choose>
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
                            Student accepted: <xsl:value-of select="numberOfStudent"/>/ <xsl:value-of select="maxNumberOfStudent"/> 
							</p>
							<p>
							<span class="glyphicon glyphicon-info-sign space-right"></span>
                            Student interested: <xsl:value-of select="numberOfApplication"/>
							</p>
							<div>
                            <a class="btn btn-info space-right" href="showProject.php?id={$projectId}"> Show project </a>
							
							
							
							</div>
						
							
							<hr></hr>
                        </div>
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
