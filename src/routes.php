<?php

if (!defined("ABSPATH")) exit;

define("PLUGIN_DIR", plugin_dir_path(__FILE__));


require_once(PLUGIN_DIR . "src/routes.php");
require_once(PLUGIN_DIR . "src/db_utils.php");



function wpfav_add_bookmark($request) {
    if (!$request->has_param("id")) {
        wp_send_json_error("missing_id", "Missing post id", ["status" => 400]);
        return;
    }

    $id = $request->get_param("id");
    $user_id = get_current_user_id();

    if (!get_post($id)) {
        wp_send_json_error("post_not_found", "Post not found", ["status" => 404]);
        return;
    }

    Database::addBookmark($user_id, $id);

    wp_send_json_success();
}



function wpfav_remove_bookmark($request) {
    if (!$request->has_param("id")) {
        wp_send_json_error("missing_id", "Missing post id", ["status" => 400]);
        return;
    }

    $id = $request->get_param("id");
    $user_id = get_current_user_id();

    if (!get_post($id)) {
        wp_send_json_error("post_not_found", "Post not found", ["status" => 404]);
        return;
    }

    Database::removeBookmark($user_id, $id);

    wp_send_json_success();
}