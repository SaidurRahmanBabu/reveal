<?php
  namespace Elementor;

  class CtaWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_cta';
    }//end function

    public function get_title() {
      return __( 'Call To Action', 'reveal' );
    }//end functionget_titlepublic function get_title() 

    public function get_icon() {
      return 'fa fa-heading';
    }//end function get_icon

    public function get_categories() {
      return [ 'basic' ];
    }//end function get_categories

    //Register input fields
    protected function _register_controls(){
      //Name of the content section
      $this->start_controls_section(
        'cta',
        array(
          'label' => __('CTA', 'reveal'),
          'tab'   => Controls_Manager::TAB_CONTENT
        )
      );

      //input fields for the content
      $this->add_control(
        'title',
        array(
          'label' => __( 'Title', 'reveal' ),
          'type' => Controls_Manager::TEXT
        )
      ); 

      $this->add_control(
        'text',
        array(
          'label' => __( 'Cta Text', 'reveal' ),
          'type' => Controls_Manager::TEXTAREA
        )
      ); 

      $this->add_control(
        'button',
        array(
          'label' => __( 'Button Text', 'reveal' ),
          'type' => Controls_Manager::TEXT
        )
      ); 

      $this->end_controls_section();

      
    }//end function _register_controls


    //show in front end
    protected function _content_template() {
      ?>

      <section id="call-to-action" class="wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3 class="cta-title">{{{ settings.title }}}</h3>
              <p class="cta-text">{{{ settings.text }}}</p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="#">{{{ settings.button }}}</a>
            </div>
          </div>
        </div>
      </section><!-- #call-to-action -->

      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new CtaWidget);