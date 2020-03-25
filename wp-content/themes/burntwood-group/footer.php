<?php
/* The template for displaying the footer */
?>

<!-- Back to top arrow -->
<div class="back-top-wrap">
    <p id="back-top">
        <a><i class="fa fa-arrow-up fa-2x"></i> Top</a>
    </p>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFFlXigsvINX7SYaW37ZCrbUn9k7hfNgk&v=3.exp&libraries=geometry"></script>
                
                <script type="text/javascript">
                    // When the window has finished loading create our google map below
                    google.maps.event.addDomListener(window, 'load', init);
                
                    function init() {
                        // Basic options for a simple Google Map
                        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                        var mapOptions = {
                            // How zoomed in you want the map to start at (always required)
                            zoom: 10,

                            scrollwheel: false,

                            draggable: false,

                            // The latitude and longitude to center the map (always required)
                            center: new google.maps.LatLng(52.681361, -1.946835)
                        };

                        // Get the HTML DOM element that will contain your map 
                        // We are using a div with id="map" seen below in the <body>
                        var mapElement = document.getElementById('map');

                        // Create the Google Map using our element and options defined above
                        var map = new google.maps.Map(mapElement, mapOptions);

                        // Let's also add a marker while we're at it
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(52.681361, -1.946835),
                            map: map
                        });
                    }
                </script>

                <div id="map"></div>

<footer role="contentinfo">

    <div class="container box-padding flex">

        <div class="grid grid6_12">
            <p class="title">Our Services</p>
            <?php wp_nav_menu( array('menu' => 'Main Nav', 'menu_class' => 'footer-navigation', 'container' => '' )); ?>
        </div>

        <div class="grid grid6_12">

            <p class="title">More Info</p>
            <p><strong>Address:</strong> <?php address_inline(); ?></p>
            <p><strong>Email:</strong> <a href="mailto:<?php the_field('company_email_address', 'option'); ?>"><?php the_field('company_email_address', 'option'); ?></a></p>
            <p><?php the_field('company_name', 'option'); ?> is a registered company in England.</p>
            <p><?php if(get_field('company_reg_number', 'option')) : ?><strong>Registered Number:</strong> <?php the_field('company_reg_number', 'option'); ?></p><?php endif; ?>
            <p><?php if(get_field('company_vat_number', 'option')) : ?><strong>VAT Number:</strong> <?php the_field('company_vat_number', 'option'); ?></p><?php endif; ?>
            </ul>

        </div>
        
    </div><!--/.container-->

    <div class="container box-padding">

        <p>&copy; <?php the_field('company_name', 'option'); ?> <?php echo date('Y'); ?>. All Rights Reserved</p>
        <p><a href="<?php echo site_url(); ?>/cookies-privacy-policy/">Cookies &amp; Privacy Policy</a></p>

    </div><!-- /.container -->

</footer>

</div><!--/.wrapper-->

<?php 
    wp_footer(); 
?>

</body>
</html>
