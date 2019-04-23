<?php
	function theme_inline_style(){
		//slider background images
		while(have_posts()) : the_post();
			?>
				
			<?php
		endwhile;

	}
	add_action('wp_header', 'theme_inline_style');