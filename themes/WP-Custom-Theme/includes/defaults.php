<?php

add_action( 'init', 'ct_add_theme_support', 0 );
function ct_add_theme_support() {
	add_theme_support('post-thumbnails');
}
