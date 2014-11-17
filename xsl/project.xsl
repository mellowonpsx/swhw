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
                            <div>
                                <xsl:if test="studentsInvolved">
                                    <xsl:for-each select="studentsInvolved/student">
                                        <xsl:value-of select="studentName"/> 
                                    </xsl:for-each>
                                </xsl:if>
                            </div>
                            <div>
                                <xsl:if test="studentData">                                
                                    <xsl:value-of select="studentData/studentMessage"/>
                                    <xsl:if test="studentData/available">
                                        <a class="ajax-link"  href="apply.php?projectId={$projectId}">apply</a>
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
                                   <span>
                                    <a class="btn btn-default ajax-link"  href="acceptApplication.php?studentId={$studentId}&amp;projectId={$projectId}">Accept</a> 
									<a class="btn btn-default ajax-link" href="refuseApplication.php?studentId={$studentId}&amp;projectId={$projectId}">Refuse</a>
									</span>
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
        
        <xsl:variable name="htmlFooter" select="document('footer.xsl')"/>
        <xsl:copy-of select="$htmlFooter"/>
        </body>
    </html>
    </xsl:template>
</xsl:stylesheet>