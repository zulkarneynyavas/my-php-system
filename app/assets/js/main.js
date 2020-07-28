function Send(Form) {
	var a = new XMLHttpRequest(),
		b = new FormData(Form);

	a.addEventListener("load", function(e) {
		console.log(e);
	});

	a.addEventListener("error", function(e) {
		console.log(e);
	});

	a.open(Form.method, Form.action);
	a.send(b);

	return false;
}