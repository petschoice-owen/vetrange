<?php
/**
 * Displays the sign up form widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<style>
    .klaviyo-footer form.klaviyo-form [data-testid="form-component"] > button.needsclick[type="button"] {
        padding: 0 30px !important;
    }
    @media (max-width: 959px) {
        .klaviyo-footer form.klaviyo-form .needsclick > [data-testid="form-component"]:first-child > .needsclick > input[type="email"] {
            margin-bottom: 0 !important;
        } 
        .klaviyo-footer form.klaviyo-form .needsclick > [data-testid="form-component"]:last-child > button.needsclick[type="button"] {
            margin-top: 0 !important;
        } 
    }
    @media (max-width: 575px) {
        .klaviyo-footer form.klaviyo-form [data-testid="form-component"] > button.needsclick[type="button"] {
            padding: 0 20px !important;
        }
    }

    /* Contact Form 7 Newsletter - Footer */
    .klaviyo-footer .newsletter-cf7 .form-row-custom p {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-bottom: 0;
    }
    .klaviyo-footer .newsletter-cf7 .form-row-custom .wpcf7-form-control-wrap {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: calc(100% - 120px);
    }
    .klaviyo-footer .newsletter-cf7 .form-row-custom .wpcf7-form-control-wrap:focus,
    .klaviyo-footer .newsletter-cf7 .form-row-custom input:focus {
        outline: none !important;
    }
    .klaviyo-footer .newsletter-cf7 .form-row-custom .wpcf7-email {
        height: 46px;
        margin-bottom: 0;
        font-family: Nunito-Sans-Klaviyo-Hosted, Arial, "Helvetica Neue", Helvetica, sans-serif;
        font-weight: bold;
    }
    .klaviyo-footer .newsletter-cf7 .form-row-custom .wpcf7-submit {
        width: 120px !important;
        height: 46px;
        font-family: Nunito-Sans-Klaviyo-Hosted, Arial, "Helvetica Neue", Helvetica, sans-serif;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
    }
    .klaviyo-footer .newsletter-cf7 .form-row-custom .wpcf7-spinner {
        top: 8px;
        margin-left: auto;
        margin-right: 48px;
    }
    .klaviyo-footer .newsletter-cf7 .form-row-custom .wpcf7-form-control-wrap .wpcf7-not-valid-tip {
        position: absolute;
        top: 100%;
        margin: 10px 15px;
        font-size: 14px;
        line-height: 1;
    }
    .klaviyo-footer .wpcf7-response-output {
        width: 100%;
        margin: 15px 0 20px !important;
        padding: 8px 15px !important;
        font-size: 14px;
        text-align: center;
        border-radius: 0;
    }
    .klaviyo-footer .wpcf7-form.sent .wpcf7-response-output {
        margin-top: 0 !important;
    }
    .sign-up .inner .klaviyo-footer + .small-text {
        margin: 0;
        font-size: 14px;
        color: #fff;
    }
    .sign-up .inner .klaviyo-footer + .small-text a {
        color: #f08212;
    }
    @media (min-width: 960px) {
        .sign-up.bg-black .inner .right {
            max-width: 540px;
        }
    }
    @media (max-width: 959px) {
        .sign-up.bg-black .inner .right {
            max-width: 100%;
        }
        .sign-up.bg-black .klaviyo-footer .wpcf7-form {
            max-width: 100%;
        }
    }
</style>

<section class="sign-up bg-black">
    <div class="inner flex jc-center a-center">
        <?php 
        $image = get_field('newsletter_image', 'option');
        if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        <div class="right">
            <h3>Sign up to our newsletter</h3><!-- <span class="yellow">Sign up</span> -->
            <!-- <p>And receive <span class="red">10% off</span> your next order</p> -->
            <br />
            <div class="klaviyo-footer">
                <?php echo apply_shortcodes( '[contact-form-7 id="99a138f" title="Newsletter - Contact Form 7"]' ); ?>
                <!-- <div class="klaviyo-form-WMFtbU"></div> -->
            </div>
            <p class="small-text">Your submission of personal information through the website is governed by our Privacy Policy. Check our <a href="/privacy-policy" target="_blank">Privacy Policy</a>.</p>
        </div>
    </div>
</section>