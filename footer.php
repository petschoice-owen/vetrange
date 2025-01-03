<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package custom
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'custom_before_footer' ); ?>

	<?php get_template_part( 'template-parts/footer/sign-up-block' ); ?>

        <footer class="main-footer">
            <div class="inner p-60">
                <div class="flex-mob col-5">
                    <div class="footer-logo">
                        <img src="/wp-content/uploads/2024/05/pc-vet-division-colored.png" alt="">
                    </div>
                    <div class="menu-1">
                        <p class="bold">Customer Care</p>
                        <nav>
                             <?php wp_nav_menu( array( 'theme_location'=>'footer-menu-1', 'container_class'=>'footer-menu-1' ) ); ?>
                        </nav>
                    </div>
                    <div class="menu-2">
                        <p class="bold">About pets</p>
                        <nav>
                             <?php wp_nav_menu( array( 'theme_location'=>'footer-menu-2', 'container_class'=>'footer-menu-2' ) ); ?>
                        </nav>
                    </div>
                    <div class="menu-3">
                        <p class="bold">About us</p>
                        <nav>
                             <?php wp_nav_menu( array( 'theme_location'=>'footer-menu-3', 'container_class'=>'footer-menu-3' ) ); ?>
                        </nav>
                    </div>
                    <div class="footer-last">
                        <p class="bold">Get in touch</p>
                        <?php wp_nav_menu( array( 'theme_location'=>'footer-menu-4', 'container_class'=>'footer-menu-4' ) ); ?>
                        <a href="mailto:info@vetrange.co.uk">info@vetrange.co.uk</a>
                        <a href="tel:0125454545">01254 54545</a>
                        <p class="registration">Registration Enquiries: <a href="mailto:registrations@vetrange.co.uk">registrations@vetrange.co.uk</a></p>
                        <!-- <ul class="socials flex-mob">
                            <li><a href="https://www.facebook.com/profile.php?id=61552217412737" target="_blank"><img src="/wp-content/themes/custom/base_html/www/images/icons/icon-facebook.svg" alt=""></a></li>
                            <li style="display:none;"><a href="#"><img src="/wp-content/themes/custom/base_html/www/images/icons/icon-twitter.svg" alt=""></a></li>
                            <li><a href="https://www.instagram.com/petrangeuk/" target="_blank"><img src="/wp-content/themes/custom/base_html/www/images/icons/icon-instagram.svg" alt=""></a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="post-footer bg-black">
                <p><?php the_field('copyright_text', 'option'); ?></p>
            </div>
        </footer>
	<?php do_action( 'custom_after_footer' ); ?>

    <?php wp_footer();

    if (is_product()) {?>
        <script>
            var $ = jQuery;
            $(document).ready(function() {
                $(".woocommerce-product-gallery__wrapper img").removeAttr("sizes");
            });
        </script>
    <?php } ?>

    <script type="text/javascript" id="feefo-plugin-widget-bootstrap" src="//register.feefo.com/api/ecommerce/plugin/widget/merchant/pets-choice-ltd" async></script>

    <script>
        var $ = jQuery;

        if ( $('.woocommerce nav.woocommerce-pagination ul.page-numbers li a.page-numbers').length ) {
            $('.woocommerce nav.woocommerce-pagination ul.page-numbers li a.page-numbers').each(function() {
                if ( $(this).siblings('a').length > 0 ) {
                    $(this).siblings('a').hide();
                }
            })
            $('.woocommerce nav.woocommerce-pagination').css('opacity','1');
        }

        $(document).ready(function() {
            // $('body').removeClass('privatepage');
            setTimeout(() => {
                $('body').addClass('showpage');
            }, 100);

            if ( $('.woocommerce-MyAccount-navigation-link--Favourites a').length ) {
                $('.woocommerce-MyAccount-navigation-link--Favourites a').attr('href','/favourites');
            }

            // modify error message for lost password
            if ($('.woocommerce-lost-password').length) {
                if ($('.woocommerce-lost-password .woocommerce-ResetPassword > p:first-child').text().includes('enter your username or email address')) {
                    $('.woocommerce-lost-password .woocommerce-ResetPassword > p:first-child').html('Lost your password? Please enter your business email address. You will receive a link to create a new password via email.');
                }
            }
        });
    </script>

    <?php if ( is_page( 'cart' ) || is_cart() ) { ?>
        <script>
            var $ = jQuery;
            // add the restricted shipping zone message
            $(document).ready(function() {
                if ( $('.cart_totals').length ) {
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">We are currently unable to deliver to Scottish Highlands & Islands including the following postcodes: <br/>Aberdeen: AB31-AB35, AB41-AB54 <br/>Argyll: FK17-FK21, KA28, PA20-PA78, PH30-PH31, PH34-PH44, PH49-PH50 <br/>Arran: KA27 <br/>Dundee: PH15-PH18 <br/>Isle of Man: IM1-IM9 <br/>Isle of Wight: PO30-PO41 <br/>Northern Highlands: AB36-AB38, AB55-AB56, HS1-HS9, IV1-IV63, KW0-KW14, PH19-PH39, PH32-PH33, PH45-PH48 <br/>Orkney Shetland: KW15-KW18, ZE1-ZE4</p></div>').insertAfter('.cart_totals');
                }
            });
            $(document).ready(function() {
                // validate shipping zone on page load
                var shippingMethod = $('#shipping_method').text().trim();
                if ( shippingMethod.includes("Restricted Zone") ) {
                    $('body').addClass('restricted-zone');
                }
                else {
                    $('body').removeClass('restricted-zone');
                }

                // hide/show proceed to checkout button
                if ( $('.woocommerce-shipping-methods li').length ) {
                    // $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').show();
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').addClass('show');
                }
                else {
                    // $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').hide();
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                }

                // hide/show proceed to checkout extended
                var shippingMessage = $('.woocommerce-shipping-destination').text().trim();
                if ( shippingMessage.includes("Enter your address") ) {
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').addClass('show');
                }
                else {
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                }

                // minimum and maximum order amount validation
                var minMaxError = $('.woocommerce-error').text().trim();
                if ( minMaxError.includes("minimum") ) {
                    // $('.wc-proceed-to-checkout').css('display','none');
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                }
                else if ( minMaxError.includes("order values of over") ) {
                    // $('.wc-proceed-to-checkout').css('display','none');
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                }
                else {
                    // $('.wc-proceed-to-checkout').css('display','block');
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').addClass('show');
                }
            });
            $(window).on('load', function() {
                setTimeout(() => {
                    // hide/show proceed to checkout button
                    if ( $('.woocommerce-shipping-methods li').length ) {
                        // $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').show();
                        $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').addClass('show');
                    }
                    else {
                        // $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').hide();
                        $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                    }

                    // minimum and maximum order amount validation
                    var minMaxError = $('.woocommerce-error').text().trim();
                    if ( minMaxError.includes("minimum") ) {
                        // $('.wc-proceed-to-checkout').css('display','none');
                        $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                    }
                    else if ( minMaxError.includes("order values of over") ) {
                        // $('.wc-proceed-to-checkout').css('display','none');
                        $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                    }
                    else {
                        // $('.wc-proceed-to-checkout').css('display','block');
                        $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').addClass('show');
                    }
                }, 500);
                
                // hide/show proceed to checkout extended
                var shippingMessage = $('.woocommerce-shipping-destination').text().trim();
                if ( shippingMessage.includes("Enter your address") ) {
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').addClass('show');
                }
                else {
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                }
            })
            $('body').on('updated_cart_totals', function() {
                // validate shipping zone on change address
                var shippingMethod = $('#shipping_method').text().trim();

                if ( shippingMethod.includes("Restricted Zone") ) {
                    $('body').addClass('restricted-zone');
                }
                else {
                    $('body').removeClass('restricted-zone');
                }

                // hide/show proceed to checkout button
                if ( $('.woocommerce-shipping-methods li').length ) {
                    // $('.wc-proceed-to-checkout').show();
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').addClass('show');
                }
                else {
                    // $('.wc-proceed-to-checkout').hide();
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                }

                // hide/show proceed to checkout extended
                var shippingMessage = $('.woocommerce-shipping-destination').text().trim();
                if ( shippingMessage.includes("Enter your address") ) {
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').addClass('show');
                }
                else {
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                }

                // minimum and maximum order amount validation
                var minMaxError = $('.woocommerce-error').text().trim();
                if ( minMaxError.includes("minimum") ) {
                    // $('.wc-proceed-to-checkout').css('display','none');
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                }
                else if ( minMaxError.includes("order values of over") ) {
                    // $('.wc-proceed-to-checkout').css('display','none');
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').removeClass('show');
                }
                else {
                    // $('.wc-proceed-to-checkout').css('display','block');
                    $('.cart_totals .wc-proceed-to-checkout, .cart_totals .have-coupon').addClass('show');
                }

                // minimum and maximum order amount - on update cart
//                 var minAmount = 15;
//                 var maxAmount = 250;
//                 var totalAmount = $('.cart-subtotal .amount').text();
//                 var total = totalAmount.replace(/^[£]+/,"").replace(",","").replace(".00","");

//                 if ( total < minAmount ) {
//                     $('.woocommerce-error').each(function() {
//                         if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
//                             $(this).remove();
//                         }
//                     });
//                     setTimeout(() => {
//                         $('<ul class="woocommerce-error" role="alert"><li>Your current order total is '+totalAmount+' — you must have an order with a minimum of £15.00 to place your order.</li></ul>').insertAfter('.woocommerce > .cart-inner > .woocommerce-notices-wrapper');
//                     }, 100);
//                 }
//                 else if ( total > maxAmount ) {
//                     $('.woocommerce-error').each(function() {
//                         if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
//                             $(this).remove();
//                         }
//                     });
//                     $('<ul class="woocommerce-error" role="alert"><li>Your order value is '+totalAmount+'. We do not currently accept online order values of over £250.00.</li></ul>').insertAfter('.woocommerce > .cart-inner > .woocommerce-notices-wrapper');
//                 }
//                 else {
//                     $('.woocommerce-error').each(function() {
//                         if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
//                             $(this).remove();
//                         }
//                     });
//                 }
            });
			
			            if($('.woocommerce-cart').length > 0 || $('.woocommerce-checkout').length > 0) {
                function updateCartCheckoutNotice() {
                    $.ajax({
                        url: wc_add_to_cart_params.ajax_url,
                        type: 'POST',
                        data: {
                            action: 'vetrange_check_cart_total'
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#cart-checkout-notice').remove();
								if (response.data.notice) {
									if($('.woocommerce-notices-wrapper:eq(0) .woocommerce-error').length > 0) {
										$('.woocommerce-notices-wrapper:eq(0) .woocommerce-error').html('<li>'+response.data.notice+'</li>');
									}else {
										$('.woocommerce-notices-wrapper:eq(0)').append('<div id="cart-checkout-notice" class="woocommerce-error"><li>' + response.data.notice + '</li></div>');
									}
									$('.woocommerce-notices-wrapper:eq(0)').addClass('show');
									if($('.woocommerce-checkout').length > 0) {
										$('#payment').hide();
									}
								}else {
									if($('.woocommerce-checkout').length > 0) {
										$('#payment').show();
									}
								}
                            }
                        }
                    });
                }
            
                $(document.body).on('updated_cart_totals', function() {
                    updateCartCheckoutNotice();
                });

                $(document.body).on('updated_checkout', function() {
                    updateCartCheckoutNotice();
                });
            }

            // // Minimum order amount function
            // $(window).on('load', function() {
            //     if ($(".woocommerce-error li:contains('minimum')").length) {
            //         $('.wc-proceed-to-checkout, .have-coupon').hide();
            //         // this is the fix
            //         $('body').addClass('minimum-order-error');
            //     }
            //     else {
            //         $('.wc-proceed-to-checkout, .have-coupon').show();
            //         // this is the fix
            //         $('body').removeClass('minimum-order-error');
            //     }
            // });
            // $(window).on('updated_cart_totals', function() {
            //     if ($(".woocommerce-error li:contains('minimum')").length) {
            //         $('.wc-proceed-to-checkout, .have-coupon').hide();
            //         // this is the fix
            //         $('body').addClass('minimum-order-error');
            //     }
            //     else {
            //         $('.wc-proceed-to-checkout, .have-coupon').show();
            //         // this is the fix
            //         $('body').removeClass('minimum-order-error');
            //     }
            // });
        </script>
    <?php } ?>

    <?php if ( is_page( 'checkout' ) || is_checkout() ) { ?>
        <script>
            var $ = jQuery;
            // add the restricted shipping zone message
            $(document).ready(function() {
                if ( $('.woocommerce-checkout-review-order').length ) {
                    $('<div class="restricted-message-wrapper"><p class="restricted-message">We are currently unable to deliver to Scottish Highlands & Islands including the following postcodes: <br/>Aberdeen: AB31-AB35, AB41-AB54 <br/>Argyll: FK17-FK21, KA28, PA20-PA78, PH30-PH31, PH34-PH44, PH49-PH50 <br/>Arran: KA27 <br/>Dundee: PH15-PH18 <br/>Isle of Man: IM1-IM9 <br/>Isle of Wight: PO30-PO41 <br/>Northern Highlands: AB36-AB38, AB55-AB56, HS1-HS9, IV1-IV63, KW0-KW14, PH19-PH39, PH32-PH33, PH45-PH48 <br/>Orkney Shetland: KW15-KW18, ZE1-ZE4</p></div>').insertAfter('.woocommerce-checkout-review-order');
                }
            });

            // validate shipping zone on page load
            $(document).ready(function() {
                var shippingMethod = $('#shipping_method').text().trim();
                if ( shippingMethod.includes("Restricted Zone") ) {
                    $('body').removeClass('unrestricted-zone');
                    $('body').addClass('restricted-zone');
                }
                else {
                    $('body').removeClass('restricted-zone');
                    $('body').addClass('unrestricted-zone');
                }
            });

            // validate shipping zone on change address
            $('body').on('updated_checkout', function() {
                var shippingMethod = $('#shipping_method').text().trim();

                if ( shippingMethod.includes("Restricted Zone") ) {
                    $('body').removeClass('unrestricted-zone');
                    $('body').addClass('restricted-zone');
                }
                else {
                    $('body').removeClass('restricted-zone');
                    $('body').addClass('unrestricted-zone');
                }
            });

            // validate shipping zone on change postcode
            $('#billing_postcode, #shipping_postcode').on('focusout, blur', function() {
                $(document.body).trigger('update_checkout');
            });

            // minimum and maximum order amount validation
            $(document).ready(function() {
                var minAmount = 15;
                var maxAmount = 250;
                var totalAmount = $('.cart-subtotal .amount').text();
                var total = totalAmount.replace(/^[£]+/,"").replace(",","").replace(".00","");

                if ( total < minAmount ) {
                    $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                    $('<div class="min-max-error"><p class="min-max-message">Your current order total is '+totalAmount+ '— you must have an order with a minimum of £15.00 to place your order.</p></div>').insertAfter('.woocommerce-checkout-review-order');
                    $('.woocommerce-error').each(function() {
                        if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                            $(this).remove();
                        }
                    });
                    setTimeout(() => {
                        $('<ul class="woocommerce-error" role="alert"><li>Your current order total is '+totalAmount+' — you must have an order with a minimum of £15.00 to place your order.</li></ul>').insertAfter('.woocommerce > .cart-inner > .woocommerce-notices-wrapper');
                        $('.min-max-error').addClass('min-max-error-show');
                    }, 100);
                }
                else if ( total > maxAmount ) {
                    $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                    $('<div class="min-max-error"><p class="min-max-message">Your order value is '+totalAmount+ '. We do not currently accept online order values of over £250.00.</p></div>').insertAfter('.woocommerce-checkout-review-order');
                    $('.woocommerce-error').each(function() {
                        if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                            $(this).remove();
                        }
                    });
                    $('<ul class="woocommerce-error" role="alert"><li>Your order value is '+totalAmount+'. We do not currently accept online order values of over £250.00.</li></ul>').insertAfter('.woocommerce > .cart-inner > .woocommerce-notices-wrapper');
                    setTimeout(() => {
                        $('.min-max-error').addClass('min-max-error-show');
                    }, 100);
                }
                else {
                    $('.woocommerce-checkout.woocommerce-page').removeClass('min-max-show');
                    $('.woocommerce-error').each(function() {
                        if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                            $(this).remove();
                            $('.min-max-error').removeClass('min-max-error-show');
                        }
                    });
                }

                $('body').on('updated_cart_totals', function() {
                    var minAmount = 15;
                    var maxAmount = 250;
                    var totalAmount = $('.cart-subtotal .amount').text();
                    var total = totalAmount.replace(/^[£]+/,"").replace(",","").replace(".00","");

                    if ( total < minAmount ) {
                        $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                        $('.woocommerce-error').each(function() {
                            if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                                $(this).remove();
                            }
                        });
                        setTimeout(() => {
                            $('<ul class="woocommerce-error" role="alert"><li>Your current order total is '+totalAmount+' — you must have an order with a minimum of £15.00 to place your order.</li></ul>').insertAfter('.woocommerce > .cart-inner > .woocommerce-notices-wrapper');
                            $('.min-max-error').addClass('min-max-error-show');
                        }, 100);
                    }
                    else if ( total > maxAmount ) {
                        $('.woocommerce-checkout.woocommerce-page').addClass('min-max-show');
                        $('.woocommerce-error').each(function() {
                            if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                                $(this).remove();
                            }
                        });
                        $('<ul class="woocommerce-error" role="alert"><li>Your order value is '+totalAmount+'. We do not currently accept online order values of over £250.00.</li></ul>').insertAfter('.woocommerce > .cart-inner > .woocommerce-notices-wrapper');
                        setTimeout(() => {
                            $('.min-max-error').addClass('min-max-error-show');
                        }, 100);
                    }
                    else {
                        $('.woocommerce-checkout.woocommerce-page').removeClass('min-max-show');
                        $('.woocommerce-error').each(function() {
                            if ( $(this).text().trim().includes("minimum") || $(this).text().trim().includes("over") ) {
                                $(this).remove();
                                $('.min-max-error').removeClass('min-max-error-show');
                            }
                        });
                    }
                });
            });

            // // Minimum order amount function
            // $(window).on('load', function() {
            //     if ($(".woocommerce-error li:contains('minimum')").length) {
            //         $('.wc-proceed-to-checkout, .have-coupon').hide();
            //     }
            //     else {
            //         $('.wc-proceed-to-checkout, .have-coupon').show();
            //     }
            // });
            // $(window).on('updated_cart_totals', function() {
            //     if ($(".woocommerce-error li:contains('minimum')").length) {
            //         $('.wc-proceed-to-checkout, .have-coupon').hide();
            //     }
            //     else {
            //         $('.wc-proceed-to-checkout, .have-coupon').show();
            //     }
            // });

            // update discount section - "voucher"
            $(document).ready(function() {
                $('body.woocommerce-checkout .site-content .woocommerce-form-coupon > p:first-child').html('If you have a voucher code, please apply it below.');
                $('body.woocommerce-checkout .site-content .woocommerce-form-coupon > .form-row-first #coupon_code').attr("placeholder","Voucher code");
                $('body.woocommerce-checkout .site-content .woocommerce-form-coupon > .form-row-last .button').text("Apply voucher");
            });
        </script>
    <?php } ?>

    <?php if ( is_shop() || is_product_category() ) { ?>
        <style>
            .products-full-listing .single_variation_wrap .quantity,
            .products-full-listing .cwginstock-subscribe-form,
            .products-full-listing .product-type-variable .listing-content .price {
                display: none !important;
            }
            .products-full-listing .variable-product table.variations {
                display: none;
            }
            .products-full-listing .variation-options-wrapper {
                width: 100%;
            }
            .products-full-listing.variation-options-wrapper .variation-options-label {
                margin-bottom: 15px;
                font-weight: 700;
                text-transform: uppercase;
            }
            .products-full-listing .variation-options-wrapper .variation-options {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin: -2px;
            }
            .products-full-listing .variation-options-wrapper a {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                width: calc(50% - 4px);
                margin: 2px;
                padding: 10px 8px;
                font-weight: normal;
                font-size: 14px;
                letter-spacing: -.5px;
                color: #292929;
                text-align: center;
                background-color: #ffab65;
                border: 2px solid #ffab65;
                border-radius: 4px;
                text-decoration: none;
                outline: none;
                -webkit-transition: .25s ease-in-out all;
                -o-transition: .25s ease-in-out all;
                transition: .25s ease-in-out all;
            }
            .products-full-listing .variation-options-wrapper a.active {
                font-weight: 700;
                color: #fff;
                background-color: #f1601c;
                border-color: #292929;
            }
            .products-full-listing .variation-options-wrapper a:focus {
                outline: none !important;
            }
            .products-full-listing .variation-options-wrapper a.active .variation-price {
                display: block;
            }
            .products-full-listing .variation-options-wrapper .variation-options.single-variation a {
                width: 100%;
            }
            .products-full-listing .variation-options-wrapper .variation-price {
                display: none;
                margin-top: 2px;
                font-size: 18px;
                letter-spacing: 0;
            }
            .products-full-listing .variation-options-wrapper .variation-price .custom-price {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: baseline;
                -ms-flex-align: baseline;
                align-items: baseline;
            }
            .products-full-listing .variation-options-wrapper .variation-price .variation-regular-price {
                margin: 0 3px;
                font-size: 75%;
                color: #292929;
                text-decoration: line-through;
            }
            .products-full-listing .variation-options-wrapper .variation-price .variation-sale-price {
                margin: 0 3px;
            }
            .products-full-listing form.variable-product .single_variation_wrap .woocommerce-variation-availability p.stock {
                margin: 17px 0 9px;
                background-color: transparent;
            }
            .products-full-listing form.variable-product .single_variation_wrap .woocommerce-variation-availability p.stock::before {
                display: none;
            }
            .products-full-listing form.variable-product .single_variation_wrap .woocommerce-variation-availability p.stock:last-child {
                margin-bottom: 0;
            }
            .products-full-listing form.variable-product .single_variation_wrap .woocommerce-variation-availability p.in-stock {
                display: none;
                color: #27ae60;
            }
            .products-full-listing form.variable-product .single_variation_wrap .woocommerce-variation-availability p.out-of-stock {
                color: #ff0000;
            }
            .products-full-listing form.variable-product .single_variation_wrap .wc-variation-is-unavailable {
                display: none !important;
            }
            .products-full-listing form.variable-product .cwginstock-subscribe-form .panel {
                margin-top: 10px;
                margin-bottom: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            .products-full-listing form.variable-product .cwginstock-subscribe-form .panel .form-group {
                margin-bottom: 0;
            }
            .products-full-listing .product-listing .listing-content .add_to_cart_button,
            .products-full-listing .product-listing .variations_button .button {
                display: block;
                width: 100%;
                padding: 1.3rem 2rem;
                font-weight: 500;
                font-size: 1.6rem;
                color: #fff;
                background-color: #292929;
                -webkit-transition: all .2s ease;
                -o-transition: all .2s ease;
                transition: all .2s ease;
            }
            .products-full-listing .product-listing .listing-content .add_to_cart_button:hover,
            .products-full-listing .product-listing .variations_button .button:hover {
                color: #fff !important;
                background-color: #383838 !important;
            }
            @media (min-width: 1200px) and (max-width: 1399px) {
                .products-full-listing .variation-options-wrapper a {
                    padding: 8px 5px;
                    font-size: 12px;
                }
                .products-full-listing .variation-options-wrapper .variation-price {
                    font-size: 16px;
                }
            }
            @media (min-width: 769px) and (max-width: 1199px) {
                .products-full-listing .variation-options-wrapper a {
                    width: 100%;
                }
            }
            @media (min-width: 576px) and (max-width: 767px) {
                .products-full-listing .variation-options-wrapper a {
                    padding: 8px 5px;
                    font-size: 12px;
                }
                .products-full-listing .variation-options-wrapper .variation-price {
                    font-size: 16px;
                }
            }
            @media (max-width: 575px) {
                .products-full-listing .variation-options-wrapper .variation-options {
                    margin: 0;
                }
                .products-full-listing .variation-options-wrapper a {
                    width: 100%;
                    margin: 5px 0 0;
                }
                .products-full-listing .variation-options-wrapper a:first-child {
                    margin-top: 0;
                }
            }
        </style>
        <script>
            var $ = jQuery;
            $(document).ready(function() {
                // Shop and Category Pages - custom product variation 
                if ( $('.products-full-listing .variation-options-wrapper .variation-options a').length ) {
                    $('.products-full-listing .products .product-type-variable').each(function() {
                        $(this).find('form.variations_form').addClass('variable-product');
                        // $(this).find('.variation-options-wrapper .variation-options a:first-child').addClass('active');
                        $(this).find('.variation-options-wrapper .variation-options a').click(function(e) {
                            e.preventDefault();
                            var selectedOption = $(this).find('.variation-label').text();
                            $(this).closest('.variations_form').find('.variation-options-wrapper .variation-options a').removeClass('active');
                            $(this).closest('.variations_form').find('table.variations .value select option').prop("selected", false);
                            $(this).closest('.variations_form').find('table.variations .value select').val(selectedOption).change();
                            $(this).addClass('active');
                        });

                        if ( $(this).find('.variation-options a').length == 1 ) {
                            $(this).find('.variation-options').addClass('single-variation');
                        }
                    });
                }

                // Shop and Category Pages - not clickable image and title - fix
                if ( $('.products-full-listing .product-listing').length ) {
                    $('.products-full-listing .product-listing .listing-top .attachment-woocommerce_thumbnail, .products-full-listing .product-listing .listing-content .woocommerce-loop-product__title').each(function() {
                        $(this).click(function() {
                            $(this).closest('.product-listing').find('.woocommerce-LoopProduct-link')[0].click();
                        });
                    });
                }

                // identify the selected option and make the corresponding custom button active
                $('.products-full-listing form.variations_form select').each(function() {
                    var selectedOption = $(this).find(":selected").text();
                    $(this).closest('form.variations_form').find('.variation-options-wrapper .variation-label').each(function() {
                        if ( $(this).text() == selectedOption ) {
                            $(this).parent().addClass('active');
                        }
                    });
                });
            });

            $(window).on('load', function() {
                // select the first option if there is no selected 'enabled' product variation
                setTimeout(() => {
                    $('.variation-options-wrapper .variation-options').each(function() {
                        if ($(this).find('.active').length > 0) {
                            // The class 'class' exists in the children of this element
                        } else {
                            $(this).closest('.variations_form').find('table.variations select :not(.enabled)').remove();
                            $(this).closest('.variations_form').find('table.variations select option:eq(1)').prop('selected', true);
                            $(this).closest('.variations_form').find('table.variations select').change();
                            $(this).find('a:first-child').addClass('active');
                            // The class 'class' does not exist in the children of this element
                        }
                    });
                }, 500);

                // go to product page when price or custom variation button is clicked - single variation
                setTimeout(() => {
                    if ( $('.single-variation').length ) {
                        $('.single-variation').each(function() {
                            $(this).find('a').click(function(e) {
                                var productLink = $(this).closest('.listing-content').find('.woocommerce-LoopProduct-link').attr('href');
                                e.preventDefault();
                                window.location.href=productLink;
                            })
                        });
                    }
                }, 500);
            });

            window.addEventListener('pageshow', function(event) {
                if (event.persisted || window.performance && window.performance.navigation.type === 2) {
                    location.reload();
                }
            });
        </script>
    <?php } ?>

    <script async type="text/javascript" src="https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=X4jWm5"></script>

    <?php if ( is_checkout() ) { ?>
        <style>
            #payment .wc_payment_methods {
                position: relative;
            }
            #payment .test-mode-message {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 5;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
                padding: 50px;
                font-size: 20px;
                text-align: center;
                color: #fff;
                background-color: #f1601c;
                cursor: pointer;
            }
        </style>
    <?php } ?>

</body>
</html>
