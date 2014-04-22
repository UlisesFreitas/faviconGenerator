$('#send').addClass('disabled');
$("button[type=submit]").attr("disabled", "disabled");

$('#img-favicon').bind('change', function() {

  //this.files[0].size gets the size of your file.
  var size = this.files[0].size;
  
  if(size < 2097152){
	  $('#send').removeClass('disabled');
	  $("button[type=submit]").removeAttr("disabled");
  }

});