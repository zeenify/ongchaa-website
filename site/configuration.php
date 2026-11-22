<?php
/**
 * Ong-cha-A Cafe - General Tinio — Joomla configuration
 * Environment-aware version: locally uses XAMPP defaults, on Render/Neon
 * the JOOMLA_DB_* environment variables override everything.
 */
if (!defined('OCA_ENV')) {
	function oca_env($key, $default) {
		$v = getenv($key);
		return ($v === false || $v === null || $v === '') ? $default : $v;
	}
	define('OCA_ENV', 1);
	define('OCA_DB_HOST', oca_env('JOOMLA_DB_HOST', '127.0.0.1'));
	define('OCA_DB_USER', oca_env('JOOMLA_DB_USER', 'root'));
	define('OCA_DB_PASS', oca_env('JOOMLA_DB_PASS', ''));
	define('OCA_DB_NAME', oca_env('JOOMLA_DB_NAME', 'ongchaa_cafe'));
	define('OCA_DB_TYPE', oca_env('JOOMLA_DB_TYPE', 'mysqli'));
	define('OCA_DB_PREFIX', oca_env('JOOMLA_DB_PREFIX', 'ocaa_'));
	define('OCA_BASE_PATH', oca_env('JOOMLA_BASE_PATH', 'C:\\xampp\\htdocs\\ongchaa'));
}

class JConfig {
	public $MetaDesc = 'Ong-cha-A Cafe General Tinio - budget-friendly milk tea in General Tinio (Papaya), Nueva Ecija. Milk tea from P29.';
	public $MetaAuthor = true;
	public $robots = '';
	public $sef = true;
	public $sef_rewrite = false;
	public $sef_suffix = false;
	public $unicodeslugs = false;
	public $sitemap_ping = 0;
	public $offset = 'Asia/Manila';
	public $offset_user = 'UTC';
	public $mailer = 'mail';
	public $mailfrom = 'admin@ongchaa.local';
	public $fromname = 'Ong-cha-A Cafe - General Tinio';
	public $sendmail = '/usr/sbin/sendmail';
	public $smtpauth = false;
	public $smtpuser = '';
	public $smtppass = '';
	public $smtphost = 'localhost';
	public $smtpsecure = 'none';
	public $smtpport = '25';
	public $caching = 1;
	public $cachetime = '15';
	public $cache_platformprefix = false;
	public $cachetimeout = '0';
	public $cache_handler = 'file';
	public $cache_path = OCA_BASE_PATH . '/cache';
	public $debug = false;
	public $debug_lang = false;
	public $debug_lang_const = true;
	public $dbtype = OCA_DB_TYPE;
	public $host = OCA_DB_HOST;
	public $user = OCA_DB_USER;
	public $password = OCA_DB_PASS;
	public $db = OCA_DB_NAME;
	public $dbprefix = OCA_DB_PREFIX;
	public $dbencryption = 0;
	public $dbsslverifyservercert = false;
	public $dbsslkey = '';
	public $dbsslcert = '';
	public $dbsslca = '';
	public $dbsslcipher = '';
	public $dbconnectionencryption = '';
	public $dbapplicationname = '';
	public $lifetime = 240;
	public $session_handler = 'database';
	public $shared_session = false;
	public $session_metadata = true;
	public $session_metadata_name = 'joomla_session_metadata';
	public $session_gc_probability = 1;
	public $session_gc_divisor = 100;
	public $session_gc_lifetime = 60;
	public $memcached_persist = false;
	public $memcached_compress = false;
	public $memcached_server_host = 'localhost';
	public $memcached_server_port = '11211';
	public $redis_persist = false;
	public $redis_server_host = 'localhost';
	public $redis_server_port = '6379';
	public $redis_server_db = '0';
	public $redis_server_auth = '';
	public $redis_server_db_enc = '';
	public $cors = false;
	public $cors_forced_headers = 'Content-Type';
	public $cors_allow_headers = 'Content-Type,X-Joomla-Token';
	public $cors_allow_methods = 'GET,POST,PUT,PATCH,DELETE,HEAD';
	public $cors_allow_origin = '';
	public $cors_allow_credentials = false;
	public $cors_max_age = '0';
	public $proxy_enable = false;
	public $proxy_host = '';
	public $proxy_port = '';
	public $proxy_user = '';
	public $proxy_pass = '';
	public $massmailoff = false;
	public $mailonline = false;
	public $massmailnamewrap = 0;
	public $gzip = false;
	public $error_reporting = 'default';
	public $helpurl = 'https://help.joomla.org/proxy/index.php?keyref=help{major}{minor}:';
	public $xmlrpc_server = false;
	public $log_path = OCA_BASE_PATH . '/administrator/logs';
	public $tmp_path = OCA_BASE_PATH . '/tmp';
	public $lifetime_sessions = 0;
	public $response_code = '404';
	public $sitename = 'Ong-cha-A Cafe - General Tinio';
	public $access = 1;
	public $list_limit = 20;
	public $editor = 'tinymce';
	public $captcha = '0';
	public $redis_server_db_enc_key = '';
	public $captcha_reg = '0';
	public $frontediting = 1;
	public $feed_email = 'none';
	public $cookie_domain = '';
	public $cookie_path = '';
	public $asset_id = 1;
}
