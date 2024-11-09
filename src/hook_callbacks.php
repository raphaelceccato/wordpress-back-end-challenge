<?php

if (!defined("ABSPATH")) exit;

require_once(ABSPATH . "wp-admin/includes/upgrade.php");



function wpfav_create_table() {
    global $wpdb;

    $table = $wpdb->prefix . "user_bookmarks";
    $collation = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id BIGINT(20) NOT NULL AUTO_INCREMENT,
        user_id BIGINT(20) NOT NULL,
        post_id BIGINT(20) NOT NULL,
        PRIMARY KEY  (id),
        UNIQUE KEY user_bookmark (user_id, post_id)
    ) $collation;";

    dbDelta($sql);
}



function wpfav_is_authed() {
    return is_user_logged_in();
}