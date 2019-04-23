<?php
  namespace Elementor;

  class TeamWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_team';
    }//end function

    public function get_title() {
      return __( 'Reveal Team', 'reveal' );
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
        'team',
        array(
          'label' => __('Our Team', 'reveal'),
          'tab'   => Controls_Manager::TAB_CONTENT
        )
      );

      $this->add_control(
        'image', [
          'label' => __( 'Image', 'reveal' ),
          'type' => Controls_Manager::MEDIA,
          'label_block' => true,
        ]
      );

      $this->add_control(
        'name', [
          'label' => __( 'Name', 'reveal' ),
          'type' => Controls_Manager::TEXT,
          'show_label' => true,
        ]
      );

      $this->add_control(
        'designation', [
          'label' => __( 'Designation', 'reveal' ),
          'type' => Controls_Manager::TEXT,
          'show_label' => true,
        ]
      );

      //Reapeater
      $repeater = new Repeater();

      $repeater->add_control(
        'icon', [
          'label' => __( 'Social Icon', 'reveal' ),
          'type' => Controls_Manager::ICON,
          'show_label' => true,
        ]
      );

      $repeater->add_control(
        'link', [
          'label' => __( 'Social Link', 'reveal' ),
          'type' => Controls_Manager::URL,
          'show_label' => true,
        ]
      );

      $this->add_control(
        'list',
        [
          'label' => __( 'Social Icon Link', 'reveal' ),
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

    <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="row">

          <div class="member">
            <div class="pic">
              <img src="{{ settings.image.url }}" alt="">
            </div>
            <div class="details">
              <h4>{{{ settings.name }}}</h4>
              <span>{{{ settings.designation }}}</span>
              <div class="social">

          <# if ( settings.list.length ) { #>
              <# _.each( settings.list, function( item ) { #>
                <a href="{{ item.link.url }}">
                  <i class="{{ item.icon }}"></i>
                </a>

              <# }); #>
            <# } #>

              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- #team -->
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new TeamWidget);