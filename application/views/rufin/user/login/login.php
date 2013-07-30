<div class="page-content">
    <div class="login form">
        <div class="content-header">
            <span><?php echo $login; ?></span>
        </div>
        <form action="" method="">
        <div class="form-area">
            <div class="form-row">
                <span><?php echo $username; ?></span>
                <div class="clear"></div>
                <input type="text" name="username" placeholder="<?php echo $username; ?>">
            </div>
            <div class="form-row">
                <span><?php echo $password; ?></span>
                <div class="clear"></div>
                <input type="password" name="password" placeholder="<?php echo $password; ?>">
            </div>
            <div class="form-submit right">
                <input type="submit" class="btn btn-success" value="<?php echo $login; ?>">
            </div>
        </div>
        </form>
    </div>
</div>