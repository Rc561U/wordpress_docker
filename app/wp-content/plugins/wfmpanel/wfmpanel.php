<?php
/**
 * Plugin Name:       WFM Post Panel test
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wfmpanel
 */

defined('ABSPATH') or die;
define('WFM_PANEL_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WFM_PANEL_PLUGIN_URL', plugin_dir_url(__FILE__));

function wfmpanel_activate() {
    require_once WFM_PANEL_PLUGIN_DIR . 'includes/class-wfmpanel-activate.php';
    Wfmpanel_Activate::activate();
}
register_activation_hook( __FILE__, 'wfmpanel_activate' );

require_once WFM_PANEL_PLUGIN_DIR . "includes/class-wfmpannel.php";

function run_wfmpanel(){
    $plugin = new Wfm_panel();
}
run_wfmpanel();