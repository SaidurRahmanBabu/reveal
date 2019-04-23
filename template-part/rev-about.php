<?php
  namespace Elementor;

  class AboutWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_about';
    }//end function

    public function get_title() {
      return __( 'Reveal About', 'reveal' );
    }//end functionget_titlepublic function get_title() 

    public function get_icon() {
      return 'fa fa-twitch';
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

      //input fields for the content
      $this->add_control(
        'title',
        array(
          'label' => __( 'Title', 'reveal' ),
          'type' => Controls_Manager::TEXT
        )
      ); // end add_control

      //button for the slider
      $this->add_control(
        'sub_title',
        array(
          'label' => __( 'Sub Title', 'reveal' ),
          'type' => Controls_Manager::TEXT
        )
      );

      //about image
      $this->add_control(
        'image',
        array(
          'label' => __( 'Add Slider Images', 'reveal' ),
          'type' => Controls_Manager::MEDIA
        )
      );

      //Reapeater
      $repeater = new Repeater();

      $repeater->add_control(
        'list_icon', [
          'label' => __( 'Icon', 'reveal' ),
          'type' => Controls_Manager::ICON,
          'default' => __( 'List Title' , 'reveal' ),
          'label_block' => true,
        ]
      );

      $repeater->add_control(
        'list_content', [
          'label' => __( 'Content Text', 'reveal' ),
          'type' => Controls_Manager::TEXTAREA,
          'default' => __( 'List Content' , 'reveal' ),
          'show_label' => true,
        ]
      );

      $this->add_control(
        'list',
        [
          'label' => __( 'About List Content', 'reveal' ),
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



    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="{{ settings.image.url }}" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>{{{ settings.title }}}</h2>
            <h3>{{{ settings.sub_title }}}</h3>

            <ul>
        
            <# if ( settings.list.length ) { #>
              <# _.each( settings.list, function( item ) { #>

              <li>
                <i class="{{ item.list_icon }}"></i>
                {{{ item.list_content }}}
              </li>

              <# }); #>
            <# } #>

            </ul>

          </div>
        </div>

      </div>
    </section>
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new AboutWidget);
