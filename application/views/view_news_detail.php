<!--Banner Start-->
<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $news_detail['banner']; ?>)">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1><?php echo $news_detail['news_title']; ?></h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Blog-One Start-->
<div class="blog-one-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-blog">
                    <img src="<?php echo base_url(); ?>public/uploads/<?php echo $news_detail['photo']; ?>" alt="News Photo">
                    <h3><?php echo $news_detail['news_title']; ?></h3>
                    <ul>
                        <li><i class="fa fa-edit"></i><a href="<?php echo base_url(); ?>category/<?php echo $news_detail['category_id']; ?>"><?php echo $news_detail['category_name']; ?></a></li>
                        <li><i class="fa fa-calendar-o"></i>
                            <?php 
                            $dt = explode('/',$news_detail['news_date']);
                            if($dt[1] == '01') {$month = 'Janeiro';}
                            if($dt[1] == '02') {$month = 'Fevereiro';}
                            if($dt[1] == '03') {$month = 'Março';}
                            if($dt[1] == '04') {$month = 'Abril';}
                            if($dt[1] == '05') {$month = 'Maio';}
                            if($dt[1] == '06') {$month = 'Junho';}
                            if($dt[1] == '07') {$month = 'Julho';}
                            if($dt[1] == '08') {$month = 'Agosto';}
                            if($dt[1] == '09') {$month = 'Setembro';}
                            if($dt[1] == '10') {$month = 'Outubro';}
                            if($dt[1] == '11') {$month = 'Novembro';}
                            if($dt[1] == '12') {$month = 'Dezembro';}
                            echo $dt[0] .' '.$month . ' ' . $dt[2];
                            ?>
                        </li>
                    </ul>
                    <?php echo $news_detail['news_content']; ?>
                </div>
                
                <div class="comment-form headstyle mt_50">
                    <h4><?php echo SHARE_THIS_NEWS; ?></h4>
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_google_plus"></a>
                    <a class="a2a_button_pinterest"></a>
                    <a class="a2a_button_linkedin"></a>
                    <a class="a2a_button_digg"></a>
                    <a class="a2a_button_tumblr"></a>
                    <a class="a2a_button_reddit"></a>
                    <a class="a2a_button_stumbleupon"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                </div>

                <?php if($news_detail['comment'] == 'On'): ?>
                <div class="comment-form headstyle mt_50">
                    <h4><?php echo COMMENT; ?></h4>
                    <div class="comment-inner">
                        <?php
                        $final_url = base_url().'news/view/'.$id;
                        ?>
                        <div class="fb-comments" data-href="<?php echo $final_url; ?>" data-numposts="5"></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!--Sidebar Start-->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-item">
                        <?php echo form_open(base_url().'search'); ?>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="<?php echo SEARCH_FOR; ?>" name="search_string" autocomplete="off">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="form1"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="sidebar-item">
                        <h3><?php echo $setting['sidebar_news_heading_category']; ?></h3>
                        <ul>
                            <?php
                            foreach($all_categories as $row) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>category/<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="sidebar-item">
                        <h3><?php echo $setting['sidebar_news_heading_recent_post']; ?></h3>
                        <?php
                        $i=0;
                        foreach($news as $row) {
                            $i++;
                            if($i>$setting['sidebar_total_recent_post']) {
                                break;
                            }
                            ?>
                            <div class="sidebar-recent-item">
                                <div class="recent-photo">
                                    <a href="<?php echo base_url(); ?>news/view/<?php echo $row['news_id']; ?>"><img src="<?php echo base_url().'public/uploads/'.$row['photo']; ?>" alt="Blog Photo"></a>
                                </div>
                                <div class="recent-text">
                                    <a href="<?php echo base_url(); ?>news/view/<?php echo $row['news_id']; ?>"><?php echo $row['news_title']; ?></a>
                                    <div class="rpwwt-post-date">
                                        <?php 
                                        $dt = explode('/',$row['news_date']);
                                        if($dt[1] == '01') {$month = 'Janeiro';}
                                        if($dt[1] == '02') {$month = 'Fevereiro';}
                                        if($dt[1] == '03') {$month = 'Março';}
                                        if($dt[1] == '04') {$month = 'Abril';}
                                        if($dt[1] == '05') {$month = 'Maio';}
                                        if($dt[1] == '06') {$month = 'Junho';}
                                        if($dt[1] == '07') {$month = 'Julho';}
                                        if($dt[1] == '08') {$month = 'Agosto';}
                                        if($dt[1] == '09') {$month = 'Setembro';}
                                        if($dt[1] == '10') {$month = 'Outubro';}
                                        if($dt[1] == '11') {$month = 'Novembro';}
                                        if($dt[1] == '12') {$month = 'Dezembro';}
                                        echo $dt[0] .' '.$month . ' ' . $dt[2];
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!--Sidebar End-->
        </div>
    </div>
</div>
<!--Blog-One End-->