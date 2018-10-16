<!-- Page wrapper  -->
<!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Data User</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data User</h4>
                        <a href="<?php echo base_url('admin/user/form'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                        <div class="table-responsive m-t-5">
                            <?php
                            // Session 
                            if($this->session->flashdata('sukses')) { 
                              echo '<div class="alert alert-info alert-dismissible fade show">';
                              echo $this->session->flashdata('sukses');
                              echo '</div>';
                            } else if($this->session->flashdata('edit')) { 
                              echo '<div class="alert alert-warning alert-dismissible fade show">';
                              echo $this->session->flashdata('edit');
                              echo '</div>';
                            } else if($this->session->flashdata('hapus')) { 
                              echo '<div class="alert alert-danger alert-dismissible fade show">';
                              echo $this->session->flashdata('hapus');
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
                            <table id="myTable" class="display table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 10%;">No</th>
                                        <th style="text-align: left; width: 25%;">Email</th>
                                        <th style="text-align: left; width: 20%;">Name</th>
                                        <th style="text-align: left; width: 5%;">Level</th>
                                        <th style="text-align: left; width: 15%;">Status</th>
                                        <th style="text-align: left; width: 10%;">Photo</th>
                                        <th style="text-align: center; width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($user as $row) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i; ?></td>
                                        <td style="text-align: left;">
                                            <?php if ($row->email == null) {
                                                echo "Belum diedit";
                                            } else {
                                                echo ''.$row->email.'';
                                            } ?>
                                        </td>
                                        <td style="text-align: left;">
                                            <?php if ($row->name == null) {
                                                echo "Belum diedit";
                                            } else {
                                                echo ''.ucwords($row->name).'';
                                            } ?>
                                        </td>
                                        <td style="text-align: left;">
                                            <?php if ($row->level == null) {
                                                echo "Belum diedit";
                                            } else {
                                                echo ''.ucwords($row->level).'';
                                            } ?>
                                        </td>
                                        <td style="text-align: left;">
                                            <?php if ($row->status == null) { 
                                                echo "Belum diedit";
                                            } else if ($row->status == "aktif") {
                                                echo '<p style="color: #20cc20;">'.ucwords($row->status).'</p>';
                                            } else if ($row->status == "tidak aktif") {
                                                echo '<p style="color: #ff312d;">'.ucwords($row->status).'</p>';
                                            } ?>
                                        </td>
                                        <td style="text-align: left;">
                                            <img src="<?php if(!empty($row->photo)){echo base_url('files/users/'.$row->id_user.'/'.$row->photo);}else{ echo base_url('files/no_image.png');}?>" alt="user" width="30%;" height="50px;"  />
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url('admin/user/form/'.$row->id_user); ?>" class="btn btn-warning btn-xs" title="Edit Data"><i class="fa fa-edit"></i></a>
                                            <?php if ($row->status == "aktif") {
                                                echo '<a href="'.base_url('admin/user/non_aktif/'.$row->id_user).'" class="btn btn-dark btn-outline btn-xs" title="Non Aktifkan" onClick="return konfirmasi_non_aktif()"><i class="fa fa-close"></i></a>';
                                            } else if ($row->status == "tidak aktif") {
                                                echo '<a href="'.base_url('admin/user/aktivasi/'.$row->id_user).'" class="btn btn-success btn-xs" onClick="return konfirmasi_aktivasi()" title="Aktifkan"><i class="fa fa-check"></i></a>';
                                            } ?> 
                                            <a href="<?php echo base_url('admin/user/delete/'.$row->id_user); ?>" class="btn btn-danger btn-xs" onClick="return confirm('Apakah Anda ingin menghapus data user ini?')" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->