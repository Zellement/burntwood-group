<?php
/* The template for displaying the footer */
?>

<!-- Back to top arrow -->
<div class="back-top-wrap">
    <p id="back-top">
        <a><i class="fa fa-arrow-up fa-2x"></i> Top</a>
    </p>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2418.814724305377!2d-1.9489303839857126!3d52.68138343200861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870a07dde638153%3A0xd3cc00493d8d4848!2sBurntwood%20Group!5e0!3m2!1sen!2suk!4v1585141333565!5m2!1sen!2suk" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

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
