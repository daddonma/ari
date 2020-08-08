"use strict";

{

	const handleRequiredCheckboxes = () => {

		$$('input.required[type="checkbox"]').on("click", function() {
			if(checkIfAllRequiredAccepted()) {

				$$('li.tab').forEach(tab => tab.classList.remove('disabled'));
				$$('button.tab-next').forEach(button => button.classList.remove('disabled'));
		
			} else {
				$$('li.tab').forEach(tab => tab.classList.add('disabled'));
				$$('button.tab-next').forEach(button => button.classList.add('disabled'));
			}

		});
	};

	const checkIfAllRequiredAccepted = () => $$('input.required[type="checkbox"]').filter( checkbox => checkbox.checked != true).length === 0

	if(action === "uebersicht") {
		$('#formFilterKategorie select').on("change", function(element) {
			element.target.closest('form').submit();
		});
	}
	

	if(action == "buchen") {
		handleRequiredCheckboxes();
	}
	
}
