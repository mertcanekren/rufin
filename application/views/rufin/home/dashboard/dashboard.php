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
        <div class="diary-row">
            <div class="diary-body">
                <div class="diary-date">
                    <div class="diary-date-day">18</div>
                    <div class="diary-date-month">Temmuz</div>
                    <div class="diary-date-year">2013</div>
                </div>
                <div class="diary-content">
                    Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.
                </div>
            </div>
        </div>
    </div>
</div>
