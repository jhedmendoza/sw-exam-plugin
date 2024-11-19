<?php

if (!defined( 'ABSPATH' ) ) {
    exit;
}

class SW_DB_Manager {

    public function create_items_table() 
    {
        global $wpdb;

        $table_items     = $wpdb->prefix . 'sw_items';
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql[] = "CREATE TABLE $table_items (
            id INT (11) AUTO_INCREMENT,
            name VARCHAR(70),
            position INT(3),
            date_created DATETIME,
            date_modified DATETIME ,
            PRIMARY KEY (id)
        ) $charset_collate";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public function insert_data($table_name, $data) { 
		global $wpdb;

		$id = $wpdb->insert($wpdb->prefix.$table_name, $data);

		if ($id)
			return $wpdb->insert_id;
		else
			return 0;
    }

    public function delete_data($table_name, $where) {
        global $wpdb;
        return $wpdb->delete($wpdb->prefix.$table_name, $where);
    }

    public function get_data($table_name, $order_by='') 
    {
        global $wpdb;
        $table = $wpdb->prefix.$table_name;
        $query = "SELECT * FROM $table";
        
        if ( !empty($order_by) )
            $query .= ' ORDER BY '.$order_by; 

        $result = $wpdb->get_results($query);
        return $result;
    }

    public function update_data($table_name, $data, $where) {
        global $wpdb;

		$update = $wpdb->update($wpdb->prefix.$table_name, $data, $where);

		if ($update > 0) {
		    return true;
		}
		else if ($update === false) {
			return false;
		}
    } 
   
}

