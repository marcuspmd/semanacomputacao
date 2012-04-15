var modalWindow = {
	parent:"body",
	windowId:null,
	content:null,
	width:null,
	height:null,
	close:function()
	{
		$(".modal-window").remove();
		$(".modal-overlay").remove();
	},
	open:function()
	{
		var modal = "";
		modal += "<div class=\"modal-overlay\"></div>";
		modal += "<div id=\"" + this.windowId + "\" class=\"modal-window\" style=\"width:" + this.width + "px; height:" + this.height + "px; margin-top:-" + (this.height / 2) + "px; margin-left:-" + (this.width / 2) + "px;\">";
		modal += "<div id=\"contentsModal\">";	
		modal += this.content;
		modal += "</div>";	
		modal += "</div>";	

		$(this.parent).append(modal);

		$(".modal-window").append("<a class=\"close-window\">fechar</a>");
		$(".close-window").click(function(){modalWindow.close();});
		$(document).keyup(function(e) {
			if (e.which == 27){
				modalWindow.close();
			}
		});
		// $(".modal-overlay").click(function(){modalWindow.close();});
	}
};
