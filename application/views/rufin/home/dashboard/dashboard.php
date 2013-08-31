<div class="dashboard">
    <div class="main">
        <div class="new-diary box">
            <div class="new-diary-button"><?php echo $new; ?></div>
            <div class="new-diary-form box" id="home-new-diary-form">
                <div>
                    <form action="new-diary" method="post">
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
                                <div class="btn btn-danger" id="form-cancel" rel="home-new-diary-form"><?php echo $cancel; ?></div>
                                <input type="submit" class="btn btn-success" value="<?php echo $save; ?>">
                            </div>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
