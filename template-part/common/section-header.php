<?php
  namespace Elementor;

  class SectionWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_section_header';
    }//end function

    public function get_title() {
      return __( 'Reveal Section Header', 'reveal' );
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
        'section_header',
        array(
          'label' => __('Section Header', 'reveal'),
          'tab'   => Controls_Manager::TAB_CONTENT
        )
      );

      //input fields for the content
      $this->add_control(
        'title',
        array(
          'label' => __( 'Section Title', 'reveal' ),
          'type' => Controls_Manager::TEXT
        )
      ); // end add_control

      //button for the slider
      $this->add_control(
        'text',
        array(
          'label' => __( 'Section Text', 'reveal' ),
          'type' => Controls_Manager::TEXTAREA
        )
      );
      $this->end_controls_section();

      
    }//end function _register_controls


    //show in front end
    protected function _content_template() {
      ?>

      <div class="section-header">
        <h2>{{{ settings.title }}}</h2>

        <p>{{{ settings.text }}}</p>
      </div>

      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new SectionWidget);
