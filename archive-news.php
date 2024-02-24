<?php get_header(); ?>

<div data-barba="container" data-barba-namespace="home">
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
      <div class="page-news">
        <p class="page-news_logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-mami-yonekura.svg" width="181" alt="MAMI YONEKURA MUSEUM">
        </p>

<?php if (have_posts()) { ?>
        <div class="page-news_posts">

<?php while (have_posts()) : the_post(); ?>
          <article class="page-newsPost" id="post<?php the_ID(); ?>">
            <h1 class="page-newsPost_title"><?php the_title(); ?></h1>
            <time class="page-newsPost_date"><span><?php echo get_post_time('F, d'); ?></span><span class="year"><?php the_time('Y'); ?></span></time>
            <div class="page-newsPost_contents">
              <?php the_content(); ?>  

              <?php $url = get_field('link');
              if ( null != $url ) { ?>
              <p class="page-newsPost_link"><a href="<?php echo $url['url'] ; ?>"<?php if ( $url['is_blank'] ) ?> target='_blank'><?php echo ( $url['label'] != '' ) ? $url['label'] : $url['url'] ; ?></a></p>
         <?php } ?>
            </div>
<?php if ( get_field('is_enable') ) {
  $event_outline = get_field('event_outline');
?>
            <div class="page-newsPostInfo">
              <p><?php echo $event_outline['title']; ?></p>
              <dl class="page-newsPostInfo_list">
                <div>
                  <dt>会期</dt>
                  <dd><?php echo $event_outline['schedule']; ?></dd>
                </div>
                <div>
                  <dt>在廊日</dt>
                  <dd><?php echo $event_outline['date_in_gallery']; ?></dd>
                </div>
                <div>
                  <dt>会場</dt>
                  <dd><?php echo $event_outline['place']; ?><span><?php echo $event_outline['place_data']; ?></span></dd>
                </div>
              </dl>
            </div>
<?php } ?>
          </article>
<?php
          endwhile;
?>

          </div>
<?php } ?>
      </div>
    </div>

    </main>

  <?php get_template_part('template-parts/news', 'archive'); ?>

    <footer class="footer"><svg version="1.1" id="レイヤー_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
      y="0px" viewBox="0 0 230 12" style="enable-background:new 0 0 230 12;" xml:space="preserve">
    <g>
      <path class="st0" d="M0,4.8C0,2.2,2.1,0,4.7,0c2.6,0,4.7,2.2,4.7,4.8c0,2.7-2.1,4.8-4.7,4.8C2.1,9.7,0,7.5,0,4.8z M8.8,4.8
        c0-2.4-1.8-4.2-4.1-4.2c-2.3,0-4.1,1.9-4.1,4.2C0.6,7.2,2.4,9,4.7,9C7,9,8.8,7.2,8.8,4.8z M3.5,4.7C3.5,6.1,3.7,7,4.7,7
        c0.7,0,1-0.4,1-1.1h0.8c0,0.4-0.2,1.7-1.6,1.7c-2.1,0-2.1-1.8-2.1-2.9c0-1.1,0-2.9,2.1-2.9c1.6,0,1.5,1.3,1.5,1.6H5.6
        c0-0.6-0.1-1-0.9-1C3.7,2.4,3.5,3.3,3.5,4.7z"/>
      <path class="st0" d="M19.1,9.5h-4.6V8.8c2-3.1,3.7-5.2,3.7-6.4s-0.8-1.4-1.5-1.4c-1,0-1.5,0.7-1.5,1.6h-0.8c0-1.8,1.2-2.3,2.2-2.3
        c1,0,2.3,0.3,2.3,1.9c0,1.3-0.7,2-3.7,6.6h3.7V9.5z"/>
      <path class="st0" d="M25.5,4V6c0,1.7,0,3.7-2.3,3.7c-2.3,0-2.3-2-2.3-3.7V4c0-1.7,0-3.7,2.3-3.7C25.5,0.4,25.5,2.3,25.5,4z
        M21.7,6.8c0,2,0.9,2.2,1.5,2.2c0.6,0,1.5-0.2,1.5-2.2V3.2c0-2-0.9-2.2-1.5-2.2c-0.6,0-1.5,0.2-1.5,2.2V6.8z"/>
      <path class="st0" d="M31.8,9.5h-4.6V8.8c2-3.1,3.7-5.2,3.7-6.4s-0.8-1.4-1.5-1.4c-1,0-1.5,0.7-1.5,1.6h-0.8c0-1.8,1.2-2.3,2.2-2.3
        c1,0,2.3,0.3,2.3,1.9c0,1.3-0.7,2-3.7,6.6h3.7V9.5z"/>
      <path class="st0" d="M35.2,4.5c1.3,0.1,2-0.5,2-1.8c0-1-0.4-1.6-1.4-1.6c-1,0-1.4,0.7-1.4,1.6h-0.8c-0.1-1.3,0.7-2.3,2.1-2.3
        C37.2,0.4,38,1,38,2.6c0,1-0.3,2-1.4,2.3v0C37.8,5,38.1,6,38.1,7c0,1.6-0.8,2.6-2.2,2.6c-1.6,0-2.5-0.7-2.4-2.3h0.8
        c0,1,0.4,1.6,1.5,1.6c1.2,0,1.5-0.8,1.5-1.7c0-1.5-0.4-2.2-2.1-2V4.5z"/>
      <path class="st0" d="M43.8,9.5V0.2h1.4L48,8.6h0l2.7-8.4H52v9.3h-0.8V1h0l-2.7,8.5h-1L44.7,1h0v8.5H43.8z"/>
      <path class="st0" d="M57.7,8.7L57.7,8.7c-0.4,0.6-1.1,0.9-1.9,0.9c-1.2,0-1.8-0.8-1.8-1.9c0-2.3,2.3-2,3.6-2.2V5
        c0-1-0.3-1.5-1.3-1.5c-0.7,0-1.3,0.3-1.3,1.1h-0.8c0.1-1.2,1-1.7,2.2-1.7c0.7,0,2,0.1,2,1.7v3.3c0,0.5,0,0.9,0.1,1.6h-0.8V8.7z
        M57.7,6.2c-1.1,0-2.8-0.1-2.8,1.5c0,0.7,0.4,1.3,1.2,1.3c0.9,0,1.6-0.8,1.6-1.6V6.2z"/>
      <path class="st0" d="M61.4,9.5h-0.8V3h0.7v0.8h0c0.3-0.5,0.8-0.9,1.5-0.9c0.7,0,1.3,0.4,1.5,1c0.3-0.6,0.9-1,1.6-1
        c1.1,0,1.7,0.7,1.7,1.8v4.8h-0.8V4.8c0-0.6-0.2-1.4-1-1.4c-1,0-1.4,1-1.4,1.8v4.2h-0.8V4.8c0-0.6-0.2-1.4-1-1.4c-1,0-1.4,1-1.4,1.8
        V9.5z"/>
      <path class="st0" d="M69.8,1.2v-1h1v1H69.8z M69.9,9.5V3h0.8v6.5H69.9z"/>
      <path class="st0" d="M78.7,5.6l-2.6-5.4H77l2.1,4.6l2.2-4.6h0.8l-2.7,5.4v3.9h-0.8V5.6z"/>
      <path class="st0" d="M82.9,6.9V5.4c0-0.8,0-2.5,2.2-2.5c2.2,0,2.2,1.7,2.2,2.5v1.5c0,1.7-0.6,2.7-2.2,2.7
        C83.4,9.6,82.9,8.6,82.9,6.9z M86.4,8.1c0.1-0.3,0.2-1.5,0.2-1.9c0-1.9-0.2-2.8-1.5-2.8c-1.3,0-1.5,0.8-1.5,2.8
        c0,0.4,0,1.6,0.2,1.9C83.9,8.3,84,9,85.1,9S86.4,8.3,86.4,8.1z"/>
      <path class="st0" d="M90.1,9.5h-0.8V3h0.8v0.8h0c0.4-0.5,0.9-0.9,1.6-0.9c1.6,0,1.8,1.2,1.8,2v4.6h-0.8V4.9c0-0.8-0.3-1.5-1.2-1.5
        c-0.7,0-1.4,0.5-1.4,1.9V9.5z"/>
      <path class="st0" d="M96.3,6.4v0.5c0,0.9,0.2,2.1,1.5,2.1c1,0,1.4-0.6,1.4-1.5h0.8c-0.1,1.6-0.9,2.1-2.2,2.1
        c-1.1,0-2.2-0.5-2.2-2.4V5.6c0-1.9,0.8-2.7,2.2-2.7c2.2,0,2.2,1.6,2.2,3.5H96.3z M99.2,5.8c0-1.4-0.2-2.3-1.5-2.3
        c-1.2,0-1.5,0.9-1.5,2.3H99.2z"/>
      <path class="st0" d="M102,0.2h0.8v5.7h0l2.2-2.9h0.9l-2.3,2.9l2.5,3.6h-1l-2.3-3.5h0v3.5H102V0.2z"/>
      <path class="st0" d="M111.8,3v6.5h-0.7V8.8h0c-0.5,0.6-0.9,0.9-1.6,0.9c-1.3,0-1.7-1-1.7-2V3h0.8v4.5c0,0.2,0,1.5,1.1,1.5
        c1,0,1.4-1,1.4-1.4V3H111.8z"/>
      <path class="st0" d="M114.8,3.9L114.8,3.9c0.3-0.6,1-1,1.8-1v0.8c-1.1-0.1-1.8,0.6-1.8,1.7v4.2H114V3h0.8V3.9z"/>
      <path class="st0" d="M121.7,8.7L121.7,8.7c-0.4,0.6-1.1,0.9-1.9,0.9c-1.2,0-1.8-0.8-1.8-1.9c0-2.3,2.3-2,3.6-2.2V5
        c0-1-0.3-1.5-1.3-1.5c-0.7,0-1.3,0.3-1.3,1.1h-0.8c0.1-1.2,1-1.7,2.2-1.7c0.7,0,2,0.1,2,1.7v3.3c0,0.5,0,0.9,0.1,1.6h-0.8V8.7z
        M121.6,6.2c-1.1,0-2.8-0.1-2.8,1.5c0,0.7,0.4,1.3,1.2,1.3c0.9,0,1.6-0.8,1.6-1.6V6.2z"/>
      <path class="st0" d="M124.6,8.5h1v1h-1V8.5z"/>
      <path class="st0" d="M134.8,0.2l2.9,9.3h-0.9L136.1,7h-3.7l-0.7,2.4h-0.8l2.9-9.3H134.8z M135.9,6.3l-1.6-5.3h0l-1.6,5.3H135.9z"/>
      <path class="st0" d="M139.5,9.5V0.2h0.8v9.3H139.5z"/>
      <path class="st0" d="M142.7,9.5V0.2h0.8v9.3H142.7z"/>
      <path class="st0" d="M150.3,3.9L150.3,3.9c0.3-0.6,1-1,1.8-1v0.8c-1.1-0.1-1.8,0.6-1.8,1.7v4.2h-0.8V3h0.8V3.9z"/>
      <path class="st0" d="M153.9,1.2v-1h1v1H153.9z M154,9.5V3h0.8v6.5H154z"/>
      <path class="st0" d="M160.4,3h0.8c0,0.6,0,0.9,0,1.3v5.5c0,1.4-0.4,2.3-2.3,2.3c-1.6,0-1.9-1.1-1.9-1.8h0.8
        c-0.1,0.7,0.5,1.2,1.2,1.2c1.5,0,1.4-0.8,1.4-2.8h0c-0.3,0.6-1,0.8-1.6,0.8c-1.9,0-2-1.6-2-3.1c0-1.5,0-1.5,0.2-2.2
        c0.1-0.3,0.5-1.3,1.8-1.3c0.7,0,1.3,0.3,1.6,0.9l0,0V3z M157.6,6.1c0,1.4,0,2.7,1.4,2.7c0.6,0,1.1-0.4,1.2-0.7
        c0.2-0.5,0.2-0.8,0.2-2.7c0-1.4-0.7-1.9-1.5-1.9C157.6,3.5,157.6,5.1,157.6,6.1z"/>
      <path class="st0" d="M163.3,9.5V0.2h0.8v3.6h0c0.4-0.5,0.9-0.9,1.6-0.9c1.6,0,1.8,1.2,1.8,2v4.6h-0.8V4.9c0-0.8-0.3-1.5-1.2-1.5
        c-0.7,0-1.4,0.5-1.4,1.9v4.1H163.3z"/>
      <path class="st0" d="M169.1,3.6V3h1V1.6l0.8-0.3V3h1.3v0.6H171v4.2c0,0.9,0.1,1.1,0.7,1.1c0.3,0,0.4,0,0.6,0v0.7
        c-0.2,0-0.5,0-0.7,0c-1,0-1.4-0.5-1.4-1.3V3.6H169.1z"/>
      <path class="st0" d="M175.8,9.6c-1.4,0-2-0.7-1.9-2.1h0.8c0,0.9,0.2,1.5,1.2,1.5c0.7,0,1.1-0.4,1.1-1.1c0-1.7-2.9-1.3-2.9-3.4
        c0-1.2,0.8-1.6,2-1.6c1.3,0,1.7,0.9,1.7,1.9H177c0-0.8-0.3-1.3-1.1-1.3c-0.6,0-1,0.4-1,0.9c0,1.6,2.9,1.2,2.9,3.4
        C177.8,9,177,9.6,175.8,9.6z"/>
      <path class="st0" d="M184.1,3.9L184.1,3.9c0.3-0.6,1-1,1.8-1v0.8c-1.1-0.1-1.8,0.6-1.8,1.7v4.2h-0.8V3h0.8V3.9z"/>
      <path class="st0" d="M188.2,6.4v0.5c0,0.9,0.2,2.1,1.5,2.1c1,0,1.4-0.6,1.4-1.5h0.8c-0.1,1.6-0.9,2.1-2.2,2.1
        c-1.1,0-2.2-0.5-2.2-2.4V5.6c0-1.9,0.8-2.7,2.2-2.7c2.2,0,2.2,1.6,2.2,3.5H188.2z M191.1,5.8c0-1.4-0.2-2.3-1.5-2.3
        c-1.2,0-1.5,0.9-1.5,2.3H191.1z"/>
      <path class="st0" d="M195.7,9.6c-1.4,0-2-0.7-1.9-2.1h0.8c0,0.9,0.2,1.5,1.2,1.5c0.7,0,1.1-0.4,1.1-1.1c0-1.7-2.9-1.3-2.9-3.4
        c0-1.2,0.8-1.6,2-1.6c1.3,0,1.7,0.9,1.7,1.9h-0.8c0-0.8-0.3-1.3-1.1-1.3c-0.6,0-1,0.4-1,0.9c0,1.6,2.9,1.2,2.9,3.4
        C197.6,9,196.9,9.6,195.7,9.6z"/>
      <path class="st0" d="M200.3,6.4v0.5c0,0.9,0.2,2.1,1.5,2.1c1,0,1.4-0.6,1.4-1.5h0.8c-0.1,1.6-0.9,2.1-2.2,2.1
        c-1.1,0-2.2-0.5-2.2-2.4V5.6c0-1.9,0.8-2.7,2.2-2.7c2.2,0,2.2,1.6,2.2,3.5H200.3z M203.2,5.8c0-1.4-0.2-2.3-1.5-2.3
        c-1.2,0-1.5,0.9-1.5,2.3H203.2z"/>
      <path class="st0" d="M206.8,3.9L206.8,3.9c0.3-0.6,1-1,1.8-1v0.8c-1.1-0.1-1.8,0.6-1.8,1.7v4.2H206V3h0.8V3.9z"/>
      <path class="st0" d="M212.4,8.5L212.4,8.5L214,3h0.7l-1.9,6.5h-0.9L210,3h0.8L212.4,8.5z"/>
      <path class="st0" d="M216.9,6.4v0.5c0,0.9,0.2,2.1,1.5,2.1c1,0,1.4-0.6,1.4-1.5h0.8c-0.1,1.6-0.9,2.1-2.2,2.1
        c-1.1,0-2.2-0.5-2.2-2.4V5.6c0-1.9,0.8-2.7,2.2-2.7c2.2,0,2.2,1.6,2.2,3.5H216.9z M219.9,5.8c0-1.4-0.2-2.3-1.5-2.3
        c-1.2,0-1.5,0.9-1.5,2.3H219.9z"/>
      <path class="st0" d="M226.1,8.7L226.1,8.7c-0.4,0.6-0.9,1-1.7,1c-1.9,0-2-1.9-2-3.4c0-1.3,0-3.4,2-3.4c0.6,0,1.2,0.3,1.6,0.8l0,0
        V0.2h0.8v8c0,0.6,0,1.1,0.1,1.3h-0.7L226.1,8.7z M226.1,6.8V5.7c0-0.4,0-2.2-1.5-2.2c-1.4,0-1.4,1.3-1.4,2.8c0,2.4,0.6,2.7,1.4,2.7
        C225.4,9,226.1,8.4,226.1,6.8z"/>
      <path class="st0" d="M229,8.5h1v1h-1V8.5z"/>
    </g>
    </svg></footer>
  </div>
</div>

<?php get_footer(); ?>
