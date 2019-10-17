<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAVMMB | Client Details</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url(); ?>accounts"><b>CAVMMB</b>& Co.</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Our Company Details</p>
 
    <form action="<?php echo base_url(); ?>clientaccounts/savecompany/<?php echo $ac_code;  ?>" method="post">
      <div class="form-group has-feedback">
        <input name="clientname"  value ="<?php echo $ac_name?>" type="text" class="form-control" placeholder="Client Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	 
	  <div class="form-group has-feedback">
        <input name="address"  value ="<?php echo $address?>" type="text" class="form-control" placeholder="Address">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input name="pan"  value ="<?php echo $pan?>" type="text" class="form-control" placeholder="PAN">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input name="contactperson"  value ="<?php echo $contactperson?>" type="text" class="form-control" placeholder="Contact Person">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	  <div class="form-group has-feedback">
        <input name="contactno"  value ="<?php echo $contactno?>" type="text" class="form-control" placeholder="Contact Number">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	   <div class="form-group has-feedback">
        <input name="itpwd"  value ="<?php echo $itpwd?>" type="text" class="form-control" placeholder="I.T. Passwprd">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	    <div class="form-group has-feedback">
        <input name="gst"  value ="<?php echo $gst?>" type="text" class="form-control" placeholder="GSTIN">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input name="gsid"  value ="<?php echo $gsid?>" type="text" class="form-control" placeholder="G.S.T. ID/PWD">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	    <div class="form-group has-feedback">
        <input name="tdsid"  value ="<?php echo $tdsid?>" type="text" class="form-control" placeholder="T.D.S. ID/PWD">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	   <div class="form-group has-feedback">
        <input name="iec"  value ="<?php echo $iec?>" type="text" class="form-control" placeholder="I.E.C">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" value ="<?php echo $email?>" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="work" value ="" class="form-control" placeholder="work">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>      
      <div class="row">
         
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 
     
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assests/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assests/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assests/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
