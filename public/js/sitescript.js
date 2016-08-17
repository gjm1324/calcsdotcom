if(loggedIn){
	$('.logged-in').show();
	$('.logged-out').hide();
}
else{
	$('.logged-out').show();
	$('.logged-in').hide();
}

function checkformcompletion(){
	var pass = 1;
	$('.check').each(function(){
		if(!$(this).val()){
			pass = 0;
    		$(this).addClass("emptyForm");
		}
		else{
    		if($(this).hasClass("emptyForm")){
    			$(this).removeClass("emptyForm");
    		}
    	}
	});
	return pass;
}