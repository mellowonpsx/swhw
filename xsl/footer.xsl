<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4>Address</h4>
                    <p>
                        Some Address 987,<br/>
                        +34 9054 5455, <br/>
                        Madrid, Spain.
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
            </div><!-- /col-lg-4 -->
        </div>
        </div>
    </div>
    <script>
        $("a.ajax-link").click(function( event )
        {
            event.preventDefault();
            self = jQuery(this);
            href = self.attr('href');
            //id = self.attr('id');
            throwAjax(href);
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
                    console.log(data);

                },
                error: function(data)
                {
                    console.log(data);
                }
            });
        }
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
    </xsl:template>
</xsl:stylesheet>