<html>
    <head>
        <meta charset="utf-8">
         <title><?php echo $title ?> ?></title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css" />
    </head>
    <body>
        <div class="header-bar">
        </div>
        <div class="login">
            <div class="login-box">
                <h2>Sign In</h2>
                <form action="login/auth" method="post" >
                <label for="name">Username</label><input type="text" name="username" value="" id="name" />
                <label for="password">Password</label><input type="password" name="password" value="" id="password" />
                <input type="submit" name="submit" value="Login" class="button" /></form>            </div>
        </div>
        <div class="errors"></div>
    </body>
</html>