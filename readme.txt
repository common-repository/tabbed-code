=== TabbedCode ===
Contributors: rinma
Donate link: https://marvin-dalheimer.de
Tags: tabs,code,tabbed,snippets,examples,tabbedcode,tabbed code
Requires at least: 4.7
Tested up to: 4.7.4
Stable tag: 1.0
License: WTFPL
License URI: http://www.wtfpl.net/txt/copying/

Adds Shortcodes for adding code examples in tabs to your blog.

== Description ==

Adds Shortcodes for adding code examples in tabs to your blog.

The Plugin adds two shortcodes.
The first is [tab_group] and it needs an id. This id must be unique!
The second is [tab_code] and it takes the language from your code snippet as parameter.
You can use all languages from highlight.js.
When no language is provided the text will be interpreted as a simple text.

Example:

    [tab_group id="hello-world"]
        [tab_code lang="javascript"]
            console.log("Hello World");
        [/tab_code]
        [tab_code lang="sql"]
            SELECT * FROM hello_world;
        [/tab_code]
        [tab_code]
            Hello World
        [/tab_code]
    [/tab_group]

== Installation ==

1. Install the plugin through the WordPress plugins screen directly or upload the plugin to `/wp-content/plugins/TabbedCode` directory
1. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

== Screenshots ==

1. Example tab group for code

== Changelog ==

= 1.0 =
* Release

== Upgrade Notice ==

= 1.0 =
Added Shortcodes for code snippet tabs