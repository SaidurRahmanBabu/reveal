<?php
  namespace Elementor;

  class HerodWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_hero';
    }//end function

    public function get_title() {
      return __( 'Header Slider', 'reveal' );
    }//end functionget_titlepublic function get_title() 

    public function get_icon() {
      return 'fa fa-address-card';
    }//end function get_icon

    public function get_categories() {
      return [ 'basic' ];
    }//end function get_categories

    //Register input fields
    protected function _register_controls(){
      //Name of the content section
      $this->start_controls_section(
        'header_slider',
        array(
          'label' => __('Slider', 'reveal'),
          'tab'   => Controls_Manager::TAB_CONTENT
        )
      );

      //input fields for the content
      $this->add_control(
        'title',
        array(
          'label' => __( 'Title', 'reveal' ),
          'type' => Controls_Manager::WYSIWYG
        )
      ); // end add_control

      //button for the slider
      $this->add_control(
        'button1_text',
        array(
          'label' => __( 'Button 1 Text', 'reveal' ),
          'type' => Controls_Manager::TEXT
        )
      );
      $this->add_control(
        'button1_url',
        array(
          'label' => __( 'Button 1 Url', 'reveal' ),
          'type' => Controls_Manager::URL
        )
      );

      $this->add_control(
        'button2_text',
        array(
          'label' => __( 'Button 2', 'reveal' ),
          'type' => Controls_Manager::TEXT
        )
      );
      $this->add_control(
        'button2_url',
        array(
          'label' => __( 'Button 2 Url', 'reveal' ),
          'type' => Controls_Manager::URL
        )
      );

      //slider image
      $this->add_control(
        'gallery',
        array(
          'label' => __( 'Add Slider Images', 'reveal' ),
          'type' => Controls_Manager::GALLERY,
          'default' => [],
        )
      );

      $this->add_control(
        'img_height',
        array(
          'label' => __( 'Slider Images Height', 'reveal' ),
          'type' => Controls_Manager::NUMBER,
          'default' => 350,
        )
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



  <section id="intro">

    <div class="intro-content">
      <h2>{{{settings.title}}}</h2>
      <div>
        <a href="#about" class="btn-get-started scrollto">
          {{{settings.button1_text}}}
        </a>
        <a href="#portfolio" class="btn-projects scrollto">
          {{{settings.button2_text}}}
        </a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >

      <# _.each( settings.gallery, function( image ) { #>

        <div class="item" style="background-image: url('{{ image.url }}');"></div>
      <# }); #>

    </div>

  </section><!-- #intro -->
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new HerodWidget);

