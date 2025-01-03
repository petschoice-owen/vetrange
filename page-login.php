<?php
/**
 * Template Name: Login Page
 *
 * @package WordPress
 * @subpackage Vetrange
 * @since Vetrange
 */

get_header();
?>
<style>
.page-template-page-login .header-primary, 
.page-template-page-login .klaviyo-sidebar-floating,
.page-template-page-login .breadcrumb,
.page-template-page-login .sign-up,
.page-template-page-login .main-footer,
.page-template-page-login #feefo-service-review-floating-widgetId,
.page-template-page-login #cmplz-manage-consent {
	display: none;
}
.page-template-page-login.logged-in .header-primary, 
.page-template-page-login.logged-in .breadcrumb,
.page-template-page-login.logged-in .main-footer,
.page-template-page-login.logged-in #feefo-service-review-floating-widgetId {
	display: block;
}

/* logged in */
	.logged-in-section {
		padding: 150px 0;
	}
	.logged-in-section h3 {
		margin: 0 0 40px;
		font-weight: bold;
		font-size: 36px;
		color: #6f1d47;
		text-align: center;
	}
	.logged-in-section .button-holder {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	}
	.logged-in-section .button {
		padding: 1.3rem 2rem;
		margin: 5px 10px;
		font-weight: bold;
		font-size: 16px;
		color: #fff;
		text-align: center;
		text-decoration: none;
		background-color: #f08212;
		border-radius: 2px;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.logged-in-section .button:nth-child(2) {
		background-color: #6f1d47;
	}
	.logged-in-section .button:hover {
		background-color: #92c4d0;
	}
	@media (max-width: 1399px) {
		.logged-in-section {
			padding: 120px 0;
		}
		.logged-in-section h3 {
			margin: 0 0 30px;
		}
	}
	@media (max-width: 767px) {
		.logged-in-section {
			padding: 50px 0;
		}
		.logged-in-section h3 {
			font-size: 30px;
		}
		.logged-in-section .button {
			min-width: 180px;
		}
	}

/* welcome page */
	.welcome-page {
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

/* welcome-section */
	.welcome-section {
		height: calc(100vh - 100px);
		min-height: 400px;
		background-color: #6f1d47;
		border-radius: 10px;
		-webkit-box-shadow: 0 5px 30px rgba(0,0,0,.3);
		box-shadow: 0 5px 30px rgba(0,0,0,.3);
	}
	.welcome-section .wrapper {
		position: relative;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-ms-flex-direction: column;
		flex-direction: column;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		height: 100%;
		padding: 50px;
	}
	.welcome-section .wrapper .pc-vet-div-logo {
		position: absolute;
		top: 20px;
		right: 20px;
		bottom: initial;
		-o-object-fit: unset;
		object-fit: unset;
		width: auto;
		height: 160px;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.welcome-section h1 {
		margin: 0;
		font-size: 50px;
		color: #fff;
		text-align: center;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.welcome-section .options-wrapper {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		width: 100%;
		padding-top: 50px;
	}
	.welcome-section .option {
		position: relative;
		top: 0;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		width: 420px;
		padding: 50px 20px;
		font-size: 18px;
		font-weight: bold;
		color: #fff;
		text-align: center;
		text-decoration: none;
		background-color: #6f1d47;
		border: 1px solid rgba(255, 255, 255, 0.1);
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.welcome-section .option:hover {
		top: -5px;
		color: #6f1d47;
		background-color: #efefef;
		-webkit-box-shadow: 0 3px 20px rgba(0,0,0,.5);
		box-shadow: 0 3px 20px rgba(0,0,0,.5);
	}
	@media (max-width: 1199px) {
		.welcome-section .wrapper .pc-vet-div-logo {
			height: 130px;
		}
		.welcome-section h1 {
			font-size: 40px;
		}
		.welcome-section .options-wrapper {
			padding-top: 40px;
		}
		.welcome-section .option {
			width: 360px;
			padding: 40px 20px;
			font-size: 16px;
		}
	}
	@media (max-width: 767px) {
		.welcome-section {
			/* height: calc(100vh - 60px); */
			height: calc(100vh - 40px);
			min-height: 320px;
		}
		.welcome-section .wrapper {
			padding: 35px;
		}
		.welcome-section .wrapper .pc-vet-div-logo {
			height: 80px;
		}
		.welcome-section h1 {
			font-size: 30px;
		}
		.welcome-section .options-wrapper {
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			padding-top: 30px;
		}
		.welcome-section .option {
			width: 350px;
			padding: 25px;
			font-size: 14px;
		}
	}
	@media (max-width: 440px) {
		.welcome-section .options-wrapper {
			max-width: 220px;
		}
	}


/* form-section */
	.form-section {
		display: none;
		position: relative;
		/* height: calc(100vh - 100px); */
		height: auto;
		/* min-height: 700px; */
		min-height: 890px;
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
		padding: 0 10px;
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
		/* width: 65%; */
		display: none;
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
		border: 0;
	}
	.form-register .user-registration .ur-form-row {
		margin-bottom: 20px;
	}
	.form-register .user-registration .form-row {
		margin: 0;
	}
	.form-register .user-registration .form-row .input-wrapper > input::-webkit-input-placeholder,
	.form-register .user-registration .form-row .input-wrapper > .password-input-group > input::-webkit-input-placeholder {
		font-weight: normal;
		color: #292929;
	}
	.form-register .user-registration .form-row .input-wrapper > input::-moz-placeholder,
	.form-register .user-registration .form-row .input-wrapper > .password-input-group > input::-moz-placeholder {
		font-weight: normal;
		color: #292929;
	}
	.form-register .user-registration .form-row .input-wrapper > input:-ms-input-placeholder,
	.form-register .user-registration .form-row .input-wrapper > .password-input-group > input:-ms-input-placeholder {
		font-weight: normal;
		color: #292929;
	}
	.form-register .user-registration .form-row .input-wrapper > input:-moz-placeholder,
	.form-register .user-registration .form-row .input-wrapper > .password-input-group > input:-moz-placeholder {
		font-weight: normal;
		color: #292929;
	}
	/* .form-register .user-registration .form-row .input-wrapper > input */
	.form-register .user-registration .form-row span > input { 
		min-height: unset !important;
		padding: 5px 8px 0;
		margin: 0 !important;
		font-weight: bold;
		font-size: 14px;
		color: #6f1d47;
		border: 0;
		background: transparent;
		border-bottom: 2px solid #e1e1e1;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.form-register .user-registration .form-row span > input:focus {
		border-color: #f08212 !important;
	}
	.form-register .user-registration .form-row span > input + .password_preview::before {
		font-size: 16px;
	}
	.form-register .user-registration .form-row span > input.ur-input-border-red {
		border-color: #ff4f55 !important;
	}
	.form-register .user-registration .form-row .ur-label {
		margin: 0 !important;
		font-size: 0 !important;
	}
	.form-register .user-registration .ur-field-item > label,
	.form-register .user-registration .form-row .input-wrapper + label,
	.form-register .user-registration .terms .form-row > ul + label {
		padding: 5px 5px 0;
		margin: 0 !important;
		font-size: 12px;
		background: transparent;
		border: 0;
	}
	.form-register .user-registration .form-row + .user-registration-error {
		font-size: 12px;
	}
	.form-register .user-registration .ur-field-item > label::before,
	.form-register .user-registration .ur-field-item > label::after,
	.form-register .user-registration .form-row .input-wrapper + label::before,
	.form-register .user-registration .form-row .input-wrapper + label::after,
	.form-register .user-registration .terms .form-row > ul + label::before,
	.form-register .user-registration .terms .form-row > ul + label::before {
		display: none;
	}
	.form-register .user-registration .subscription {
		margin-top: 10px;
		margin-bottom: -10px !important;
	}
	.form-register .user-registration .field-checkbox ul {
		padding: 0;
	}
	.form-register .user-registration .field-checkbox ul li.ur-checkbox-list {
		margin: 0 !important;
	}
	.form-register .user-registration .field-checkbox ul li label {
		cursor: pointer;
	}
	.form-register .user-registration .field-checkbox ul li a {
		color: #f08212;
	}
	.form-register .user-registration #ur-recaptcha-node {
		padding-left: 10px;
	}
	.form-register .user-registration .ur-button-container {
		margin-top: 20px;
	}
	.form-register .user-registration .ur-button-container .ur-submit-button {
		padding: 10px 30px;
		margin: 0;
		font-weight: bold;
		font-size: 16px;
		color: #fff;
		text-align: center;
		text-decoration: none;
		background-color: #6f1d47;
		border-radius: 2px;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.form-register .user-registration .ur-button-container .ur-submit-button:hover {
		background-color: #f08212; 
	}
	.form-register .user-registration .ur-button-container + p {
		padding: 0 10px;
		margin: 15px 0 0;
		font-size: 14px;
		color: #292929;
	}
	.form-register .user-registration .ur-button-container + p a {
		color: #f08212;
	}
	.form-register .user-registration #ur-submit-message-node {
		padding: 0 10px;
		background: transparent;
		border: none;
	}
	.form-register .user-registration #ur-submit-message-node::before,
	.form-register .user-registration #ur-submit-message-node::after {
		display: none;
	}
	.form-register .user-registration #ur-submit-message-node p,
	.form-register .user-registration #ur-submit-message-node ul li,
	.form-register .user-registration #ur-submit-message-node ol li {
		margin: 0;
		font-size: 14px;
		color: #292929;
	}
	.form-register .user-registration #ur-submit-message-node.user-registration-message li {
		font-weight: bold;
		color: #1EA71B;
	}
	.form-register .user-registration #ur-submit-message-node.user-registration-error p {
		color: #ff4f55;
	}
	.form-register .user-registration #ur-submit-message-node.user-registration-error p {
		color: #ff4f55;
	}
	/* business email popup */
	.form-register .user-registration #user_email_field .input-wrapper #user_email {
		padding-right: 35px;
	}
	.form-register .user-registration #user_email_field {
		position: relative;
	}
	.form-register .user-registration #user_email_field .email-popup {
		position: absolute;
		top: 0;
		right: 0;
		z-index: 2;
		width: 100%;
	}
	.form-register .user-registration #user_email_field .email-popup.hovered .popup-message {
		opacity: 1;
		pointer-events: all;
	}
	.form-register .user-registration #user_email_field .email-popup.hovered .information-popup {
		opacity: 1;
	}
	.form-register .user-registration #user_email_field .popup-trigger {
		position: absolute;
		top: -4px;
		right: 4px;
		z-index: 3;
		width: 40px;
		height: 35px;
		cursor: pointer;
	}
	.form-register .user-registration #user_email_field .information-popup {
		position: absolute;
		top: 7px;
		right: 20px;
		z-index: 2;
		width: auto;
		height: 12px;
		opacity: .6;
		pointer-events: none;
		-webkit-transition: .2s ease-in-out all;
		-o-transition: .2s ease-in-out all;
		transition: .2s ease-in-out all;
	}
	.form-register .user-registration #user_email_field .popup-message {
		position: absolute;
		top: 30px;
		right: 0;
		width: 100%;
		z-index: 2;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		padding: 10px;
		font-size: 12px;
		line-height: 18px;
		color: #fff;
		background-color: #6f1d47;
		border-radius: 5px;
		opacity: 0;
		pointer-events: none;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.form-register .user-registration #user_email_field .popup-message::before {
		content: "";
		position: absolute;
		top: -7px;
		right: 16px;
		z-index: 2;
		width: 0;
		height: 0;
		border-left: 7px solid transparent;
		border-right: 7px solid transparent;
		border-bottom: 7px solid #6f1d47;
	}
	/* country popup */
	.form-register .user-registration #user_country_field .input-wrapper #user_email {
		padding-right: 35px;
	}
	.form-register .user-registration #user_country_field {
		position: relative;
	}
	.form-register .user-registration #user_country_field .email-popup {
		position: absolute;
		top: 0;
		right: 0;
		z-index: 2;
		width: 100%;
	}
	.form-register .user-registration #user_country_field .email-popup.hovered .popup-message {
		opacity: 1;
		pointer-events: all;
	}
	.form-register .user-registration #user_country_field .email-popup.hovered .information-popup {
		opacity: 1;
	}
	.form-register .user-registration #user_country_field .popup-trigger {
		position: absolute;
		top: -4px;
		right: 4px;
		z-index: 3;
		width: 40px;
		height: 35px;
		cursor: pointer;
	}
	.form-register .user-registration #user_country_field .information-popup {
		position: absolute;
		top: 7px;
		right: 20px;
		z-index: 2;
		width: auto;
		height: 12px;
		opacity: .6;
		pointer-events: none;
		-webkit-transition: .2s ease-in-out all;
		-o-transition: .2s ease-in-out all;
		transition: .2s ease-in-out all;
	}
	.form-register .user-registration #user_country_field .popup-message {
		position: absolute;
		top: 30px;
		right: 0;
		width: 100%;
		z-index: 2;
		/* display: -webkit-box;
		display: -ms-flexbox;
		display: flex; */
		display: inline;
		padding: 10px;
		font-size: 12px;
		line-height: 18px;
		color: #fff;
		background-color: #6f1d47;
		border-radius: 5px;
		opacity: 0;
		pointer-events: none;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.form-register .user-registration #user_country_field .popup-message::before {
		content: "";
		position: absolute;
		top: -7px;
		right: 16px;
		z-index: 2;
		width: 0;
		height: 0;
		border-left: 7px solid transparent;
		border-right: 7px solid transparent;
		border-bottom: 7px solid #6f1d47;
	}
	.form-register .user-registration #user_country_field .popup-message a {
		color: #f08212;
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
		.form-register .user-registration .ur-button-container .ur-submit-button {
			font-size: 14px;
		}
	}
	@media (max-width: 767px) {
		.form-register .user-registration {
			padding: 30px 8px;
		}
		.form-register .user-registration .subscription {
			margin-top: 0;
		}
	}


