<?php

class MBPBAjax {
  protected static $wpdb;
  protected static $table_name = 'MBPB_sponsors';
  protected static $prefix_table_name;

  public function __construct(){ }

  // Set up wpdb variables in this function when properties are protected static
  protected static function setup_wpdb() {
    global $wpdb;
    MBPBAjax::$wpdb = $wpdb;
    MBPBAjax::$prefix_table_name = MBPBAjax::$wpdb->prefix . MBPBAjax::$table_name;
  }

  // Insert into databse
  public function mbpb_save_in_database(){
    MBPBAjax::setup_wpdb();

    $table_name = MBPBAjax::$prefix_table_name;

      $image_id = $_POST['image_attachment_id'];
      $company_name = $_POST['company_name'];
      $website_url = $_POST['website_url'];

      //encode url before insert to database
      $website_url = urlencode($website_url);
      // mySql Query
      $sql = "INSERT INTO {$table_name} ( name, img_id, link_url ) VALUES ( '".$company_name."', '".$image_id."', '".$website_url."' )";
      MBPBAjax::$wpdb->query($sql);
  }

  // Get from database and render all sponsors on admin page with a delete action.
  public function mbpb_get_from_database() {
    MBPBAjax::setup_wpdb();

    $table_name = MBPBAjax::$prefix_table_name;
    // Get all sponsors from the databse
    $result = MBPBAjax::$wpdb->get_results ( "SELECT * FROM  $table_name " );

    $all_sponsors = array();

    foreach ( $result as $prop )  {
      $id = $prop->id;
      $name = $prop->name;
      $img = wp_get_attachment_image_src( $prop->img_id, 'small');
      $url = urldecode($prop->link_url);

      $sponsor = array( 'id' => $id, 'name' => $name, 'img' => $img, 'url' => $url );

      array_push($all_sponsors, $sponsor);
    }

    //var_dump($all_sponsors);die;
    return $all_sponsors;
  }
}
