function parse_input_update() {
	var prod_ids = [
		"price_1_single",
		"price_2_single",
		"price_2_double",
		"price_3_single",
		"price_3_double",
	];
	var price_ids = [
		"new_price_1",
		"new_price_2_sing",
		"new_price_2_doub",
		"new_price_3_sing",
		"new_price_3_doub",
	];

	var prod_id_checked, price;
	let myForm = document.getElementById("my_form");
	let formData = new FormData(myForm);

	for (var i = 0; i < price_ids.length; i++) {
		prod_id_checked = document.getElementById(prod_ids[i]).checked;
		price = parseFloat(document.getElementById(price_ids[i]).value);
		if (isNaN(price)) {
			alert(`${price} is not number`);
			return false;
		}

		if (prod_id_checked) {
			document.getElementById(prod_ids[i]).value = parseFloat(price);
		}
	}

	return true;
}

function isFloat(n) {
	return Number(n) === n && n % 1 !== 0;
}
