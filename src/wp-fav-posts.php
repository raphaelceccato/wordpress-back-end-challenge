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
require_once(PLUGIN_DIR . "src/db_utils.php");



class WPFavPosts {
    public function __construct() {
        add_action("init", "on_init");
    }


    public function on_init() {
        Database::createTable();
        
        register_rest_route("wpfav/v1", "/add-bookmark/(?P<id>\d+)", [
            "methods"  => "POST",
            "callback" => "wpfav_add_bookmark",
            "permission_callback" => "wpfav_is_authed"
        ]);
    }
}



new WPFavPosts();

