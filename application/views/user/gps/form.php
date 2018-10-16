<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary"><?php echo ($form_type=='EDIT') ? 'Edit':'Tambah' ;?>&nbsp; Data GPS</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('user/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('user/gps'); ?>">Data GPS</a></li>
            <li class="breadcrumb-item active"><?php echo ($form_type=='EDIT') ? 'Edit':'Tambah' ;?>&nbsp; Data GPS</li>
        </ol>
    </div>
</div>
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-danger">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"><?php echo ($form_type=='EDIT') ? 'Edit':'Tambah' ;?>&nbsp; Data GPS</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="<?php echo base_url('user/gps/save_gps'); ?>" enctype="multipart/form-data" method="POST">
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="brand_gps">Brand GPS <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="text" name="brand_gps" id="brand_gps" class="form-control" placeholder="Enter Brand GPS" value="<?php if ($form_type=='EDIT'){echo $gps->brand_gps;} ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="model_gps">Model GPS <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="Enter Model GPS" name="model_gps" id="model_gps" value="<?php if ($form_type=='EDIT'){echo $gps->model_gps;} ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="gps_name">GPS Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="Enter GPS Name" name="gps_name" id="gps_name" value="<?php if ($form_type=='EDIT'){echo $gps->gps_name;} ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="waranty_month">Waranty Month <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <select class="form-control" name="waranty_month" id="waranty_month" required="">
                                                    <option value="" disabled <?php if($form_type=='INPUT') echo 'selected';?>>Pilih Garansi Bulanan</option>
                                                    <option value="1 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "1 bulan") echo 'selected';}?>>1 Bulan</option>
                                                    <option value="2 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "2 bulan") echo 'selected';}?>>2 Bulan</option>
                                                    <option value="3 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "3 bulan") echo 'selected';}?>>3 Bulan</option>
                                                    <option value="4 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "4 bulan") echo 'selected';}?>>4 Bulan</option>
                                                    <option value="5 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "5 bulan") echo 'selected';}?>>5 Bulan</option>
                                                    <option value="6 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "6 bulan") echo 'selected';}?>>6 Bulan</option>
                                                    <option value="7 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "7 bulan") echo 'selected';}?>>7 Bulan</option>
                                                    <option value="8 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "8 bulan") echo 'selected';}?>>8 Bulan</option>
                                                    <option value="9 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "9 bulan") echo 'selected';}?>>9 Bulan</option>
                                                    <option value="10 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "10 bulan") echo 'selected';}?>>10 Bulan</option>
                                                    <option value="11 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "11 bulan") echo 'selected';}?>>11 Bulan</option>
                                                    <option value="12 bulan" <?php if($form_type=='EDIT'){if($gps->waranty_month === "12 bulan") echo 'selected';}?>>12 Bulan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="buy_date">Buy Date <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="date" class="form-control" name="buy_date" id="buy_date" value="<?php if ($form_type=='EDIT'){echo $gps->buy_date;} ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="sold_date">Sold Date <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="date" class="form-control" name="sold_date" id="sold_date" value="<?php if ($form_type=='EDIT'){echo $gps->sold_date;} ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="sold_to">Sold to <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="Enter Sold to" name="sold_to" id="sold_to" value="<?php if ($form_type=='EDIT'){echo $gps->sold_to;} ?>" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="photo"><?php echo ($form_type=='EDIT')? 'Change Photo':'Photo' ;?> </label>
                                            <div class="col-lg-12">
                                                <div class="profile_img">
                                                    <div id="crop-avatar">
                                                    <?php if(!empty($gps->photo)){
                                                        echo '
                                                            <img class="img-responsive avatar-view" src="'.base_url('files/gps_images/'.$gps->id_gps.'/'.$gps->photo).'" alt="Avatar" title="GPS Image" style="width: 30%;">';
                                                        } 
                                                    ?>
                                                    </div>
                                                </div>
                                                <input type="file" class="form-control" id="photo" name="photo">
                                                    <p class="help-block">File harus berupa (jpg, jpeg, png), tidak boleh lebih dari 2 MB.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-success">
                                            <label class="col-lg-12 col-form-label" for="description">Description <span class="text-danger">*</span></label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control" style="height: 100px;" placeholder="Enter Description" name="description" required=""><?php if ($form_type=='EDIT'){echo $gps->description;} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <?php if($form_type=='EDIT'){
                                  echo '<input type="hidden" id="form_type" name="form_type" value="EDIT">
                                  <input type="hidden" name="id_gps" value="'.$gps->id_gps.'">
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