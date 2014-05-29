function pluralUnit(num,tex) {
	return "<span style='display:inline-block;'><span style='font-weight:bold;color:#ffd800;padding-left:10px;width:30px;display:inline-block;text-align:center;font-size:100%;'>" + num + "</span> " + tex + (num != 1 ? "s" : "") + " " + "</span>";
}

function updateCountdown() {
	var d = Date.now();
	var eventtime = new Date("June 21 2014 9:00 AM EDT").getTime(); //Date.UTC(2014,0,4,15,30,0); //UTC time (6pm local [ET])
	var eventName = "Rochester ACS <em>Relay for Life&nbsp;</em>";
	var rem = -Date.now() + eventtime;
	if (rem <= 0) {
		document.getElementById("countdown").innerHTML = "The <span style='color:#ffd800;'>" + eventName + "</span> is going on!";
		//document.getElementById("countdown").innerHTML = "<span style='color:#ffd800;'>Let's go robots! Another awesome <em>FRC&nbsp;</em> World Championship is underway!</span>";
		return;
	} else {
		rem = rem / 1000; //rem is in seconds
		var minSec = 60;
		var hrSec = 60*minSec;
		var daySec = 24*hrSec;
		var weekSec = 7*daySec;

		var weeks = Math.floor(rem / weekSec);
		rem = rem % weekSec;
		var days = Math.floor(rem / daySec);
		rem = rem % daySec;
		var hours = Math.floor(rem / hrSec);
		rem = rem % hrSec;
		var minutes = Math.floor(rem / minSec);
		rem = rem % minSec;
		var seconds = Math.floor(rem);

		document.getElementById("countdown").innerHTML = "Countdown to the <span style='color:#ffd800;font-size:100%;'>" + eventName + "</span>:" + (weeks != 0 ? pluralUnit(weeks,"week") : "") + pluralUnit(days,"day") + pluralUnit(hours,"hour") + pluralUnit(minutes,"minute") + pluralUnit(seconds,"second");
	}
	
}
setTimeout(function() {
	updateCountdown();
	setInterval(updateCountdown,200);
}, 1500);