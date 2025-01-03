<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package custom
 */

get_header(); ?>

<style>
	.error-404 .page-content h1 {
		margin: 20px 0;
	}
	.error-404 .page-content .custom-wrapper {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;
		width: 700px;
		max-width: 100%;
		margin: auto;
		text-align: center;
	}
	.error-404 .page-content .custom-wrapper p {
		margin-bottom: 10px;
	}
	.error-404 .page-content .button-wrapper {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		margin-bottom: 30px;
	}
	.error-404 .page-content .button-wrapper a {
		min-width: 100px;
		padding: 10px 20px;
		margin: 10px;
		font-weight: bold;
		color: #6f1d47;
		text-align: center;
		text-decoration: none;
		background-color: #efefef;
		border-radius: 2px;
		cursor: pointer;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.error-404 .page-content .button-wrapper a:hover {
		color: #fff;
		background-color: #6f1d47;
	}
	.error-404 .page-content .search-products .woocommerce-product-search button[type="submit"] {
		min-width: 100px;
	}
	@media (max-width: 959px) {
		.error-404 .page-content h1 {
			padding-bottom: 0;
		}
		.error-404 .page-content .search-products .woocommerce-product-search {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
		}
		.error-404 .page-content .search-products .woocommerce-product-search .search-field {
			width: calc(100% - 120px);
			margin-right: 20px;
		}
	}
	@media (max-width: 440px) {
		.error-404 .page-content .button-wrapper a {
			min-width: unset;
		}
	}
</style>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="error-404 not-found">
			<div class="page-content">
				<div class="inner inner-800">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'custom' ); ?></h1>
					</header><!-- .page-header -->

					<div class="custom-wrapper">
						<p>Nothing was found at this location. Try searching, or check out the links below.</p>
						<div class="button-wrapper">
							<a href="/shop/cat">Cat</a>
							<a href="/shop/dog">Dog</a>
							<a href="/shop/wildlife">Wildlife</a>
						</div>
						<?php
							echo '<section aria-label="' . esc_html__( 'Search', 'custom' ) . '" class="search-products">';

							if ( custom_is_woocommerce_activated() ) {
								the_widget( 'WC_Widget_Product_Search' );
							} else {
								get_search_form();
							}

							echo '</section>';

							// if ( custom_is_woocommerce_activated() ) {

							// 	echo '<div class="fourohfour-columns-2">';

							// 		echo '<section class="col-1" aria-label="' . esc_html__( 'Promoted Products', 'custom' ) . '">';

							// 			custom_promoted_products();

							// 		echo '</section>';

							// 		echo '<nav class="col-2" aria-label="' . esc_html__( 'Product Categories', 'custom' ) . '">';

							// 			echo '<h2>' . esc_html__( 'Product Categories', 'custom' ) . '</h2>';

							// 			the_widget(
							// 				'WC_Widget_Product_Categories',
							// 				array(
							// 					'count' => 1,
							// 				)
							// 			);

							// 		echo '</nav>';

							// 	echo '</div>';

							// 	echo '<section aria-label="' . esc_html__( 'Popular Products', 'custom' ) . '">';

							// 		echo '<h2>' . esc_html__( 'Popular Products', 'custom' ) . '</h2>';

							// 		$shortcode_content = custom_do_shortcode(
							// 			'best_selling_products',
							// 			array(
							// 				'per_page' => 4,
							// 				'columns'  => 4,
							// 			)
							// 		);

							// 		echo $shortcode_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

							// 	echo '</section>';
							// }
						?>
					</div>

				</div>
			</div><!-- .page-content -->
		</div><!-- .error-404 -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
