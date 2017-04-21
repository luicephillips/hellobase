<?php
global $hellobaseShortcodes;
class hellobaseShortcodes {

	// Constaruct
    public function __construct() { }

	/*
	 * Button Shortcode
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

	public function add_hooks(){

		 // Button Short Code
        add_shortcode('Button', array($this, 'view_button'));

	}

}
$hellobaseShortcodes = new hellobaseShortcodes();
$hellobaseShortcodes -> add_hooks();
