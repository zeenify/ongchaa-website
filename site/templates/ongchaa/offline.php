<?php
defined('_JEXEC') or die;
use Joomla\CMS\Uri\Uri;
$base = Uri::root(true) . '/templates/ongchaa';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Site Offline - Ong-cha-A Cafe</title>
	<link rel="stylesheet" href="<?php echo $base; ?>/css/template.css">
</head>
<body class="oca-site">
	<main class="oca-section" style="min-height:80vh;display:flex;align-items:center;">
		<div class="container text-center">
			<h1 style="color:var(--oca-pink);">We'll be right back, mga ka cha-A!</h1>
			<p>The shop is brewing something new. Please check back soon.</p>
		</div>
	</main>
</body>
</html>
