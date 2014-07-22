$(document).ready(function(){

/*function removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}*/


	var per_id= [];
	$(document).on('click','.inp_per',function(){
		var value = $(this).val();
		
		if($(this).prop('checked') == true){
			per_id[per_id.length] = $(this).val();	
		}
		else{
			var index = $.inArray(value, per_id);
			per_id.splice(index, 1);	
		}
		//alert(per_id);
	});

	$(document).on('click','.btn_g',function(){
		//alert(1);
		var attr = $(this).val();
		//alert(attr);
		var user_id = $("#inp_userid").val()
		var url =  $("#baseUrl").val()+"index.php/grant_user/"+attr;
		alert(url);
		$.post(url, {per_id:per_id, user_id:user_id}, function(){
			//$("#body_panel").html(data);
			)
		});
			
	});
	
})