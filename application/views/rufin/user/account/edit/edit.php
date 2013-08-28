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
                        <span><?php echo $name; ?></span>
                        <div class="clear"></div>
                        <input type="text" name="name" placeholder="<?php echo $name; ?>" <?php if(form_error('name')){ ?> class="border-red" <?php } ?> <?php input_post_val($this->input->post('name')); ?>>
                    </div>
                    <div class="form-row">
                        <span><?php echo $surname; ?></span>
                        <div class="clear"></div>
                        <input type="text" name="surname" title="<?php echo $surname; ?>"placeholder="<?php echo $surname; ?>" <?php if(form_error('surname')){ ?> class="border-red" <?php } ?> <?php input_post_val($this->input->post('surname')); ?>>
                    </div>
                    <div class="form-submit right">
                        <input type="submit" class="btn btn-success" value="<?php echo $save; ?>">
                    </div>
                </div>
            </form>
            <div class="clear"></div>
        </div>
    </div>
</div>
