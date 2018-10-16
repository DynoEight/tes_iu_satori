<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li> -->
            <li class="breadcrumb-item active">Home</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary p-20">
                <div class="media widget-ten">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-bag f-s-40"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2 class="color-white"><?php echo $gps; ?></h2>
                        <p class="m-b-0">Data GPS</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning p-20">
                <div class="media widget-ten">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-user f-s-40"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2 class="color-white"><?php echo $user; ?></h2>
                        <p class="m-b-0">Data User</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<!-- End Container fluid 