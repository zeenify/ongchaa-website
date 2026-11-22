<?php
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

$app = Factory::getApplication();
$base = Uri::root(true) . '/templates/ongchaa';
$code = $this->error->getCode() ?? 500;
$ocaDebug = '';
try {
	$c = $app->getConfig();
	$ocaDebug = 'cache_path=[' . var_export($c->get('cache_path'), true) . '] '
		. 'tmp_path=[' . var_export($c->get('tmp_path'), true) . '] '
		. 'log_path=[' . var_export($c->get('log_path'), true) . '] '
		. 'base=[' . var_export($c->get('base_path'), true) . '] '
		. 'JOOMLA_BASE_PATH=[' . var_export(getenv('JOOMLA_BASE_PATH'), true) . '] '
		. 'dbtype=[' . var_export($c->get('dbtype'), true) . ']';
	@error_log('[ongchaa-cfg] ' . $ocaDebug);
} catch (Throwable $e) {
	$ocaDebug = 'cfg-read-failed: ' . $e->getMessage();
}
	@error_log("[ongchaa-fatal] code=" . $code . " msg=" . $this->error->getMessage() . "
TRACE:
" . $this->error->getTraceAsString());
		$trace = "<pre style=\"text-align:left;font-size:10px;white-space:pre-wrap;\">" . htmlspecialchars($this->error->getTraceAsString()) . "</pre>";
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $code; ?> - Ong-cha-A Cafe</title>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $base; ?>/css/template.css">
</head>
<body class="oca-site">
	<main class="oca-section" style="min-height:80vh;display:flex;align-items:center;">
		<div class="container text-center">
			<h1 style="font-size:4rem;color:var(--oca-pink);"><?php echo $code; ?></h1>
			<p style="color:#900;font-family:monospace;"><?php echo htmlspecialchars($this->error->getMessage()); ?></p>
			<?= isset($trace) ? $trace : "" ?>
			<p style="font-family:monospace;font-size:11px;color:#333;"><?= htmlspecialchars($ocaDebug) ?></p>
			<p style="font-size:1.2rem;">Oops! This page ran out of milk tea. <a href="<?php echo Uri::root(true); ?>/" style="color:var(--oca-green);font-weight:600;">Back to the shop</a></p>
		</div>
	</main>
</body>
</html>
