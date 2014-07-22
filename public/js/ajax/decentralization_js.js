$(document).ready(function(){
	$(document).on("click",".btn_infor", function(){
	//	alert($(this).data("id"));
		var role_id = $(this).data("id");
		var url = $("#baseUrl").val()+"index.php/management/get_all_pm";
		$.post(url, {role_id:role_id }).done(function(data){
			$("#body_panel").html(data);
		});
	} );
	
	
	//ajax update enable
	$(document).on("click",".chk_enable",function(e){
		if($(this).val()==1){
			$(this).attr('value',0);
		}
		else{
			$(this).attr('value',1);
		}
		var id= $(this).data("id");
		var name=$(this).data("name");
		var val=$(this).val();
		var url= $("#baseUrl").val()+"index.php/management/update_enable";
		$.post(url, {'id':id,'val':val}).done(function(data){
			if(data){
					if(val==1){
						alert("You just enable  user "+name);
					}else{
						alert("You just disable  user "+name);
					}
					
				}
		});
	});
	
	$(document).on("click",".get_role",function(e){
		//alert($(this).data("id"));
		var user_id = $(this).data("id");
		var url = $("#baseUrl").val()+"index.php/management/get_role_id";
		$.post(url, {'user_id':user_id}).done(function(data){
			$("#"+user_id).html(data);
		});
	});
	
	
	// ajax edit user	
	$(document).on("click",".grant",function(e){
		//alert(1);
		var id= $(this).data("id"); //user id
		var  user_name = $(this).data("name");
		//alert(user_name);
		 var url= $("#baseUrl").val()+"index.php/grant_user/index/"+user_name;
		// alert(url);
		 $.post(url, {'id':id, 'user_name':user_name}).done(function(data){
		 	$("#settingbody").html(data);
		});
	});
	
	
});

