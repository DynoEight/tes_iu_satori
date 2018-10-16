<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Login</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Video Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/web/'; ?>css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/web/'; ?>css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Marck+Script&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext"
	    rel="stylesheet">
	<!-- //web-fonts -->
	<!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/'; ?>css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/'; ?>css/helper.css" rel="stylesheet">
</head>

<body>
	<div class="video-w3l" data-vide-bg="<?php echo base_url().'assets/web/'; ?>video/1">
		<!-- title -->
		<h1>
			<span>L</span>ogin
			<span>F</span>orm</h1>
		<!-- //title -->
		<!-- content -->
		<div class="sub-main-w3">
			<form action="<?php echo base_url('login/auth'); ?>" method="post" class="form-valide">
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
                } else if($this->session->flashdata('gagal')) { 
                  echo '<div class="alert alert-danger alert-dismissible fade show">';
                  echo $this->session->flashdata('gagal');
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
				<div class="form-style-agile">
					<label>
						<i class="fas fa-user"></i>Email</label>
					<input placeholder="Email" name="email" id="email" type="email" required="">
				</div>
				<div class="form-style-agile">
					<label>
						<i class="fas fa-unlock-alt"></i>Password</label>
					<input placeholder="Password" name="password" id="password" class="show_form_password" type="password" required="">
				</div>
				<!-- switch -->
				<div class="checkout-w3l">
					<div class="demo5">
						<div class="switch demo3">
							<input type="checkbox" class="inputcheckbox100">
							<label>
								<i></i>
							</label>
						</div>
					</div>&nbsp;&nbsp;&nbsp;<p style="color: #ffffff;"> Show Password</p>
					<!-- <a href="#"></a> -->
				</div>
				<!-- //switch -->
				<input type="submit" value="Log In">
				
			</form>
		</div>
		<!-- //content -->

		<!-- copyright -->
		<div class="footer">
			<p>&copy; 2018. All rights reserved | Satori
			</p>
		</div>
		<!-- //copyright -->
	</div>

	
	<!-- Jquery -->
	<script src="<?php echo base_url().'assets/web/'; ?>js/jquery-2.2.3.min.js"></script>
	<!-- //Jquery -->

	<!-- Video js -->
	<script src="<?php echo base_url().'assets/web/'; ?>js/jquery.vide.min.js"></script>
	<!-- //Video js -->

	<!-- All Jquery -->
    <script src="<?php echo base_url().'assets/'; ?>js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url().'assets/'; ?>js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url().'assets/'; ?>js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url().'assets/'; ?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url().'assets/'; ?>js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url().'assets/'; ?>js/custom.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){   
          $('.inputcheckbox100').click(function(){
            if($(this).is(':checked')){
              $('.show_form_password').attr('type','text');
            }else{
              $('.show_form_password').attr('type','password');
            }
          });
        });
    </script>
	
</body>

</html>