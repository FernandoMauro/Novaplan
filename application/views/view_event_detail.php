<!--Banner Start-->
<div class="banner-slider" style="background-image: url(<?php echo base_url(); ?>public/uploads/<?php echo $event_detail['banner']; ?>)">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1><?php echo $event_detail['event_title']; ?></h1>
        </div>
    </div>
</div>
<!--Banner End-->

<!--Event-Details Start-->
<div class="event-detail pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="event-detail-content">
                    <div class="event-carousel owl-carousel">
                        <div class="event-photo-item">
                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo $event_detail['photo']; ?>" alt="Event Photo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="event-contact-item">
                                <div class="event-contact-icon">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </div>
                                <div class="event-contact-text">
                                    <h4><?php echo EVENT_START_DATE; ?></h4>
                                    <p>
                                        <?php 
                                        $dt = explode('/',$event_detail['event_start_date']);
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
                                        echo $dt[0] .' de '.$month . ' de ' . $dt[2];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="event-contact-item">
                                <div class="event-contact-icon">
                                    <i class="fa fa-flag" aria-hidden="true"></i>
                                </div>
                                <div class="event-contact-text">
                                    <h4><?php echo EVENT_END_DATE; ?></h4>
                                    <p>
                                        <?php 
                                        $dt = explode('/',$event_detail['event_end_date']);
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
                                        echo $dt[0] .' de '.$month . ' de ' . $dt[2];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="offset-md-0 col-md-4 offset-sm-3 col-sm-6 offset-sm-3">
                            <div class="event-contact-item">
                                <div class="event-contact-icon">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="event-contact-text">
                                    <h4><?php echo ADDRESS; ?></h4>
                                    <p>
                                        <?php echo nl2br($event_detail['event_location']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-detail-text">
                        <h3><?php echo $event_detail['event_title']; ?></h3>
                        <?php echo $event_detail['event_content']; ?>
                    </div>
                </div>
                <div class="event-map headstyle">
                    <h4><?php echo EVENT_LOCATION_MAP; ?></h4>
                    <?php echo $event_detail['event_map']; ?>
                </div>
                <div class="comment-form headstyle mt_50">
                    <h4><?php echo SHARE_THIS_EVENT; ?></h4>
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
            </div>
            <div class="col-lg-4">
                <div class="event-sidebar sidebar">
                    <div class="sidebar-item">
                        <h3><?php echo $setting['sidebar_event_heading_upcoming']; ?></h3>
                        <?php
                        $i=0;
                        foreach($event as $row) {
                            $i++;
                            if($i>$setting['sidebar_total_upcoming_event']) {
                                break;
                            }
                            $today = date('d/m/Y');
                            ?>
                            <?php if($today<$row['event_start_date']): ?>
                            <div class="sidebar-recent-item">
                                <div class="recent-photo">
                                    <a href="<?php echo base_url(); ?>event/view/<?php echo $row['event_id']; ?>"><img src="<?php echo base_url().'public/uploads/'.$row['photo']; ?>" alt="Event Photo"></a>
                                </div>
                                <div class="recent-text">
                                    <a href="<?php echo base_url(); ?>event/view/<?php echo $row['event_id']; ?>"><?php echo $row['event_title']; ?></a>
                                    <div class="rpwwt-post-date"><?php echo START_DATE; ?>: <?php echo $row['event_start_date']; ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="sidebar-item">
                        <h3><?php echo $setting['sidebar_event_heading_past']; ?></h3>
                        <?php
                        $i=0;
                        foreach($event as $row) {
                            $i++;
                            if($i>$setting['sidebar_total_past_event']) {
                                break;
                            }
                            $today = date('d/m/Y');
                            ?>
                            <?php if($today>$row['event_end_date']): ?>
                            <div class="sidebar-recent-item">
                                <div class="recent-photo">
                                    <a href="<?php echo base_url(); ?>event/view/<?php echo $row['event_id']; ?>"><img src="<?php echo base_url().'public/uploads/'.$row['photo']; ?>" alt="Event Photo"></a>
                                </div>
                                <div class="recent-text">
                                    <a href="<?php echo base_url(); ?>event/view/<?php echo $row['event_id']; ?>"><?php echo $row['event_title']; ?></a>
                                    <div class="rpwwt-post-date"><?php echo START_DATE; ?>: <?php echo $row['event_start_date']; ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Event-Details End-->