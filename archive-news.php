<?php get_header(); ?>

<div data-barba="container" data-barba-namespace="news-archive">
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

  <?php get_template_part('template-parts/news', 'archive'); ?>

    <footer class="footer"><?php get_template_part('template-parts/svg', 'copyright'); ?></footer>
  </div>
</div>

<?php get_footer(); ?>
