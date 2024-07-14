<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bluerex
 */
?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
					<?php
					if ( function_exists( 'dynamic_sidebar' ) ) {
						dynamic_sidebar( 'sidebar_footer_menu' );
					}
					?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
					<?php
					if ( function_exists( 'dynamic_sidebar' ) ) {
						dynamic_sidebar( 'sidebar-footer_images' );
					}
					?>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <ul>
            <li><span class="cpy">&#9400;Theme by psdfreebies.com</span></li>
            <li>From PSD to WP by <a href="https://vk.com/mamikonarsvk" target="_blank" class="author">Mamikon</a></li>
        </ul>
    </div>
    <img id="js-top" class="top-link top-btn-hide" src="<?php bloginfo( template_url ) ?>/assets/img/top-button.png"
         alt="to top">
</footer>
<?php wp_footer() ?>
</body>

</html>