<?php require 'php/email.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Leon Duif - Portfolio</title>
    <meta name="description" content="Leon Duif Portfolio, Front-end developer">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Lato|Oswald:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="dist/style.css">
</head>
<body>
	<!--[if lt IE 10]>
	    <p class="browser-upgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->


	
	<header class="page-header">
		<div class="page-header__inner">
			<div class="container">
				<div class="page-header__info">
					<h1 class="page-title">Hi! I'm Leon Duif</h1>
					<p class="page-sub-title"><strong>Front-end developer</strong> from Amsterdam. <br> Specialized in <strong>intuitive</strong> &amp; <strong>user-friendly</strong> websites.</p>
					<p class="page-actions">
						<a class="btn btn--standout" href="#work">View work</a> or <a class="link link--light" href="#contact">contact me</a>
					</p>
				</div>
			</div>
		</div>
	</header>
	
	
	
	<div class="page-content">
		<section class="my-work" id="work">
			<div class="container">
				<header class="section-title">
					<div class="section-title__inner section-title__inner--gray">
						<h2 class="primary-title">Work</h2>
						<p class="sub-title">The latest and the greatest</p>
					</div>
				</header>

				<?php foreach ($workItems as $workItem) : ?>
					<div class="work-item">
						<div class="photo-slider <?=$workItem["sliderClass"]; ?>">
							<ul class="photo-slider__container">
								<li class='photo-slider__item' style='background-image: url("<?=$workItem["img"]; ?>");'></li>
							</ul>
						</div>

						<h3 class="work-item__title"><?=$workItem["title"]; ?></h3>

						<div class="work-item__content">
							<header class="work-item__header">
								<p class="work-item__header-text"><?=$workItem["text"]; ?></p>
							</header>

							<ul class="work-item__info">
								<li class="work-item__info-item">
									<i class="icon-user"></i>
									<span class="work-item__info-text"><?=$workItem["influence"]; ?></span>
								</li>
								<li class="work-item__info-item">
									<i class="icon-calendar-empty"></i>
									<span class="work-item__info-text"><?=$workItem["time"]; ?></span>
								</li>

								<?php if (array_key_exists("url", $workItem)) : ?>
								<li class="work-item__info-item">
									<i class="icon-globe"></i>
									<a href="<?=$workItem["url"]; ?>" target="_blank" class="work-item__info-text link"><?=$workItem["url"]; ?></a>
								</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>

		<section class="about-me" id="about">
			<div class="container">
				<header class="section-title">
					<div class="section-title__inner section-title__inner--light">
						<h2 class="primary-title">About me</h2>
						<p class="sub-title">Let me introduce myself</p>
					</div>
				</header>

				<section class="my-info">
					<div class="my-info__header">
						<img class="my-info__img" src="assets/img/Leon.jpg" alt="Leon Duif">
						<div class="my-info__text">
							<p>I'm Leon Duif, a 25 year old front-end developer from the Netherlands who is passionate to create the best possible experience for the user.</p>
							<p>I graduated from <a href="http://www.hva.nl/onderwijs/opleidingen/content/dmci/communication-and-multimedia-design/communication-and-multimedia-design.html" target="_blank" class="link">Communication &amp; Multimedia design</a> in Amsterdam in 2012.</p>
							<p>What I like most is front-end development and interaction design. The synergy between these two elements can really bring the best out of a product.</p>
							<p>In my spare time I like to hang out with friends, learn &amp; experiment with new webstuff, watch a movie and gaming.</p>
						</div>
					</div>
				</section>

				<section class="my-passion">
					<h2 class="secondary-title">
						<span class="secondary-title__text">What I love to do</span>
					</h2>

					<ul class="my-passion-list">
						<li class="my-passion-list__item">
							<i class="icon-code  my-passion-list__icon"></i>
							<p class="my-passion-list__text">To write <strong>smart, modular &amp; semantic code</strong> that is easy to read, scale and maintain.</p>
						</li>
						<li class="my-passion-list__item">
							<i class="icon-smile  my-passion-list__icon"></i>
							<p class="my-passion-list__text">To create the <strong>best possible experience for the user</strong> so they can use the product with ease and joy.</p>
						</li>
						<li class="my-passion-list__item">
							<i class="icon-brush  my-passion-list__icon"></i>
							<p class="my-passion-list__text">To design <strong>clean, estethically beautiful designs with a clear focus</strong>. The best designs are tailored to the needs of the user.</p>
						</li>
					</ul>
				</section>

				<section class="my-skills">
					<h2 class="secondary-title">
						<span class="secondary-title__text">My skills</span>
					</h2>

					<ul class="my-skills-list">
						<li class="my-skills-list__item">
							<span class="my-skills-list__info  my-skills-list__info--html">HTML5 + CSS3</span>
						</li>
						<li class="my-skills-list__item">
							<span class="my-skills-list__info  my-skills-list__info--rwd">Responsive webdevelopment</span>
						</li>
						<li class="my-skills-list__item">
							<span class="my-skills-list__info  my-skills-list__info--ps">Webdesign</span>
						</li>
						<li class="my-skills-list__item">
							<span class="my-skills-list__info  my-skills-list__info--ux">Interaction Design</span>
						</li>
						<li class="my-skills-list__item">
							<span class="my-skills-list__info  my-skills-list__info--js">Javascript</span>
						</li>
					</ul>

					<p class="disclaimer"><strong>Note:</strong> this is a rough representation of my skills</p>
				</section>
			</div>
		</section>

		<section class="contact-me" id="contact">
			<div class="container">
				<header class="section-title">
					<div class="section-title__inner section-title__inner--gray">
					<h2 class="primary-title">Contact</h2>
						<p class="sub-title">Get in touch</p>
					</div>
				</header>

				<form method="post" class="contact-form" name="contact-form" id="contact-form">
					<ul class="contact-form__list">
						<li class="contact-form__item">
							<label>
								<span class="contact-form__label-text">E-mail address</span>
								<input type="email" required name="email" class="form-input" value="<?php echo isOld('email'); ?>">
							</label>
						</li>
						<li class="contact-form__item">
							<label class="contact-form__label">
								<span class="contact-form__label-text">Subject</span>
								<input type="text" required name="subject" class="form-input" value="<?php echo isOld('subject'); ?>">
							</label>
						</li>
						<li class="contact-form__item">
							<label>
								<span class="contact-form__label-text">Message</span>
								<textarea required name="message" class="form-input form-input--big" value="<?php echo isOld('message'); ?>"></textarea>
							</label>
						</li>
						<li class="contact-form__item">
							<input type="submit" class="btn btn--standout" value="Send e-mail" name="contact-form-btn">
						</li>
					</ul>
				</form>
			</div>
		</section>
	</div>
	
	
	
	<footer class="page-footer">
		<div class="container">
			<ul class="footer-list">
				<li class="footer-list__item">
					<a href="#work" class="link">Work</a>
				</li>
				<li class="footer-list__item">
					<a href="#about" class="link">About</a>
				</li>
				<li class="footer-list__item">
					<a href="#contact" class="link">Contact</a>
				</li>
			</ul>
			<p class="footer-text">A portfolio by Leon Duif - <?php echo date("Y"); ?> &copy;</p>
		</div>
	</footer>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
	<!-- inject:js -->
	<script src="dist/all.js"></script>
	<!-- endinject -->
</body>
</html>