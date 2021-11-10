function check_input() {
	var name_regex = /^[a-zA-Z ]+$/;

	var received_name = document.getElementById("fullname").value;

	var error_message = "";

	if (!name_regex.test(received_name)) error_message += "Name is wrong format \n";
	if (error_message == "") return true;

	alert(error_message);
	return false;
}
