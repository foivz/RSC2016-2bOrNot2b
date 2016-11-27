<?php
	include("../include/twitter/twitterapi.php");
	
	
	$settings = array(
        'consumer_key' => '24SUEJXXT4E9BAoNgPxcUcToU',
        'consumer_secret' => 'Z6vXwIbjGQs2ZmF6trRKrs7tJagZnJO20XvCZra6CRjtIQPJ2z',
        'oauth_access_token' => '254250079-0WkSLzSjRQ2sK5iAJGlDmkbdlIqOh8vXEdKTBBlF',
        'oauth_access_token_secret' => '3t9SvppXpx416wEw6GzZcGIFsmGldYKDRuTDRtqqNi39R'
    );
	
	echo "Here";

	$twitter = new TwitterAPIExchange($settings);
	
	$tweets = json_decode($twitter->buildOauth("https://api.twitter.com/1.1/oauth/request_token", "GET")->performRequest());
	
	echo $tweets; 