/* disallow commonly used emails */
	.field-user_email #user_email_field::before {
		content: "Please enter a valid business email address.";
		position: absolute;
		top: calc(100% + 5px);
		left: 5px;
		display: none;
		font-size: 12px;
		color: #ff030b;
	}
	.field-user_email.email-invalid {
		margin-bottom: 20px !important;
	}
	.field-user_email.email-invalid label {
		display: none !important;
	}
	.field-user_email.email-invalid #user_email_field::before {
		display: block;
	}
	.field-user_email.email-invalid #user_email {
		border-color: #ff4f55 !important;
	}
	form.disable-submit .ur-button-container button[type=submit] {
		opacity: .3;
		pointer-events: none;
	}


/* form-login */
	.form-login {
		/* width: 65%; */
		display: none;
		overflow: hidden;
		background: #fff;
		-webkit-box-shadow: 0 10px 50px rgba(0,0,0,.1);
		box-shadow: 0 10px 50px rgba(0,0,0,.1);
		border-radius: 10px;
	}
	.form-login .login-form {
		width: 65%;
		padding: 100px 40px;
		border: 0;
	}
	.form-login .login-form form {
		width: 500px;
		max-width: 100%;
		padding-top: 30px;
		margin-left: auto;
		margin-right: auto;
	}
	.form-login .form-row-login {
		margin-bottom: 20px;
	}
	.form-login .form-row-login label {
		/* display: none; */
		font-size: 14px;
		color: #292929;
		cursor: pointer;
	}
	.form-login .form-row-login .user-input::-webkit-input-placeholder {
		font-weight: normal;
		color: #292929;
	}
	.form-login .form-row-login .user-input::-moz-placeholder {
		font-weight: normal;
		color: #292929;
	}
	.form-login .form-row-login .user-input:-ms-input-placeholder {
		font-weight: normal;
		color: #292929;
	}
	.form-login .form-row-login .user-input:-moz-placeholder {
		font-weight: normal;
		color: #292929;
	}
	.form-login .form-row-login .user-input {
		min-height: unset !important;
		padding: 5px 8px 3px;
		margin: 0 !important;
		font-weight: bold;
		line-height: 21px;
		font-size: 14px;
		color: #6f1d47;
		border: 0;
		background: transparent;
		border-radius: 0;
		border-bottom: 2px solid #e1e1e1;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
	}
	.form-login .form-row-login .user-input:focus {
		border-color: #f08212 !important;
	}
	.form-login .form-row-login #wp-submit {
		padding: 10px 30px;
		margin: 0;
		font-weight: bold;
		line-height: 24px;
		font-size: 16px;
		color: #fff;
		text-align: center;
		text-decoration: none;
		background-color: #6f1d47;
		border: none;
		border-radius: 2px;
		-webkit-transition: .3s ease-in-out all;
		-o-transition: .3s ease-in-out all;
		transition: .3s ease-in-out all;
		outline: none !important;
		cursor: pointer;
	}
	.form-login .form-row-login #wp-submit:hover {
		background-color: #f08212;
	}
	.form-login .form-row-login #forgot_password {
		margin-left: 15px;
		font-size: 14px;
		color: #f08212;
	}
	.form-login .form-row-login.user-submit + p {
		margin-bottom: 0;
		font-size: 14px;
		color: #292929;
	}
	.form-login .form-row-login.user-submit + p a {
		color: #f08212;
	}
	@media (max-width: 1199px) {
		.form-login .login-form {
			width: 60%;
		}
	}
	@media (max-width: 991px) {
		.form-login .login-form {
			width: 100%;
			padding: 40px;
		}
		.form-login .form-row-login #wp-submit {
			font-size: 14px;
		}
		.form-login .login-form form {
			width: 100%;
		}
	}
	@media (max-width: 767px) {
		.form-login .login-form {
			padding: 30px 20px;
		}
	}


