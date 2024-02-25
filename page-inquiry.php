<?php get_header(); ?>

<div data-barba="container" data-barba-namespace="inquiry">
  <div class="wrapper">
    <header class="header-small">
      <div class="header_news">
        <h1 class="header_news_logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-museum.svg" width="90" alt="MAMI YONEKURA MUSEUM">
        </h1>
      </div>
    </header>
    <aside class="aside-small">
      <nav class="navi">
        <ul>
          <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>">PORTFOLIO</a></li>
          <li><a href="<?php echo esc_url(home_url('/news')); ?>">NEWS</a></li>
          <li><a href="<?php echo esc_url(home_url('/about')); ?>">ABOUT US</a></li>
        </ul>
      </nav>
    </aside>
    <div class="contents-tall">
      <p class="page-news_logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-mami-yonekura.svg" width="181" alt="MAMI YONEKURA MUSEUM">
      </p>
      <div class="page-inquiry">
        <div class="page-inquiryForm">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    
    <?php get_template_part('template-parts/news', 'archive'); ?>

    <footer class="footer"><?php get_template_part('template-parts/svg', 'copyright'); ?></footer>
  </div>
</div>

<?php get_footer(); ?>
