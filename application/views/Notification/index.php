<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">
            Notifications
            <a href="<?php echo base_url('create-notification');?>" class="btn btn-outline-primary right-float">
                <i class="fa fa-plus"></i> Create
            </a>
        </h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="activity">
            <div class="activity-box">
                <ul class="activity-list">
                    <?php if(!empty($list)){
                        foreach($list as $key => $value){

                            if($value->noti_status != 'new'){
                                $new = 'bg-light';
                            }else{
                                $new = '';
                            }
                    ?>
                            <li class="<?= $new;?>">
                                <div class="activity-user">
                                    <a href="#" title="<?php echo $value->full_name;?>" data-toggle="tooltip" class="avatar">
                                        <?php if(!empty($value->image)){?>
                                                <img alt="<?php echo $value->full_name;?>" src="<?php echo $value->image;?>" class="img-fluid rounded-circle">
                                        <?php }else{?>
                                                <div class="img-fluid rounded-circle initials-name">
                                                    <h1>
                                                        <?php echo $this->user_lib->getInitials("Rohit Kumar Mishra");?>
                                                    </h1>
                                                </div>
                                        <?php }?>
                                    </a>
                                </div>
                                <div class="activity-content <?= $new;?>">
                                    <div class="timeline-content">
                                        <a href="profile.html" class="name"><?php echo $value->full_name;?></a> added new task <a
                                            href="<?php echo base_url('read-notification/'.$value->notification_ID);?>"><?php echo $value->title;?></a>
                                        <span class="time">
                                            <?php echo $this->user_lib->timeAgo($value->notify_date);?>
                                        </span>
                                    </div>
                                </div>
                                <?php if($value->noti_status != 'seen'){
                                ?>
                                    <span class="badge badge-pill badge-notify float-right">New</span>
                                <?php }?>
                            </li>
                        <?php }}?>
                </ul>
            </div>
        </div>
    </div>
</div>