/* error login */
	.login-error p {
		margin: 0;
	}
	.error-login .login-error p {
		width: 500px;
		max-width: 100%;
		margin: 20px auto 0;
		font-size: 14px;
	}
	@media (max-width: 767px) {
		.error-login .login-error p {
			width: 100%;
		}
	}
</style>

<!-- <section class="page-title">
	<div class="inner">
		<h1>Login Page</h1>
		<?php the_content(); ?>
	</div>
</section> -->

<?php
	if ( ! is_user_logged_in() ) {
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_nonce']) && wp_verify_nonce($_POST['login_nonce'], 'login_action') ) {
			$user_input = $_POST['log'];
			$password = $_POST['pwd'];
			$remember = isset($_POST['rememberme']);

			// Check if the input is an email or a username
			if ( is_email( $user_input ) ) {
				$user = get_user_by( 'email', $user_input );
				if ( $user ) {
					$creds = array(
						'user_login'    => $user->user_login,
						'user_password' => $password,
						'remember'      => $remember
					);
				}
			} else {
				$creds = array(
					'user_login'    => $user_input,
					'user_password' => $password,
					'remember'      => $remember
				);
			}

			// Authenticate the user
			if ( isset( $creds ) ) {
				$user = wp_signon( $creds, false );
				if ( is_wp_error( $user ) ) {
					$error = $user->get_error_message();
				} else {
					wp_redirect( home_url() ); // Redirect to home or any other page after successful login
					exit;
				}
			} else {
				$error = 'Invalid login credentials.';
			}
		}
	}
