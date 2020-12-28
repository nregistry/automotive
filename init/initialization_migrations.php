<?php 
require_once('initialization.php');

// bring in admins migration
require_once(MIGRATION_PATH.DS.'admins.php');

// bring in members migration
require_once(MIGRATION_PATH.DS.'members.php');

// bring in vehicles migration
require_once(MIGRATION_PATH.DS.'vehicles.php');

// bring in vehicle images migration
require_once(MIGRATION_PATH.DS.'vehicle_images.php');