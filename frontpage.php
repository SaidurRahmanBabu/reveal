<?php
/*
* Template Name: home page
*/
?>
<?php get_header(); ?>

  <!--========================== Intro Section =================-->


  <main id="main">

    <?php while(have_posts()) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>

  </main>

  <!--=================== Footer =====================-->
  <?php get_footer(); ?>