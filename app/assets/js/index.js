function Send(a) {
	var b = new XMLHttpRequest(),
		c = new FormData(a),
		d = a.getElementsByTagName('button');
	b.addEventListener("load", function(q) {
		var f = JSON.parse(q.target.responseText);
		if (f["error"]) {
			var i = document.querySelectorAll(".x");
			var j = Array.prototype.slice.call(i);
			j.forEach(function(k) {
				k.parentNode.removeChild(k);
			});
			for (e in f["error"]) {
				var g = document.createElement("div");
				var h = document.createTextNode(f["error"][e]);
				g.appendChild(h);
				g.classList.add("x");
				document.getElementsByName(e)[0].parentNode.insertBefore(g, document.getElementsByName(e)[0].nextSibling);
			}
		}
		if (f["redirect"]) {
			setTimeout(function() {
				window.location.href = f["redirect"];
			}, 1000);
		}
	});
	b.addEventListener('error', function(h) {
		console.log(h);
	});
	b.open(a.method, a.action);
	b.send(c);
	return false;
}

function yenifonksiyon() {

}
