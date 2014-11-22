<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4>Address</h4>
                    <p>
                       Splaiul Independetei,<br/>
                        CJ101, <br/>
                        Bucuresti, Romania
                    </p>
                </div><!-- /col-lg-4 -->
            <div class="col-lg-4">
                <h4>My Links</h4>
                <p>
                        <a href="#">Dribbble</a><br/>
                        <a href="#">Twitter</a><br/>
                        <a href="#">Facebook</a>
                </p>
            </div><!-- /col-lg-4 -->
            <div class="col-lg-4">
                <h4>About Bachelor</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <p> this is a try: <a href="home.php" class="back">go to previous page!</a></p>
            </div><!-- /col-lg-4 -->
        </div>
        </div>
    </div>
    <script>
        $(document).ready(function()
        {
            $("a.ajax-link").click(function( event )
            {
                event.preventDefault();
                self = jQuery(this);
                href = self.attr('href');
                //id = self.attr('id');
                throwAjax(href);
                return false;
            });
        
            $("a.back").click(function(event)
            {
                event.preventDefault();
                history.back();
                return false;
            });

            function throwAjax(link)
            {
                $.ajax({
                    url: link,
                    dataType: "xml",
                    type: "GET",
                    success: function(data)
                    {
                        $('a.ajax-link[href="'+link+'"]').parent().hide();
                        console.log("OK: ");
                        console.log(data);

                    },
                    error: function(data)
                    {
                        //hide also in case of error
                        $('a.ajax-link[href="'+link+'"]').parent().hide();
                        console.log("ERROR: ");
                        console.log(data);
                    }
                });
            }
        });
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
    </xsl:template>
</xsl:stylesheet>