<?php
  namespace Elementor;

  class MaptWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_map';
    }//end function

    public function get_title() {
      return __( 'Reveal Map', 'reveal' );
    }//end functionget_titlepublic function get_title() 

    public function get_icon() {
      return 'fa fa-map';
    }//end function get_icon

    public function get_categories() {
      return [ 'basic' ];
    }//end function get_categories

    //Register input fields
    protected function _register_controls(){
      //Name of the content section
      $this->start_controls_section(
        'map',
        array(
          'label' => __('Map', 'reveal'),
          'tab'   => Controls_Manager::TAB_CONTENT
        )
      );

      $this->add_control(
        'place', [
          'label' => __( 'Location', 'reveal' ),
          'type' => Controls_Manager::TEXT,
          'label_block' => true,
        ]
      );

      $this->add_control(
        'width', [
          'label' => __( 'Map Width (px)', 'reveal' ),
          'type' => Controls_Manager::NUMBER,
          'label_block' => true,
        ]
      );

      $this->add_control(
        'height', [
          'label' => __( 'Map Height (px)', 'reveal' ),
          'type' => Controls_Manager::NUMBER,
          'label_block' => true,
        ]
      );
      $this->end_controls_section();


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

    <section id="contact" class="wow fadeInUp">

      <div class="container mb-4">
        <iframe width="{{{ settings.width }}}px" height="{{{ settings.height }}}px" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q={{{ settings.place }}}+(Map)&amp;ie=UTF8&amp;t=&amp;z=9&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      </div>

    </section><!-- #contact -->
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new MaptWidget);