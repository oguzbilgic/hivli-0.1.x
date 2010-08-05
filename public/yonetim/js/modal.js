(function($){
	$.fn.modal = function(options) {
	
		var defaults = {
		width: 400,
		showSpeed: 500,
		closeSpeed: 500,
		title: true,
		skin: "default"
		};
		var options = $.extend(defaults, options);
		
		return this.each(function() {
			var url = $(this).attr("href");
			var url_first_character = url.substr(0,1);
			var title = $(this).attr("title");	
			if (url_first_character == "#") {
				$(url).addClass("novisible");
			}
			$(this).click(function() {
			    function screenSize() {
				     var xScroll, yScroll;
					if (window.innerHeight && window.scrollMaxY) {	
						xScroll = window.innerWidth + window.scrollMaxX;
						yScroll = window.innerHeight + window.scrollMaxY;
					} else if (document.body.scrollHeight > document.body.offsetHeight){
						xScroll = document.body.scrollWidth;
						yScroll = document.body.scrollHeight;
					} else {
						xScroll = document.body.offsetWidth;
						yScroll = document.body.offsetHeight;
					}
					var windowWidth, windowHeight;
					if (self.innerHeight) {
						if(document.documentElement.clientWidth){
							windowWidth = document.documentElement.clientWidth; 
						} else {
							windowWidth = self.innerWidth;
						}
						windowHeight = self.innerHeight;
					} else if (document.documentElement && document.documentElement.clientHeight) {
						windowWidth = document.documentElement.clientWidth;
						windowHeight = document.documentElement.clientHeight;
					} else if (document.body) {
						windowWidth = document.body.clientWidth;
						windowHeight = document.body.clientHeight;
					}	
					if(yScroll < windowHeight){
						pageHeight = windowHeight;
					} else { 
						pageHeight = yScroll;
					}
					if(xScroll < windowWidth){	
						pageWidth = xScroll;		
					} else {
						pageWidth = windowWidth;
					}
					return [pageWidth,pageHeight];
				}
				var arrayPageSize = screenSize();
				
				var overlay_height = 'height:'+pageHeight+'px';
				var modal_width = 'width:'+options.width+'px;';
				var modal_pos_x = 'left:'+(pageWidth - options.width)/2+'px';
				var loader_pos_x = 'left:'+(pageWidth - 50)/2+'px';
				if($.browser.msie){
					var overlay_height = 'height:'+pageHeight+'px;background:url(../images/overlay.png)';
					var modal_pos_x = 'left:'+(pageWidth - options.width)/2+'px;position:absolute;';
					var loader_pos_x = 'left:'+(pageWidth - 50)/2+'px;position:absolute;';
				}
				var overlay = '<div class="overlay" style="'+overlay_height+'"></div>';
				var modal = '<div class="modal_window '+options.skin+'" style="'+modal_width+modal_pos_x+'"><div class="header"><h2>'+title+'<span>Close</span></h2></div><div id="modal_inner"></div></div>';
				if($.browser.msie){
					var modal = '<div class="modal_window border '+options.skin+'" style="'+modal_width+modal_pos_x+'"><div class="header"><h2>'+title+'<span>Close</span></h2></div><div id="modal_inner"></div></div>';
				}
				var loader = '<div class="modal_loader" style="'+loader_pos_x+'"></div>';				
				$('body').append(overlay);
				$('body').append(modal);
				$('body').append(loader);
				if (title == 0) {
					$('.modal_window .header').hide();
				}
				else {
					if (options.title == false) {
						$('.modal_window .header').hide();
					};
				}
				$('.overlay').fadeIn(options.showSpeed,function(){
					if (url_first_character == "#") {
						if ($(url).length == 0) {
							modalClose()
					        $().errorMessage({time:5000,text:"This element doesn't exist: "+url});
						} else {
							$(url).clone().appendTo("#modal_inner");
						}
						$('.modal_loader').fadeOut();
						$('.modal_window').fadeIn();
					}
					else {
						$('#modal_inner').load(url,
							function(responseText, textStatus, XMLHttpRequest){
					            if(textStatus == 'error') {
					            	modalClose()
					            	$().errorMessage({time:5000,text:"There was an error making the AJAX request"});
					            }
								$('.modal_loader').fadeOut();
								$('.modal_window').fadeIn();
							});
					}
				});		
				$('.overlay,.header h2 span').click(function(){
					modalClose()
				});
				return false;
			});
			function modalClose(){
				$('.modal_window,.overlay').fadeOut(options.closeSpeed, function(){
					$('.modal_window,.overlay,.modal_loader').remove();
				});
			}
		});
	};
})(jQuery);