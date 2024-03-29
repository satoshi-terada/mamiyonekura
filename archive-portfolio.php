<?php get_header(); ?>

<?php // ポートフォリオ一覧を取得
  $args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1
    );
    $portfolio = new WP_Query( $args );
?>
<div data-barba="container" data-barba-namespace="portfolio-archive">
  <div class="wrapper">
    <header class="header-small">
      <div class="header_portfolio">
        <h1 class="header_portfolio_logo">
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
      <div class="page-portfolioArchive">
        <p class="page-portfolio_logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-mami-yonekura.svg" width="181" alt="MAMI YONEKURA MUSEUM">
        </p>
<?php if ( $portfolio->have_posts() ) {
$view_count = 0;   ?>
        <div class="page-portfolioArchive_lists">
          <div class="js-slider-portfolio-archive swiper">
            <div class="swiper-wrapper">
<?php while ( $portfolio->have_posts()) : $portfolio->the_post();
if ( $view_count % 10 == 0 ) { ?>
              <div class="swiper-slide">
                <ul class="page-portfolioArchive_list">
<?php } ?>
                  <li><a href="/portfolio-detail/#<?php echo $view_count; ?> "><?php the_title(); ?></a></li>
<?php
$view_count++;
if ( $view_count % 10 == 0 || $view_count >= $portfolio->found_posts ) { ?>
                </ul>
              </div>
<?php }
    endwhile; ?>
            </div>
          </div>
        </div>
<?php } ?>
      </div>
    </div>

    <div class="aside-control">
      <ul class="controller">
        <li class="controller_item">
          <button class="controller_button is-prev js-prev">戻る<svg aria-label="戻る" width="48" height="48"><use xlink:href="#icon-arrow-prev"></use></svg></button>
        </li>
        <li class="controller_item">
          <button class="controller_button is-next js-next">進む<svg aria-label="進む" width="48" height="48"><use xlink:href="#icon-arrow-next"></use></svg></button>
        </li>
      </ul>
    </div>

    <?php get_template_part('template-parts/news', 'archive'); ?>

    <footer class="footer"><?php get_template_part('template-parts/svg', 'copyright'); ?></footer>
  </div>
</div>

<?php get_footer(); ?>
