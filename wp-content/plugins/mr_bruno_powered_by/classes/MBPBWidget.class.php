<?php

class MBPBWidget extends WP_Widget {

  protected static $wpdb;
  protected static $table_name = 'MBPB_sponsors';
  protected static $prefix_table_name;

  function __construct (){
    // Create a new widget with WP_widget class
    parent::__construct( 'MBPBWidget', __('Powered By', 'mbpb'), array( 'description' => __( 'List of your sponsors', 'mbpb' ), ));
  }

  // override form function with my form
  function form( $instance ) {

    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'Powered By', 'mbpb' );
    }

    if ( isset( $instance[ 'text' ] ) ) {
      $text = $instance[ 'text' ];
    }
    else {
      $text = ' ';
    }
      // Input form title and description?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

        <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Description:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" value="<?php echo esc_attr( $text ); ?>"><?php echo esc_attr( $text ); ?></textarea>
      </p>
    <?php

  }

  // override update function with my title and text
  function update( $new_instance, $old_instance ) {
    // update title and text
    $instance = $old_instance;
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';

    return $instance;
  }

  // this is the widget function to render my widget on the page
  function widget( $args, $instance ) {

    extract( $args );
    MBPBWidget::setup_wpdb();

    $table_name = MBPBWidget::$prefix_table_name;
    $result = MBPBWidget::$wpdb->get_results ( "SELECT * FROM  $table_name " );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $i = 1; // to create ids

    echo '<div class="mbpb-powered-by"><h2 class="widget-title">'.$title.'</h2>';
      foreach ( $result as $prop )  {
        $img = wp_get_attachment_image_src( $prop->img_id, 'small' );
        $url = urldecode($prop->link_url);
        $name = $prop->name;

        echo '<div id="sid_'.$i.'" class="mbpb-content h-card">';
        echo '<a href="'.$url.'" target="_blank"><img class="mbpb-logo u-logo" src="'.$img[0].'" alt="'.$name.'"></a>';
        echo '</div>';
        $i++;
      }
    echo '</div>';
  }

  // Set up wpdb variables in this function when properties are protected static
  protected static function setup_wpdb() {
    global $wpdb;
    MBPBWidget::$wpdb = $wpdb;
    MBPBWidget::$prefix_table_name = MBPBWidget::$wpdb->prefix . MBPBWidget::$table_name;
  }

}

// widget_init action and function to register my widget
function mbpb_widget() {
  register_widget( 'MBPBWidget' );
}
add_action( 'widgets_init', 'mbpb_widget' );
