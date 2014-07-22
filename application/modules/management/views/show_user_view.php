
<table class="table" >
	<thead>
		<tr>
			<td>User ID</td>
			<td>Name</td>
			<td>User Name</td>
			<td>Enable</td>
			<td>Aisle name</td>
			<td>Grant</td>
			<td>Delete</td>
		</tr>
	</thead>
						
	<tbody>				
		<?php $i=0;
			 foreach($role as $role_user): 
			$i++; ?>
			<tr  data-id="<?php echo $role_user['_id'];?>" >
				<td class="id"><?php echo $role_user['_id'];?></td>
				<td>
					<div>
					 <div>
						<a data-toggle="collapse" data-parent="#accordion" 
								href="#abc<?php echo $i; ?>" data-id = "<?php echo $role_user['_id'] ;?>" class="get_role"> 
								<?php echo $role_user['name'];?>
						 </a>
					 </div>
					<div id="abc<?php echo $i; ?>" class="panel-collapse collapse" >
						 <div class="panel-body  well-sm">
								<table class="table">									
										<tr>
											<td>Roles:</td>
											<td id="<?php echo $role_user['_id'] ;?>">
										
											 </td>
										</tr>
								  </table>
							</div>
						</div>
					</div>
				</td>
				<td><?php echo $role_user["user_name"];?></td>
				<td>
					<input data-id="<?php echo $role_user['_id'];?>" data-name="<?php echo $role_user['name'];?>" 
								<?php if($role_user["enable"]){echo "checked";}?>  type="checkbox" class="chk_enable"  
								value="<?php echo $role_user["enable"] ?>"/>
						</td>
						<?php $gh_name=isset($role_user['aisle_name'])?$role_user['aisle_name']:NULL;
												if($gh_name!=NULL): ?>
											<td><?php echo  $gh_name;	?></td>
											<?php else: ?><td></td>
												<?php endif; ?>
						<td >			
									<a  data-name = "<?php echo $role_user['name']; ?>"
										class="glyphicon glyphicon-pencil edit grant" 
										data-id="<?php echo $role_user['_id']; ?>" 
									</a>
						</td>
						<td><a class="glyphicon glyphicon-trash delete" data-id="<?php echo $role_user['_id'];?>" 
							data-name="<?php echo $role_user['name']; ?>" >
							</a>
						</td>
			</tr>
			<?php endforeach;?>
	</tbody>
</table>

