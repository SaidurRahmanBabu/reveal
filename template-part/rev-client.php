<?php
  namespace Elementor;

  class ClientWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_client';
    }//end function

    public function get_title() {
      return __( 'Reveal Clients', 'reveal' );
    }//end functionget_titlepublic function get_title() 

    public function get_icon() {
      return 'fa fa-monero';
    }//end function get_icon

    public function get_categories() {
      return [ 'basic' ];
    }//end function get_categories

    //Register input fields
    protected function _register_controls(){
      //Name of the content section
      $this->start_controls_section(
        'client',
        array(
          'label' => __('Client Slider', 'reveal'),
          'tab'   => Controls_Manager::TAB_CONTENT
        )
      );

      $this->add_control(
        'gallery', [
          'label' => __( 'Brand Logo Images', 'reveal' ),
          'type' => Controls_Manager::GALLERY,
          'label_block' => true,
          'default' => []
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

    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="owl-carousel clients-carousel">

          <# _.each( settings.gallery, function( image ) { #>
            <img src="{{ image.url }}">
          <# }); #>

        </div>
      </div>
    </section><!-- #clients -->
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new ClientWidget);