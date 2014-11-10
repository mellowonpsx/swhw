<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/data">
    <html lang="en">
        <head>
        </head>
        <body>
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
            <div id="serach-area">
                search area here
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
        </body>
    </html>
    </xsl:template>                         
</xsl:stylesheet>