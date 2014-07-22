

$(document).ready(function(){
		/*	data: "load_student";*/	
	$("#btn-student").click(function(e){
			e.preventDefault();
			
			var url =$("#baseUrl").val()+"index.php/student/get_sv";
			$.ajax({
				
				url: url,
				type: "post",
				dataType: "html",
				beforeSend: function(){
				},
				complete: function(){
				},
				success: function(data){
					$("#tableStudent").html(data);
				},
			});
		});
		
		//delete student	
		$(document).on("click", ".del", function(e){
				e.preventDefault();
			
				var url =$("#baseUrl").val()+"index.php/student/del_sv/" + $(this).data("del");
				//alert(url);
				$.ajax({
				url: url,
				type: "post",
				dataType: "html",
				beforeSend: function(){
				},
				complete: function(){
				},
				success: function(data){
					$("#tableStudent").html(data);
				},
			});
		});
		
		
		//load student accoding class
			$(document).on("change", "#formSelect", function(e){
				e.preventDefault();
				//alert(1);
				
				var url =$("#baseUrl").val()+"index.php/student/load_student_class/" + $(this).val();
					//alert(url);
					$.ajax({
					
					url: url,
					type: "post",
					dataType: "html",
					beforeSend: function(){
					},
					complete: function(){
					//	alert(1);
					},
					success: function(data){
						
						$("#tableStudent").html(data);
						//alert(1);
					},
				});
		
			});
							
					
							
		/*	$(document).on("click", ".edit", function(e){
				e.preventDefault();
			//	alert(1);
				var url =$("#baseUrl").val()+"index.php/student/update_student/"+ $(this).data("mssv").trim()+"/"+$(this).data("ml").trim()+"/"+$(this).data("hl").trim()+"/"+$(this).data("ten").trim()+"/"+$(this).data("ns").trim()+"/"+$(this).data("email").trim() ;
				
					$.ajax({
					url: url,
					type: "post",
					dataType: "html",
					beforeSend: function(){
					},
					complete: function(){
						//alert(1);
					},
					success: function(data){
					//	alert(1);
						$("#modal").html(data);
//						$("#modal").show();
						$('#myModal').modal();		
						//alert(1);
					},
				});
			});*/
			
		// ------------	update	
		
		//var mssv, ml, hl, ten, ns, email;
				$(document).on("click", ".edit", function(e){
					var pos;
					var url =$("#baseUrl").val()+"index.php/student/load_modal";
					
					var param ={
							" mssv" : $(this).data("mssv").trim(),
							 "ml" : $(this).data("ml").trim(),
							"hl" : $(this).data("hl").trim(),
							" ten" : $(this).data("ten").trim(),
							" ns" : $(this).data("ns").trim(),
							"pos" : $(this).data("email").trim().search("@"),
							" email" : $(this).data("email").trim().substring(0, pos)
					};
							
					
					$.ajax({
					data: param;
					url: url,
					type: "post",
					dataType: "html",
					beforeSend: function(){
					},
					complete: function(){
						//alert(1);
					},
					success: function(data){
						
						$("#myModal").load(url);
						$('#myModal').modal();
					//	alert($(this).data("mssv"));
						
					/*	$("#mssv").val(mssv);
						$("#ml").val(ml);
						$("#hl").val(hl);
						$("#ten").val(ten);
						$("#ns").val(ns);
						$("#email").val(email);
						*/
					}
					
					
					});
				});
			
})
