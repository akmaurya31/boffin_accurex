<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Create User</h4>
    </div>
</div>

<style>
    .form-lbl{
        line-height: 27px;
        margin-bottom: 0;
        margin-right: 15px;
        min-width: 100%;
    }
    .upload{
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        z-index: 99;
        opacity: 0.0001;
        cursor: pointer;
    }
    .img-block{
        position: relative;
        max-width: 150px;
        max-height: 150px;
        overflow: hidden;
    }
    #previewImage{
        display: block;
        width: 150px;
        height: 150px;
        border: 1px solid #f75c1e;
        padding: 5px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="card-title">User Information</h4>
            <form action="<?php echo base_url('save-user');?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo set_value('name');?>">
                            <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="select" name="blood_group">
                                <option value="" <?php echo set_select('blood_group', '', False); ?>>Select</option>
                                <option value="A+" <?php echo set_select('blood_group', 'A+', False); ?>>A+</option>
                                <option value="A-" <?php echo set_select('blood_group', 'A+', False); ?>>A-</option>
                                <option value="B+" <?php echo set_select('blood_group', 'B+', False); ?>>B+</option>
                                <option value="B-" <?php echo set_select('blood_group', 'B-', False); ?>>B-</option>
                                <option value="O+" <?php echo set_select('blood_group', 'O+', False); ?>>O+</option>
                                <option value="O-" <?php echo set_select('blood_group', 'O-', False); ?>>O-</option>
                                <option value="AB+" <?php echo set_select('blood_group', 'AB+', False); ?>>AB+</option>
                                <option value="AB-" <?php echo set_select('blood_group', 'AB-', False); ?>>AB-</option>
                            </select>
                            <?php echo form_error('blood_group', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="display-block form-lbl">Gender:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender_male"
                                            value="male" <?php echo  set_radio('gender', 'male', TRUE); ?> >
                                        <label class="form-check-label" for="gender_male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender"
                                            id="gender_female" value="female" <?php echo  set_radio('gender', 'female'); ?> >
                                        <label class="form-check-label" for="gender_female">Female</label>
                                    </div>
                                    <?php echo form_error('gender', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="display-block form-lbl">Status:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="active_status" value="0" <?php echo  set_radio('status', '0', TRUE); ?> >
                                        <label class="form-check-label" for="active_status">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="block_status"
                                            value="1" <?php echo  set_radio('status', '1', TRUE); ?> >
                                        <label class="form-check-label" for="block_status">Block</label>
                                    </div>
                                    <?php echo form_error('status', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Slect Role</label>
                                    <?php
                                        $roles = $this->user_lib->get_all_roles();
                                    ?>
                                    <select class="select" name="role">
                                        <option value="">Select</option>
                                        <?php if(!empty($roles)){
                                                foreach($roles as $role){ ?>
                                                    <option value="<?php echo $role->id;?>" <?php echo set_select('role', $role->id, False); ?>>
                                                        <?php echo $role->name;?>
                                                    </option>
                                    <?php }}?>
                                    </select>
                                    <?php echo form_error('role', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="display-block form-lbl">Profile Image:</label>
                                    <div class="img-block">
                                        <img src="<?php echo base_url();?>assets/img/user.jpg" id="previewImage" class="rounded" alt="Profile_image">
                                        <input type="file" id="imageInput" class="upload" accept="image/*" name="profile_img">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="copyTo" disabled>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="copyFrom" name="email"  value="<?php echo set_value('email');?>">
                            <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password"  value="<?php echo set_value('password');?>">
                            <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input type="text" class="form-control" name="confirm_password"  value="<?php echo set_value('confirm_password');?>">
                            <?php echo form_error('confirm_password', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>
                <h4 class="card-title">Postal Address</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control" name="address_line_1"  value="<?php echo set_value('address_line_1');?>">
                            <?php echo form_error('address_line_1', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" class="form-control" name="address_line_2"  value="<?php echo set_value('address_line_2');?>">
                            <?php echo form_error('address_line_2', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" name="state"  value="<?php echo set_value('state');?>">
                            <?php echo form_error('state', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" name="city"  value="<?php echo set_value('city');?>">
                            <?php echo form_error('city', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" name="country"  value="<?php echo set_value('country');?>">
                            <?php echo form_error('country', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" class="form-control" name="pincode"  value="<?php echo set_value('pincode');?>">
                            <?php echo form_error('pincode', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>