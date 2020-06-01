"use strict";

{
	const initFilterForm = () => {
		$$('#filter select').on("change", submitFilterForm);
	};

	const submitFilterForm = () => {
		$('#filter').submit();
	};

	initFilterForm();
	$$('input[data-output-target]').on("change", e => $('#'+e.target.dataset.outputTarget).textContent = e.target.value);
	
	$('#personenanzahl').on("change", e => $('#abschlussGesamtkosten').textContent = berechneGesamtkosten($('#kosten').innerHTML, e.target.value))
	
	const berechneGesamtkosten = (reisePreis, personenanzahl) => parseFloat(reisePreis) * personenanzahl;
	
	//const setTextByInputField = (inputField) => $('#'+inputfield.dataset.target).textContent = inputField.value;

}
