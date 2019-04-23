<?php
  namespace Elementor;

  class PortfolioWidget extends Widget_Base{
    public function get_name() {
      return 'reveal_portfolio';
    }//end function

    public function get_title() {
      return __( 'Reveal Portfolio', 'reveal' );
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
        'image', [
          'label' => __( 'Image', 'reveal' ),
          'type' => Controls_Manager::MEDIA,
          'label_block' => true,
        ]
      );

      $repeater->add_control(
        'title', [
          'label' => __( 'Portfolio Title', 'reveal' ),
          'type' => Controls_Manager::TEXT,
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

    <section id="portfolio" class="wow fadeInUp">
      <div class="container-fluid">
        <div class="row no-gutters">

          <# if ( settings.list.length ) { #>
              <# _.each( settings.list, function( item ) { #>

            <div class="col-lg-3 col-md-4">
              <div class="portfolio-item wow fadeInUp">

                <a href="{{ item.image.url }}" class="portfolio-popup">
                  <img src="{{ item.image.url }}" alt="">
                  <div class="portfolio-overlay">
                    <div class="portfolio-info">
                      <h2 class="wow fadeInUp">{{{ item.title }}}</h2>
                    </div>
                  </div>
                </a>
              </div>
            </div>

              <# }); #>
            <# } #>

        </div>
      </div>
    </section><!-- #portfolio -->
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new PortfolioWidget);