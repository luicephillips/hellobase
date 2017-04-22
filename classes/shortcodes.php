<?php
/* Shortcodes Class
 *
 * @package Hellobase
 * @since 1.0.0
 */


global $hellobaseshortcodes;
class hellobaseShortcodes {

	// Constaruct
    public function __construct() { }

	/*
	 * Button Shortcode
	 * @package Hellobase
     * @since 1.0.0
	 */
	function view_button($option, $content) {
        $html = '';
        if (!isset($option['target'])) {
            $option['target'] = '_self';
        }
        if (isset($option['title'])) {
            $title = $option['title'];
        } else {
            $title = $content;
        }
        $html .= '<a href="' . $option['href'] . '" class="btn ' . $option['class'] . '" title="' . strip_tags($title) . '">' . $content . '</a>';
        //echo $content;
        return $html;
    }

	/*
	 * Add Shortcodes Hooks
	 * @package Hellobase
     * @since 1.0.0
	 */
	public function add_hooks(){

		// Button Short Code
        add_shortcode('Button', array($this, 'view_button'));

	}
}
$hellobaseshortcodes = new hellobaseShortcodes();
$hellobaseshortcodes -> add_hooks();
