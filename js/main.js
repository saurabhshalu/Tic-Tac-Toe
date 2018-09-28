$('.cell').click(function(){
	var id = $(this).data('id');
	var val = $(this).text();
	if(val != 'X' && val != 'O')
	{
		console.log("clicked?location=" + id);
		$(this).load('handler.php?location=' + id);
	}

  $('#info').load('handler.php?user=1');
});