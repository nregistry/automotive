<?php 
require_once('initialization.php');

// bring in mail migration
require_once(MIGRATION_PATH.DS.'mail.php');

// bring in admins migration
require_once(MIGRATION_PATH.DS.'admins.php');

// bring in members migration
require_once(MIGRATION_PATH.DS.'members.php');

// bring in vehicles migration
require_once(MIGRATION_PATH.DS.'vehicles.php');

// bring in vehicle images migration
require_once(MIGRATION_PATH.DS.'vehicle_images.php');

// bring in roles migration
require_once(MIGRATION_PATH.DS.'roles.php');