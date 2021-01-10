<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'xampp'.DS.'htdocs'.DS.'automotive');
defined('CONFIG_PATH') ? null : define('CONFIG_PATH', SITE_ROOT.DS.'config');
defined('INIT_PATH') ? null : define('INIT_PATH', SITE_ROOT.DS.'init');
defined('MODELS_PATH') ? null : define('MODELS_PATH', SITE_ROOT.DS.'models');
defined('VENDOR_PATH') ? null : define('VENDOR_PATH', SITE_ROOT.DS.'vendor');
defined('PUBLIC_PATH') ? null : define('PUBLIC_PATH', SITE_ROOT.DS.'public');
defined('MIGRATION_PATH') ? null : define('MIGRATION_PATH', SITE_ROOT.DS.'migration');

$site_url = "http://localhost/automotive/";

// db connections
require_once(CONFIG_PATH.DS.'database.php');

// load sessions 
require_once(CONFIG_PATH.DS.'sessions.php');

// load all system functions
require_once(CONFIG_PATH.DS.'functions.php');

// app auth api
// require_once(CONFIG_PATH.DS.'auth.php');

// load roles
require_once(MODELS_PATH.DS.'mail.php');

// load admins
require_once(MODELS_PATH.DS.'admins.php');

// load members
require_once(MODELS_PATH.DS.'members.php');

// load vehicles
require_once(MODELS_PATH.DS.'vehicles.php');

// load vehicle images
require_once(MODELS_PATH.DS.'vehicle_images.php');

// load roles
require_once(MODELS_PATH.DS.'roles.php');
