<!DOCTYPE html>
<html>
<head>
	<?php echo create_meta_tags($page_title); ?>
<head>
<body>
    <div class="page">
        <div class="header">
            <div class="logo">
                <a href="<?php echo $this->config->config['base_url']; ?>"><?php echo $this->config->config['site_name']; ?></a>
            </div>
            <div class="menu">
                <ul>
                    <!--
                    <li><a href="/signup"><?php echo $this->lang->line('signup'); ?></a></li>
                    <li><a href="/login"><?php echo $this->lang->line('login'); ?></a></li>
                    -->
                </ul>
            </div>
        </div>
        <hr>
        <div class="page-content">