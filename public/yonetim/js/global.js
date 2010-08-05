$(document).ready(function() {
	$('.modal').modal();
	$('.modal_custom').modal({width:700,showSpeed:2000,closeSpeed:2000,title:false,skin:"red"});
	$('a.ajax_link').click(function() {
		var url = $(this).attr("href");
		$.ajax({
			type: "POST",
			url: url,
			success: function(msg){
				$().successMessage({text:msg});
			},
			error: function(xhr, desc, exceptionobj){
				$().errorMessage({time:5000,text:"Something wrong in here:"+xhr.responseText});
			}
		});
		return false;
	});
	
	$('a.ajax_link_delete').click(function() {
		var url = $(this).attr("href");
		var id = $(this).attr("id");
		var split = id.split("_");
		var element_id = "#id_"+split[1];
		$.ajax({
			type: "POST",
			url: url,
			success: function(msg){
				$(element_id).fadeOut("0",function(){
					$().successMessage({time:2000,text:"Deleted!"});
				});
			},
			error: function(xhr, desc, exceptionobj){
				$().errorMessage({time:5000,text:"Something wrong in here:"+xhr.responseText});
			}
		});
		return false;
	});	
	
	$("a.form_submit").live("click", function(){
		var id = $(this).attr("id");
		var split = id.split("_");
		var form_id = "#"+split[0];
		$(form_id).submit();
		return false;
	});	
});


(function($){  
 $.fn.errorMessage = function(options) {  
  
  var defaults = {  
   time: 2000,
   text: "Something Wrong in here",
   target: "#messages"
  };  
  var options = $.extend(defaults, options);  
  var id = Math.ceil(Math.random()*10000);
  return this.each(function() {  
		var html = '<div class="error" id="'+id+'" style="display:none"><div class="head"><div></div></div><div class="desc"><p>'+options.text+'</p></div><div class="bottom"><div></div></div></div>';
		$(options.target).append(html);
		$("#"+id).slideDown(function(){
			setTimeout( function()
			{
				$("#"+id).slideUp(function(){
					$("#"+id).remove();
				});
			}, options.time);
		});  
  });  
 };  
 $.fn.successMessage = function(options) {  
  
  var defaults = {  
   time: 2000,
   text: "Success!",
   target: "#messages"
  };  
  var options = $.extend(defaults, options);  
  var id = Math.ceil(Math.random()*10000);
  return this.each(function() {  
		var html = '<div class="success" id="'+id+'" style="display:none"><div class="head"><div></div></div><div class="desc"><p>'+options.text+'</p></div><div class="bottom"><div></div></div></div>';
		$(options.target).append(html);
		$("#"+id).slideDown(function(){
			setTimeout( function()
			{
				$("#"+id).slideUp(function(){
					$("#"+id).remove();
				});
			}, options.time);
		});  	
  });  
 };  
 $.fn.noticeMessage = function(options) {  
  
  var defaults = {  
   time: 2000,
   text: "Notice!",
   target: "#messages"
  };  
  var options = $.extend(defaults, options);  
  var id = Math.ceil(Math.random()*10000);
  return this.each(function() {  
		var html = '<div class="notice" id="'+id+'" style="display:none"><div class="head"><div></div></div></div><div class="desc"><p>'+options.text+'</p></div><div class="bottom"><div></div></div></div>';
		$(options.target).append(html);
		$("#"+id).slideDown(function(){
			setTimeout( function()
			{
				$("#"+id).slideUp(function(){
					$("#"+id).remove();
				});
			}, options.time);
		});  	
  });  
 }; 
})(jQuery);

