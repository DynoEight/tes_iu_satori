<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary"><?php echo ($form_type=='EDIT') ? 'Edit':'Tambah' ;?>&nbsp; Data User</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/user'); ?>">Data User</a></li>
            <li class="breadcrumb-item active"><?php echo ($form_type=='EDIT') ? 'Edit':'Tambah' ;?>&nbsp; Data User</li>
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
                    <h4 class="m-b-0 text-white"><?php echo ($form_type=='EDIT') ? 'Edit':'Tambah' ;?>&nbsp; Data User</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="<?php echo base_url('admin/user/save_user'); ?>" enctype="multipart/form-data" method="POST">
                            <div class="form-body">
                                <div class="row p-t-5">
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" id="name" value="<?php if ($form_type=='EDIT'){echo $user->name;} ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php if ($form_type=='EDIT'){echo $user->email;} ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="password" class="form-control show_form_password" placeholder="Enter Password" name="password" id="password" value="<?php if ($form_type=='EDIT'){echo $user->password;} ?>" required="">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;<input class="inputcheckbox100" type="checkbox">
                                            <label class="label-checkbox100" for="ckb1">
                                                Show Password
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="level">Level <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <select class="form-control" name="level" id="level" required="">
                                                    <option value="" disabled <?php if($form_type=='INPUT') echo 'selected';?>>Pilih Level User</option>
                                                    <option value="admin" <?php if($form_type=='EDIT'){if($user->level === "admin") echo 'selected';}?>>Admin</option>
                                                    <option value="user" <?php if($form_type=='EDIT'){if($user->level === "user") echo 'selected';}?>>User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="photo"><?php echo ($form_type=='EDIT')? 'Change Photo':'Photo' ;?> </label>
                                            <div class="col-lg-12">
                                                <div class="profile_img">
                                                    <div id="crop-avatar">
                                                    <?php if(!empty($user->photo)){
                                                        echo '
                                                            <img class="img-responsive avatar-view" src="'.base_url('files/users/'.$user->id_user.'/'.$user->photo).'" alt="Avatar" title="GPS Image" style="width: 30%;">';
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
                                <?php if($form_type=='EDIT'){
                                  echo '<input type="hidden" id="form_type" name="form_type" value="EDIT">
                                  <input type="hidden" name="id_user" value="'.$user->id_user.'">
                                  <div class="col-sm-12">
                                    <button class="btn btn-warning" type="submit">Edit</button>
                                  </div>'
                                  ;
                                  }else if($form_type=='INPUT'){
                                  echo '<input type="hidden" id="form_type" name="form_type" value="INPUT">
                                  <button class="btn btn-success" type="submit">Simpan</button>';
                                } ?>
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