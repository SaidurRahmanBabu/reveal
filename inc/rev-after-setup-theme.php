<?php
	if(! function_exists('rev_theme_setup')):
		function rev_theme_setup(){
			//load text domain
			load_theme_textdomain( 'reveal', get_template_directory() . '/languages' );
			//theme supports
			require_once('rev-theme-supports.php');
		}
		add_action('after_setup_theme', 'rev_theme_setup');
	endif;