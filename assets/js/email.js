$(document).ready(function(){
	$("#contact-form").on('submit', function(e) {
		e.preventDefault();
		var emailReg = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

		var $this = $(this),
		email     = $.trim($this.find('[name=email]').val()),
		subject   = $.trim($this.find('[name=subject]').val()),
		message   = $.trim($this.find('[name=message]').val());

		if (email.length > 0) {
			// Empty email
		}

		if (subject.length === 0) {
			// Empty subject
		}

		if (message.length === 0) {
			// Message is empty
		}

		// Email validation
		if (emailReg.test(email)) {
			// Valid email
			if (subject.length > 0 && message.length > 0) {

				var $submitBtn = $this.find('.btn');


				$.ajax({
					url: 'php/email.php',
					type: 'POST',
					data: {
						'email': email,
						'subject': subject,
						'message': message
					},
					beforeSend: function() {
						// Change text button & disable it, also hide error message if it's there.
						$submitBtn.val("Sending e-mail...").attr('disabled', true);
						$("#contact-form").find('.contact-form__message').hide();

						// Adds spinner
						$("<div class='loading-spinner  contact-form__spinner'></div>").insertAfter('#contact-form .btn');
					},
					error: function(obj, texterror, exceptionObject) {
						$submitBtn.val("Send e-mail").attr('disabled', false);
						$this.find(".contact-form__spinner").hide();

						var errorMsg = "Something went wrong, please try again.";

						if ($this.find('.contact-form__message').length === 0) {
							$("<p class='contact-form__message'>" + errorMsg + "</p>").insertAfter("#contact-form .btn");
						}
						else {
							$this.find('.contact-form__message').show();
						}

					},
					success: function() {
						$this.find('.contact-form__message, .contact-form__spinner').hide();
						$submitBtn.val("E-mail sent! :)").attr('disabled', false);

						// Clear all input fields
						$this.find('.form-input').val("");

						setTimeout(function(){
							$submitBtn.val("Send e-mail");
						}, 4000);
					}

				});

				$.post("php/email.php", {
					'email': email,
					'subject': subject,
					'message': message
				}, function(data) {

					$submitBtn.val("Sending email...").attr('disabled', false);
					$(".contact-form__spinner").remove();

					$submitBtn.val("Email sent! :)");

					setTimeout(function(){
						$submitBtn.val("Send e-mail");
					}, 5000);

					$this.find('.form-input').val("");
				});
			}

		}

		// Invalid email
		else {
			return false;
		}
	});
});