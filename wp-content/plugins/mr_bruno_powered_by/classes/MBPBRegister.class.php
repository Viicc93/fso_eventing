<?php

class MBPBRegister {
  protected static $wpdb;
  protected static $table_name = 'MBPB_sponsors';
  protected static $prefix_table_name;
  protected static $charset_collate;

  public function __construct() {
    register_activation_hook(MBPB_PLUGIN_PATH, array('MBPBRegister', 'activate'));
    register_uninstall_hook(MBPB_PLUGIN_PATH, array('MBPBRegister', 'uninstall'));
  }
  // Set up wpdb variables in this function when properties are protected static
  protected static function setup_wpdb() {
    global $wpdb;
    // Set properties
    MBPBRegister::$wpdb = $wpdb;
    MBPBRegister::$prefix_table_name = MBPBRegister::$wpdb->prefix . MBPBRegister::$table_name;
    MBPBRegister::$charset_collate = MBPBRegister::$wpdb->get_charset_collate();
  }

  // Activate plugin
  public static function activate() {
    // setup_wpdb
    MBPBRegister::setup_wpdb();

    $prefix_table_name = MBPBRegister::$prefix_table_name;
    $charset_collate = MBPBRegister::$charset_collate;

    // Create database table
    $sql = "CREATE TABLE IF NOT EXISTS $prefix_table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        img_id varchar(255),
        link_url varchar(255),
        PRIMARY KEY  (id)
      ) $charset_collate;";
    //DO SQL QUERY
    MBPBRegister::$wpdb->query($sql);
  }


  // Uninstall Plugin
  public static function uninstall() {
    // setup_wpdb
    MBPBRegister::setup_wpdb();
    // drop table prefix_table_name if exsists when uninstall plugin
    $prefix_table_name = MBPBRegister::$prefix_table_name;
    $sql = "DROP TABLE IF EXISTS $prefix_table_name;";
    //DO SQL QUERY
    MBPBRegister::$wpdb->query($sql);
  }
}
