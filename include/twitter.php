<?php
	include_once("../include/twitter/TwitterOAuth.php");
	
	use TwitterOAuth\TwitterOAuth;
	
	$config = array(
        'consumer_key' => '24SUEJXXT4E9BAoNgPxcUcToU',
        'consumer_secret' => 'Z6vXwIbjGQs2ZmF6trRKrs7tJagZnJO20XvCZra6CRjtIQPJ2z',
        'oauth_token' => '254250079-0WkSLzSjRQ2sK5iAJGlDmkbdlIqOh8vXEdKTBBlF',
        'oauth_token_secret' => '3t9SvppXpx416wEw6GzZcGIFsmGldYKDRuTDRtqqNi39R',
        'output_format' => 'json'
    );
	
	echo "Here";

    /**
     * Instantiate TwitterOAuth class with set tokens
     */
    $tw = new TwitterOAuth($config);

	
	$response = $tw->get('oauth/request_token', $params);

    var_dump($response);