<?php
/*
Plugin Name: Storefront Widgets
Plugin URI: https://github.com/YoursLtd/storefront-widgets
Author: JointByte - Anthony Iacono
Author URI: http://yoursltd.com
Version: 1.0
Text Domain: storefront-widgets
*/

add_action('widgets_init', 'sfwidgets_widgets_init');
add_action('storefront_before_footer', 'sfwidgets_render_after_product_widget', 5);
add_action('storefront_content_top', 'sfwidgets_render_before_shop_loop', 15);
add_action('storefront_before_footer', 'sfwidgets_render_after_shop_loop', 7);

function sfwidgets_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Storefront Before Shop Loop', 'storefront-widgets'),
		'id' => 'storefront-before-shop-loop',
		'description' => __( 'Widgets in this area will be shown before the shop loop.', 'storefront-widgets'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widgettitle">',
		'after_title'   => '</p>',
	));

    register_sidebar(array(
        'name' => __( 'Storefront After Shop Loop', 'storefront-widgets'),
        'id' => 'storefront-after-shop-loop',
        'description' => __( 'Widgets in this area will be shown after the shop loop.', 'storefront-widgets'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="widgettitle">',
        'after_title'   => '</p>',
    ));

    register_sidebar(array(
        'name' => __( 'Storefront After Product', 'storefront-widgets'),
        'id' => 'storefront-after-product',
        'description' => __( 'Widgets in this area will be shown after the product details.', 'storefront-widgets'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="widgettitle">',
        'after_title'   => '</p>',
    ));
}

function sfwidgets_render_after_product_widget() {
	if(!is_singular( 'product' )) {
		return;
	}

	echo("<div id=\"storefront-after-product-widgets\">");
	dynamic_sidebar('storefront-after-product');
	echo("</div>");
}

function sfwidgets_render_before_shop_loop() {
    if(!is_shop()) {
        return;
    }

    echo("<div id=\"storefront-before-shop-loop-widgets\">");
    dynamic_sidebar('storefront-before-shop-loop');
    echo("</div>");
}

function sfwidgets_render_after_shop_loop() {
    if(!is_shop()) {
        return;
    }

    echo("<div id=\"storefront-after-shop-loop-widgets\">");
    dynamic_sidebar('storefront-after-shop-loop');
    echo("</div>");
}