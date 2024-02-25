<?php get_header(); ?>

<?php // ポートフォリオ一覧を取得
  $args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1
    );
    $portfolio = new WP_Query( $args );
?>

<div data-barba="container" data-barba-namespace="portfolio-detail">
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
<?php
if ( $portfolio->have_posts() ) { ?>
    <div class="contents-portfolio">
      <div class="page-portfolioSingle">
        <div class="page-portfolioSingle_listWrap">
          <div class="page-portfolioSingle_list">
            <div class="js-slider-portfolio-single swiper">
              <div class="swiper-wrapper">
<?php while ( $portfolio->have_posts()) : $portfolio->the_post();

if ( ! isset( $first_data ) ) {

  $keys = array('theme', 'materials', 'size', 'place', 'note' );

  $first_data['title'] = get_the_title( get_the_ID() );
  foreach ( $keys as $key ) {
    $this_data = get_field( $key , get_the_ID() );
    $first_data[$key] = ( null != $this_data ) ? $this_data : '';
  }
  $date = get_field('date' , get_the_ID() );
  $first_data['date'] = ( null != $date ) ? date('F, d. Y', mktime(0,0,0,substr( $date, 3, 2 ),substr( $date, 0, 2 ),substr( $date, 6, 4))) : '';
} 

?>
                <div class="swiper-slide" data-post-id="<?php echo get_the_ID(); ?>">
                  <p class="page-portfolioSingle_item">
<?php
$image_id = get_field('image' , get_the_ID() );

// デフォルトの画像
$default_img = wp_get_attachment_image_src(
  $image_id, // 取得したい画像のID
  'default' // 画像サイズを指定
);

// サムネイルの画像
$thumbnail_img = wp_get_attachment_image_src(
  $image_id, // 取得したい画像のID
  'thumbnail' // 画像サイズを指定
);
?>
                    <!-- フルサイズの画像へリンク(ポップアップ表示) -->
                    <a href="<?php echo $default_img [0]; ?>" class="barba-prevent">
                      <!-- 一覧の表示はサムネイル -->
                      <img src="<?php echo $thumbnail_img[0]; ?>" alt="" loading="lazy">
                    </a>
                  </p>
                </div>
<?php   endwhile; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="aside-portfolio">
      <div class="portfolio-data">
        <ul class="controller">
          <li class="controller_item">
            <button class="controller_button is-prev js-prev">戻る<svg aria-label="戻る" width="48" height="48"><use xlink:href="#icon-arrow-prev"></use></svg></button>
          </li>
          <li class="controller_item">
            <button class="controller_button is-next js-next">進む<svg aria-label="進む" width="48" height="48"><use xlink:href="#icon-arrow-next"></use></svg></button>
          </li>
        </ul>
        <dl>
          <div class="theme">
            <dt>Theme</dt>
            <dd class="js-portfolioData-theme"><?php echo $first_data['theme']->name; ?></dd>
          </div>
          <div class="title">
            <dt>Title</dt>
            <dd class="js-portfolioData-title"><?php echo $first_data['title']; ?></dd>
          </div>
          <div>
            <dt>Materials</dt>
            <dd class="js-portfolioData-materials"><?php echo $first_data['materials']; ?></dd>
          </div>
          <div>
            <dt>Size </dt>
            <dd class="js-portfolioData-size"><?php echo $first_data['size']; ?></dd>
          </div>
          <div>
            <dt>Place</dt>
            <dd class="js-portfolioData-place"><?php echo $first_data['place']; ?></dd>
          </div>
          <div>
            <dt>Date</dt>
            <dd class="js-portfolioData-date"><?php echo $first_data['date']; ?></dd>
          </div>
          <div>
            <dt>Note</dt>
            <dd class="js-portfolioData-note"><?php echo $first_data['note']; ?></dd>
          </div>
        </dl>
      </div>
    </div>
<?php } ?>

  <footer class="footer"><?php get_template_part('template-parts/svg', 'copyright'); ?></footer>
  </div>
</div>

<?php get_footer(); ?>
