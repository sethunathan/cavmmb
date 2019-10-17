<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->config->item('site_name'); ?></title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.minn.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
	
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
   
    <link href="assets/css/responsive.css" rel="stylesheet">
	
	
    <link rel="shortcut icon" href="images/ico/favicon.ico">
	
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script src="https://www.google.com/jsapi" type="text/javascript">
</script>
<script type="text/javascript">
    google.load("elements", "1", {
        packages: "transliteration"
    });

    function onLoad() {
        var options = {
            sourceLanguage: google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage: [google.elements.transliteration.LanguageCode.TAMIL],
            shortcutKey: 'ctrl+f',
            transliterationEnabled: true
        };

        var control = new google.elements.transliteration.TransliterationControl(options);
        control.makeTransliteratable(['txt']);
    }
    google.setOnLoadCallback(onLoad);
</script>
<script src="//code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="//code.jquerygeo.com/jquery.geo-1.0b1.min.js"></script>


<script type='text/javascript'>
$("#map").geomap({  center: [ -71.037598, 42.363281 ],  zoom: 10});
</script>
<script>$(function() { $( "#map" ).geomap( ); });</script>
<script type='text/javascript'>
	function show()
	{ 
	  if ($('#txt').val() == '1')		
			{document.getElementById('two').style.display='block';} 
	   }
        return false;
		
	} 
</script>
</head><!--/head-->
<body>
    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i> 96886 66668</p></div>
						<div class="top-number">
						    <p><i class="fa fa-phone-square"></i> 94447 77287 </p>
						</div>
						<div></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">                      
							<div id="map" style="width: 0px; height: 0px;"></div>
                                <div>
								<div class="errors">
								<label><?php echo $this->session->userdata('errorMsg');?> </label> 
                                <label><?php echo $this->session->userdata('testerror');?> </label>     								
								</div>
								<form action="login/auth" method="post" enctype="multipart/form-data">
								    <input type="text"   value="" name="username"/>
								    <input type="password" value=""  name="password"/>
								    <input class="btn-primary"  type="submit" class="button" value="Login"/>
                                								
							    </form>		
								</div>								
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->
   </header>     


