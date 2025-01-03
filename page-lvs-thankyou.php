<?php
/**
 * Template Name: LVS - Thank You
 *
 * @package WordPress
 * @subpackage Vetrange
 * @since Vetrange
 */

get_header();
?>
<style>
	.page-template-page-lvs-thankyou .header-primary, 
	.page-template-page-lvs-thankyou .klaviyo-sidebar-floating,
	.page-template-page-lvs-thankyou .breadcrumb,
	.page-template-page-lvs-thankyou .sign-up,
	.page-template-page-lvs-thankyou .main-footer,
	.page-template-page-lvs-thankyou #feefo-service-review-floating-widgetId,
	.page-template-page-lvs-thankyou #cmplz-manage-consent {
		display: none;
	}
	/* welcome page */
	.welcome-page {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		min-height: 100vh;
		background-color: #f8f9fd;
	}
	.welcome-page .inner {
		padding: 50px 0;
	}
	@media (max-width: 767px) {
		.welcome-page .inner {
			width: calc(100% - 20px);
			/* padding: 30px 0; */
			padding: 20px 0;
		}
	}
	/* form-section */
	.form-section {
		position: relative;
		height: auto;
	}
	.form-section .forms {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		height: 100%;
	}
	@media (min-width: 1400px) {
		/* .form-section {
			height: calc(100vh - 100px);
		} */
	}
	@media (max-width: 1399px) {
		.form-section {
			min-height: 700px;
		}
	}
	@media (max-width: 767px) {
		/* .form-section {
			height: calc(100vh - 60px);
			min-height: 320px;
		} */
	}


	/* form-wrapper */
	.form-wrapper {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	}
	.form-wrapper .form-banner {
		position: relative;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		width: 35%;
		padding: 30px;
		background-color: #6f1d47;
	}
	@media screen and (min-width: 992px) {
		.form-wrapper .form-banner {
			min-height: 500px;
		}
	}
	.form-wrapper .form-banner .pc-vet-div-logo {
		position: absolute;
		top: 20px;
		right: 15px;
		bottom: initial;
		-o-object-fit: unset;
		object-fit: unset;
		width: auto;
		height: 80px;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.form-wrapper .form-banner .end-note {
		position: absolute;
		bottom: 20px;
		left: 30px;
    	right: 30px;
		margin-bottom: 0;
		font-size: 14px;
		color: #fff;
	}
	.form-wrapper .go-back {
		position: absolute;
		top: 30px;
		left: 30px;
		font-size: 14px;
		color: #fff;
		text-decoration: none;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.form-wrapper .go-back:hover {
		color: #f08212;
	}
	.form-wrapper .heading {
		margin-bottom: 20px;
		font-size: 40px;
		color: #fff;
	}
	.form-wrapper .subheading {
		margin-bottom: 30px;
		font-weight: normal;
		font-size: 18px;
		line-height: 1.6;
		color: #fff;
	}
	.form-wrapper .button-holder {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
	}
	.form-wrapper .button-holder a {
		min-width: 120px;
		padding: 12px 28px;
		margin: 0;
		font-weight: bold;
		font-size: 16px;
		color: #6f1d47;
		text-align: center;
		text-decoration: none;
		background-color: #f8f9fd;
		border-radius: 2px;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.form-wrapper .button-holder a:hover {
		background-color: #f08212;
	}
	.form-wrapper .form-heading {
		/* padding: 0 10px; */
		margin-bottom: 20px;
		font-size: 32px;
		color: #6f1d47;
	}
	.form-wrapper .form-heading-login {
		width: 500px;
		max-width: 100%;
		padding: 0;
		margin: 0 auto;
	}
	@media (max-width: 1199px) {
		.form-wrapper .form-banner {
			width: 40%;
		}
	}
	@media (max-width: 991px) {
		.form-wrapper .go-back {
			top: 40px;
			left: 40px;
			font-size: 12px;
		}
		.form-wrapper .form-banner {
			width: 100%;
			padding: 60px 40px;
		}
		.form-wrapper .heading {
			padding-top: 40px;
			font-size: 34px;
		}
		.form-wrapper .subheading {
			font-size: 16px;
		}
		.form-wrapper .form-heading {
			font-size: 24px;
		}
		.form-wrapper .button-holder a {
			min-width: 100px;
			padding: 12px 20px;
			font-size: 14px;
		}
	}
	@media (max-width: 767px) {
		.form-wrapper .form-banner .pc-vet-div-logo {
			right: 10px;
			top: 10px;
			height: 60px;
		}
		.form-wrapper .go-back {
			top: 30px;
			left: 20px;
			font-size: 10px;
		}
		.form-wrapper .form-banner {
			padding: 40px 20px;
		}
		.form-wrapper .form-banner .end-note {
			left: 20px;
			right: 20px;
		}
		.form-wrapper .heading {
			font-size: 30px;
		}
		.form-wrapper .subheading {
			font-size: 14px;
		}
		.form-wrapper .form-heading {
			width: 100%;
			font-size: 22px;
		}
		.form-wrapper .button-holder a {
			padding: 10px 20px;
		}
	}


/* form-register */
	.form-register {
		width: 100%;
		overflow: hidden;
		background: #fff;
		-webkit-box-shadow: 0 10px 50px rgba(0,0,0,.1);
		box-shadow: 0 10px 50px rgba(0,0,0,.1);
		border-radius: 10px;
	}
	.form-register .user-registration {
		width: 65%;
		padding: 40px 30px;
		margin-bottom: 0;
		align-content: center;
		font-size: 14px;
		border: 0;
	}
	.form-register .user-registration p {
		margin-bottom: 0;
	}
	.form-register .user-registration a {
		color: #f08212;
	}

	.form-register .user-registration .button {
		display: inline-block;
		padding: 10px 30px;
		margin: 30px 0 0;
		font-weight: bold;
		font-size: 16px;
		line-height: 1.5;
		color: #fff;
		text-align: center;
		text-decoration: none;
		background-color: #6f1d47;
		border-radius: 2px;
		box-shadow: 0 1px 3px rgba(182, 187, 207, 0.15);
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	
	@media (max-width: 1199px) {
		.form-register .user-registration {
			width: 60%;
		}
	}
	@media (max-width: 991px) {
		.form-register .user-registration {
			width: 100%;
		}
	}
	@media (max-width: 767px) {
		.form-register .user-registration {
			padding: 30px 8px;
		}
	}
</style>
<!-- <section class="page-title">
	<div class="inner">
		<h1>Login Page</h1>
		<?php the_content(); ?>
	</div>
</section> -->

<section class="welcome-page">
	<div class="inner">
		<div class="form-section">
			<div class="forms">
				<div class="form-register">
					<div class="form-wrapper">
						<div class="form-banner">
							<img src="/wp-content/uploads/2024/05/pc-vet-division-logo.png" class="pc-vet-div-logo" alt="Pets Choice Veterinary Division" />
							<div class="wrapper">
								<h2 class="heading">Good luck!</h2>
								<h4 class="subheading">You have successfully entered the competition.</h4>
							</div>
						</div>
						<div class="user-registration">
							<h2 class="form-heading">Keep an eye on your inbox.</h2>
							<p>If you're a winner, a member of the Pets Choice team will be in touch with details of how to claim your prize.</p>
							<a href="/lvs" class="button">Back to Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
<script>
	jQuery('body').on('click', '.wpcf7-submit', function(e) {
		if(jQuery('.wpcf7-validation-errors').length > 0) {
			jQuery('.wpcf7-validation-errors').remove();
		}
	});
	document.addEventListener('wpcf7submit', function(event) {
		const emailField = document.querySelector('#lvsEmail');
		const confirmEmailField = document.querySelector('#lvsEmailConfirm');
		
		if (emailField.value !== confirmEmailField.value) {
			event.preventDefault();
			const errorMessage = 'Email and confirm email do not match.';
			const errorContainer = document.createElement('span');
			errorContainer.className = 'wpcf7-validation-errors';
			errorContainer.innerText = errorMessage;
			confirmEmailField.classList.add('wpcf7-not-valid');
			confirmEmailField.parentNode.insertBefore(errorContainer, email.nextSibling);
		}
	}, false);
</script>