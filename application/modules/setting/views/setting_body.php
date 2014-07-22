<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		 <form class="navbar-form navbar-right" role="form" 
		 			action="<?php echo base_url() ?>index.php/home/signin" method="POST">
					 	<div>
					 			<label class="remember">
									<a href="<?php echo base_url() ?>index.php/home" 
										class="btn btn-info active" role="button">Home</a>
							      	</label>
			  					<label class="remember">I'm <?php echo $this->session->userdata('name');?></label>
			  					&nbsp;
							 	<div class="dropdown">
									  <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
									    	<span class="glyphicon glyphicon-cog" style="font-size:25px; color:#ffffff">
									    	</span>
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
			</form>
  <!--    <div class="nav navbar-nav navbar-right">
         <a class="navbar-brand" href="#">Home</a>
      </div>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<div class="container" id="settingbody">
<div class="row">
	<div class="col-md-3">
		<div class="list-group " id="choose">
			<a class="list-group-item disabled active" style="font-weight: bold;">Your Setting</a>
			  <a href="<?php echo base_url() ?>index.php/setting/my_infor" 
			  		class="list-group-item " id="myInfo">My Infomation</a>
			  		<!--Neu user dang dang nhap co role la r01 or r02 thi [ q12]-->
			  <?php 
			  		foreach($this->session->userdata('role') as $key_r):
			  			if($key_r=='r01' or $key_r=='r02'):
			  ?>
			  <a href="<?php echo base_url() ?>index.php/management/decentralization"  class="list-group-item">Decentralization</a>
			  <?php 		endif;
			  		endforeach;
			  ?>
			  <?php if($key_r=='r01'): ?>
			 <a href="<?php echo base_url() ?>index.php/management/role_management"
			 		class="list-group-item">Roles Management</a>
			  <?php endif; ?>
		</div>
	</div>
	
	
	
	<div class="col-md-9" id="profilebody">
			<div class="panel row">
	<div class="panel-heading">My Information</div>
	
		  <div class="panel-body">
			<div class="list-group ">
			
			 <div id="name">
				 <a id='href' href="<?php echo base_url() ?>index.php/setting/form_edit_name" 
					  	 class="list-group-item row edit" data-id="name" data-value="<?php echo $name ;?>">
					   		<span class="col-sm-5 title">Full Name:</span>
					   		<div class="col-sm-6" >
						   		<span  id="edit_name" class="col-md-11" > 
						   			<?php echo $name ;?>
						   		</span>
						   		<span class="glyphicon glyphicon-pencil"></span>
					   		</div>
					  </a>
			</div>
			<div  id="username">
					  <a href="<?php echo base_url() ?>index.php/setting/form_edit_username"  
					  	class="list-group-item row edit" data-id="username" data-value="<?php echo $username ;?>">
					  		<span class="col-sm-5 title">User Name:</span>
					  		<div class="col-sm-6">
						   		<span class="col-md-11" id="username"><?php echo $username;?></span>
						   		<span class="glyphicon glyphicon-pencil"></span>
					   		</div>
					  </a>
			</div>		
			<div  id="pass">	  
					  <a href="<?php echo base_url() ?>index.php/setting/form_edit_pass" 
					  	 class="list-group-item row edit" data-id="pass"  data-value="<?php echo $pass ;?>">
					  		<span class="col-sm-5 title">PassWord:</span>
					  		<div class="col-sm-6" id="pass">
						   		<span class="col-md-11"></span>
						   		<span class="glyphicon glyphicon-pencil"></span>
					   		</div>
					  </a>
			</div>
					  
					  <?php if($aisle_id!==NULL):?>
					  <a href="#" class="list-group-item row">
					  		<span class="col-sm-5 title">Aisle id:</span>
					  		<div class="col-sm-6">
					   			<span class="col-md-11"><?php echo $aisle_id?></span>
					   		</div>
					  </a>
					  
					   <a href="#" class="list-group-item row">
					  		<span class="col-sm-5 title">Aisle name:</span>
					  		<div class="col-sm-6">
					   			<span class="col-md-11"><?php echo $aisle_name?></span>
					   		</div>
					  </a>
					  <?php endif ?>
					  <a href="#" class="list-group-item row">
					  		<span class="col-sm-5 title">Roles:</span>
					  		<div class="col-sm-6">
						   		<span class="col-md-11"><?php echo $roles; ?>	
								</span>
							</div>
					  </a>
					  
					     <a class="list-group-item row"  data-toggle="collapse" 
					        	data-parent="#accordion" href="#collapseOne">
					      <span class="col-sm-5 title"> Permission:</span>
					      <div class="col-sm-6">
						   <span class="col-md-11">   
						   <div id="collapseOne" class="panel-collapse collapse">
						     <div class="panel-body">
						     <?php foreach($permissions as $key => $val):?>
													<li><?php echo $val; ?></li>
												<?php endforeach;?>	
						      </div>
						  </div>
						  </span>
						</div>
			</a>

		</div>
		 </div>
		 </div>
	</div>
</div>
</div>
