<?php
  $args = array(
    'post_type' => 'news',
    'posts_per_page' => 3
  );

  $my_query = new WP_Query( $args );

  // カスタム投稿「news」の場合
  $is_news = is_post_type_archive('news') ? true : false;

  if ( $my_query->have_posts() ) { ?>

<div class="aside-news <?php echo $is_news ? 'is-sticky' : '' ; ?>">
  <div class="news">
    <p class="news_label">NEW</p>
    <div class="news_list">

<?php while ( $my_query->have_posts() ) : $my_query->the_post();

if ( get_field('is_english', get_the_ID() ) ) {
  $is_english = true;
  $event_outline = get_field('event_outline_en', get_the_ID());
} else {
  $is_english = false;
  $event_outline['title'] = get_the_title(  );
} ?>
      <article class="news_item">
        <a href="/news/#post<?php echo the_ID(); ?>" class="news-post">
          <p class="news_icon"><svg version="1.1" id="レイヤー_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
            y="0px" viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve">
          <g>
            <path class="st0" d="M12,6c0,3.3-2.7,6-6,6c-3.3,0-6-2.7-6-6c0-3.4,2.7-6,6-6C9.3,0,12,2.7,12,6z M0.9,6c0,3.3,2.3,5.9,5.1,5.9
              c2.8,0,5.1-2.6,5.1-5.9c0-3.3-2.3-5.9-5.1-5.9C3.2,0.1,0.9,2.7,0.9,6z"/>
          </g>
          </svg></p>
          <h2><?php echo $event_outline['title']; ?></h2>
<?php if ( $is_english ) { ?>
          <p><?php echo $event_outline['address']; ?> / <?php echo $event_outline['place']; ?></p>
          <p><?php echo $event_outline['schedule']; ?></p>
<?php } ?>
        </a>
      </article>
<?php
      endwhile; ?>

    </div>
  </div>
</div>
<?php }
wp_reset_postdata();
?>
