<?php
/*Plugin Name: Mr. Bruno Bowered By
Description: List your sponsors with images and links to thier websites.
Version: 0.1
Author: Mr. Bruno
Author URI: http://victoria-johansson.com/
*/

define('MBPB_PLUGIN_PATH', __FILE__);
define('MBPB_PLUGIN_DIR_PATH', __DIR__);

// Load classes
$classes = array(
  'MBPBRegister',
  'MBPBForm'
);

foreach($classes as $class) {
  include_once(MBPB_PLUGIN_DIR_PATH . '/classes/'.$class.'.class.php');
  new $class();
}
