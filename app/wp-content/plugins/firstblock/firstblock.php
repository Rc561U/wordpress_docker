<?php

/*
Plugin Name: first plugin
Description: Bullsheet
Version: 1.0
*/

function gutenberg_examples_01_register_block() {
    register_block_type( __DIR__ );
}
add_action( 'init', 'gutenberg_examples_01_register_block' );
