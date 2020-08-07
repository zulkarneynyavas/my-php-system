function Send(c) {
	var a = new XMLHttpRequest(),
		b = new FormData(c);

	a.addEventListener("load", function(e) {
		console.log(e);
	});

	a.addEventListener("error", function(e) {
		console.log(e);
	});

	a.open(c.method, c.action);
	a.send(b);

	return false;
}