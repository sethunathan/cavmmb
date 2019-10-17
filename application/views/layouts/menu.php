<nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
					<p>Bamatrimony.Com</p></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-left">
                    <ul class="nav navbar-nav">
                          <li><?php echo anchor('/editprofile', 'Reg/Edit') ?></li>	
                            <li><?php echo anchor('/account', 'View') ?></li>                         
                             <li><?php echo anchor('/home', 'All') ?></li>		
                             <li><?php echo anchor('/indexnew', 'Expected') ?></li>							 
                             <li><?php echo anchor('/mylikedProfile', 'எனக்குப் பிடித்த வரன்கள்') ?></li>
							 <li><?php echo anchor('/melikedProfile', 'என்னை பிடித்த வரன்கள்') ?></li>
							 <li><?php echo anchor('/bothlikedProfile', 'இருவருக்கும் பிடித்த வரன்கள்') ?></li>
                                            
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
