function Send(e) {
	
	var a = new XMLHttpRequest(),
		b = new eData(e);

	a.addEventListener("load", function(e) {
		console.log(e);
	});

	a.addEventListener("error", function(e) {
		console.log(e);
	});

	a.open(e.method, e.action);
	a.send(b);

	return false;
}