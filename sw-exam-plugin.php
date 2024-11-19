<?php
/*
Plugin Name: Shakewell Agency Exam Plugin
Description: WordPress List Plugin
Version: 1.0
Author: Jhed Mendoza
Author URI: https://jhedmendoza.is-a.dev/
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class SW_Exam_Plugin {

    public function __construct() {
        $this->require_files();
        add_action('plugins_loaded', [$this, 'init']);
    }
       
    private function require_files() {
        require_once __DIR__ . '/includes/DB/SW_DB_Manager.php';
        require_once __DIR__ . '/includes/Admin/Pages/SW_Admin_Page.php';
        require_once __DIR__ . '/includes/Admin/Pages/SW_Admin_Settings_Page.php';
    }
    public function init() {

        $db_manager = new SW_DB_Manager();
        $db_manager->create_items_table();

        $admin_settings_page = new SW_Admin_Settings_Page();
    }
   
}
new SW_Exam_Plugin();
