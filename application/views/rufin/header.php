<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="themes/v1/css/css.css"/>
	<script type="text/javascript" src="themes/v1/js/jquery.js"></script>
    <script type="text/javascript" src="themes/v1/js/javascript.js"></script>
</head>
<body>
    <div class="page">
        <div class="header">
            <div class="logo">
                <!-- my localhost url -->
                <a href="/rufin"><?php echo $this->config->config['site_name']; ?></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="about"><?php echo lang('header_about'); ?></a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="page-content">