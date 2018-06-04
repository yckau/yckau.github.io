		var nop = 0;

		$(window).scroll(function (){
			if ($(window).scrollTop()%50 == 0){
				updatePosts("add");
			}
	    	
		});

		function updateList(){
			var xmlhttp;

			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			} else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
					$("#fdlist").html(xmlhttp.responseText);
				}
			}

			xmlhttp.open("GET","handleFriendlistDisplay.php",true);
			xmlhttp.send();
		}

		function updatePosts(mode){
			var xmlhttp;

			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			} else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
					if (mode == 'initial'){
						$("#board").html(xmlhttp.responseText);
						nop +=3;
					} else {
						$("#board").append(xmlhttp.responseText);
	    				nop +=3;
					}
					console.log(nop);
				}
			}

			xmlhttp.open("GET","handlePostDisplay.php?nop="+nop,true);
			xmlhttp.send();			
		}

		function updateComments(id){
			var xmlhttp;

			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			} else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			content = $("#cm_"+id).val()	;
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
					$("#post_"+id).append(xmlhttp.responseText);
					$("#cm_"+id).val("");
				}
			}

			xmlhttp.open("get","handleComments.php?postID="+id+"&content="+content,true);
			xmlhttp.send();	

		}

		function updateStar(id, elem){
			var xmlhttp, newValue;

			
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			} else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			if ($(elem).hasClass("N")){
				newValue = "Y";
			} else if ($(elem).hasClass("Y")){
				newValue = "N";
			}

			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
						$(".star_"+id).html(xmlhttp.responseText);
						updateList();				
				}
			}

			xmlhttp.open("get","handleStarringFriend.php?friendID="+id+"&value="+newValue,true);
			xmlhttp.send();	
		}