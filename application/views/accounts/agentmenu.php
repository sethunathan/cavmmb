
	
		 <li class="nav-header">ஜாதகம் பதிவு செய்ய </li> 
		 <?php echo anchor('agentuser/home/newuser', '<i class="icon-check"></i>Add User ') ?><br>
		
		<li class="nav-header">Status-All Users</li>  
		<?php echo anchor('agent/user/activeuser/1', '<i class="icon-check"></i>Active User List') ?><br>
	    <?php echo anchor('agent/user/activeuser/10', '<i class="icon-check"></i>In Active User List') ?><br>
		<?php echo anchor('agent/user/activeuser/11', '<i class="icon-check"></i>Renewal User List') ?><br>
		
		<?php echo anchor('agent/user/activeuser/12', '<i class="icon-check"></i>Suspend User List') ?><br>
		<?php echo anchor('agent/user/activeuser/13', '<i class="icon-check"></i>Married  User List') ?><br>
		
		<?php echo anchor('agent/user/activeuser/14', '<i class="icon-check"></i>Incomplete List') ?><br>
		 <li class="nav-header">Top Up</li>
        <?php echo anchor('agentuser/home/admintopup', '<i class="icon-check"></i>Admin Top Up Request') ?><br>		 
		<?php echo anchor('agentuser/home/plan', '<i class="icon-check"></i>User Top Up Pending') ?><br>
		 <li class="nav-header">My Balance</li> 
		 <?php echo anchor('agentuser/home/balance', '<i class="icon-check"></i>Balance') ?><br>
		 <li class="nav-header"> புதிய பதிவுகள்/போன் எண் எடுத்த விவரங்கள்</li> 
		 <?php echo anchor('agentuser/home/newentry', 'விவரங்கள்','target="_blank"') ?><br>
		
		 <li class="nav-header">My Balance-Stylish</li> 
		 <?php echo anchor('agentuser/home/balancee', '<i class="icon-check"></i>Balance') ?><br>
		 
	    <li class="nav-header">User Mobile No Return</li>
        <?php echo anchor('agentuser/home/mobilenoreturn', '<i class="icon-check"></i>User Mobile No Return') ?><br>		 
	     <li class="nav-header">User Mobile No</li>
        <?php echo anchor('agentuser/home/mobileno', '<i class="icon-check"></i>User Mobile No') ?><br>		
		 <li class="nav-header">Accounts Master </li> 
		 <?php echo anchor('accounts/accounts/index', '<i class="icon-check"></i>Accouts Master') ?><br>
         <?php echo anchor('accounts/accounts/addnewaccounts', '<i class="icon-check"></i>New') ?><br>
		 <?php echo anchor('accounts/accounts/paymententry', '<i class="icon-check"></i>Payment Entry') ?><br>
		 <?php echo anchor('accounts/accounts/receuptentry', '<i class="icon-check"></i>Receipt Entry') ?><br>
		 <?php echo anchor('accounts/accounts/contraentry', '<i class="icon-check"></i>Contra Entry') ?><br>
		 <?php echo anchor('accounts/accounts/ledger', '<i class="icon-check"></i>Ledger Entry') ?><br>