?>

<?php if ( ! is_user_logged_in() ) : ?>
	<section class="welcome-page">
		<div class="inner">
			<div class="welcome-section">
				<div class="wrapper">
					<img src="/wp-content/uploads/2024/05/pc-vet-division-logo.png" class="pc-vet-div-logo" alt="Pets Choice Veterinary Division" />
					<h1>Welcome to vetrange.co.uk</h1>
					<div class="options-wrapper">
						<a href="#" id="show_forms" class="option no-redirection">I am a UK veterinary industry professional</a>
						<a href="https://petrange.co.uk/" class="option redirect">I am a pet owner</a>
					</div>
				</div>
			</div>
			<div class="form-section">
				<div class="forms">
					<!-- <div class="form-banner">
						<img src="/wp-content/uploads/2024/05/vetrange-login-banner.jpg" alt="VetRange Banner" >
						<a href="#" id="back_welcome" class="no-redirection">Back</a>
						<div class="wrapper">
							<h2 class="heading">Welcome to VetRange.co.uk</h2>
							<h4 class="subheading">Your route to Pets Choice quality brands at discounted prices, exclusively for UK veterinary industry professionals.</h4>
							<div class="button-holder">
								<a href="#" id="banner_login" class="no-redirection">Login</a>
								<a href="#" id="banner_register" class="no-redirection">Register</a>
							</div>
						</div>
					</div> -->
					<div class="form-register">
						<div class="form-wrapper">
							<div class="form-banner">
								<img src="/wp-content/uploads/2024/05/pc-vet-division-logo.png" class="pc-vet-div-logo" alt="Pets Choice Veterinary Division" />
								<a href="#" class="no-redirection go-back">< Back</a>
								<div class="wrapper">
									<h2 class="heading">Welcome to vetrange.co.uk</h2>
									<h4 class="subheading">Your route to Pets Choice quality brands at discounted prices, exclusively for UK veterinary industry professionals.</h4>
									<div class="button-holder">
										<a href="#" id="banner_login" class="no-redirection">Login</a>
									</div>
								</div>
							</div>
							<?php echo do_shortcode('[user_registration_form id="3924"]'); ?>
						</div>
					</div>
					<div class="form-login">
						<?php // wp_login_form(); ?>						
						<div class="form-wrapper">
							<div class="form-banner">
								<img src="/wp-content/uploads/2024/05/pc-vet-division-logo.png" class="pc-vet-div-logo" alt="Pets Choice Veterinary Division" />
								<a href="#" class="no-redirection go-back">< Back</a>
								<div class="wrapper">
									<h2 class="heading">Welcome to vetrange.co.uk</h2>
									<h4 class="subheading">Your route to Pets Choice quality brands at discounted prices, exclusively for UK veterinary industry professionals.</h4>
									<div class="button-holder">
										<a href="#" id="banner_register" class="no-redirection">Register</a>
									</div>
								</div>
							</div>
							<div class="login-form">
								<h2 class="form-heading form-heading-login">Member Login</h2>
								<?php if ( isset($error) ) : ?>
									<div class="login-error"><p><?php echo $error; ?></p></div>
								<?php endif; ?>
								<form method="post" action="">
									<?php wp_nonce_field( 'login_action', 'login_nonce' ); ?>
									<p class="form-row-login user-email">
										<!-- <label for="log">Username or Email Address</label> -->
										<input type="text" name="log" id="log" class="user-input" value="" placeholder="Business Email">
									</p>
									<p class="form-row-login user-password">
										<!-- <label for="pwd">Password</label> -->
										<input type="password" name="pwd" id="pwd" class="user-input" placeholder="Password">
									</p>
									<p class="form-row-login user-remember">
										<label for="rememberme">
											<input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me
										</label>
									</p>
									<p class="form-row-login user-submit">
										<input type="submit" name="wp-submit" id="wp-submit" value="Log In">
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php else : ?>
	<section class="logged-in-section">
		<div class="inner">
			<div class="wrapper">
				<h3>You are already logged in.</h3>
				<div class="button-holder">
					<a href="/" class="button">Go to Home Page</a>
					<a href="/shop" class="button">View Our Products</a>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>	
    
