<?php
if (!defined( 'ABSPATH' ) ) {
    exit;
}

class SW_Admin_Page {

    public function __construct() {
        add_action('admin_menu', [$this, 'add_page']);

        add_action('wp_ajax_delete_item', [$this, 'delete_item']);
        add_action('wp_ajax_update_item', [$this, 'update_item']);
        add_action('wp_ajax_insert_item', [$this, 'insert_item']);

        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
    }  

    public function add_page() {
        add_menu_page(
            $this->get_page_title(),    
            $this->get_menu_title(),    
            $this->get_capability(),    
            $this->get_slug(),         
            [$this,'render'],  
            'dashicons-admin-generic',
            $this->get_position()     
        );
    }

    public function render() {
        $db_manager = new SW_DB_Manager();
        $items = $db_manager->get_data('sw_items', 'position ASC');

        $result = [
            'title' => $this->get_page_title(),
            'items' => $items,
        ];

        include_once(WP_PLUGIN_DIR.'/sw-exam-plugin/includes/Admin/Template/list.php');
    }

    public function enqueue_admin_assets() 
    {
        $version = '1.1';

        wp_enqueue_style('bootstrap-admin', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], '5.3.3');
        wp_enqueue_style('sw-custom', plugins_url().'/sw-exam-plugin/includes/Admin/Assets/css/custom.css', [], $version);

        wp_enqueue_script('popper','https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', [], '5.3.3', true );
        wp_enqueue_script('bootstrap-admin','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['popper'], '5.3.3', true );
        wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.7.1.min.js', [], '3.7.1', true );
        wp_enqueue_script('jquery-ui','https://code.jquery.com/ui/1.14.1/jquery-ui.min.js', ['jquery'], '1.14.1', true );
        wp_enqueue_script('jquery-validate','https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js', ['jquery'], '1.19.5', true );

        wp_enqueue_script('sw-custom', plugins_url().'/sw-exam-plugin/includes/Admin/Assets/js/custom.js', [], $version, true );
    }

    public function get_page_title() {}
    public function get_menu_title() {}
    public function get_capability() {}
    public function get_slug() {}
    public function get_position() {}

    public function insert_item() {}
    public function update_item() {}
    public function delete_item() {}

}
