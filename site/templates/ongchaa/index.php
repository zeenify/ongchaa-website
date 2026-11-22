<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

$app  = Factory::getApplication();
$wa   = $this->getWebAssetManager();
$menu = $app->getMenu();
$active = $menu->getActive();

// Joomla-bundled Bootstrap 5 + Font Awesome
$wa->registerAndUseStyle('bs5', 'media/vendor/bootstrap/css/bootstrap.min.css');
$wa->registerAndUseScript('bs5js', 'media/vendor/bootstrap/js/bootstrap.bundle.min.js', [], ['defer' => true]);
$faPath = JPATH_ROOT . '/media/vendor/fontawesome-free/css/all.min.css';
if (file_exists($faPath)) {
	$wa->registerAndUseStyle('fa', 'media/vendor/fontawesome-free/css/all.min.css');
}

// Template assets (classic layout under /templates/ongchaa)
$base = Uri::root(true) . '/templates/ongchaa';
try {
	$wa->registerAndUseStyle('oca-theme', $base . '/css/template.css?v=100');
	$wa->registerAndUseScript('oca-theme-js', $base . '/js/template.js', [], ['defer' => true]);
} catch (Throwable $e) {
	echo '<!-- oca asset error: ' . htmlspecialchars($e->getMessage()) . ' -->';
}
$wa->registerAndUseScript('template.ongchaa.js', $base . '/js/template.js', [], ['defer' => true, 'version' => '1.0.0']);

$logoPath = $base . '/images/logo.jpg';
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="metas" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link rel="icon" href="<?php echo $base; ?>/images/favicon.png" type="image/png">
	<link rel="stylesheet" href="<?php echo $base; ?>/css/template.css?v=101">
	<script type="module" src="<?php echo Uri::root(true); ?>/media/vendor/bootstrap/js/collapse.min.js"></script>
	<script src="<?php echo $base; ?>/js/template.js" defer></script>
	<jdoc:include type="styles" />
</head>
<body class="oca-site site<?php echo $active ? ' oca-' . $active->alias : ''; ?>">
	<header class="oca-header">
		<nav class="navbar navbar-expand-lg oca-navbar">
			<div class="container">
				<a class="navbar-brand oca-brand" href="<?php echo Uri::root(true); ?>/">
					<img src="<?php echo $logoPath; ?>" alt="<?php echo $sitename; ?> logo" class="oca-logo">
					<span class="oca-brand-name"><?php echo $sitename; ?></span>
				</a>
				<button class="navbar-toggler oca-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ocaNav" aria-controls="ocaNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="ocaNav">
					<jdoc:include type="modules" name="topnav" style="none" />
				</div>
				<a class="btn oca-btn-accent oca-cta d-none d-lg-inline-flex" href="#contact-cta">Order Now <i class="fa-solid fa-arrow-right"></i></a>
			</div>
		</nav>
	</header>

	<main class="oca-main">
		<?php if ($this->countModules('banner')) : ?>
		<section class="oca-banner">
			<jdoc:include type="modules" name="banner" style="none" />
		</section>
		<?php endif; ?>

		<?php if ($this->countModules('promo')) : ?>
		<section class="oca-promo-strip">
			<jdoc:include type="modules" name="promo" style="none" />
		</section>
		<?php endif; ?>

		<div class="container oca-messages">
			<jdoc:include type="message" />
		</div>

		<div class="oca-content">
			<jdoc:include type="component" />
		</div>
	</main>

	<footer class="oca-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4 oca-footer-brand">
					<img src="<?php echo $logoPath; ?>" alt="<?php echo $sitename; ?>" class="oca-footer-logo">
					<p class="oca-footer-tag">Walang mahirap, walang mayaman — lahat pantay-pantay!</p>
				</div>
				<div class="col-md-4">
					<jdoc:include type="modules" name="footer-info" style="none" />
				</div>
				<div class="col-md-4 oca-footer-cta" id="contact-cta">
					<h3>Craving milk tea?</h3>
					<p>Message us on Facebook or drop by the store — mga ka cha-A!</p>
					<a class="btn oca-btn-accent" href="https://www.facebook.com/OngchaAGenTinioNE" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-messenger"></i> Message us</a>
				</div>
			</div>
			<div class="oca-footer-bottom">
				<small>© <?php echo date('Y'); ?> Ong-cha-A Cafe - General Tinio · IT WS 06 Case Study Project · General Tinio (Papaya), Nueva Ecija</small>
			</div>
		</div>
	</footer>

	<jdoc:include type="modules" name="debug" style="none" />
	<jdoc:include type="scripts" />
</body>
</html>
