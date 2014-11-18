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
		    
				<h2>Project</h2>
                <hr></hr>  </div> </div>
            
            <div id="show-project">
                
                <xsl:for-each select="projects/project">
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
							
                            <div>
                            <p>
								<span class="glyphicon glyphicon-info-sign space-right"></span>
								Student accepted: <xsl:value-of select="numberOfStudent"/>/<xsl:value-of select="maxNumberOfStudent"/>
								 <xsl:if test="studentsInvolved">
								 <ul>
                                    <xsl:for-each select="studentsInvolved/student">
                                        <li><xsl:value-of select="studentName"/></li>
                                    </xsl:for-each>
								</ul>
                                </xsl:if>
							</p>
                            <p>
								<span class="glyphicon glyphicon-info-sign space-right"></span>
								Student interested: <xsl:value-of select="numberOfApplication"/>
                                <xsl:if test="studentData"> 
									<ul>								
										<li>
										<xsl:value-of select="studentData/studentMessage"/>
										<xsl:if test="studentData/available">
											<a class="btn btn-success ajax-link"  href="apply.php?projectId={$projectId}">Apply</a>
										</xsl:if>
										</li>
									</ul>
                                </xsl:if>
								<xsl:if test="applications">
									<ul>
									<xsl:for-each select="applications/application">
										<li>
											<span class="space-right"> 
												<xsl:value-of select="studentName"/> 
											</span>
											<xsl:variable name="studentId" select="studentId"/>
											<span class="space-right">
													<a class="btn btn-success ajax-link space-right"  href="acceptApplication.php?studentId={$studentId}&amp;projectId={$projectId}">Accept</a>
													<a class="btn btn-danger ajax-link space-right" href="refuseApplication.php?studentId={$studentId}&amp;projectId={$projectId}">Refuse</a>
											</span>
										</li>
									</xsl:for-each>
									</ul>
								</xsl:if>
							</p>
                            </div>
                        </div>
                </xsl:for-each>
            </div>
          
            </div> 
			 <a class="btn btn-primary back" href="projects.php"> BACK </a>
			</div>
        
        <xsl:variable name="htmlFooter" select="document('footer.xsl')"/>
        <xsl:copy-of select="$htmlFooter"/>
		
		<script src="assets/js/dynamic_back.js"></script>
        </body>
    </html>
    </xsl:template>
</xsl:stylesheet>