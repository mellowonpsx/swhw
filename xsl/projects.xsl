<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/data">
    <html lang="en">
        <head>
        </head>
        <body>
            <div id="serach-area">
                search area here
            </div>
            <xsl:choose>
            <xsl:when test="projects">
            <div id="research-result">
                <ul>
                <xsl:for-each select="projects/project">
                    <xsl:if test="projectAvailable">
                    <li class="available">
                    </xsl:if>
                    <xsl:if test="not(projectAvailable)">
                    <li>
                    </xsl:if>
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
            </xsl:when>
            <xsl:otherwise>
                <div>
                    Sorry, you have no project that 
                </div>
            </xsl:otherwise>
            </xsl:choose>
        </body>
    </html>
    </xsl:template>                         
</xsl:stylesheet>