<?php
/*
Plugin Name: WP Fav Posts
Description: Plugin to bookmark posts using WP REST API
Version: 1.0
Author: Raphael Ceccato Pauli
*/


if (!defined("ABSPATH")) exit;

define("PLUGIN_DIR", plugin_dir_path(__FILE__));


require_once(PLUGIN_DIR . "src/hook_callbacks.php");
require_once(PLUGIN_DIR . "src/routes.php");



class WP_Fav_Posts {
    public function __construct() {
        add_action("init", "wpfav_create_table");
    }
}



new WP_Fav_Posts();
