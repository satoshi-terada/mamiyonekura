<?php
/**
 *
 * @package theme template.
 */

// フロント用function
(function() {
  if (is_admin()) return false;

  require_once(__DIR__ . '/functions/front/common.php');
  require_once(__DIR__ . '/functions/front/analytics.php');
})();

// 管理画面用function
(function() {
  if (!is_admin()) return false;

  require_once(__DIR__ . '/functions/admin/common.php');
})();

// プラグイン用function
require_once(__DIR__ . '/functions/plugins/ewww.php');


function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'post'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);
