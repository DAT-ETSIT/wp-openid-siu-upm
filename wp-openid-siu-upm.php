<?php

/*
Plugin Name: WP OpenId - SIU UPM
Plugin URI: https://github.com/DAT-ETSIT/wp-openid-siu-upm
Description: SIU UPM authentication for WordPress. Based on nicko170's wp-openid
Version: VERSION
Author: Pablo Fernández López
Author URI: https://github.com/Pablofl01
Text Domain: openid
Domain Path: /languages
Documentation: https://github.com/DAT-ETSIT/wp-openid-siu-upm
*/


// Define the plugin version. This will be replaced by the build script.
const WP_OPENID_VER = 'VERSION';

defined('ABSPATH') or die('');

if (!function_exists('is_plugin_active_for_network')) {
    require_once(ABSPATH . '/wp-admin/includes/plugin.php');
}

require_once __DIR__ . '/OpenID.php';
require_once __DIR__ . '/GithubUpdater.php';

// We only want to run the updater if we are in the admin area.
add_action('admin_init', function () {
    GithubUpdater::make()
        ->repository('DAT-ETSIT/wp-openid-siu-upm')
        ->asset_name('wp-openid-siu-upm.zip')
        ->readme_url('https://raw.githubusercontent.com/DAT-ETSIT/wp-openid-siu-upm/main/README.md')
        ->boot(__FILE__);
});

// Boot the plugin.
OpenID::make()
    ->boot();
