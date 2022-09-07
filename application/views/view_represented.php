<!--Banner Start-->
<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $setting['banner_represented']; ?>)">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1><?php echo $page_represented['represented_heading']; ?></h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Testimonial-Two Start-->
<div class="testimonial-area testimonial-grid pt_60 pb_90">
    <div class="container">
        <div class="row">
            <?php
            foreach ($represented as $row) {
                ?>
                <div class="col-lg-6 col-md-6">
                    <div class="testimonial-item mt_30">
                        <div class="testimonial-photo">
                            <?php if($row['website']!=''): ?>
                                <div class="brand-item"><a href="<?php echo $row['website']; ?>" target="_blank"><img src="<?php echo base_url(); ?>public/uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>"></a></div>
                            <?php else: ?>
                                <div class="brand-item"><img src="<?php echo base_url(); ?>public/uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>"></div>
                            <?php endif; ?>
                        </div>
                        <div class="testimonial-name">
                            <h4><?php echo $row['name']; ?></h4>
                        </div>
                        <div class="testimonial-description">
                            <p>
                                <?php echo nl2br($row['detail']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!--Testimonial-Two End-->