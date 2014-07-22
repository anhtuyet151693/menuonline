
<?php if ($check_username==1):?>


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
					   <a class="list-group-item row ">
	<span class="col-sm-5 title">UserName:</span>
		<div class="col-sm-6" >
			<form method='POST' class='form-group' action="">
				<input  id='change_nameuser' type='text' value="<?php echo $username ?>" class='form-control'/>
						<div class="alert alert-warning" role="alert">Exist this username!</div>
					<br/>
					<button id='submit_save_username' class='btn btn-primary'>Save change</button>
					<button id='submit_cancel_username' class='btn btn-primary'>Cancel</button>
			</form>
		</div>
 </a>
			</div>		
			<div  id="pass">	  
					  <a href="<?php echo base_url() ?>index.php/setting/edit_pass" 
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




<?php endif;?>
