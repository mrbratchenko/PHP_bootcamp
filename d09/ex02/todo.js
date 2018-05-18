var cook = [];

window.onload = function() {
  	addFromCookie();
}

function addFromCookie() {
	var list = document.getElementById("ft_list");
	var oldCookie = JSON.parse(document.cookie.split( ',' ));
	for ( i = 0; i < oldCookie.length; i++ )
	{
		var div = document.createElement("div");
		div.setAttribute('onclick', 'removeFromList(this)');
		div.innerHTML = oldCookie[i];
		list.insertBefore(div, list.childNodes[0]);
		cook.push(oldCookie[i]);
	}
}

function addToList() {
	var list = document.getElementById("ft_list");
	var text = prompt("Your new TO DO item:");
	if (text) {
		var div = document.createElement("div");
		div.setAttribute('onclick', 'removeFromList(this)');
		div.innerHTML = text;
		list.insertBefore(div, list.childNodes[0]);
	}
}

function removeFromList(elem) {
	if (confirm("Your are about to delete item '" + elem.innerHTML + "'\nAre you sure?"))
		elem.parentNode.removeChild(elem);
	}

window.onunload = function() {
	var list = document.getElementById("ft_list");
	var children = list.children;
	var arr = [];
	for (var i = 0; i < children.length; i++) {
		arr.unshift(children[i].innerHTML);
	}
	document.cookie = JSON.stringify(arr);
}
