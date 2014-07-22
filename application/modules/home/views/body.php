
 
 <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
		 <form class="navbar-form navbar-right" role="form" 
		 			action="<?php echo base_url() ?>index.php/home/signin" method="POST" id="form">
			 		<?php $kt =$this->session->userdata('login'); 
			 		// Neu chua dang nhap hoac user bi disable hoac dang nhap sai username va pass
			 		if(empty($kt) || $kt==3 || $kt==2):
			 				//Neu user bi disable
			 				if($this->session->userdata('login')==3):	
			 		?>
			 				<script type="text/javascript">alert("You was disabled");</script>
		 					<?php elseif($kt==2): ?>
		 						<script type="text/javascript">alert("Wrong username or password");</script>
		 					<?php endif; ?>
					  <div class="form-group">
						    <label class="sr-only" for="username">Username</label>
						    <input type="text" class="form-control" id="username" name="username" 
						    		 	placeholder="Username">
					  </div>   
					  
					  <div class="form-group"> 
						    <label class="sr-only" for="pass">Password</label>
						    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
					  </div>
					  <div class="checkbox">
						    <label class="remember">
						      		<input type="checkbox"> Remember me
						    </label>
					  </div>
					  
					  <button type="submit" class="btn btn-default"  id="signin">Sign in</button>
					  <button class="btn btn-default"  id="signup">Sign up</button>
					  <div class="link">
						<a href="">Facebook</a>
					 	 <a href="">Yahoo</a>
					 </div>
							 <?php $this->session->unset_userdata('login'); ?>
						<!--User dien dung username va pass, enable=1	-->
					 <?php else:?>
					 	<div>
			  					<label class="remember">I'm <?php echo $this->session->userdata('name');?></label>
			  					&nbsp;
						 	<div class="dropdown">
								  <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
								    	<span class="glyphicon glyphicon-cog" style="font-size:25px; color:#ffffff"></span>
								  </a>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								    <li role="presentation"><a role="menuitem" tabindex="-1" 
								    		href="<?php echo base_url() ?>index.php/setting">Setting</a>
								    </li>
								    <li role="presentation" class="divider"></li>
								    <li role="presentation"><a role="menuitem" tabindex="-1" 
								    		href="<?php echo base_url() ?>index.php/home/logout">Sign out</a>
								    </li>
								  </ul>
							</div>
						</div>
			  				
				<?php endif; ?>		 		
			</form>
  <!--    <div class="nav navbar-nav navbar-right">
         <a class="navbar-brand" href="#">Home</a>
      </div>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<div class="container" id = "body">
<span>Page home</span>
</div>