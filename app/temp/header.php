<?php
	session_start();
	if(isset($_SESSION['usertoken']) && !isset($_GET['token'])) {
		header("location: ?token=" . $_SESSION['usertoken']);
	} 
?>

<!DOCTYPE html>
<html dir="ltr" lang="en" itemscope itemtype="http://schema.org/LocalBusiness" prefix="og: http://ogp.me/ns# foaf: http://xmlns.com/foaf/0.1/ dc: http://purl.org/dc/elements/1.1/ content: http://purl.org/rss/1.0/modules/content/ dcat: http://www.w3.org/ns/dcat# dqv: http://www.w3.org/ns/dqv# dct: http://purl.org/dc/terms/ rdfs: http://www.w3.org/2000/01/rdf-schema# sioc: http://rdfs.org/sioc/ns# sioct: http://rdfs.org/sioc/types# skos: http://www.w3.org/2004/02/skos/core# owl: http://www.w3.org/2002/07/owl# xsd: http://www.w3.org/2001/XMLSchema# schema: http://schema.org/ fb: http://ogp.me/ns/fb#">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0, width=device-width, user-scalable=yes, minimal-ui">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="320">
    
    <meta name="keywords" content="squizless, quiz, web app">
    <meta name="description" content="Squizless is a online quiz platform that provides you to create quiz and fully moderate with it only using social network's account.">
    
    <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
    
    <link href="//www.squizless.com" rel="dns-prefetch">
    <link href="//squizless.com" rel="preconnect">
    
    <link href="//cdnjs.cloudflare.com" rel="dns-prefetch">
    <link href="//cdnjs.cloudflare.com" rel="preconnect">
    
    <link href="//code.jquery.com" rel="dns-prefetch">
    <link href="//code.jquery.com" rel="preconnect">
    

    <title>Squizless - Hello!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/api.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("select").change(function(){
                $(this).find("option:selected").each(function(){
                    if($(this).attr("value")=="single"){
                        $(".box").not(".red").hide();
                        $(".red").show();
                    }
                    else if($(this).attr("value")=="multiple"){
                        $(".box").not(".green").hide();
                        $(".green").show();
                    }
                    else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>
    
    <script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"WebSite","name":"Squizless","alternateName":"Squizless","url":"http:\/\/www.squizless.com"}</script>
</head>

<body itemscope itemtype="http://schema.org/WebPage">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

    <div id="wrapper">
	
    <header itemscope itemtype="http://schema.org/WPHeader" aria-label="Header" role="banner">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" itemscope itemtype="http://schema.org/SiteNavigationElement" aria-label="Mobile menu">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" itemprop="url" title="Home" accesskey="h"><bold><i class="fa fa-home" aria-hidden="true"></i></bold></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li data-command="get_self_info" class="dropdown">
                    <img src="#" data-attr="src" data-var="user_picture" class="img-circle" alt="User Image">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-var="user_name" title="Your Name"> Your Name <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../api/auth/logout.php" title="Log out" itemprop="url"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        </header>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">