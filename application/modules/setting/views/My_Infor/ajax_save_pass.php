 <a class="list-group-item row ">
	<span class="col-sm-5 title">PassWord:</span>
		<div class="col-sm-6" >
			<form method='POST' class='form-group' action="">
			<label>Old password:</label>
				<input  type="password"  id='old_pass' type='text' value="<?php echo $pass; ?>" 
						class='form-control'/>
					<br/>
			
			<label>New password:</label>
				<input  type="password"  id='New_pass' type='text'
						class='form-control'/>
					<br/>
			<label>Confirm new password:</label>
				<input  type="password"  id='conf_new_pass' type='text' 
						class='form-control'/>
				<span>Password not confirm!</span><br><br>
					<button id='submit_save_pass' class='btn btn-primary'>Save change</button>
					<button id='submit_cancel' class='btn btn-primary'>Cancel</button>
			</form>
		</div>
 </a>
