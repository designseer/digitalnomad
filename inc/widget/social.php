<?php 

class Digitalnomad_Premium extends WP_Widget{

    /**
     * Register widget with WordPress.
     */
    function __construct() 
    {
        parent::__construct(
            'social', // Base ID
            esc_attr__( 'Digitalnomad-Sidebar social widget', 'digitalnomad' ), // Name
            array( 
                'description' => esc_attr__( 'Display a Premium or Feature description.', 'digitalnomad' ),
				 'customize_selective_refresh' => true, // 1 Selective Refresh
            )
        );
		// 2 Enqueue style if widget is active (appears in a sidebar) or if in Customizer preview.
        if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) 
		{
			function Digitalnomad_Premium_widget_scripts()
			{
				wp_enqueue_media();
				wp_enqueue_script( 'Digitalnomad_Premium_widget_scripts', get_template_directory_uri() . '/assets/js/widget.js', false, '1.0', true );
			}
			add_action('admin_enqueue_scripts', 'Digitalnomad_Premium_widget_scripts');
        }
    }

    /* *front-end widget form.
    front page view */
    public function widget( $args, $instance )
	{
		echo $args['before_widget'];

		?>
		
              <?php if( !empty( $instance['facebook_url'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['facebook_url'] ) ): echo apply_filters( 'widget_title', $instance['facebook_url'] ); endif; ?>" title="facebook"><i class="fa fa-facebook"></i></a></li>
              <?php }?>
			  
               <?php if( !empty( $instance['twitter_url'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['twitter_url'] ) ): echo apply_filters( 'widget_title', $instance['twitter_url'] ); endif; ?>" title="twitter"><i class="fa  fa-twitter"></i></a></li>
               <?php }?>
			   
              <?php if( !empty( $instance['google_url'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['google_url'] ) ): echo apply_filters( 'widget_title', $instance['google_url'] ); endif; ?>" title="google-plus"><i class="fa  fa-google-plus"></i></a> </li>
              <?php }?>
              
               <?php if( !empty( $instance['rss'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['rss'] ) ): echo apply_filters( 'widget_title', $instance['rss'] ); endif; ?>" title="rss"><i class="fa fa-rss"></i></a> </li>
              <?php }?>
              
              
                <?php if( !empty( $instance['dribbble'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['dribbble'] ) ): echo apply_filters( 'widget_title', $instance['dribbble'] ); endif; ?>" title="dribbble"><i class="fa fa-dribbble"></i></a> </li>
              <?php }?>
              
               <?php if( !empty( $instance['behance'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['behance'] ) ): echo apply_filters( 'widget_title', $instance['behance'] ); endif; ?>" title="behance"><i class="fa fa-behance"></i></a> </li>
              <?php }?>
              
               <?php if( !empty( $instance['youtube'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['youtube'] ) ): echo apply_filters( 'widget_title', $instance['youtube'] ); endif; ?>" title="youtube"><i class="fa fa-youtube"></i></a> </li>
              <?php }?>
              
              <?php if( !empty( $instance['inst_title'] ) ){?>
            <li ><a href="<?php if( !empty( $instance['inst_title'] ) ): echo apply_filters( 'widget_title', $instance['inst_title'] ); endif; ?>" title="instagram"><i class="fa  fa-instagram"></i></a>

                <?php 
                    if( !empty($instance['text']) ):
                        echo '<p>';
                            $wp_kses_args = array(
                                'br' => array(),
                                'em' => array(),
                                'strong' => array(),
                            );
                            echo htmlspecialchars_decode( wp_kses( apply_filters( 'widget_title', $instance['text'] ), $wp_kses_args ) );
                        echo '</p>';
                    endif;
                ?>  
            </li>
          
            <?php }?>
            
		
        <?php echo $args['after_widget'];

    }
    
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) 
	{
		?>
        <p>
			<label for="<?php echo $this->get_field_id('social_title'); ?>"><?php esc_html_e( 'Social Title', 'digitalnomad' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('social_title'); ?>"
                   id="<?php echo $this->get_field_id('social_title'); ?>" value="<?php if( !empty( $instance['social_title'] ) ): echo $instance['social_title']; endif; ?>"
                   class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php esc_html_e( 'Facebook Url', 'digitalnomad' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('facebook_url'); ?>"
                   id="<?php echo $this->get_field_id('facebook_url'); ?>" value="<?php if( !empty( $instance['facebook_url'] ) ): echo $instance['facebook_url']; endif; ?>"
                   class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php esc_html_e( 'Twitter Url', 'digitalnomad' ); ?></label><br/>

            <input type="text" name="<?php echo $this->get_field_name('twitter_url'); ?>"
                   id="<?php echo $this->get_field_id('twitter_url'); ?>" value="<?php if( !empty( $instance['twitter_url'] ) ): echo $instance['twitter_url']; endif; ?>"
                   class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('google_url'); ?>"><?php esc_html_e( 'Google Url', 'digitalnomad' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('google_url'); ?>"
                   id="<?php echo $this->get_field_id('google_url'); ?>" value="<?php if( !empty( $instance['google_url'] ) ): echo $instance['google_url']; endif; ?>"
                   class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('rss'); ?>"><?php esc_html_e( 'Rss Url', 'digitalnomad' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('rss'); ?>"
                   id="<?php echo $this->get_field_id('rss'); ?>" value="<?php if( !empty( $instance['rss'] ) ): echo $instance['rss']; endif; ?>"
                   class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('inst_title'); ?>"><?php esc_html_e( 'Instagram Title', 'digitalnomad' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('inst_title'); ?>"
                   id="<?php echo $this->get_field_id('inst_title'); ?>" value="<?php if( !empty( $instance['inst_title'] ) ): echo $instance['inst_title']; endif; ?>"
                   class="widefat"/>
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php esc_html_e( 'Dribbble Url', 'digitalnomad' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('dribbble'); ?>"
                   id="<?php echo $this->get_field_id('dribbble'); ?>" value="<?php if( !empty( $instance['dribbble'] ) ): echo $instance['dribbble']; endif; ?>"
                   class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('behance'); ?>"><?php esc_html_e( 'Behance Url', 'digitalnomad' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('behance'); ?>"
                   id="<?php echo $this->get_field_id('behance'); ?>" value="<?php if( !empty( $instance['behance'] ) ): echo $instance['behance']; endif; ?>"
                   class="widefat"/>

        </p>      
        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php esc_html_e( 'Youtube Url', 'digitalnomad' ); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('youtube'); ?>"
                   id="<?php echo $this->get_field_id('youtube'); ?>" value="<?php if( !empty( $instance['youtube'] ) ): echo $instance['youtube']; endif; ?>"
                   class="widefat"/>
        </p>
		<?php
    }
}
register_widget( 'Digitalnomad_Premium' );
?>