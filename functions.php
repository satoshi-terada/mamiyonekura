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


/**
 * WordPressでAJAXを利用するためのJSを出力
 */
function mysite_search_ajax() {
  ?>
  <script>var mysite_ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';</script>
 <?php
 }

function get_portfolio_info( $post_id = 0 ) {
  
  $keys = array('materials', 'size', 'place', 'note' );
  $res_data = array();


  if ( isset( $_GET['post_id'] ) && is_numeric( $_GET['post_id'] ) && $_GET['post_id'] > 0 ) {
		$post_id = sanitize_key( $_GET['post_id'] );

    $theme = get_field('theme' , $post_id );

    if ( null == $theme ) {
      $res_data['code'] = false;
    } else {
      $res_data['data']['theme'] = $theme->name;
      $res_data['data']['title'] = get_the_title( $post_id );


      foreach ( $keys as $key ) {
        $this_data = get_field($key , $post_id );
        $res_data['data'][$key] = ( null != $this_data ) ? $this_data : '';
      }

      $date = get_field('date' , $post_id );
      $res_data['data']['date'] = ( null != $date ) ? date('F, d. Y', mktime(0,0,0,substr( $date, 3, 2 ),substr( $date, 0, 2 ),substr( $date, 6, 4))) : '';
      $res_data['code'] = true;
    }
  } else {
    $res_data['code'] = false;
  }

  echo json_encode( $res_data );
	die();
}

add_action( 'wp_footer', 'mysite_search_ajax', 1 );

add_action( 'wp_ajax_get_portfolio_info', 'get_portfolio_info' );
add_action( 'wp_ajax_nopriv_get_portfolio_info', 'get_portfolio_info' );