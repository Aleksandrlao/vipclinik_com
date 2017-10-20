<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<script type="text/javascript" src="http://incut.prime-ltd.su/incut/incut.js" async></script>
    <link rel="stylesheet" href="http://incut.prime-ltd.su/incut/incut.css">
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title><?php wp_title('&mdash;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	
	<?php wp_head(); ?>
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62115054-22', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<div class="bg"></div>
<div class="h_modal h_modal-nav">
	<div class="m_close"></div>
	<div class="m_title">Меню</div>
	<nav class="m_nav">
		<?php wp_nav_menu('menu_class=top_menu&theme_location=tnav&container=false'); ?>
	</nav>
</div>

<div class="wrapper">

<?php if (file_exists(TEMPLATEPATH.'/ny-motnya.php')) {require(TEMPLATEPATH.'/ny-motnya.php');}; ?>

<?php ob_start();
	global $woocommerce;
	$viewing_cart = __('Перейти в корзину', 'your-theme-slug');
	$start_shopping = __('Продолжить покупки', 'your-theme-slug');
	$cart_url = $woocommerce->cart->get_cart_url();
	$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
	$cart_contents_count = $woocommerce->cart->cart_contents_count;
	$cart_contents = sprintf(_n('%d товар добавлен', '%d товаров добавлено', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
	$cart_total = $woocommerce->cart->get_cart_total();
	// Раскомментируйте строку ниже для того, чтобы скрыть иконку корзины в меню, когда нет добавленных товаров в корзине.
	$menu_item = "";
	 if ( $cart_contents_count > 0 ) {
	 	$menu_item = '<div class="h_tovar">';
		if ($cart_contents_count == 0) {
			$menu_item .= '<a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
		} else {
			$menu_item .= '<a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
		}

		$menu_item .= '<i class="fa fa-shopping-cart"></i> ';

		$menu_item .= $cart_contents.'<br>Перейти в корзину';
		$menu_item .= '</a></div>';
	// Раскомментируйте стр