<div class="dashboard">
    <div class="main">
        <div class="form">
            <div class="content-header">
                <span><?php echo $form_title; ?></span>
            </div>
            <?php
            if(validation_errors()){
                ?>
                <div class="form-error-area">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            }
            ?>
            <form action="" method="post">
                <div class="form-area">
                    <div class="form-row">
                        <span><?php echo $username; ?></span>
                        <div class="clear"></div>
                        <input type="text" name="username" placeholder="<?php echo $username; ?>" <?php if(form_error('username')){ ?> class="border-red" <?php } ?> <?php input_post_val($this->input->post('username')); ?>>
                    </div>
                    <div class="form-row">
                        <span><?php echo $password; ?></span>
                        <div class="clear"></div>
                        <input type="password" name="password" title="<?php echo $password; ?>"placeholder="<?php echo $password; ?>" <?php if(form_error('password')){ ?> class="border-red" <?php } ?> <?php input_post_val($this->input->post('password')); ?>>
                    </div>
                    <div class="form-submit right">
                        <input type="submit" class="btn btn-success" value="<?php echo $login; ?>">
                    </div>
                </div>
            </form>
            <div class="clear"></div>
        </div>
    </div>
</div>
