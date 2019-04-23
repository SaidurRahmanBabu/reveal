<?php
	function rev_scripts(){
		//css files
		//google fonts
		wp_enqueue_style('rev-fontawesome', '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700');
		//bootstrap
		wp_enqueue_style( 'rev-bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap.min.css','null','all');
		//font awesome
		wp_enqueue_style( 'rev-font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/css/font-awesome.min.css','null','all');
		//animate
		wp_enqueue_style( 'rev-animate', get_template_directory_uri() . '/assets/lib/animate/animate.min.css','null','all');
		//ionicons
		wp_enqueue_style( 'rev-ionicons', get_template_directory_uri() . '/assets/lib/ionicons/css/ionicons.min.css','null','all');
		//owl.carousel
		wp_enqueue_style( 'rev-owl.carousel', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css','null','all');
		//magnific-popup
		wp_enqueue_style( 'rev-magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/magnific-popup.css','null','all');
		//theme main css file
		wp_enqueue_style( 'rev-style', get_template_directory_uri() . '/assets/css/style.css','null','all');
		//theme css
		wp_enqueue_style( 'theme-style', get_stylesheet_uri(), time(), 'all' );


		//js files
		//bootstrap
		wp_enqueue_script( 'rev-bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap.bundle.min.js', array ( 'jquery' ), null, true);
		//easing
		wp_enqueue_script( 'rev-easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', array ( 'jquery' ), null, true);
		//hoverIntent
		wp_enqueue_script( 'rev-hoverIntent', get_template_directory_uri() . '/assets/lib/superfish/hoverIntent.js', array ( 'jquery' ), null, true);
		//superfish
		wp_enqueue_script( 'rev-superfish', get_template_directory_uri() . '/assets/lib/superfish/superfish.min.js', array ( 'jquery' ), null, true);
		//wow
		wp_enqueue_script( 'rev-wow', get_template_directory_uri() . '/assets/lib/wow/wow.min.js', array ( 'jquery' ), null, true);
		//owlcarousel
		wp_enqueue_script( 'rev-owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', array ( 'jquery' ), null, true);
		//magnific-popup
		wp_enqueue_script( 'rev-magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/magnific-popup.min.js', array ( 'jquery' ), null, true);
		//sticky
		wp_enqueue_script( 'rev-sticky', get_template_directory_uri() . '/assets/lib/sticky/sticky.js', array ( 'jquery' ), null, true);
		//contactform
		wp_enqueue_script( 'rev-contactform', get_template_directory_uri() . '/assets/contactform/contactform.js', array ( 'jquery' ), null, true);
		//main
		wp_enqueue_script( 'rev-main', get_template_directory_uri() . '/assets/js/main.js', array ( 'jquery' ), null, true);

	}
	add_action('wp_enqueue_scripts', 'rev_scripts');