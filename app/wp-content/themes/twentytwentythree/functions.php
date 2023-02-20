<?php

function blocks_theme_setup(){
    add_theme_support("editor-styles");
    add_editor_style('styles/style-editor.css');
    add_theme_support("responsive-embeds");
}

add_action('after_setup_theme', 'blocks_theme_setup');


