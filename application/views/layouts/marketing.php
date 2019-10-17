

<!DOCTYPE html>
<html lang="ta" dir="ltr" >
<head>
        <meta http-equiv="Content-Type" contentType="text/html; charset=UTF-8">
		 
        <title>Welcome<?php if(isset($title)){echo $title; ?> | <?php  } echo $this->config->item('site_name') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">		 
        <link href="<?php echo asset_url('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo asset_url('css/site.css') ?>" rel="stylesheet">
        <link href="<?php echo asset_url('css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
		<link href="<?php echo asset_url('css/jquery-ui.css') ?>" rel="stylesheet">
		        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		  <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo asset_url('js/jquery.js') ?>"></script>
        <script src="<?php echo asset_url('js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo asset_url('js/application.js') ?>"></script>
		<script src="<?php echo asset_url('js/jquery-ui.js') ?>"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<script src="//code.jquery.com/jquery-1.9.0.js"></script>
       
		 <script src="<?php echo asset_url('js/jquery-1.10.2.js') ?>"></script>
        <script src="<?php echo asset_url('js/jquery-ui.js') ?>"></script>
		
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		
		
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>


        <?php echo $headers ?>
    </head>
    <body>
	
	
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?php echo anchor('marketing', $this->config->item('site_name'), 'class="brand"') ?>
                    <div class="btn-group pull-right">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user"></i> Marketing<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                         
                            <li><?php echo anchor('marketing/login/logout', 'Logout') ?></li>
                        </ul>
                    </div>
                  
                </div>
            </div>
        </div>
		
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span1">
       <div class="well sidebar-nav">
        <ul class="nav nav-list">
		<?php include 'marketingmenu.php';?>
		<br>
							</ul>
                    </div>
                </div>
                <div class="span11">
                    <?php echo $contents ?>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; <?php echo $this->config->item('site_name') ?> <?php echo date('Y') ?></p>
                <p>Powered by Codeigniter Bootstrap v<?php echo $this->config->item('version') ?></p>
            </footer>
        </div>
      
    </body>
</html>
