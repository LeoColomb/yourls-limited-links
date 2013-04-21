<?php
/*
Plugin Name: Limitation of redirections
Plugin URI: https://github.com/LeoColomb/Limited-Links-for-Yourls
Description: Plugin to limit redirections of a specific link with a '_' + 'number' added to this link
Version: 1.1
Author: Leo Colomb
Author URI: http://colombaro.fr/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// You can modify the character before number
define( 'LIMIT_BEFORE_CHAR', '_' );

// do something, if yourls doesn't recognise a valid short link
yourls_add_action( 'loader_failed', 'lpc_limit_request' );

function lpc_limit_request($args) {
	$request = $args[0];
	$pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );
	if( preg_match( "@^([$pattern]+)".LIMIT_BEFORE_CHAR."[0-9]$@", $request, $matches ) ) {
		$keyword = isset( $matches[1] ) ? $matches[1] : '';
		$keyword = yourls_sanitize_keyword( $keyword );
		$number = substr($request, strrpos($request, LIMIT_BEFORE_CHAR) + 1);
		if( yourls_is_shorturl( $keyword ) ) {
			lpc_do_or_not_redirect( $keyword, $number );
			die();
		}
	}
}

function lpc_do_or_not_redirect( $keyword, $number ) {
	$totalClicks = yourls_get_keyword_clicks( $keyword );
	if ( $number <= $totalClicks ){
		yourls_redirect( YOURLS_SITE, 301 );
	} else {
		// Update click count in main table
		$update_clicks = yourls_update_clicks( $keyword );
		// Update detailed log for stats
		$log_redirect = yourls_log_redirect( $keyword );
		$url = yourls_get_keyword_longurl( $keyword );
		yourls_redirect( $url, 301 );	
	}
}
