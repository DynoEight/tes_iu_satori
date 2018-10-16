<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Setting Profile</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Setting Profile</li>
        </ol>
    </div>
</div>
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-two">
                        <header>
                            <div class="avatar">
                                <img src="<?php if(!empty($admin->photo)){echo base_url('files/users/'.$admin->id_user.'/'.$admin->photo);}else{ echo base_url('files/no_image.png');}?>" alt="#" />
                            </div>
                        </header>

                        <h3><?php if(($admin->name)==null){
                                    echo '<strong><a style="color: red;">Annonymous</a></strong>';
                                  } else {
                                    echo ''.ucwords($admin->name).'';
                                  } 
                            ?>
                        </h3>
                        <div class="desc">
                            Level : <?php echo ucwords($admin->level); ?>
                        </div>
                        <!-- <div class="contacts">
                            <a href=""><i class="fa fa-plus"></i></a>
                            <a href=""><i class="fa fa-whatsapp"></i></a>
                            <a href=""><i class="fa fa-envelope"></i></a>
                            <div class="clear"></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-12">
            <?php
            // Session 
            if($this->session->flashdata('sukses')) { 
              echo '<div class="alert alert-warning alert-dismissible fade show">';
              echo $this->session->flashdata('sukses');
              echo '</div>';
            } 

            // File upload error
            if(isset($error)) {
              echo '<div class="alert alert-danger">';
              echo $error;
              echo '</div>';
            }

            // Error
            echo validation_errors('<div class="alert alert-success">','</div>'); 
            ?>
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Nama Lengkap</strong>
                                    <br>
                                    <p class="text-muted"><i>
                                        <?php if(($admin->name)==null){
                                                echo '<button class="btn btn-dark btn-outline btn-xs">Belum di edit</button>';
                                              } else {
                                                echo ''.ucwords($admin->name).'';
                                              } 
                                        ?></i>
                                    </p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted"><i>
                                        <?php if(($admin->email)==null){
                                                echo '<button class="btn btn-dark btn-outline btn-xs">Belum di edit</button>';
                                              } else {
                                                echo ''.strtolower($admin->email).'';
                                              } 
                                        ?></i>
                                    </p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Status</strong>
                                    <br>
                                    <p class="text-muted"><i>
                                        <?php if(($admin->status)==null){
                                                echo '<button class="btn btn-dark btn-outline btn-xs">Belum di edit</button>';
                                              } else {
                                                echo ''.ucwords($admin->status).'';
                                              } 
                                        ?></i>
                                    </p>
                                </div>
                                
                            </div>
                            <p style="text-align: right;">
                            <a href="<?php echo base_url('admin/profile/form/'.$admin->id_user); ?>" class="btn btn-warning btn-flat btn-addon btn-md m-b-10 m-l-5" type="submit"><i class="fa fa-pencil"> Update Profile</i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Column -->
        </div>
    <!-- End PAge Content -->
    </div>
<!-- End Container fluid  -->