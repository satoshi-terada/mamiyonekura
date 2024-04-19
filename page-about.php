<?php get_header(); ?>

<div data-barba="container" data-barba-namespace="about">
  <div class="wrapper">
    <header class="header">
      <div class="header_about">
        <h1 class="header_about_logo">
          <a href="<?php echo home_url('/'); ?>">
            <?php get_template_part('template-parts/logo', 'mami-yonekura-museum'); ?>
          </a>
        </h1>
      </div>
    </header>
    <aside class="aside-small">
      <nav class="navi">
        <ul>
          <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>">PORTFOLIO</a></li>
          <li><a href="<?php echo esc_url(home_url('/news')); ?>">NEWS</a></li>
          <li><a href="<?php echo esc_url(home_url('/about')); ?>" class="is-current">ABOUT US</a></li>
        </ul>
      </nav>
    </aside>
    <div class="contents-wide">
      <div class="page-aboutContents">
        <div class="page-aboutContentsProfile">
          <h2 class="page-aboutContentsProfile_name"><span>米倉 万美</span><span>Mami Yonekura</span></h2>
          <p class="page-aboutContents_text"><?php echo get_field('profile'); ?></p>
        </div>

        <div class="page-aboutContentsHistory">
          <ul class="page-aboutContentsHistory_list">
          <?php $gallery = get_field('gallery');
            if ( $gallery ) {
              $gallery = str_replace( "\r\n", "\n", $gallery );
              $gallery_list = explode("\n", $gallery );
              foreach ( $gallery_list as $gallery_name ) { ?>
                  <li><?php echo $gallery_name; ?></li>
          <?php }
            } ?>
          </ul>
        </div>
      </div>
    </div>

    <?php get_template_part('template-parts/news', 'archive'); ?>

    <footer class="footer"><?php get_template_part('template-parts/svg', 'copyright'); ?></footer>
  </div>
  <button class="page-about-video-trigger js-about-video-trigger">
    <span class="playing">
      <svg width="22" height="24.1"><use xlink:href="#icon-video-play"></use></svg>
    </span>
    <span class="pause">
      <svg width="22" height="24.1"><use xlink:href="#icon-video-pause"></use></svg>
    </span>
  </button>
  <button class="page-about-video-volume-trigger js-about-video-volume-trigger is-muted">
    <span class="on">
      <svg width="32" height="22"><use xlink:href="#icon-volume-on"></use></svg>
    </span>
    <span class="off">
      <svg width="32" height="22"><use xlink:href="#icon-volume-off"></use></svg>
    </span>
  </button>
  <video src="<?php echo get_template_directory_uri(); ?>/assets/videos/about.mp4" class="page-about-video js-about-video" playsinline muted autoplay></video>
  <?php get_template_part('template-parts/colortip'); ?>
</div>

<?php get_template_part('template-parts/icon', 'sprite'); ?>
<?php get_footer(); ?>
