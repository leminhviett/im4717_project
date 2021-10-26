function clicked_test() {
	console.log("menu clicked");
}

function check_quantity(quant, name) {
	var temp = parseInt(quant);
	if (isNaN(temp)) {
		alert(`${name} quantity is not a number`);
		return false;
	} else if (temp < 0) {
		alert(`${name} quantity is not positive`);
		return false;
	}

	return true;
}

function calculate_price() {
	//grp1
	var grp1 = document.getElementsByName("price_1");
	var chosen_price_1;
	for (var i = 0; i < grp1.length; i++) {
		if (grp1[i].checked) {
			chosen_price_1 = grp1[i].value;
			break;
		}
	}

	var quant_1 = document.getElementById("quantity_1").value;
	quant_1 = parseInt(quant_1)
	var sub_1 = parseFloat(chosen_price_1) * parseInt(quant_1);
	//grp2

	var grp2 = document.getElementsByName("price_2");
	var chosen_price_2;
	for (var i = 0; i < grp2.length; i++) {
		if (grp2[i].checked) {
			chosen_price_2 = grp2[i].value;
			break;
		}
	}

	var quant_2 = document.getElementById("quantity_2").value;
	quant_2 = parseInt(quant_2)
	var sub_2 = parseFloat(chosen_price_2) * parseInt(quant_2);

	var grp3 = document.getElementsByName("price_3");
	var chosen_price_1;
	for (var i = 0; i < grp3.length; i++) {
		if (grp3[i].checked) {
			chosen_price_3 = grp3[i].value;
			break;
		}
	}

	var quant_3 = document.getElementById("quantity_3").value;
	quant_3 = parseInt(quant_3)
	var sub_3 = parseFloat(chosen_price_3) * parseInt(quant_3);

	// console.log(quant_1, chosen_price_1);
	// console.log(quant_2, chosen_price_2);
	// console.log(quant_3, chosen_price_3);

	// console.log(quant_1 < 0)
	if (!check_quantity(quant_1, "product 1")) return false;
	if (!check_quantity(quant_2, "product 2")) return false;
	if (!check_quantity(quant_3, "product 3")) return false;



	var total = sub_1 + sub_2 + sub_3;




	document.getElementById("total").textContent = total;
	document.getElementById("sub_tot_1").textContent = sub_1;
	document.getElementById("sub_tot_2").textContent = sub_2;
	document.getElementById("sub_tot_3").textContent = sub_3;
}
