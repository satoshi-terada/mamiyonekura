<?php get_header(); ?>

<div data-barba="container" data-barba-namespace="home">
  <div class="wrapper">
    <header class="header">
      <div class="header_about">
        <h1 class="header_about_logo">
          <a href="<?php echo home_url('/'); ?>">
            <picture>
              <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-mami-yonekura-museum.svg" width="380" alt="MAMI YONEKURA MUSEUM" media="(max-width: 1024px)">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo-museum.svg" width="90" alt="MAMI YONEKURA MUSEUM">
            </picture>
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
      </nav>
    </aside>
<?php
// 各種情報を取得
$image    = get_field('image');
$theme    = get_field('theme');
$material = get_field('material');
$size     = get_field('size');
$place    = get_field('place');
$date     = get_field('date');
$note     = get_field('note');
?>
    <div class="contents-portfolio">
      <div class="page-portfolioSingle">
        <div class="page-portfolioSingle_listWrap">
          <div class="page-portfolioSingle_list">
            <div class="js-slider-portfolio-single swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide" data-post-id="10">
                  <p class="page-portfolioSingle_item">

<?php print_r($image); ?>

                  <!-- フルサイズの画像へリンク(ポップアップ表示) -->
                    <a href="https://placehold.jp/608x926.png">
                      <!-- 一覧の表示はサムネイル -->
                      <img src="https://placehold.jp/608x926.png" alt="" loading="lazy">
                    </a>
                  </p>
                </div>
                <div class="swiper-slide" data-post-id="20">
                  <p class="page-portfolioSingle_item">
                    <a href="https://placehold.jp/1920x1080.png">
                      <img src="https://placehold.jp/1920x1080.png" alt="" loading="lazy">
                    </a>
                  </p>
                </div>
                <div class="swiper-slide" data-post-id="30">
                  <p class="page-portfolioSingle_item">
                    <a href="https://placehold.jp/500x500.png">
                      <img src="https://placehold.jp/500x500.png" alt="" loading="lazy">
                    </a>
                  </p>
                </div>
                <div class="swiper-slide" data-post-id="40">
                  <p class="page-portfolioSingle_item">
                    <a href="https://placehold.jp/500x2000.png">
                      <img src="https://placehold.jp/500x2000.png" alt="" loading="lazy">
                    </a>
                  </p>
                </div>
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
            <dt><svg version="1.1" id="レイヤー_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve">
              <g>
                <path class="st0" d="M12,6c0,3.3-2.7,6-6,6c-3.3,0-6-2.7-6-6c0-3.4,2.7-6,6-6C9.3,0,12,2.7,12,6z M0.9,6c0,3.3,2.3,5.9,5.1,5.9
                  c2.8,0,5.1-2.6,5.1-5.9c0-3.3-2.3-5.9-5.1-5.9C3.2,0.1,0.9,2.7,0.9,6z"></path>
              </g>
            </svg>Theme</dt>
            <dd>アブサン と ゴッホさん</dd>
          </div>
          <div class="title">
            <dt>Title</dt>
            <dd>温泉のある風景</dd>
          </div>
          <div>
            <dt>Materials</dt>
            <dd>Canvas, Acrylic, Pencil, Oil paint</dd>
          </div>
          <div>
            <dt>Size </dt>
            <dd>1500mm × 960mm</dd>
          </div>
          <div>
            <dt>Place</dt>
            <dd>Nasu, Tochigi, Japan</dd>
          </div>
          <div>
            <dt>Date</dt>
            <dd>December,  2023</dd>
          </div>
          <div>
            <dt>Note</dt>
            <dd>www.gallert-hanna.com<br>作品の解説はこちらをご覧ください。</dd>
          </div>
        </dl>
      </div>
    </div>
    <footer class="footer"><?php get_template_part('template-parts/svg', 'copyright'); ?></footer>
  </div>
</div>

<?php get_template_part('template-parts/colortip'); ?>
<?php get_footer(); ?>
