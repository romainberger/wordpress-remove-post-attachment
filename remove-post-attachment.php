<?php
/**
 * Plugin Name:  Remove Post Attachment
 * Plugin URI:   https://github.com/romainberger/wordpress-remove-post-attachment
 * Description:  Allows detaching medias from a post from the gallery
 * Version:      0.1.2
 * Author:       Romain Berger
 * Author URI:   http://romainberger.com
 * License:      MIT
 */

/**
 * Add the js file to the admin
 */
function removePostAdminJs() {
    wp_enqueue_script('remove-post-attachment', plugins_url('/js/remove-post-attachment.js', __FILE__), false, 1, true);
}

add_filter('admin_enqueue_scripts', 'removePostAdminJs');

function removePostAttachmentAjax() {
    if (isset($_POST['id']) && $_POST['id']) {
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
    exit;
}

add_action('wp_ajax_my_action', 'removePostAttachmentAjax');
