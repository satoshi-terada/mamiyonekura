<?php
  add_theme_support('post-thumbnails');
  // 画像リサイズの設定
  add_image_size('thumbnail', 1080, 1080, false);
  add_image_size('default', 1920, 1920, false);
  function remove_default_img_sizes($sizes){
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    unset($sizes['large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
    }
  add_filter('intermediate_image_sizes_advanced', 'remove_default_img_sizes');

  function token_remove_menu() {
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
  }
  add_action( 'admin_menu', 'token_remove_menu' );
