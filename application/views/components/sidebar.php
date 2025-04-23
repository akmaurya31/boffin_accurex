<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <?php
                //$permissions = $this->user_lib->permittions();
                //$rolesPermittions = $this->user_lib->getRolePermitionForUser($this->session->userdata('role_ID'));
                // $combinedArray = [];

                // foreach ($rolesPermittions as $first) {
                //     foreach ($permissions as $second) {
                //         if ($first->permission_id === $second->id) {
                //             $combinedArray[] = (object) [
                //                 'role_id' => $first->role_id,
                //                 'permission_id' => $first->permission_id,
                //                 'segment' => $second->segment,
                //                 'segment_id' => $second->id,
                //                 'url'       => $second->url
                //             ];
                //         }
                //     }
                // }




            ?>
            <ul>
                <li class="menu-title">Main</li>
                    <?php if($this->user_lib->is_has_access('1')){?>
                        <li class="<?php echo ($page == 'Dashboard') ? 'active' : '';?>">
                            <a href="<?php echo base_url('Dashboard');?>">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    <?php }?>

                    <?php if($this->user_lib->is_has_access('2')){?>
                    <?php $list   = $this->user_lib->getAllNotificationDESC($this->session->userdata('user_ID'));?>
                    <li class="<?php echo ($page == 'Notification' || $page == 'Notification/Read' || $page == 'Notification/Create') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('activities');?>">
                            <i class="fa fa-bell-o"></i>
                            <span>Notifications</span>
                            <span class="badge badge-pill bg-navy float-right">
                                <?php echo count($list);?>
                            </span>
                        </a>
                    </li>
                    <?php }?>
                    <?php if($this->user_lib->is_has_access('4')){?>
                    <li class="<?php echo ($page == 'Users' || $page == 'Users/Create') ? 'active' : '';?>">
                        <a href="<?php echo base_url('create-user');?>">
                            <i class="fa fa-user-o"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <?php }?>
            </ul>
        </div>
    </div>
</div>