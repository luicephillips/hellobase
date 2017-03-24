<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HelloBase
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	    <div class="site-widgets">
            <div class="">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
            <div class="">
                <?php dynamic_sidebar('footer-2'); ?>
            </div>
            <div class="">
                <?php dynamic_sidebar('footer-3'); ?>
            </div>
            <div class="">
                <?php dynamic_sidebar('footer-4'); ?>
            </div>
        </div>
		<div class="site-info">
			<?php /* Create Copyright section as per your need */ ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
