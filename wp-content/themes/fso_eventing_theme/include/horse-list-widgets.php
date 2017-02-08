<?php
class FSO_SHL_Widget extends WP_Widget {

  function __construct() {
    parent::__construct( 'FSO_SHL_Widget', __('List Sale Horses', 'fso-eventing'), array( 'description' => __( 'Show list of horses for sale.', 'fso-eventing' ), ));
  }

  function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'Horses for Sale', 'fso-eventing' );
    }
    ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
      </p>
    <?php
  }

  function update( $new_instance, $old_instance ) {
    // update title
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
  }

  function widget( $args, $instance ) {
    $salesHorses = array ( 'post_type' =>'fso-horses',
                          'meta_query' => array(
                                array(
                                  'key'     => 'category',
                                  'value'   => 'sale',
                                  'compare' => 'IN',
                                  ), ));

    $sales_horses = new WP_Query($salesHorses);

    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    ?>
      <div class="all-horses">
        <ul class="wiget_area">
          <li class="c wiget widget_archive">
            <h2 class="widget-title"><?php echo $title; ?></h2>
            <?php	while ( $sales_horses->have_posts() ) : $sales_horses->the_post(); ?>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
            <?php endwhile;  ?>
          </li>
        </ul>
      </div>
    <?php
  }

}

function mrb_shl_widget() {

  register_widget( 'FSO_SHL_Widget' );

}
add_action( 'widgets_init', 'mrb_shl_widget' );

?>

<?php
class FSO_OHL_Widget extends WP_Widget {

  function __construct() {
    parent::__construct( 'FSO_OHL_Widget', __('List Our Horses', 'fso-eventing'), array( 'description' => __( 'Show list of our horses.', 'fso-eventing' ), ));
  }

  function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'Our Horses', 'fso-eventing' );
    }
    ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
      </p>
    <?php
  }

  function update( $new_instance, $old_instance ) {
    // update title
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
  }

  function widget( $args, $instance ) {
    $ourHorses = array ( 'post_type' =>'fso-horses',
                          'meta_query' => array(
                                array(
                                  'key'     => 'category',
                                  'value'   => 'our',
                                  'compare' => 'IN',
                                  ), ));

    $our_horses = new WP_Query($ourHorses);

    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );

    ?>
      <div class="all-horses">
        <ul class="wiget_area">
          <li class="c wiget widget_archive">
            <h2 class="widget-title"><?php echo $title ?></h2>
            <?php	while ( $our_horses->have_posts() ) : $our_horses->the_post(); ?>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
            <?php endwhile;  ?>
          </li>
        </ul>
      </div>
    <?php
  }

}

function mrb_ohl_widget() {

  register_widget( 'FSO_OHL_Widget' );

}
add_action( 'widgets_init', 'mrb_ohl_widget' );

?>
