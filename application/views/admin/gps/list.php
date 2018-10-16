<!-- Page wrapper  -->
<!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Data GPS</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active">Data GPS</li>
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
                        <h4 class="card-title">Data GPS</h4>
                        <a href="<?php echo base_url('admin/gps/form'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: left;">Brand</th>
                                        <th style="text-align: left;">Model</th>
                                        <th style="text-align: left;">GPS Name</th>
                                        <th style="text-align: left;">Waranty Month</th>
                                        <th style="text-align: left;">Buy Date</th>
                                        <th style="text-align: left;">Sold Date</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($gps as $row) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i; ?></td>
                                        <td style="text-align: left;">
                                            <?php if ($row->brand_gps == null) {
                                                echo "Belum diedit";
                                            } else {
                                                echo ''.$row->brand_gps.'';
                                            } ?>
                                        </td>
                                        <td style="text-align: left;">
                                            <?php if ($row->model_gps == null) {
                                                echo "Belum diedit";
                                            } else {
                                                echo ''.ucwords($row->model_gps).'';
                                            } ?>
                                        </td>
                                        <td style="text-align: left;">
                                            <?php if ($row->gps_name == null) {
                                                echo "Belum diedit";
                                            } else {
                                                echo ''.$row->gps_name.'';
                                            } ?>
                                        </td>
                                        <td style="text-align: left;">
                                            <?php if ($row->waranty_month == null) {
                                                echo "Belum diedit";
                                            } else {
                                                echo ''.ucwords($row->waranty_month).'';
                                            } ?>
                                        </td>
                                        <td style="text-align: left;">
                                            <?php if ($row->buy_date == null) {
                                                echo "Belum diedit";
                                            } else {
                                                echo ''.date('j F Y', strtotime($row->buy_date)).'';
                                            } ?>
                                        </td>
                                        <td style="text-align: left;">
                                            <?php if ($row->sold_date == null) {
                                                echo "Belum diedit";
                                            } else {
                                                echo ''.date('j F Y', strtotime($row->sold_date)).'';
                                            } ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url('admin/gps/form/'.$row->id_gps); ?>" class="btn btn-warning btn-xs" title="Edit Data"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#<?php echo $row->id_gps; ?>" class="btn btn-success btn-xs" title="View Detail"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo base_url('admin/gps/delete/'.$row->id_gps); ?>" class="btn btn-danger btn-xs" onClick="return confirm('Apakah Anda ingin menghapus data gps ini?')" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!--Modal View Detail Data GPS-->  
                                    <div aria-hidden="true" role="dialog" id="<?php echo $row->id_gps; ?>" class="modal animated zoomIn">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>View Detail Data GPS</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-validation">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <?php if ($row->sold_to == null) {
                                                                    echo "Belum diedit";
                                                                } else {
                                                                    echo '<p style="text-align: left;"> Sold to : <strong>'.ucwords($row->sold_to).'</strong></p>';
                                                                } ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?php if ($row->description == null) {
                                                                    echo "Belum diedit";
                                                                } else {
                                                                    echo '<p style="text-align: left;"> Description : <i>'.$row->description.'</i></p>';
                                                                } ?>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <?php if ($row->name == null) {
                                                                    echo "Belum diedit";
                                                                } else {
                                                                    echo '<p style="text-align: left;"> Posted by : <strong>'.$row->name.' ('.$row->level.')'.'</strong></p>';
                                                                } ?>
                                                            </div>
                                                            <img src="<?php if(!empty($row->photo)){echo base_url('files/gps_images/'.$row->id_gps.'/'.$row->photo);}else{ echo base_url('files/no_image.png');}?>" alt="user" width="100%;" height="200px;"  />
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-5 ml-auto" style="text-align: right;">
                                                                <button type="submit" data-dismiss="modal" class="btn btn-danger">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modals-->
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