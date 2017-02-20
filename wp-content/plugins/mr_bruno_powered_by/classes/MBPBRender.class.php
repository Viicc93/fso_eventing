<?php
class MBPBRender {
  private $ajax;
  function __construct(){
    // so we can use methods fom ajax class
    $this->ajax = new MBPBAjax;
    // add shortcode [mb_powered_by] and call mbpb_render_shortcode function when used
    add_shortcode('mb_powered_by', array($this, 'mbpb_render_shortcode'));
  }

  // shortcode function what will happen when short code is used
  function mbpb_render_shortcode(){
    $all_sponsors = $this->ajax->mbpb_get_from_database();

    foreach($all_sponsors as $sponsor) {

         // List all sponsors ?>
         <div class="mbpb-row">
           <img class="mbpb-row-img" src="<?php echo $sponsor['img'][0]; ?>" />
           <h2 class="mbpb-row-title"><?php  echo $sponsor['name']; ?></h2><a class="mbpb-row-link" url="<?php echo $sponsor['url']; ?>" target="_blank"><?php echo $sponsor['url']; ?></a>
         </div>
         <?php
     }
  }
}
