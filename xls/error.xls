<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
    <html lang="en">
        <head>
            <meta charset="utf-8" />
                <meta name="viewport"    content="width=device-width, initial-scale=1.0" />
                <title> Error page</title>
                <link rel="shortcut icon" href="assets/images/pic.png" />
	        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
                <link rel="stylesheet" href="assets/css/error.css" />
                <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
                <link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css' />
        </head>
        <body class="text-shadows">
            <section class="section" id="head">
                <div class="container">

                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">	

                            <!-- Site Title, your name, HELLO msg, etc. -->
                            <h1 class="title">OOOoooops </h1>
                            <!--				<h2 class="subtitle">The online resource for selecting your bachelor project</h2>-->

                            <!-- Short introductory (optional) -->
                            <h3 class="tagline">
                                It seems we encountered some errors: <br />
                                <xsl:for-each select="errors/error">
                                    <xsl:value-of select="message"/><br />
                                </xsl:for-each>                                                 
                                Press the button to return to the home page.
                            </h3>	
                            <!-- Nice place to describe your site in a sentence or two -->
                            <p>
                                <xsl:variable name="link" select="errors/goto"/>
                                <a href="{$link}" class="btn btn-default btn-lg">BACK</a>
                            </p>
                        </div> <!-- /col -->
                    </div> <!-- /row -->
                </div>
            </section>




            <!-- Load js libs only when the page is loaded. -->
            <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


        </body>
    </html>
    </xsl:template>                         
</xsl:stylesheet>