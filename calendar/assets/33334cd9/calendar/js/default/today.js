$(document).ready(function () {

	var pane = $('.eventTable').jScrollPane();

	var api = pane.data('jsp');

	var date = new Date();
	//console.log(date.getHours());
	api.scrollTo(0,date.getHours()*40 + 120);
	//$('.today-container').jScrollPane();
	//$('.calendarbody').jScrollPane();

});
