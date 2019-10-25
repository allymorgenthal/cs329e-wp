function checkValid() {
	var items = document.getElementById("items");
	var name = document.getElementById("username");

	if (name.value == null || name.value == "" || items.value == null || items.value == "") {
		alert("You must fill out both fields!")
		return false;
	}
}