<?php get_footer(); ?>

<script>
	var $ = jQuery;

	document.addEventListener('DOMContentLoaded', function() {
		var loginErrorElement = document.querySelector('.login-error');
		if (loginErrorElement && loginErrorElement.textContent.trim() !== '') {
			document.body.classList.add('error-login');
			$('.welcome-section').hide();
			$('.form-section').show();
			$('.form-login').fadeIn();

			// modify error message if username field is empty
			if ($('.error-login .login-error p').text().includes('username field is empty')) {
				$('.error-login .login-error p').html('<strong>Error:</strong> The business email field is empty.');
			}

			// modify error message if username is incorrect
			if ($('.error-login .login-error p').text().includes('unsure of your username')) {
				$('.error-login .login-error p').html('<strong>Error:</strong> Please use a valid business email address.');
			}

			// modify error message if password is incorrect
			// if ($('.error-login .login-error p').text().includes('password you entered')) {
			// 	$('.error-login .login-error p').html('<strong>Error:</strong> The password you entered is incorrect. <a href="/login/lost-password/">Lost your password?</a>');
			// }
			if ($('.error-login .login-error p').text().includes('password you entered')) {
				$('.error-login .login-error p').html('<strong>Error:</strong> The password you entered is incorrect.');
			}
		}
	});

	$(document).ready(function() {
		// Function to check if the error message exists and modify error message if email address has already been used
		function checkError() {
			const errorMessage = document.querySelector('.form-register form.register .user-registration-error');
			if (errorMessage) {
				console.log('Error');
				if ($('.form-register #ur-submit-message-node li').text().includes('Error on google reCaptcha')) {
					$('.form-register #ur-submit-message-node li').html('It appears that the email address has already been used. Please contact us at <a href="mailto:registrations@vetrange.co.uk" style="color: #f08212;">registrations@vetrange.co.uk</a>.<br><br>');
				}
			} else {
				console.log('No error');
				// Your code when there is no error message
			}
		}
		// Function to start checking for error message
		function startCheckingError() {
			intervalId = setInterval(checkError, 100);
		}
		// Function to stop checking for error message
		function stopCheckingError() {
			clearInterval(intervalId);
		}
		// Event listener for form submission
		document.querySelector('.form-register').addEventListener('submit', function(event) {
			event.preventDefault(); // Prevent form submission
			startCheckingError();
		});
		// Event listener for clicking outside the form
		document.addEventListener('click', function(event) {
			if (!event.target.closest('.form-register')) {
				stopCheckingError();
			}
		});
		// Event listener for hovering outside the form
		document.addEventListener('mouseover', function(event) {
			if (!event.target.closest('.form-register')) {
				stopCheckingError();
			}
		});

		// add Membership Registration copy
		$('<h2 class="form-heading">Membership Registration</h2>').insertBefore('.form-register .user-registration form');

		// add information icon popup to the Business email input field
		$('<div class="email-popup"><div class="popup-trigger"></div><img src="/wp-content/uploads/2024/05/icon-i.png" class="information-popup"><span class="popup-message">Please provide your business email address to help us ensure that the website remains exclusively for veterinary industry professionals. If you don’t have a business email address, please contact us at info@vetrange.co.uk.</span><div>').insertAfter('.form-register .user-registration #user_email_field .input-wrapper');
		setTimeout(() => {
			$('.form-register #user_email_field .popup-trigger, .form-register #user_email_field .popup-message').hover(
				function(){
					$(this).parent().addClass('hovered');
				},
				function(){
					$(this).parent().removeClass('hovered');
				}
			);
		}, 500);
		
		// add information icon popup to the Country input field
		$('<div class="email-popup"><div class="popup-trigger"></div><img src="/wp-content/uploads/2024/05/icon-i.png" class="information-popup"><span class="popup-message">We are currently unable to deliver to Scottish Highlands & Islands. For a full list of our restricted zones, please visit our <a href="/delivery-information">delivery information page</a>.</span><div>').insertAfter('.form-register .user-registration #user_country_field .input-wrapper');
		setTimeout(() => {
			$('.form-register #user_country_field .popup-trigger, .form-register #user_country_field .popup-message').hover(
				function(){
					$(this).parent().addClass('hovered');
				},
				function(){
					$(this).parent().removeClass('hovered');
				}
			);
		}, 500);

		// modify newsletters subscription copy
		$('.form-register .user-registration .subscription ul li.ur-checkbox-list label').text('I would like to receive marketing emails with relevant updates, offers and product news from Pets Choice or its brands.');
		
		// modify terms and conditions copy
		$('.form-register .user-registration .terms ul li.ur-checkbox-list label').html('I have read and accepted the terms and conditions. <a href="/terms" target="_blank">Read here</a>');
		
		// add link from Register Page to Login Page
		$('<p>Already have an account? <a href="#" id="show_form_login" class="no-redirection link-underline">Login here</a></p>').insertAfter('.form-register .user-registration form > .ur-button-container');

		// add link from Login Page back to Register Page
		$('<p>Do you need a member account? <a href="#" id="show_form_register" class="no-redirection link-underline">Register here</a></p>').insertAfter('.form-login .user-submit');

		// add link from Login Page back to Forgot Password Page
		$('<a href="/my-account/lost-password" id="forgot_password" class="link-underline">Forgot your password?</a>').insertAfter('.form-login .user-submit #wp-submit');

		// preventDefault();
		$('.welcome-section .no-redirection').on('click', function(e) {
			e.preventDefault();
		});


		// function checkErrorFields() {
		// 	var hadError = false;
		// 	$('.form-register input').each(function() {
		// 		if ($(this).hasClass('ur-input-border-red')) {
		// 			hadError = true;
		// 			return false;
		// 		}
		// 	});
		// 	if (hadError) {
		// 		if ($(window).height() < 900) {
		// 			$('.form-section').css('height','auto');
		// 		} 
		// 		else {
		// 			$('.form-section').css('height','(100vh - 100px)');
		// 		}
		// 	} 
		// 	else {
		// 		$('.form-section').css('height','(100vh - 100px)');
		// 	}
		// }
		// $('.form-register input').on('keyup focusout', function () {
		// 	checkErrorFields();
		// });
		// $('.form-register .ur-submit-button').click(function () {
		// 	checkErrorFields();
		// });


		// Back link
		$('.go-back').click(function() {
			$('.form-section').hide();
			$('.welcome-section').fadeIn();
		});

		// from Welcome Page to Membership Form - if UK Vet is selected
		$('#show_forms').click(function() {
			$('.welcome-section').hide();
			$('.form-section').fadeIn();
			$('.form-login').hide();
			$('.form-register').fadeIn();
		});

		// from Register Form to Login Form
		$('#show_form_login').click(function() {
			$('.form-register').hide();
			$('.form-login').fadeIn();
		});	
		$('#banner_login').click(function() {
			$('.form-register').hide();
			$('.form-login').fadeIn();
		});	

		// from Login Form back to Register Form
		$('#show_form_register').click(function() {
			$('.form-login').hide();
			$('.form-register').fadeIn();
		});
		$('#banner_register').click(function() {
			$('.form-login').hide();
			$('.form-register').fadeIn();
		});

		// disallow commonly used email addresses
		$('.form-register #user_email').keyup(function() {
			var domains = ['@gmail.', '@hotmail.', '@live.', '@msn.', '@protonmail.', '@aol.', '@yahoo.', '@ymail.', '@zoho.', '@icloud.', '@gmx.', '@mail.'];
			var inputVal = $(this).val();

			// Flag to check if any domain is matched
			var emailMatched = false;

			for (var i = 0; i < domains.length; i++) {
				if (inputVal.includes(domains[i])) {
					emailMatched = true;
					break;
				}
			}

			if (emailMatched) {
				$(this).closest('form').addClass('disable-submit');
				$(this).closest('.field-user_email').addClass('email-invalid');
			} else {
				$(this).closest('form').removeClass('disable-submit');
				$(this).closest('.field-user_email').removeClass('email-invalid');
			}
		});
	});
</script>