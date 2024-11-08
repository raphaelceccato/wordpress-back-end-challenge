<?php
/*
Plugin Name: WP Fav Posts
Description: Plugin to bookmark posts using WP REST API
Version: 1.0
Author: Raphael Ceccato Pauli
*/


if (!defined("ABSPATH")) exit;

define("PLUGIN_DIR", plugin_dir_path(__FILE__));



class WP_Fav_Posts {
    public function __construct() {
        
    }    
}



new WP_Fav_Posts();
