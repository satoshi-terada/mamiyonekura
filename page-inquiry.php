<?php get_header(); ?>

<div data-barba="container" data-barba-namespace="inquiry">
  <div class="wrapper">
    <header class="header-small">
      <div class="header_news">
        <h1 class="header_news_logo">
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
          <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>">PORTFOLIO</a></li>
          <li><a href="<?php echo esc_url(home_url('/news')); ?>">NEWS</a></li>
          <li><a href="<?php echo esc_url(home_url('/about')); ?>">ABOUT US</a></li>
        </ul>
        <p class="navi_inquiry" style="opacity: .35;"><svg version="1.1" id="レイヤー_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
        y="0px" viewBox="0 0 34 20" style="enable-background:new 0 0 34 20;" xml:space="preserve">
      <path class="st0" d="M0,0v20h34V0H0z M33,1L33,1L33,1L33,1z M32,1L17,9.4L2,1H32z M1,1L1,1L1,1L1,1z M1,19V1.6l16,9l16-9V19H1z"/>
      </svg></p>
      </nav>
    </aside>
    <div class="contents-tall">
      <p class="page-news_logo">
        <a href="<?php echo home_url('/'); ?>">
          <?php get_template_part('template-parts/logo', 'mami-yonekura'); ?>
        </a>
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
  <div class="inquiryIcon" style="opacity: .35;"><svg version="1.1" id="レイヤー_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
        y="0px" viewBox="0 0 34 20" style="enable-background:new 0 0 34 20;" xml:space="preserve">
      <path class="st0" d="M0,0v20h34V0H0z M33,1L33,1L33,1L33,1z M32,1L17,9.4L2,1H32z M1,1L1,1L1,1L1,1z M1,19V1.6l16,9l16-9V19H1z"/>
      </svg></div>
  <?php get_template_part('template-parts/colortip'); ?>
</div>

<?php get_template_part('template-parts/icon', 'sprite'); ?>
<?php get_footer(); ?>
