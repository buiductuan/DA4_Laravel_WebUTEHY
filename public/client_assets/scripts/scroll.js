;(function($){

	$.fn.advScroll = function(option) {
		
		$.fn.advScroll.option = {
			marginTop:1,
			easing:'',
			timer:400,
		};

		option = $.extend({}, $.fn.advScroll.option, option);

		return this.each(function(){
			var el = $(this);
			$(window).scroll(function(){
				t = parseInt($(window).scrollTop()) + option.marginTop;
				el.stop().animate({marginTop:t},option.timer,option.easing);
			})
		});
	};


})(jQuery)

$(document).ready(function() {	
	//Put in the DIV id you want to display
	// if(document.cookie.indexOf("adf")==-1){
 //      	document.cookie="popunder1=adf";
		// launchWindow('#dialog1');
	// }
	//if close button is clicked
	$('.window #close').click(function () {
		$('#mask').hide();
		$('.window').hide();
	});		
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	$('#dialog1').click(function(){
		$('#mask').hide();
		$(this).hide();
		$('.window').hide();

	});
		
	
	$(window).resize(function () {
	 
 		var box = $('#boxes .window');
 
        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
      
        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width':maskWidth,'height':maskHeight});
               
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();

        //Set the popup window to center
        box.css('top',  winH/2 - box.height()/2);
        box.css('left', winW/2 - box.width()/2);
	 
	});	
	
});
function launchWindow(id) {
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height());
		$(id).css('left', winW/2-$(id).width()/2);
		//transition effect
		$(id).fadeIn(2000); 
  
};