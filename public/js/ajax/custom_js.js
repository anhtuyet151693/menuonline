/*$(document).ready(function() {

	//ajax update truong enable
	$(".chk_enable").click(function(e){
		if($(this).val()==1){
			$(this).attr('value',0);
		}
		else{
			$(this).attr('value',1);
		}
		var id= $(this).data("id");
		var name=$(this).data("name");
		var val=$(this).val();
		var url= $("#baseUrl").val()+"index.php/my_profile/update_enable";
		var param={
			'id':id,
			'val':val
		}
		$.ajax({
			url: url,
			type:"POST",
			data:param,
			dataType:"JSON",
			error:function(){},
			beforeSend:function(){},
			complete:function(){},
			success:function(data){
				if(data.modify){
					if(val==1){
						alert("You just enable  user "+name);
					}else{
						alert("You just disable  user "+name);
					}
					
				}
			}
		});
	});
	// ajax delete user	
	var id, name;
	$(".delete").click(function(e){
		 id= $(this).data("id");
		 name=$(this).data("name");
		 $("#confirm").html("Are you sure delete "+name + " user!");
		 $("#myModal").modal();
	});
	
	$("#delete").click(function(e){
		var url= $("#baseUrl").val()+"index.php/my_profile/delete_user";
		var param ={
			'id':id,
			'name':name
		}
		$.ajax({
			url: url,
			type:"POST",
			data:param,
			dataType:"html",
			error:function(){},
			beforeSend:function(){},
			complete:function(){},
			success:function(data){
				$("#myModal").modal('toggle');
				$("#"+id).hide();
				$('#manager').html(data);
			}
		});
	});
	
	
	// ajax edit user	
	
	$(".edit1").click(function(e){
		 id= $(this).data("id"); //user id
		roleid= $(this).data("roleid"); //role in db
		rolename= $(this).data("rolename");
		//alert(roleid+rolename);
		 var url= $("#baseUrl").val()+"index.php/my_profile/find_user";
		var param ={
			'id':id,
			'roleid':roleid,
			'rolename':rolename
			}
		$.ajax({
			url: url,
			type:"POST",
			data:param,
			dataType:"html",
			error:function(){},
			beforeSend:function(){},
			complete:function(){},
			success:function(data){
				if(data){
					$("#modalEdit").html(data);
					$("#myModalEdit").modal();
				}
				
			}
		});
	});
	
	

	var r_id;
	var role_id;
	$(document).on('click', "#role_seig", function(e){
		 role_id= $(this).data("id");
	$("#myModalEdit input:checkbox").attr('checked',null);
	//$('.'+role_id).attr('checked','checked');
		var url= $("#baseUrl").val()+"index.php/my_profile/get_permission_role";
		if($(this).click){
				//alert(role_id);
				r_id=role_id;
			}
			var param={
				'r_id' : r_id
			}
			$.ajax({
				url: url,
				type:"POST",
				data:param,
				dataType:"html",
				error:function(){},
				beforeSend:function(){},
				complete:function(){},
				success:function(data){
					if(data){
						$("#"+role_id).html(data);
					}
				
			}
	});
});
	
	

})*/