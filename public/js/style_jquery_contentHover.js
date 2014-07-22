$('document').ready(function() {
	// calender
	// calendar
	$('#cc').calendar({
	    current:new Date()
	});

	// test tooltip
	$("#testtooltip").tooltip();
	
	
	$("#kt").click(function(e){
		e.preventDefault();
		var url="ajax/home.php";
		var choose="kt";
		var param = {
				'choose':choose
		}
		$.ajax({
			url:url,
			type:"POST",
			data:param,
			dataType:"html",
			error:function(){},
			beforeSend:function(){},
			complete:function(){},
			success:function(data){
				if(data){
					$("#result-home").html(data);
				}
				
			}
		});
	});
	//Thong tin tuyen sinh
	$("#thongtinTS").click(function(e){
		e.preventDefault();
		var url="ajax/home.php";
		var ttts="ttts";
		var param={
				'ttts':ttts
		};
		$.ajax({
			url:url,
			type:"POST",
			data:param,
			dataType:"html",
			error:function(){},
			beforeSend:function(){},
			complete:function(){},
			success:function(data){
				if(data){
					$("#result-home").html(data);
				}
			}
		});
	});
	
	
	// active button
	$("li>a").click(function(e) {
		e.preventDefault();
		$("#title-home").html($(this).data("tabs"));
		// $("li>a").toggleClass("btn-active");
		if ($(this).hasClass("btn btn-primary active btn-xs") == false) {
			$("li>a").removeClass();
			$("li>a").addClass("btn btn-info btn-sm");
			$(this).removeClass();
			$(this).addClass("btn btn-primary active btn-xs");
		}
		console.log($(this).data("tabs"));
		var url = "ajax/home.php";
		var tabs = $(this).data("tabs");
		var param = {
			'tabs' : tabs
		};
		$.ajax({
			url:url,
			type: "POST",
			data:param,
			dataType:"html",
			error:function(){},
			beforeSend:function(){},
			conplete:function(){},
			success:function(data){
				if(data){
					$("#result-home").html(data);
				}else{
					var info = "<div class='alert alert-warning'>Không tìm thấy sinh viên của lớp này.</div>";
					$("#result-home").html(info);
				}
			}
		})
	});
	// 1. Simple fade
	$('#d1').contenthover({
		overlay_background : '#000',
		overlay_opacity : 0.8
	});

	// 2. Slide effect with different speed (duoi len)
	$('#d2').contenthover({
		effect : 'slide',
		slide_speed : 300,
		overlay_background : '#000',
		overlay_opacity : 0.8
	});

	// 3. Advanced slide
	$('#d3').contenthover({
		overlay_width : 270,
		overlay_height : 180,
		effect : 'slide',
		slide_direction : 'right',
		overlay_x_position : 'right',
		overlay_y_position : 'center',
		overlay_background : '#000',
		overlay_opacity : 0.8
	});

	// 4. Hovering on a div instead of an image
	// html code
	// <div id="d4" style="width:300px; height:240px; background:#eee; ">
	// <div style="padding:20px;">
	// <p><img src="photos/3.jpg" /></p>
	// <p>Pellentesque habitant morbi tristique senectus et netus et malesuada
	// fames ac turpis egestas. </p>
	// </div>
	// </div>
	// <div class="contenthover">
	// <h3>Lorem ipsum dolor</h3>
	// <p>Pellentesque habitant morbi tristique senectus et netus et malesuada
	// fames ac turpis egestas. </p>
	// <p><a href="#" class="mybutton">Lorem ipsum</a></p>
	// </div>
	// jquery code
	$('#d4').contenthover({
		overlay_background : '#333'
	});

	// 5. Using a transparent png for a better opacity effect
	$('#d4').contenthover({
		hover_class : 'mybackground'
	});

	$('#myModal').modal(options);
	$('#myModal').modal({
		keyboard : false
	});
	$('#myModal').modal('toggle');
	$('#myModal').modal('show');
	$('#myModal').modal('hide');
	$('#myModal').on('hidden.bs.modal', function(e) {
		// do something...
	});

	function createXmlHttRequest() {
		var xmlhttp;
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else if (window.ActiveeXObject) {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

		} else {
			return false;
		}
		return xmlhttp;
	}
	;

});
// css extra
// .mybackground { background:url(transparent_bg.png); }
