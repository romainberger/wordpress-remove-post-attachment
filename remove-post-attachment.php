<?php
/**
 * Plugin Name:  Remove Post Attachment
 * Plugin URI:   https://github.com/romainberger/wordpress-remove-post-attachment
 * Description:  Allows detaching medias from a post from the gallery
 * Version:      0.1.1
 * Author:       Romain Berger
 * Author URI:   http://romainberger.com
 * License:      MIT
 */

/**
 * Add the js file to the admin
 */
function removePostAdminJs() {
    wp_enqueue_script('admin-galery', plugin_dir_url(__FILE__).'/js/remove-post-attachment.js', false, 1, true);
}

add_filter('admin_head', 'removePostAdminJs');
