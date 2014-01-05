<?php
/*
	Plugin Name: Enhanced Options Editor
	Plugin URI: http://slipperysource.com/downloads/enhanced-options-editor-for-pagelines-dms/
	Description: Turns any text input field or textrea within the DMS section options into an HTML editor
	Version: 1.0.9
	Author: William Mincy
	Author URI: http://slipperysource.com/
	V3: true
*/

function wmHtmlEditorEnable() {
	include_once(dirname(__FILE__)."/js/scripts.php");
}
add_action( 'pagelines_start_footer', 'wmHtmlEditorEnable', 5 );
