<?php get_header(); ?>

<div data-barba="container" data-barba-namespace="news-archive">
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
          <li><a href="<?php echo esc_url(home_url('/news')); ?>" class="is-current">NEWS</a></li>
          <li><a href="<?php echo esc_url(home_url('/about')); ?>">ABOUT US</a></li>
        </ul>
      </nav>
    </aside>
    <div class="contents-tall">
      <div class="page-news">
        <p class="page-news_logo">
          <a href="<?php echo home_url('/'); ?>">
            <?php get_template_part('template-parts/logo', 'mami-yonekura'); ?>
          </a>
        </p>

<?php if (have_posts()) { ?>
        <div class="page-news_posts">

<?php while (have_posts()) : the_post(); ?>
          <article class="page-newsPost" id="post<?php the_ID(); ?>">
              <h1 class="page-newsPost_title"><?php the_title(); ?>
                <svg class="page-newsPost_titleIcon" version="1.1" id="レイヤー_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve">
                <g>
                  <path class="st0" d="M12,6c0,3.3-2.7,6-6,6c-3.3,0-6-2.7-6-6c0-3.4,2.7-6,6-6C9.3,0,12,2.7,12,6z M0.9,6c0,3.3,2.3,5.9,5.1,5.9
                    c2.8,0,5.1-2.6,5.1-5.9c0-3.3-2.3-5.9-5.1-5.9C3.2,0.1,0.9,2.7,0.9,6z"></path>
                </g>
              </svg>
            </h1>
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
  <?php get_template_part('template-parts/colortip'); ?>
</div>

<?php get_template_part('template-parts/icon', 'sprite'); ?>
<?php get_footer(); ?>
