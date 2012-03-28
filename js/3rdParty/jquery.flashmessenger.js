/*
  FLASH MESSENGER
  
  Copyright (c) 2009, Libor Vaclavik - libor.vaclavik@gmail.com
	-- this plugin was written for and with my teammate "Mildon" :)
  
  Version: 
       1.0.3
  
  Licensed under the GPL license:
      http://www.gnu.org/licenses/gpl.html
  
  Description:
  		- flashes the box on the screen containing specific message 
        - automaticaly close the box or wait for user to close it (set by parameters)
        - all main features can be parametrized (position, style of the box, delays, etc.)
       
  Requires:
  		- jquery library (tested on: 1.3.2 version)
  
  Parameters:
  		1. msg - message to be displayed
  		2. options - settings of the flashmessenger [optional]
	  		autoClose 		: 	whether the box will hide automaticaly after the time set in wait parameter, 
	  							if set to false box will be provided with the close button and can be closed only by clicking it  
	  							values -  true,false 
	  							default - true
			modal 			: 	whether the box will be modal and closable only by the close button
								values -  true,false
								default - false
			clsName			: 	name of the css class that will be used for formating the box,
								another classes should be inserted into /flashmessenger/flashmessenger.css style sheet
								values - name of your own implemented class or prepared ("ok","err","info","warn")
								default - "ok"
			position		: 	position of the box on the screen, cooperates with the positionMargin parameter
								values - left,right,top,bottom,middle
								default - "middle",
			positionMargin	: 	margin (in px) of the box from the position it is set to, does not have sense to use for the "middle" position
								values - number of pixels
								default - 10
			fadeIn 			: 	time (in ms) of the box to fade in
								values - number in ms
								default - 500
			wait 			: 	time (in ms) of the box to be displayed on the screen till it starts to fade out
								if "autoclose" is set to false, this parameter is ignored and therefore useless
								values - number in ms
								default - 4000
			fadeOut			: 	time (in ms) of the box to fade out
								values - number in ms
								default - 500
								
	Example of use:
	
	<!-- link all the required stuff -->
	<script src="/project/js/jquery-1.3.2.js" type="text/javascript"></script>
	<script src="/project/js/jquery.flashmessenger.js" type="text/javascript"></script>
	<link href="/project/js/flashmessenger/flashmessenger.css" rel="stylesheet" type="text/css" />
	
	<script type='text/javascript'>
	 $(function()
	 {
		$.flashMessenger("This is a message to be flashed",{ modal:false, autoClose:true, position: "top", positionMargin: 50, wait:500 });
	 });
	</script>

*/

(function($) 
{
	$.flashMessenger = function(msg,options)
	{
		var opts = $.extend({}, $.flashMessenger.defaults, options);

		if ($("#fmBox").length != 0) 
		{		
			$.flashMessenger.remove(); // remove old box if is already in the document
		}
		$.flashMessenger.init(msg, opts);
		
		$("#fmBox").addClass(opts.clsName).css("opacity",1.0).fadeIn(opts.fadeIn,function()
		{
			if(opts.autoClose)
			{
				$("#fmBox").delay(opts.wait).fadeOut(opts.fadeOut, function()
				{
					$.flashMessenger.close();
				});
			}
			else
			{
				$("#fmBox").append("<div id='preClose'><input type='button' id='closeBtn' value=' Ok ' /></div>");
				$("#closeBtn").click(function()
				{
					if (opts.waitOk){
						window.location.reload();
					}else{
						$.flashMessenger.close();
					}
				});
			}
		});
	};

	$.flashMessenger.defaults = 
	{
		autoClose 		: false,
		modal 			: false,
        parent          : 'body',
		clsName			: "ok",
		position		: "center",
		positionMargin	: 0,
		fadeIn 			: 500,
		wait 			: 10000,
		fadeOut			: 500,
		waitOk			: false
	};	
	
	$.flashMessenger.init = function(msg,opts)
	{
		var wW = $(opts.parent == 'body' ? window : opts.parent).width();
		var wH = $(opts.parent == 'body' ? window : opts.parent).height();
		var wT = $(opts.parent == 'body' ? window : opts.parent).scrollTop();
		var wL = $(opts.parent == 'body' ? window : opts.parent).scrollLeft();
        
        $(opts.parent).append("<div id='fmOverlay'></div>");
		$("#fmOverlay").css("opacity",0.0);
		
		$(opts.parent).append("<div class='fmBox' id='fmBox'></div>");
		$("#fmBox").css("opacity",0.0);
		$("#fmBox").html(msg);

		if (opts.modal) 
		{
			$("#fmOverlay").css("width", wW+wL);
			$("#fmOverlay").css("height", wH+wT);
			$("#fmOverlay").animate(
			{
				opacity: 0.5
			});
		}

		switch(opts.position)
		{
			case "left":
				$("#fmBox").css("left",opts.positionMargin + wL);
				$("#fmBox").css("top",((wH - $("#fmBox").outerHeight()) / 2) + wT);
			break;
			
			case "right":
				$("#fmBox").css("right",opts.positionMargin - wL);
				$("#fmBox").css("top",((wH - $("#fmBox").outerHeight()) / 2) + wT);
			break;
			
			case "top":
				$("#fmBox").css("left",((wW - $("#fmBox").outerWidth()) / 2) + wL);
				$("#fmBox").css("top", opts.positionMargin + wT);
			break;
			
			case "bottom":
				$("#fmBox").css("left",((wW - $("#fmBox").outerWidth()) / 2) + wL);
				$("#fmBox").css("bottom",opts.positionMargin - wT);
			break;
			
			default: // middle
				$("#fmBox").css("left",((wW - $("#fmBox").outerWidth()) / 2) + wL);
				$("#fmBox").css("top",((wH - $("#fmBox").outerHeight()) / 2) + wT);
		}
	}
	
	$.flashMessenger.close = function()
	{
		$("#fmOverlay").animate({ opacity: 0.0});
		$("#fmBox").animate({ opacity: 0.0}, function() 
		{
			$.flashMessenger.remove();
		});
	}

	$.flashMessenger.remove = function()
	{
		$("#fmOverlay").remove();
		$("#fmBox").remove();
	}

	$.fn.delay = function(msec)
	{
        var delay = (msec) ? msec : 1000;

        return this.queue('fx',
            function() 
			{
                var self = this;
                setTimeout(function() { $.dequeue(self); },msec);
            });
    }
})(jQuery);