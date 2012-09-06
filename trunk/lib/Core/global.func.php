<?php

function getClientIP(){
	if(getenv('HTTP_CLIENT_IP')) return getenv('HTTP_CLIENT_IP');
	if(getenv('HTTP_X_FORWARDED_FOR')) return getenv('HTTP_X_FORWARDED_FOR');
	if(getenv('REMOTE_ADDR')) return getenv('REMOTE_ADDR');
	if(isset($_SERVER['REMOTE_ADDR'])) return $_SERVER['REMOTE_ADDR'];

	return false;
}
