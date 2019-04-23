<?php
  namespace Elementor;

  class TestimonialWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_testimonial';
    }//end function

    public function get_title() {
      return __( 'Reveal Testimonials', 'reveal' );
    }//end functionget_titlepublic function get_title() 

    public function get_icon() {
      return 'fa fa-server';
    }//end function get_icon

    public function get_categories() {
      return [ 'basic' ];
    }//end function get_categories

    //Register input fields
    protected function _register_controls(){
      //Name of the content section
      $this->start_controls_section(
        'testimonial',
        array(
          'label' => __('Testimonials', 'reveal'),
          'tab'   => Controls_Manager::TAB_CONTENT
        )
      );

      //Reapeater
      $repeater = new Repeater();

      $repeater->add_control(
        'image', [
          'label' => __( 'Image', 'reveal' ),
          'type' => Controls_Manager::MEDIA,
          'label_block' => true,
        ]
      );

      $repeater->add_control(
        'name', [
          'label' => __( 'Name', 'reveal' ),
          'type' => Controls_Manager::TEXT,
          'show_label' => true,
        ]
      );

      $repeater->add_control(
        'designation', [
          'label' => __( 'Designation', 'reveal' ),
          'type' => Controls_Manager::TEXT,
          'show_label' => true,
        ]
      );

      $repeater->add_control(
        'text', [
          'label' => __( 'Text', 'reveal' ),
          'type' => Controls_Manager::TEXTAREA,
          'show_label' => true,
        ]
      );

      $this->add_control(
        'list',
        [
          'label' => __( 'Testimonial Content', 'reveal' ),
          'type' => Controls_Manager::REPEATER,
          'fields' => $repeater->get_controls()
        ]
      );




      $this->end_controls_section(); //end of field creation

      //Section for style sheet
      $this->start_controls_section( //input field label
        'content_style', //unique id
        [
          'label' => __( 'Style', 'reveal' ),
          'tab' => Controls_Manager::TAB_STYLE,
        ]
      );
      $this->end_controls_section();



    }//end function _register_controls


    //show in front end
    protected function _content_template() {
      ?>

    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="owl-carousel testimonials-carousel">

          <# if ( settings.list.length ) { #>
              <# _.each( settings.list, function( item ) { #>

            <div class="testimonial-item">
              <p>
                <i class="fa fa-quote-left quote-sign-left" alt=""></i>

                {{{ item.text }}}

                <i class="fa fa-quote-right quote-sign-right" alt=""></i>
              </p>
              <img src="{{ item.image.url }}" class="testimonial-img" alt="">
              <h3>{{{ item.name }}}</h3>
              <h4>{{{ item.designation }}}</h4>
            </div>

              <# }); #>
            <# } #>

        </div>
      </div>
    </section><!-- #testimonials -->
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new TestimonialWidget);