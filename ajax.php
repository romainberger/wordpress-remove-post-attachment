<?php

require_once __DIR__.'/../../../wp-config.php';

if (isset($_POST['id'])) {
    global $wpdb;

    if (current_user_can('upload_files')) {
        $wpdb->update($wpdb->posts, array(
            'post_parent' => 0
        ), array(
            'id'        => $_POST['id'],
            'post_type' => 'attachment'
        ));
    }
}
