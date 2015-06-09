$(document).on("click", closeDialog);
$(document).on("keydown", closeDialogKey);
$(document).ajaxStart(function() {
	mostrarStatus();
});
$(document).ajaxStop(function() {
    ocultarStatus();
});
function mostrarStatus(){
    $("#shadow-black").show();
    $("#stbar").show();
}
function ocultarStatus(){
    $("#stbar").hide();
    $("#shadow-black").hide();
}
$(window).resize(function(){
	resizeContent();
});
function resizeContent(){
	frameH = $(window).height()-133;
	$('.content').height(frameH);
}
function validateForm(frm, formRules, formMessages){
	$(frm).validate({
		ignore: "",
		rules : formRules,
		messages: formMessages,
		errorClass: 'label-invalid',
	    invalidHandler: function(event, validator) {
		    var errors = validator.numberOfInvalids();
		    if (errors){
			    var message = errors == 1
			        ? 'Te falta 1 campo, se encuentra resaltado en la parte posterior'
				    : 'Te faltan ' + errors + ' campos, se encuentran resaltados en la parte posterior';
			    showAlert("error", message);
		    }
		 },
		highlight: function(element){
			$(element).addClass('mark-up-error');
		},
		unhighlight: function(element, errorClass, validClass){
			$(element).removeClass('mark-up-error');
		},
		errorPlacement: function(error, element){
			if (!flag){
				showAlert("error", error[0].innerHTML);
			}
		}
	});
}
jQuery.validator.addMethod("accept", function(value, element, param) {
  return value.match(new RegExp("^" + param + "$"));
});
jQuery.validator.addMethod("medico", verificarSelectMedico, "Seleccione un médico");
function verificarSelectMedico(){
	if($('#medico').val()==0){
		return false;
	}else return true;
}
function cleanForm(form) {
    $(form).find(':input').each(function () {
        switch (this.type) {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });
}
function showAlert(status, message){
	alertBoxContainer = $('.alert-box-container');
	alertBox = $("#alert-box");
	alertBoxSpan = $("#alert-box p");
	cssClass = "";
	alertBox.removeClass();
	switch (status){
		case "success":
			alertBoxSpan.empty().html(message);
			alertBox.addClass('alert-box-success');
			cssClass = "alert-box-success";
			break;
		case "error":
			alertBoxSpan.empty().html(message);
			alertBox.addClass('alert-box-error');
			cssClass = "alert-box-error";
			break;
		case "info":
			break;
		case "warning":
			break;
	}
	alertBoxContainer.stop(true,true);
    alertBoxContainer
    .slideDown()
    .animate({opacity: 1.0}, 2000)
    .slideUp(function() { alertBox.removeClass(cssClass); });

}
function closeDialog(event){
	var dialogBackground = $('.background-modal-container');
	var userOptionBox = $('#user-option-container');
	var idClick = event.target.id;
	if (dialogBackground.is(':visible') && (idClick == 'btn-close-dialog' || idClick == 'btn-cancelar-modal'))
	    cerrarModal();
}
function closeDialogKey(event){

	if(event.keyCode==27){
		var dialogBackground = $('.background-modal-container');
		if (dialogBackground.is(':visible')) 
			cerrarModal();
	}
}
function cerrarModal(){
	var dialogBackground = $('.background-modal-container');
	dialogBackground.hide();
	$('.modal-content').empty();
}
function upperCase(event){
	input = $(event.currentTarget);
	input.val(input.val().toUpperCase());
}
function letra(event){
	tecla = (document.all) ? event.keyCode : event.which;
	if(tecla == 8)
		return true;
	var patron = /[a-zA-ZáéíóúAÉÍÓÚÑñÜü ]/
	var te = String.fromCharCode(tecla);
	return patron.test(te);
}
function decimal(event){
	tecla = (document.all) ? event.keyCode : event.which;
	if(tecla == 8) return true;
	patron = /^([0-9])*[.]?[0-9]{0,2}$/
	te = $('#'+this.id).val()+String.fromCharCode(tecla);
	if (!patron.test(te)) return false;
}
function numero(event){
	tecla = (document.all) ? event.keyCode : event.which;
	if(tecla == 8)	return true;
	var patron = /\d/;
	var te = String.fromCharCode(tecla);
	return patron.test(te);
}