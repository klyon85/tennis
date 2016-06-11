function dateCheck() {
	var now = new Date();
	var submittedDate = $("#date").val();
	var arr = submittedDate.split("-");
	var dateToComp = new Date(2016, 01, 01);
	
	//Check that dates are acceptable
	dateToComp.setYear(arr[0]);
	dateToComp.setMonth(arr[1]);
	dateToComp.setDate(arr[2]);

	if (dateToComp < now) {
		alert("You cannot set a past date! Choose another date.");
	}
	var latestDate = new Date();
	latestDate.setDate(latestDate.getDate() + 7);
	if (dateToComp > latestDate) {
		alert("Given date exceeds 7 day reservation maximum. Choose another date.");
	}
}

/*function timeCheck() {
	var now = new Date();
	var submittedDate = $("#date").val();
	var arr = submittedDate.split("-");
	var dateToComp = new Date(2016, 01, 01);
	var start = $("#start option:selected").val();
	var end = $("#end option:selected").val();
	///alert(start end);	
	//Check that dates are acceptable
	dateToComp.setYear(arr[0]);
	dateToComp.setMonth(arr[1]);
	dateToComp.setDate(arr[2]);

	if (dateToComp < now) {
		alert("You cannot set a past date! Choose another date.");
	}
	var latestDate = new Date();
	latestDate.setDate(latestDate.getDate() + 7);
	if (dateToComp > latestDate) {
		alert("Given date exceeds 7 day reservation maximum. Choose another date.");
	}
	//check that time does not exceed 3 hours
	if ((end - start)) < 0) {
		alert("Your start time is later than your end time.  Please adjust your start and end times.");
	}
	if ((end - start) > 3) {
		alert("Hours exceed 3-hour maximum. Please adjust your start and endtimes. 
	}
}*/

function init() {
	//	$("#submit").click(dateCheck);
		$("#date").blur(dateCheck);
		//$("#start").blur(timeCheck);
}
$(document).ready(init);
