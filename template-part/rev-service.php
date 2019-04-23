<?php
  namespace Elementor;

  class ServiceWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_service';
    }//end function

    public function get_title() {
      return __( 'Reveal Service', 'reveal' );
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
        'about',
        array(
          'label' => __('About', 'reveal'),
          'tab'   => Controls_Manager::TAB_CONTENT
        )
      );

      //Reapeater
      $repeater = new Repeater();

      $repeater->add_control(
        'list_icon', [
          'label' => __( 'Icon', 'reveal' ),
          'type' => Controls_Manager::ICON,
          'default' => __( 'Service Icon' , 'reveal' ),
          'label_block' => true,
        ]
      );

      $repeater->add_control(
        'title', [
          'label' => __( 'Service Title', 'reveal' ),
          'type' => Controls_Manager::TEXTAREA,
          'default' => __( 'Service Title' , 'reveal' ),
          'show_label' => true,
        ]
      );

      $repeater->add_control(
        'text', [
          'label' => __( 'Content Text', 'reveal' ),
          'type' => Controls_Manager::TEXTAREA,
          'default' => __( 'Service Content' , 'reveal' ),
          'show_label' => true,
        ]
      );

      $this->add_control(
        'list',
        [
          'label' => __( 'Service Content', 'reveal' ),
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

    <section id="services">
      <div class="container">
        
        <div class="row">  

          <h2>{{{ settings.title }}}</h2>
            <h3>{{{ settings.sub_title }}}</h3>
        
            <# if ( settings.list.length ) { #>
              <# _.each( settings.list, function( item ) { #>

              <div class="col-lg-6">
                <div class="box wow fadeInRight" data-wow-delay="0.2s">
                  <div class="icon">
                    <i class="{{ item.list_icon }}"></i>
                  </div>
                  <h4 class="title">
                    <a href="">{{{ item.title }}}</a>
                  </h4>
                  <p class="description">{{{ item.text }}}</p>
                </div>
              </div>

              <# }); #>
            <# } #>

        </div>

      </div>
    </section><!-- #services -->
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new ServiceWidget);