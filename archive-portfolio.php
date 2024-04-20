<?php get_header(); ?>

<div data-barba="container" data-barba-namespace="portfolio-archive">
  <div class="wrapper">
    <header class="header-small">
      <div class="header_portfolio">
        <h1 class="header_portfolio_logo">
          <a href="<?php echo home_url('/'); ?>">
            <span class="large">
              <?php get_template_part('template-parts/logo', 'museum'); ?>
            </span>
            <span class="small">
              <?php get_template_part('template-parts/logo', 'mami-yonekura-museum'); ?>
            </span>
          </a>
        </h1>
      </div>
    </header>
    <aside class="aside-small">
      <nav class="navi">
        <ul>
          <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>" class="is-current">PORTFOLIO</a></li>
          <li><a href="<?php echo esc_url(home_url('/news')); ?>">NEWS</a></li>
          <li><a href="<?php echo esc_url(home_url('/about')); ?>">ABOUT US</a></li>
        </ul>
      </nav>
    </aside>
    <div class="page-portfolioArchiveWrapper">
    <div class="contents-tall">
      <div class="page-portfolioArchive">
        <p class="page-portfolio_logo">
          <a href="<?php echo home_url('/'); ?>">
            <?php get_template_part('template-parts/logo', 'mami-yonekura'); ?>
          </a>
        </p>
<?php
    $terms = get_terms( 'portfolio_theme');
    if ( count( $terms ) > 0 ) { ?>
        <div class="page-portfolioArchive_lists">
          <div class="js-slider-portfolio-archive swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <ul class="page-portfolioArchive_list">
<?php foreach( $terms as $theme ) { ?>
                  <li><a href="/portfolio/theme/<?php echo $theme->slug; ?>/"><?php echo $theme->name; ?></a></li>
<?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
<?php } ?>
      </div>
    </div>
    <div class="aside-control">
      <ul class="controller page-portfolio_control">
        <li class="controller_item">
          <button class="controller_button is-prev js-prev">戻る<svg aria-label="戻る" width="48" height="48"><use xlink:href="#icon-arrow-prev"></use></svg></button>
        </li>
        <li class="controller_item">
          <button class="controller_button is-next js-next">進む<svg aria-label="進む" width="48" height="48"><use xlink:href="#icon-arrow-next"></use></svg></button>
        </li>
      </ul>
    </div>
    </div><!-- .page-portfolioArchiveWrapper -->

    <?php get_template_part('template-parts/news', 'archive'); ?>

    <footer class="footer"><?php get_template_part('template-parts/svg', 'copyright'); ?></footer>
  </div>
  <?php get_template_part('template-parts/colortip'); ?>
</div>

<?php get_template_part('template-parts/icon', 'sprite'); ?>
<?php get_footer(); ?>
