

// ajax for my information in setting page
//var id_href;
$(document).ready(function(){
	// click on tab left to show information of user or decentralization
	$('#choose>a').click(function(e){
		e.preventDefault();
		//alert($(this).attr("href"));
		if ($(this).attr("href")){
				$.post($(this).attr("href")).done(function( data ){
					$("#profilebody").html(data);
				});
		}
		
	});
	/*----------------EDIT NAME OF USER----------------------------*/
 	//in page my infor, click on cell edit to edit my infor
 	var value;
 	var id;
	$(document).on('click', ".edit", function(e){
		e.preventDefault();
		id = $(this).data("id");
		value = $(this).data("value");
		//alert($(this).attr("href"));
		$.post($(this).attr("href"), { value: value}).done(function( data ) {
		    	$("#"+id).html(data);
		  });
		
	
});
		// when click save change button in form edit user
		$(document).on('click', "#submit_save", function(e){
			e.preventDefault();
			var name_edit= $("#change_name").val();
			var url = $("#baseUrl").val()+"index.php/setting/update_name_user";
			$.post(url, {name_edit:name_edit}).done(function( data ){
					$("#profilebody").html(data);
			});
		});
		
		// when click cancel button in form edit user
		$('#submit_cancel').click(function(e){
		e.preventDefault();
		var url = $("#baseUrl").val()+"index.php/setting/my_infor";
		$.post(url).done(function( data ){
			$("#profilebody").html(data);
		});
	});
	
	
	/*----------------EDIT USERNAME OF USER----------------------------*/	
	// when click save change button in form edit username
		$(document).on('click', "#submit_save_username", function(e){
			e.preventDefault();
			var username_edit= $("#change_nameuser").val();
			var url = $("#baseUrl").val()+"index.php/setting/update_username_user";
			$.post(url, {username_edit:username_edit}).done(function( data ){
					$("#profilebody").html(data);
			});
		}); 
		
		
		
	/*----------------EDIT PASSWORD OF USER----------------------------*/		
		// when click save change button in form edit pass
		$(document).on('click', "#submit_save_pass", function(e){
			e.preventDefault();
			var old_pass= $("#old_pass").val();
			//alert(old_pass);
			var New_pass= $("#New_pass").val();
			var conf_new_pass= $("#conf_new_pass").val();
			var url = $("#baseUrl").val()+"index.php/setting/update_pass";
			$.post(url, {New_pass:New_pass, conf_new_pass:conf_new_pass, old_pass:old_pass}).done(function( data )				{
					$("#profilebody").html(data);
			});
		});
		
		
});
