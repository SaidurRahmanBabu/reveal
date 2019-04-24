<?php
  namespace Elementor;

  class ContactWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_contact';
    }//end function

    public function get_title() {
      return __( 'Reveal Contact', 'reveal' );
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
        'contact',
        array(
          'label' => __('Contact', 'reveal'),
          'tab'   => Controls_Manager::TAB_CONTENT
        )
      );

      $this->add_control(
        'icon', [
          'label' => __( 'Icon', 'reveal' ),
          'type' => Controls_Manager::ICON,
          'label_block' => true,
        ]
      );

      $this->add_control(
        'title', [
          'label' => __( 'Title', 'reveal' ),
          'type' => Controls_Manager::TEXT,
          'label_block' => true,
        ]
      );

      $this->add_control(
        'address', [
          'label' => __( 'Address', 'reveal' ),
          'type' => Controls_Manager::TEXT,
          'label_block' => true,
        ]
      );

      $this->add_control(
        'phone', [
          'label' => __( 'Contact Number', 'reveal' ),
          'type' => Controls_Manager::NUMBER,
          'label_block' => true,
        ]
      );

      $this->add_control(
        'mail', [
          'label' => __( 'Contact Email', 'reveal' ),
          'type' => Controls_Manager::TEXT,
          'label_block' => true,
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

    <section id="contact" class="wow fadeInUp">
      <div class="container">

        <div class="row contact-info text-center">

          <div class="contact-address text-center">
            <i class="{{{ settings.icon }}}"></i>
            <h3>{{{ settings.title }}}</h3>

            <# if ( settings.address ) { #>
              <address>{{{ settings.address }}}</address>
            <# } #>

            <# if ( settings.phone ) { #>
              <p><a href="tel:{{{ settings.phone }}}">{{{ settings.phone }}}</a></p>
            <# } #>

            <# if ( settings.mail ) { #>
              <p><a href="mailto:{{{ settings.mail }}}">{{{ settings.mail }}}</a></p>
            <# } #>
          </div>

        </div>
      </div>
    </section><!-- #contact -->
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new ContactWidget);