<?php
	//theme script files
	require_once(get_theme_file_path('inc/rev-scripts.php'));

	//after_setup_theme
	require_once(get_theme_file_path('inc/rev-after-setup-theme.php'));



	/*============= Elementor page builder Element =============*/
	class ElementorCustomElement {
		private static $instance = null;

		public function get_instance(){
			if(!self::$instance)
				self::$instance = new self;
			return self::$instance;

		}//end function get_instance

		public function init(){
			add_action( 'elementor/widgets/widgets_registered', array($this, 'widgets_registered') );

		}//end function init

		//getting the file path of our work
		public function widgets_registered(){
			if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){
				$widget_file = get_template_directory() . '/template-part/elementor-widget.php';
				$template_file = locate_template( $widget_file );

				if(!$template_file || !is_readable($template_file)){
					$template_file = get_template_directory() . '/template-part/elementor-widget.php';
				}

				if($template_file && is_readable($template_file)){
					require_once $template_file;
				}
			}

		}//end function widgets_registered

	}//end class ElementorCustomElement

	ElementorCustomElement::get_instance()->init();


	//external style
	require_once(get_theme_file_path('libs/style-functions.php'));