<?php

/*
Plugin Name: Tabbed Code
Plugin URI: http://rinma.pages.over-world.org/Tabbed-Code
Description: Adds Shortcodes for adding code examples in tabs to your blog.
Version: 1.0
Author: Marvin Dalheimer <me@marvin-dalheimer.de>
Author URI: https://marvin-dalheimer.de
License: WTFPL
*/

function tc_enqueue_style() {
    wp_enqueue_style(
        "highlight-js-css",
        plugin_dir_url(__FILE__) . "assets/css/atom-one-light.css"
    );
    wp_enqueue_style(
        "jquery-ui-min",
        plugin_dir_url(__FILE__) . "assets/css/jquery-ui.min.css"
    );
    wp_enqueue_style(
        "jquery-ui-structure-min",
        plugin_dir_url(__FILE__) . "assets/css/jquery-ui.structure.min.css"
    );
    wp_enqueue_style(
        "jquery-ui-theme-min",
        plugin_dir_url(__FILE__) . "assets/css/jquery-ui.theme.min.css"
    );
    wp_enqueue_style(
        "tc-style",
        plugin_dir_url(__FILE__) . "assets/css/tc_style.css"
    );
}

function tc_enqueue_script() {
    wp_enqueue_script(
        "highlightjs",
        plugin_dir_url(__FILE__) . "assets/js/highlight.pack.js"
    );
    wp_enqueue_script(
        "tc_init_highlight",
        plugin_dir_url(__FILE__) . "assets/js/initHighlight.js",
        [
            "highlightjs"
        ]
    );
    wp_enqueue_script(
        "tc_components",
        plugin_dir_url(__FILE__) . "assets/js/tabbedCode.js",
        [
            "jquery",
            "jquery-ui-core",
            "jquery-ui-tabs",
        ],
        true,
        true
    );
}

// Add Shortcode
function tc_tab_group( $atts , $content = null ) {

    $atts = shortcode_atts(
        array(
            'id' => rand(1, 100),
        ),
        $atts
    );

    $tabGroupId = esc_html($atts["id"]);
    $out = "<div class='tc_tab_group' id='" . $tabGroupId . "' data-tab-group-id='" . $tabGroupId . "'>";
    $out .= "<ul id='" . $tabGroupId . "-list'>";
    $out .= "</ul>";
    $out .= do_shortcode(trim(
        str_replace(
            '<br />',
            '',
            $content
        )
    ));
    $out .= "</div>";

    return $out;
}
// Add Shortcode
function tc_tab_code( $atts , $content = null ) {

    // Attributes
    $atts = shortcode_atts(
        array(
            'lang' => 'nohighlight',
        ),
        $atts
    );


    $tabLang = esc_html($atts["lang"]);
    $tabId = uniqid();

    $out = "<div class='tc_tab' id='" . $tabId . "' data-tab-id='" . $tabId . "' data-tab-lang='" . $tabLang . "'>";
    $out .= "<pre class='tc_tab_code_pre'><code class='tc_tab_code " . $tabLang . "'>";
    $out .= esc_html(
        trim(
            str_replace(
                '<br />',
                '',
                $content
            )
        )
    );
    $out .= "</code></pre>";
    $out .= "</div>";

    return $out;

}

function tc_shortcodes_init()
{
    add_shortcode( 'tab_group', 'tc_tab_group' );
    add_shortcode( 'tab_code', 'tc_tab_code' );
}

add_action( 'wp_enqueue_scripts', 'tc_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'tc_enqueue_script' );
add_action('init', 'tc_shortcodes_init');
