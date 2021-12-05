<?php
/*
 * Plugin Name:	Traffic Jammer
 * Plugin URI: https://github.com/slick2/wp-traffic-jammer
 * Description:	Blocking of malicious traffic that hog system resources
 * Version:		0.0.1
 * Author:			Carey Dayrit
 * Author URI:		http://careydayrit.com
 * */


 // limit user agents

add_action( 'init', 'wt_limit_user_agents' );

function wt_limit_user_agents(){
	$bots = ['python-requests', 'PetalBot'];
	foreach ($bots as $bot) {
		if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== FALSE) {
			header('HTTP/1.0 403 Forbidden');
			exit;
		}
	}	
}

// limit IP

add_action ( 'init', 'wt_limit_ip');


function wt_limit_ip(){
	$ip = $_SERVER['REMOTE_ADDR'];
	$block_ip = array('5.183.130.110', '5.188.84.3');
	
	if(in_array($ip, $block_ip)){
		header('HTTP/1.0 403 Forbidden');
        exit();
	}
}
