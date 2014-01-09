
jQuery(document).ready(function($){
 	
 	/*====================
 	Begin Hooks & Functions related to the Admin Menu
 	====================*/
 	$("body.toplevel_page_admin-menu #tabs").tabs();
 	$(".section img").click(image_select);
	$(".section  a.clear").click(dws_clear);
	$(".section  a.add").click(add_tags);
	$(".section  a.remove").live('click', remove_tags);
	
 	
  
 	function dws_clear(e){
 		e.preventDefault();
 		var $this = $(this);
 		$("input#"+$this.attr("rev")).val("");
 		$this.parent().parent().find("img").removeClass("selected");
 		} 
 		function image_select(){
 			var $this = $(this);
 			$this.parent().find("img").removeClass("selected");
 			$this.addClass("selected");
 			$("input#"+$this.attr("title")).val($this.attr("alt"));
 		}
 		function add_tags(e){
 			e.preventDefault();
 			var $this = $(this);
 			var addTemp = $("input#display_tags").val();
 			var oldVal =  $("input#"+$this.attr("rev")).val();
 			$("div#"+$this.attr("rev")).append('<p class="col_5"><span>'+addTemp+'</span> <a rev="'+$this.attr("rev")+'" class="remove" href="">x</a></p>'); 
 			$("input#"+$this.attr("rev")).val(oldVal+","+addTemp);
 		}
 		function remove_tags(e){
 			e.preventDefault();
 			var $this = $(this);
 			var oldVal =  $("input#"+$this.attr("rev")).val();
 			var toRemove =  ","+$this.parent().find("span").text().trim();
 			var e_v = new RegExp (toRemove);
 			var newVal = oldVal.replace(eval(e_v)," "); 
 			$("input#"+$this.attr("rev")).val(newVal);
 			$this.parent().remove();
  		}
 	
 	/*====================
 	End Hooks & Functions related to the Admin Menu
 	====================*/
 	
 	
 	/*====================
 	Begin Hooks & Functions related to gallery on the Post & pages Screens
 	====================*/
 	
  	if($("input#dws_gallery").length != 0){
 	 	 var secondary_arr = new Array();
 		 var secondary_arr = $("input#dws_gallery").val().split(',');
 	}
 	$("a#gallery-page").click(post_gallery_paginate);
 	$('#selected-gallery .image').live('click',post_gallery_remove);
  	$('#secondary-gallery .image').live('click', post_gallery_add);
   	
   	
   	
   	function post_gallery_paginate(e){
   		e.preventDefault();
   		var data = {
   			action: 'load_gallery',
   			page: $(this).attr("rel")
   		};
   		$.post(ajaxurl, data, function(response) {
   			$("div#secondary-gallery").fadeOut("fast", function(){
   				$(this).html(response).fadeIn("fast");
   			});
   		});
   	}
   	
	function post_gallery_add(e){
		e.preventDefault();
		var $cloned = $(this).clone();
		$cloned.find("a").html("remove").removeClass("add").addClass("remove");
		if($("#selected-gallery h4").height() == null){
			$("#selected-gallery").append("<h4>Selected Images</h4>");
		}
		$("#selected-gallery").append($cloned.fadeIn('fast'));
		
		var tAlt = $cloned.find("img").attr("alt");
		secondary_arr.push(tAlt);
		$("input#dws_gallery").val(secondary_arr.join());
	}
 	function post_gallery_remove(e){
 		 e.preventDefault();
 		 $this = $(this);
 		 var tAlt = $this.find("img").attr("alt");
 		 secondary_arr.splice(jQuery.inArray(tAlt, secondary_arr ), 1);
 		 $this.fadeOut('fast',function(){
 			$this.remove();
 			if(secondary_arr.length == 1){
 				$("#selected-gallery h4").remove();
 			}
 		 });
 		$("input#dws_gallery").val(secondary_arr.join());
 	}
	
	
	/*====================
	End Hooks & Functions related to gallery on the Post & pages Screens
	====================*/
 
    /*====================
    Begin Hooks & Functions related to alerting the user about pasting from wor
    ====================*/
    $("#message .close").live('click',close_window);
        
    $(window).load(function () {//I'm using window.load in order to target the mce iframe content.
        var $content = $('iframe').contents().find("body");
        $content.bind('paste', function(e) {
	      	try { //clipboardData.getData only works when using IE
 	      	       if(sanitize(clipboardData.getData("text")) != null){
	      	         $("#postdivrich").before('<div id="message" class="error below-h2"><p>It looks like you\'re trying to paste formatted content into the wordpress text editor; copying content from another editor and pasting into wordpress can bring along hidden code, potentially breaking the website. Try using the  <span class="pastePlain"></span><strong>paste as plain text</strong> feature instead. <a class="close" href="">Close</a></p></div>');
	      	       }
	      	       
 	      	} catch (e) {
	      		//If we can't access the clipboard data directly, then we have to do some finagling and figure out what data was just pasted.
  	      	    setTimeout( function() {
    	      	            if(sanitize($content.html()) != null){
   	      	             $("#postdivrich").before('<div id="message" class="error below-h2"><p>It looks like you\'re trying to paste formatted content into the wordpress text editor; copying content from another editor and pasting into wordpress can bring along hidden code, potentially breaking the website. Try using the  <span class="pastePlain"></span><strong>paste as plain text</strong> feature instead. <a class="close" href="">Close</a></p></div>');
  	      	            }
	      	            }, 100);
	      	    //The timer is on a short delay because it apparently takes some time for content to be pasted
 	      	}
        });
     });
     
   	
   	function close_window(e){
   		e.preventDefault();
   		$(this).parents("#message").remove();
   	}
   	
 	function sanitize(new_text) {
	  	var regex = /(((style)|(class)|(id)|(valign)|(type))=\"[^<]+?\")|(&#160;)|(<!--[^<]+?-->)/g;
 	    return new_text.match(regex); 
  	
 	};
 	
 	/*====================
 	End Hooks & Functions related to stripping out microsoft word content on paste
 	====================*/
 	
 	
	 
});

