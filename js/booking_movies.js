var seatContainer = document.getElementById("rows_container");

seatContainer.onclick = (e) => {
	var className = e.target.className;

	if (className == "seat selected" || className == "seat") {
		var id = e.target.id;
		var seat = document.getElementById(id);

		if (className == "seat") {
			seat.className = "seat selected";
			seat.value = 1;
		} else {
			seat.className = "seat";
			seat.value = 0;
		}
	}
};
