<?php


class Wfmpanel_Admin
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts_styles'));
        add_action('admin_menu', array($this, 'admin_menu'));
        add_action('admin_post_save_slide', array($this, 'save_slide'));    // save information from ui form
    }

    public static function debug($data)
    {
        echo "<pre>" . print_r($data, 1) . "</pre>";
    }

    public function save_slide()
    {
        global $wpdb;
        if (!isset($_POST['wfmpanel_add_slide']) || !wp_verify_nonce(
                $_POST['wfmpanel_add_slide'], 'wfmpanel_action'
            )) {
            wp_die('Error!', 'wfmpanel');
        }

        $slide_title = isset($_POST['slide-title']) ? trim($_POST['slide-title']) : '';
        $slide_content = isset($_POST['slide_content']) ? trim($_POST['slide_content']) : '';
        $slide_id = isset($_POST['slide_id']) ? (int) $_POST['slide_id'] : 0;

        if ($slide_id){
            $query = "UPDATE wfm_panel SET title= %s, content=%s WHERE id = $slide_id";
        }else{
            $query = "INSERT INTO wfm_panel (title, content) VALUES (%s, %s)";
        }


        if (empty($slide_title) || empty($slide_content)) {
            set_transient('wfmpanel_form_error', __('Form fields are requiered', 'wfmpanel'), 30);
        } else {
            $slide_content = wp_unslash($slide_content);
            $slide_title = wp_unslash($slide_title);

            if ( false !== $wpdb->query($wpdb->prepare(
                $query, $slide_title, $slide_content
            ))) {
                set_transient('wfmpanel_form_success', __('Slide saved', 'wfmpanel'), 30);
            } else {
                set_transient('wfmpanel_form_error', __('Error saving slide', 'wfmpanel'), 30);

            }
        }

        wp_redirect($_POST['_wp_http_referer']);

    }

    public static function get_slides($all = false){
        global $wpdb;
        if ($all){
            return $wpdb->get_results("SELECT * FROM wfm_panel ORDER BY title ASC", ARRAY_A);
        }
        $slides = $wpdb->get_results("SELECT id,title FROM wfm_panel ORDER BY title ASC", ARRAY_A);
        return $slides;
    }


    public function enqueue_scripts_styles()
    {
        wp_enqueue_style("wfmpanel-jquery-ui", WFM_PANEL_PLUGIN_URL . 'admin/assets/jquery-ui-1.13.2.custom/jquery-ui.css');
        wp_enqueue_style("wfmpanel", WFM_PANEL_PLUGIN_URL . 'admin/css/wfmpanel-admin.css');
        wp_enqueue_script("wfmpanel", WFM_PANEL_PLUGIN_URL . 'admin/js/wfmpanel-admin.js', array('jquery', 'wfmpanel-jquery-ui'));
        wp_register_script("wfmpanel-jquery-ui", WFM_PANEL_PLUGIN_URL . 'admin/assets/jquery-ui-1.13.2.custom/jquery-ui.js');

    }

    public function admin_menu()
    {
        add_menu_page(__('WFM Panel Main', 'wfmpanel'), __('WFM Panel', 'wfmpanel'), 'manage_options', 'wfmpanel-main', array($this, 'render_main_page'), 'dashicons-images-alt2');
        add_submenu_page('wfmpanel-main', __('WFM Panel Main', 'wfmpanel'), __('Slide settings', 'wfmpanel'), 'manage_options', "wfmpanel-main");
        add_submenu_page('wfmpanel-main', __('Slides management', 'wfmpanel'), __('Slides management ', 'wfmpanel'), 'manage_options', "wfmpanel-slides", array($this, 'render_slides_pages'));
    }

    public function render_main_page()
    {
        require_once WFM_PANEL_PLUGIN_DIR . '/admin/templates/main-page-template.php';
    }

    public function render_slides_pages()
    {
        require_once WFM_PANEL_PLUGIN_DIR . '/admin/templates/slides-page-template.php';

    }

    public static function get_posts($cnt = 10)
    {
        return new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $cnt,
            'orderby' => 'ID',
            'order' => 'DESC',
            'paged' => $_GET['paged'] ?? 1,
        ));
    }


}