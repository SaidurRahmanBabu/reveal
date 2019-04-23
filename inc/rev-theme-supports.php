<?php
	add_theme_support('title-tag');
	
	add_theme_support('custom-logo', array(
		'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
		'header-text' => array('site-title', 'site-description')
	));

	add_theme_support('custom-header', array(
		'height' 						 => 350,
		'widht' 						 => 1200,
		'flex-height' 			 => true,
		'flex-widht' 				 => true,
		'header-text' 			 => true,
		'default-text-color' => '#333'
	));

	add_theme_support( 'html5', array( 
		'comment-list', 
		'comment-form', 
		'search-form', 
		'gallery', 
		'caption' 
	));

	add_theme_support('custom-background');

	add_theme_support('post-thumbnails');

	add_theme_support('post-formats', array(
		'image',
		'video',
		'quote',
		'link',
		'gallery'
	));