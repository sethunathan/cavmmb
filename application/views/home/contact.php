<!DOCTYPE html>
<html>
<?php include 'header.php';?>
<body>
    <?php include 'bodyheader.php';?>
 	
	<!-- header-section-starts -->
	
	<div class="content">
		<div class="contact about-desc">
			<h3>Contact-Information</h3>
   		<div class="container">
   			<div class="row">
   				<div class="col-md-8 contact_left">
   					<h4>We Want to hear from you</h4>
   					<p class="m_6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla</p>
   					<p class="m_7">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
   			   <div class="contact_grid contact_address">
			            <h5><?php echo $companyname?></h5>
						<h5><?php echo $address1?></h5>											
						<p><?php echo $contactnos?></p>
						<p><?php echo $email?></p>		
					</div>
					<div class="contact_grid">
					    <h5><?php echo $companyname2?></h5>			
						<h5><?php echo $address2?></h5>											
						<p><?php echo $contactnos2?></p>
						<p><?php echo $email2?></p>	
					</div>
   				</div>
   				<div class="col-md-4">
   					<div class="contact_right">
   				<div class="contact-form_grid">
				   <form method="post" action="#">
					 <input type="text" class="textbox" value="Your name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your name';}">
					 <input type="text" class="textbox" value="Your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email';}">
					 <input type="text" class="textbox" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
					 <textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
					 <input type="submit" value="Send">
				   </form>
			      </div>
   			     </div>
   				</div>
   			</div>
   		</div>
   	</div>
   	
   </div>
		</div>
	<div class="map s-map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10015.498657932954!2d-0.1570060357124469!3d51.129219866008135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4875f1c859d0e855%3A0xb0ce82410da5809!2sA2011%2C+Crawley%2C+West+Sussex+RH10%2C+UK!5e0!3m2!1sen!2sin!4v1409743498026" frameborder="0" style="border:0"></iframe>
		<div class="map-layer"></div>
	</div>
	</div>
	<div class="footer text-center">
		<div class="social-icons">
			<a href="#"><i class="facebook"></i></a>
			<a href="#"><i class="twitter"></i></a>
			<a href="#"><i class="googlepluse"></i></a>
			<a href="#"><i class="youtube"></i></a>
			<a href="#"><i class="linkedin"></i></a>
		</div>
		<div class="copyright">
			<p>Copyright &copy; 2017 All rights reserved   <a href="">   </a></p>
		</div>
	</div>
	 
	 
    
</body>
</html>