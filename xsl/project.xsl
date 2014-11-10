<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/data">
    <html lang="en">
        <head>
        </head>
        <body>
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
                            Student accepted: <xsl:value-of select="numberOfStudent"/>/
                            <xsl:value-of select="maxNumberOfStudent"/>
                            Student intrested: <xsl:value-of select="numberOfApplication"/>
                            <!--<xsl:choose>
                                <xsl:when test="student/available">
                                    blablabla
                                </xsl:when>
                            </xsl:choose>-->
                            <xsl:if test="studentData">                                
                                <xsl:value-of select="studentData/studentMessage"/>
                                <xsl:if test="studentData/available">
                                    <a href="apply.php?projectId={$projectId}">apply</a>
                                </xsl:if>
                            </xsl:if>
                            <xsl:if test="applications">
                                <xsl:for-each select="applications/application">
                                    <xsl:variable name="studentId" select="studentId"/>
                                    <xsl:value-of select="studentName"/><a href="acceptApplication.php?studentId={$studentId}&amp;projectId={$projectId}">accept</a><a href="refuseApplication.php?studentId={$studentId}&amp;projectId={$projectId}">refuse</a>
                                </xsl:for-each>
                            </xsl:if>
                        </li>
                </xsl:for-each>
                </ul>
            </div>
        </body>
    </html>
    </xsl:template>                         
</xsl:stylesheet>