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

    public function insert_item() {

        $name     = sanitize_text_field($_POST['item_name']);
        $position = sanitize_text_field($_POST['item_position']);

        $db_manager = new SW_DB_Manager();

        $data = [
            'name'         => $name ,
            'position'     => $position,
            'date_created' => date('Y-m-d H:i:s')
        ];

        $inserted = $db_manager->insert_data('sw_items', $data);

        if ( $inserted )
        {
            echo wp_json_encode([
              'status' => true,
              'msg'    => 'Data added!',
            ]);
        }
        else {
            echo wp_json_encode([
                'status' => false,
                'msg'    => 'Something went wrong. Try again later.',
            ]);
        }
        exit;
    }


    public function update_item() {

        $position = filter_var_array($_POST['position']);

        $db_manager = new SW_DB_Manager();

        if ( is_array($position) ) 
        {
            foreach($position as $key => $value) 
            {
               $item = explode('_', $value);
               $item_id = $item[1];
               $db_manager->update_data('sw_items',['position' => $key+1], ['id' => $item_id]);
            }
    
            echo wp_json_encode([
                'status' => true,
                'msg'    => 'Data updated!',
            ]);
        }
        else {
            echo wp_json_encode([
                'status' => false,
                'msg'    => 'Something went wrong.',
            ]);  
        }
        exit;
    }

    public function delete_item() {

        $item_id = sanitize_text_field($_POST['item_id']);

        $db_manager = new SW_DB_Manager();

        $db_manager->delete_data('sw_items', ['id' => $item_id]);
        
        echo wp_json_encode([
            'status' => true,
            'msg'    => 'Data deleted!',
        ]);
        exit;
    }
 




}