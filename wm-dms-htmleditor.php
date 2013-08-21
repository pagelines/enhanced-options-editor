<?php
/*
	Plugin Name: DMS Options HTML Editor
	Plugin URI: http://slipperysource.com/downloads/enhanced-options-editor-for-pagelines-dms/
	Description: Turns any text input field or textrea within the DMS section options into an HTML editor
	Version: 1.0
	Author: William Mincy
	Author URI: http://slipperysource.com/
*/

function wmHtmlEditorEnable() {
	include_once(dirname(__FILE__)."/js/scripts.php");
}
add_action( 'pagelines_start_footer', 'wmHtmlEditorEnable', 5 );