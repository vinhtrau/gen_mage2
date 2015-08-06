$.widget("ui.tooltip", $.ui.tooltip, {
	options: {
		content: function () {
			return $(this).prop('title');
		}
	}
});
$("input, select").attr('title',function(){
	$(this).next('.note').hide();
	return $(this).next('.note').html();
});
$(document).tooltip();

$('.require').prev("label").append("<em>*</em>");
$('#generate-input').submit(function(event){
	event.preventDefault();
	var hasError = 0;
	$('.require').removeClass("error");
	var form = $(event.currentTarget);
	$('.require').each(function(i,e){
		var e = $(e);
		if(e.val() == "" || e.val() == 0){
			e.addClass("error", 200);
			hasError = 1;
		}
	});
	if(hasError == 0){
		$( "#dialog-message" ).remove();
		$.ajax({
			url: form.attr('action'),
			type: form.attr("method"),
			data: form.serialize(),
			dataType: "json",
			success: function(resp){
				if(resp.error == 0){
					$("body").append(resp.html);
					$('#setup_string').focus(function(event){
						$(this).select();
						event.preventDefault();
					});
					$( "#dialog-message" ).dialog({
						modal: true,
						width: 1024,
						buttons: {
							"Select All": function() {
								$('#setup_string').focus();
							},
							"Close": function(){
								$( "#dialog-message" ).dialog( "close" );
							}
						}
					});
				}
			}
		});
	}else
		return false;
});