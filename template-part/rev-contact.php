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
          'type' => Controls_Manager::Text,
          'label_block' => true,
        ]
      );

      $this->add_control(
        'address', [
          'label' => __( 'Address', 'reveal' ),
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

      $this->add_control(
        'phone', [
          'label' => __( 'Contact Number', 'reveal' ),
          'type' => Controls_Manager::NUMBER,
          'show_label' => true,
        ]
      );

      $this->add_control(
        'mail', [
          'label' => __( 'Contact Email', 'reveal' ),
          'type' => Controls_Manager::TEXT,
          'show_label' => true,
        ]
      );

      $this->end_controls_section(); //end of field creation


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
          'show_label' => true,
        ]
      );

      $this->add_control(
        'width', [
          'label' => __( 'Map Width (px)', 'reveal' ),
          'type' => Controls_Manager::NUMBER,
          'show_label' => true,
        ]
      );

      $this->add_control(
        'height', [
          'label' => __( 'Map Height (px)', 'reveal' ),
          'type' => Controls_Manager::NUMBER,
          'show_label' => true,
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
      <div class="container">

        <div class="row contact-info">

          <div class="contact-address">
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

      <div class="container mb-4">
        <iframe width="{{{ settings.width }}}px" height="{{{ settings.height }}}px" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q={{{ settings.place }}}+(Map)&amp;ie=UTF8&amp;t=&amp;z=9&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      </div>

      <!-- <div class="container">
        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div> -->
    </section><!-- #contact -->
  
      <?php
    }

    
  }

  Plugin::instance()->widgets_manager->register_widget_type(new ContactWidget);