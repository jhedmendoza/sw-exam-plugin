<?php
if (!defined( 'ABSPATH' ) ) {
    exit;
}

class SW_Items {

    public function __construct() {
        add_shortcode('mylistdemo', array($this, 'item_list'));
    }  

    public function item_list($attr) {
        $sort = isset($attr['sort']) && !empty($attr['sort']) ? filter_var($attr['sort'], FILTER_SANITIZE_STRING) : 'ASC';
        
        $db_manager = new SW_DB_Manager();
        $items = $db_manager->get_data('sw_items', 'position '.$sort);

        foreach ($items as $item) 
            $list.=$item->name.'<br />';
        
        return $list;
    }
}
