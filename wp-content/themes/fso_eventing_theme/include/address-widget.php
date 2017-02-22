<?php
class FSO_ADDRESS_Widget extends WP_Widget {

  function __construct() {
    parent::__construct( 'FSO_ADDRESS_Widget', __('Address', 'fso-eventing'), array( 'description' => __( 'Address', 'fso-eventing' ), ));
  }

  function form( $instance ) {
    if (isset( $instance[ 'the-name' ])) {
      $the_name = $instance[ 'the-name' ];
    } else {
      $the_name = __(' ', 'fso-eventing');
    }
    if (isset( $instance[ 'street-address' ])) {
      $street_address = $instance[ 'street-address' ];
    } else {
      $street_address = __('Street address 20', 'fso-eventing');
    }
    if (isset( $instance[ 'postal-code' ])) {
      $postal_code = $instance[ 'postal-code' ];
    } else {
      $postal_code = __('XXXX', 'fso-eventing');
    }
    if (isset( $instance[ 'locality' ])) {
      $locality = $instance[ 'locality' ];
    } else {
      $locality = __('Berlin', 'fso-eventing');
    }
    if (isset( $instance[ 'country' ])) {
      $country = $instance[ 'country' ];
    } else {
      $country = __('Germany', 'fso-eventing');
    }

      ?>
        <p>
          <label for="<?php echo $this->get_field_id( 'the-name' ); ?>"><?php _e( 'Name:' ); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'the-name' ); ?>" name="<?php echo $this->get_field_name( 'the-name' ); ?>" type="text" value="<?php echo esc_attr( $the_name ); ?>" />

          <label for="<?php echo $this->get_field_id( 'street-address' ); ?>"><?php _e( 'Street Address:' ); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'street-address' ); ?>" name="<?php echo $this->get_field_name( 'street-address' ); ?>" type="text" value="<?php echo esc_attr( $street_address ); ?>" />

          <label for="<?php echo $this->get_field_id( 'postal-code' ); ?>"><?php _e( 'Postal Code:' ); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'postal-code' ); ?>" name="<?php echo $this->get_field_name( 'postal-code' ); ?>" type="text" value="<?php echo esc_attr( $postal_code ); ?>" />

          <label for="<?php echo $this->get_field_id( 'locality' ); ?>"><?php _e( 'City:' ); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'locality' ); ?>" name="<?php echo $this->get_field_name( 'locality' ); ?>" type="text" value="<?php echo esc_attr( $locality ); ?>" />

          <label for="<?php echo $this->get_field_id( 'country' ); ?>"><?php _e( 'Country:' ); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'country' ); ?>" name="<?php echo $this->get_field_name( 'country' ); ?>" type="text" value="<?php echo esc_attr( $country ); ?>" />
        </p>

      <?php
  }

  function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['the-name'] = ( ! empty( $new_instance['the-name'] ) ) ? strip_tags( $new_instance['the-name'] ) : '';
    $instance['street-address'] = ( ! empty( $new_instance['street-address'] ) ) ? strip_tags( $new_instance['street-address'] ) : '';
    $instance['postal-code'] = ( ! empty( $new_instance['postal-code'] ) ) ? strip_tags( $new_instance['postal-code'] ) : '';
    $instance['locality'] = ( ! empty( $new_instance['locality'] ) ) ? strip_tags( $new_instance['locality'] ) : '';
    $instance['country'] = ( ! empty( $new_instance['country'] ) ) ? strip_tags( $new_instance['country'] ) : '';

    return $instance;
  }

  function widget( $args, $instance ) {
    extract( $args );
    $the_name = $instance['the-name'];
    $street_address = $instance['street-address'];
    $postal_code = $instance['postal-code'];
    $locality = $instance['locality'];
    $country = $instance['country'];

    echo $args['before_widget'];
    ?>
      <div class="fso-address">
        <h2 class="widget-title"><?php _e('Address','fso-eventing' ); ?></h2>
          <p class="h-card">
            <span class="p-name"><?php echo $the_name; ?></span>
            <span class="p-street-address"><?php echo $street_address; ?></span>
            <span class="p-locality"><?php echo $postal_code . ' ' . $locality; ?></span>
            <span class="p-country-name"><?php echo _e($country, 'fso-eventing'); ?></span>
          </p>
      </div>
    <?php
    echo $args['after_widget'];
  }

}

function mrb_address_widget() {
  register_widget( 'FSO_ADDRESS_Widget' );

}
add_action( 'widgets_init', 'mrb_address_widget' );

?>
