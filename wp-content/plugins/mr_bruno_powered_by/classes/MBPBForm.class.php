<?php
class MBPBForm {
  private $ajax;

  public function __construct(){
    // so we can use methods fom ajax class
    $this->ajax = new MBPBAjax;
    // Add admin page for plugin
    add_action('admin_menu', array(&$this, 'mbpb_menu_page'));
    // Enqueue admin scripts and css
    add_action('admin_enqueue_scripts', array(&$this, 'mbpb_enqueue_admin_scripts'));
    // Enqueue scripts and css
    add_action('wp_enqueue_scripts', array(&$this, 'mbpb_enqueue_scripts') );
    // add script for media uploader to admin footer
    add_action( 'admin_footer',array(&$this, 'media_selector_print_scripts') );
  }


  // Add a page to admin menu add call mbpb_plugin_page function
  public function mbpb_menu_page() {
    add_menu_page('Powered By', 'Powered By', 'edit_theme_options', 'powered_by', array($this, 'mbpb_plugin_page'), 'dashicons-star-filled');

  }
  // Set up admin page
  public function mbpb_plugin_page () {
    // if form submit, insert to database
    if(isset($_POST['submit_mbpb'])){
      $this->ajax->mbpb_save_in_database();
    }
    // if action delete, delete sponsor
    if(isset($_GET['action']) == 'delete' && isset($_GET['id'])) {
      $this->ajax->delete_sponsor($_GET['id']);
    }
    // render upload form
    $this->mbpb_upload_form();
    $this->mbpb_list_sponsors();
  }

  // Upload form on admin page
  public function mbpb_upload_form() {

    $image_id = get_option( 'media_selector_attachment_id');
    $company_name = get_option('company_name');
    $website_url = get_option('website_url');

    if ( isset( $_POST['submit_image_selector'] ) && isset( $_POST['image_attachment_id'] ) ) :
      update_option( 'media_selector_attachment_id', absint( $_POST['image_attachment_id'] ) );

    endif;

    wp_enqueue_media(); // wait for requirements for media uploader
    ?>
    <!-- Upload form -->
    <form class="mbpb-input-form" method="post" action="#">
      <h1 class="mbpb-form-title">Powered By <span class="dashicons-before dashicons-star-filled"></span></h1>
      <p class="mbpb-input-title">Company Name</p>
      <input type="text" name="company_name" class="mbpb-input company-name" value="<?php echo $company_name; ?>" id="company_name"><br>
      <p class="mbpb-input-title">Website URL</p>
      <input type="text" name="website_url" class="mbpb-input website-url" value="<?php echo $website_url; ?>" id="website_url"><br>
      <p class="mbpb-input-title">Upload Logo</p>
      <div class="mbpb-img-input">
        <div class='image-preview-wrapper'>
          <img id='image-preview' src='' width='100' height='100' style='max-height: 100px; width: 100px;'>
        </div>
        <input id="upload_image_button" type="button" class="mbpb-button button" value="<?php _e( 'Upload image' ); ?>" />
        <input type='hidden' name='image_attachment_id' id='image_attachment_id' value='<?php echo $image_id;?>'>
      </div>
      <br/>
      <input type="submit" name="submit_mbpb" class="save_path  mbpb-button" id="submit_button" value="Save Setting">
    </form>

    <?php

  }

  public function mbpb_list_sponsors() {
    $all_sponsors = $this->ajax->mbpb_get_from_database();

    foreach($all_sponsors as $sponsor) {

         // List all sponsors ?>
         <div class="mbpb-row">
           <img class="mbpb-row-img" src="<?php echo $sponsor['img'][0]; ?>" />
           <h2 class="mbpb-row-title"><?php  echo $sponsor['name']; ?></h2><a class="mbpb-row-link" url="<?php echo $sponsor['url']; ?>" target="_blank"><?php echo $sponsor['url']; ?></a>
           <a class="mbpb-row-button" href="admin.php?page=powered_by&id=<?php  echo $sponsor['id']; ?>&action=delete">Löschen</a>
         </div>
         <?php
     }
  }
  // Enqueue admin scripts and css
  public function mbpb_enqueue_admin_scripts() {
    wp_enqueue_style('mbpb_admin_style', plugins_url('../css/admin_style.css', __FILE__));
  }

  // Enqueue scripts and css
  function mbpb_enqueue_scripts() {
    wp_enqueue_script('mbpb_script', plugins_url('../js/mbpbscript.js', __FILE__), array('jquery'));
    wp_enqueue_style('mbpb_style', plugins_url('../css/style.css', __FILE__));
  }

  // Add javascript for media uploader
  function media_selector_print_scripts() {

  	$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );

  	?><script id="" type='text/javascript'>

  		jQuery( document ).ready( function( $ ) {

  			// Uploading files
  			var file_frame;
  		//	var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
  			var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this

  			jQuery('#upload_image_button').on('click', function( event ){

  				event.preventDefault();

  				// If the media frame already exists, reopen it.
  				if ( file_frame ) {
  					// Set the post ID to what we want
  					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
  					// Open frame
  					file_frame.open();
  					return;
  				} else {
  					// Set the wp.media post id so the uploader grabs the ID we want when initialised
  					wp.media.model.settings.post.id = set_to_post_id;
  				}

  				// Create the media frame.
  				file_frame = wp.media.frames.file_frame = wp.media({
  					title: 'Select a image to upload',
  					button: {
  						text: 'Use this image',
  					},
  					multiple: false	// Set to true to allow multiple files to be selected
  				});

  				// When an image is selected, run a callback.
  				file_frame.on( 'select', function() {
  					// We set multiple to false so only get one image from the uploader
  					attachment = file_frame.state().get('selection').first().toJSON();

  					// Do something with attachment.id and/or attachment.url here
  					$( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
  					$( '#image_attachment_id' ).val( attachment.id );

  					// Restore the main post ID
  				//	wp.media.model.settings.post.id = wp_media_post_id;
  				});

  					// Finally, open the modal
  					file_frame.open();
  			});

  			// Restore the main ID when the add media button is pressed
  			jQuery( 'a.add_media' ).on( 'click', function() {
  			//	wp.media.model.settings.post.id = wp_media_post_id;
  			});
  		});

  	</script><?php

  }
}
