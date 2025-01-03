<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package custom
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-K6QVKWB17H"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-K6QVKWB17H');
</script>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'custom_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php get_template_part( 'template-parts/header/site-header' ); ?>
	<!-- <div class="black-friday-cta">
		<div class="black-friday-cta__text">Black Friday Deal - up to 50% off on selected items</div>
		<div class="black-friday-cta__button"><a href="/shop/black-friday">Shop Now</a></div>
	</div> -->
	<?php
	/**
	 * Functions hooked in to custom_before_content
	 *
	 * @hooked custom_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'custom_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">

		<?php
		do_action( 'custom_content_top' );
