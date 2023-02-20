<?php


class Wfm_panel {
    public function __construct()
    {
        $this->load_dependecies();
        $this->define_admin_hooks();
        $this->define_plugin_hooks();
    }

    public function load_dependecies(){
        require_once WFM_PANEL_PLUGIN_DIR . "admin/class-wfmpanel-admin.php";
        require_once WFM_PANEL_PLUGIN_DIR . "public/class-wfmpanel-public.php";
    }

    private function define_admin_hooks(){
        $plugin_admin = new Wfmpanel_Admin();

    }
    private function define_plugin_hooks(){
        $plugin_public = new Wfmpanel_Public();

    }
}