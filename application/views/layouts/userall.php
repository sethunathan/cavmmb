<!DOCTYPE html>
<html lang="ta" dir="ltr" >
<head>
        <meta charset="UTF-16">
        <title><?php if(isset($title)){echo $title; ?> | <?php  } echo $this->config->item('site_name') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?php echo asset_url('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo asset_url('css/site.css') ?>" rel="stylesheet">
        <link href="<?php echo asset_url('css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
		        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<header('Content-Type: image/jpeg');
		
	
        <?php echo $headers ?>
		
    </head>
    <body>
	
	<form action="<?php echo base_url();?>userrr/updateuser/<?php echo $cuser->user_id ?>"  method="post">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
					
                   
                    <div class="nav-collapse">
                        <ul class="nav">
                             <?php echo anchor('#', $cuser->user_name, 'class="brand"') ?>
							
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
						     <li><?php echo anchor('/user/home', 'All') ?></li>	
							 <li><?php echo anchor('user/page/editprofile', 'Edit-Personal') ?></li>
                             <li><?php echo anchor('user/page/editprofile1', 'Edit-Physical') ?></li>							 
                             <li><?php echo anchor('user/page/account', 'View') ?></li>	                             
                             <li><?php echo anchor('user/login/logout', 'Logout') ?></li>                           	
                             				 
                           
							 
							
							
	
	
                            </ul>
                    </div>
                </div>
                <div class="span9">
                    <?php echo $contents ?>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; <?php echo $this->config->item('site_name') ?> <?php echo date('Y') ?></p>
                <p>Powered by Codeigniter Bootstrap v<?php echo $this->config->item('version') ?></p>
            </footer>
        </div>
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo asset_url('js/jquery.js') ?>"></script>
        <script src="<?php echo asset_url('js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo asset_url('js/application.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('[rel=tooltip]').tooltip();
                $('#topnotification').tooltip({title: '2 updates available', placement: 'bottom'});
				
            });
			
        </script>
    </body>
	
</html>