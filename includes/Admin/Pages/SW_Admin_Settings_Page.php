<?php

if (!defined( 'ABSPATH' ) ) {
    exit;
}

class SW_Admin_Settings_Page extends SW_Admin_Page {

    
    public function get_icon_url() {
        return 'dashicons-shield-alt';
    }
    public function get_slug() {
        return 'sw_admin_item_settings';
    }

    public function get_capability() {
        return 'manage_options';
    }

    public function get_page_title() {
        return 'SW Admin Settings';
    }

    public function get_menu_title() {
        return 'SW Admin Settings';
    }




}