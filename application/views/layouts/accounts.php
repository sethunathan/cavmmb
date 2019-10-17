

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
  
<script>
  $(function() {
    var availableTags = [   
      "வணக்கம்",
      "என்",
      "சசாக்ஜ்",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>



        
        <script>
		 
		    //alert(document.URL);
		    jQuery(document).ready(function($){
			//var path="http://localhost/bam/admin/user";
			//var path="http://ssamatrimony.com/admin/user";
			$('#edu').autocomplete({source:path+"/get_edu", minLength:1});
			$('#work').autocomplete({source:path+"/get_work", minLength:1});
			$('#dept').autocomplete({source:path+"/get_dept", minLength:1});
			$('#post').autocomplete({source:path+"/get_post", minLength:1});
			$('#workplace').autocomplete({source:path+"/get_workplace", minLength:1});
			$('#income').autocomplete({source:path+"/get_income", minLength:1});
			$('#height').autocomplete({source:path+"/get_height", minLength:1});
			$('#weight').autocomplete({source:path+"/get_weight", minLength:1});
			$('#bloodgroup').autocomplete({source:path+"/get_bloodgroup", minLength:1});
			$('#caste').autocomplete({source:path+"/get_caste", minLength:1});
			$('#subcaste').autocomplete({source:path+"/get_subcaste", minLength:1});
			$('#kulam').autocomplete({source:path+"/get_kulam", minLength:1});
			$('#god').autocomplete({source:path+"/get_god", minLength:1});
			$('#kgp').autocomplete({source:path+"/get_kgp", minLength:1});
			
			$('#annamarriage').autocomplete({source:path+"/get_marrage", minLength:1});
			$('#thambimarriage').autocomplete({source:path+"/get_marrage", minLength:1});
			$('#akkamarriage').autocomplete({source:path+"/get_marrage", minLength:1});
			$('#thangaimarriage').autocomplete({source:path+"/get_marrage", minLength:1});
			
			$('#annaunmarriage').autocomplete({source:path+"/get_unmarrage", minLength:1});
			$('#thambiunmarriage').autocomplete({source:path+"/get_unmarrage", minLength:1});
			$('#akkaunmarriage').autocomplete({source:path+"/get_unmarrage", minLength:1});
			$('#thangaiunmarriage').autocomplete({source:path+"/get_unmarrage", minLength:1});
			
			$('#nativeplace').autocomplete({source:path+"/get_workplace", minLength:1});
			$('#presentplace').autocomplete({source:path+"/get_workplace", minLength:1});
			$('#birthplace').autocomplete({source:path+"/get_workplace", minLength:1});

            $('#familyincome').autocomplete({source:path+"/get_income", minLength:1});
			$('#reqedu').autocomplete({source:path+"/get_edu", minLength:1});
			$('#reqincome').autocomplete({source:path+"/get_income", minLength:1});
			
			$('#birthplace').autocomplete({source:path+"/get_workplace", minLength:1});
			
			$('#star').autocomplete({source:path+"/get_star", minLength:1});
			$('#rasii').autocomplete({source:path+"/get_rasi", minLength:1});
			$('#laknam').autocomplete({source:path+"/get_laknam", minLength:1});
			$('#thisai').autocomplete({source:path+"/get_thisai", minLength:1});
			$('#thosam').autocomplete({source:path+"/get_thosam", minLength:1});
			$('#agent').autocomplete({source:path+"/get_agent", minLength:1});
						
			
});
</script>
	  
</script>  
		
        <script type="text/javascript">
		    jQuery(document).ready(function($){			
            $(document).ready(function () {
                $('[rel=tooltip]').tooltip();
                $('#topnotification').tooltip({title: '2 updates available', placement: 'bottom'});
				;
            }
			
			);
			
        </script>
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
                    <?php echo anchor('agent', $this->config->item('site_name'), 'class="brand"') ?>
                    <div class="btn-group pull-right">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user"></i> Agent<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><?php echo anchor('agent/account', 'My account') ?></li>
                            <li class="divider"></li>
                            <li><?php echo anchor('agent/login/logout', 'Logout') ?></li>
                        </ul>
                    </div>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="active"><?php echo anchor('agent', 'agent dashboard <span id="topnotification" class="badge badge-important">2</span>') ?></li>
                            <li><?php echo anchor('/', 'Public site') ?></li>
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
		<?php include 'agentmenu.php';?>
		<br>
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
      
    </body>
</html>
