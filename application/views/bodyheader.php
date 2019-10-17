<!-- header-section-starts -->
	<div class="header">
		<div class="container">
			<div class="logo">
			
				<a href="index.html"><img src="<?php echo base_url(); ?>homeassests/images/logo.png" class="img-responsive" alt="" /></a>
			</div>
			<div class="header-right">
				<h4><i class="phone"></i>+91-944 37 25290</h4>
				<span class="menu"></span>
				<div class="top-menu">
					<ul>                                              
						<li><a class="<?php echo base_url(); ?>home/index" href="">Home</a></li>
						<li><a href="<?php echo base_url(); ?>home/prod">Products</a></li>
						<li><a href="<?php echo base_url(); ?>home/aboutus">About Us</a></li>
						<li><a href="<?php echo base_url(); ?>home/services">Services</a></li>
						<li><a href="<?php echo base_url(); ?>home/blog">Blog</a></li>
						<li><a href="<?php echo base_url(); ?>home/contact">Contact Us</a></li>
					</ul>
				</div>
				<!-- script for menu -->
				<script>
				$( "span.menu" ).click(function() {
				  $( ".top-menu" ).slideToggle( "slow", function() {
				    // Animation complete.
				  });
				});
			</script>
			<!-- script for menu -->

			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<a href="<?php echo base_url(); ?>login"" class="btn btn-block btn-success"><span class="glyphicon glyphicon-off"></span> LOGIN</a>
	<!-- header-section-ends -->