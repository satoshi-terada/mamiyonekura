<?php get_header(); ?>

<div data-barba="container" data-barba-namespace="about">
  <div class="wrapper">
    <header class="header">
      <div class="header_about">
        <h1 class="header_about_logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-mami-yonekura-museum.svg" width="380" alt="MAMI YONEKURA MUSEUM">
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

    </main>

    <?php get_template_part('template-parts/news', 'archive'); ?>

    <footer class="footer"><?php get_template_part('template-parts/svg', 'copyright'); ?></footer>
  </div>
</div>

<?php get_footer(); ?>
