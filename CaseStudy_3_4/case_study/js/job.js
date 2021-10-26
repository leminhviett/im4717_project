function check_input() {
	var email_regex = /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,3}$/;
	var name_regex = /^[a-zA-Z ]+$/;

	var received_email = document.getElementById("email").value;
	var received_name = document.getElementById("name").value;
	var chosen_date = new Date(Date.parse(document.getElementById("myDateid").valueAsDate));
	chosen_date.setHours(0, 0, 0, 0);

	var today = new Date();
	today.setHours(0, 0, 0, 0);

	var error_message = "";

	if (!email_regex.test(received_email) || !check_domain(received_email)) error_message += "Email is wrong format \n";
	if (!name_regex.test(received_name)) error_message += "Name is wrong format \n";
	if (!(today < chosen_date)) error_message += "Chosen date must be latter";

	if (error_message == "") return true;

	alert(error_message);
	return false;
}

function check_domain(email) {
	return email.split("@")[1].split(".")[0] == "ntu";
}
