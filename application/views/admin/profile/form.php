<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Update Profile</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/profile'); ?>">Setting Profile</a></li>
            <li class="breadcrumb-item active">Update Profile</li>
        </ol>
    </div>
</div>
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-outline-danger">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Update Profile</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="<?php echo base_url('admin/profile/save_profile'); ?>" enctype="multipart/form-data" method="POST">
                            <div class="form-body">
                                <div class="row p-t-5">
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="hidden" name="id_user" value="<?php echo $admin->id_user; ?>">
                                                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" id="name" value="<?php echo $admin->name; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo $admin->email; ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="password" class="form-control show_form_password" placeholder="Enter Password" name="password" id="password" value="<?php echo $admin->password; ?>" required="">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;<input class="inputcheckbox100" type="checkbox">
                                            <label class="label-checkbox100" for="ckb1">
                                                Show Password
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="photo">Change Photo</label>
                                            <div class="col-lg-12">
                                                <div class="profile_img">
                                                    <div id="crop-avatar">
                                                    <?php if(!empty($admin->photo)){
                                                        echo '
                                                            <img class="img-responsive avatar-view" src="'.base_url('files/users/'.$admin->id_user.'/'.$admin->photo).'" alt="Avatar" title="GPS Image" style="width: 30%;">';
                                                        } 
                                                    ?>
                                                    </div>
                                                </div>
                                                <input type="file" class="form-control" id="photo" name="photo">
                                                    <p class="help-block">File harus berupa (jpg, jpeg, png), tidak boleh lebih dari 2 MB.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="col-sm-12">
                                    <button class="btn btn-warning" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid 