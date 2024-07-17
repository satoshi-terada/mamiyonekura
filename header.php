<!DOCTYPE html>
<html lang="ja" style="--color-text: #131313;">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <?php if(is_post_type_archive('news')) { ?>
    <title>NEWS | MAMI YONEKURA | 米倉万美</title>
  <?php } elseif(is_post_type_archive('portfolio') || is_tax('portfolio_theme')) { ?>
    <title>PORTFOLIO | MAMI YONEKURA | 米倉万美</title>
  <?php } elseif(is_page()) { ?>
    <title><?php the_title(); ?> | MAMI YONEKURA | 米倉万美</title>
  <?php } else { ?>
    <title>MAMI YONEKURA | 米倉万美</title>
  <?php } ?>
  <meta name="description" content="MAMI YONEKURA Official Site｜米倉万美の公式ウェブサイト。">
  <link rel="icon" href="https://mamiyonekura.com/favicon.ico">

  <?php if ( $_SERVER['HTTP_HOST'] !== 'yonekura.local' && $_SERVER['HTTP_HOST'] !== 'localhost' ) { ?>
    <script src="https://webfont.fontplus.jp/accessor/script/fontplus.js?jK4z3FR5ipQ%3D&box=9Prs0hX5dv8%3D&aa=1&ab=2"></script>
  <?php } ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y6QZZSD8ZJ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-Y6QZZSD8ZJ');
  </script>
</head>
<body data-barba="wrapper">
