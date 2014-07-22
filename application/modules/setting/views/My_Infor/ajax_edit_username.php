<!-- form edit username of user-->

 <a class="list-group-item row ">
	<span class="col-sm-5 title">UserName:</span>
		<div class="col-sm-6" >
			<form method='POST' class='form-group' action="">
				<input  id='change_nameuser' type='text' value="<?php echo $username ?>" class='form-control'/>
					<br/>
					<button id='submit_save_username' class='btn btn-primary'>Save change</button>
					<button id='submit_cancel' class='btn btn-primary'>Cancel</button>
			</form>
		</div>
 </a>

