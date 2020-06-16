"use strict";


{

	const initAutocomplete = searchArray => {
		console.log(searchArray);

		$('#search input[type="search"]').on("keyup", function(element) {
			
			let searchResults = [];

			const inputVal = element.target.value; 
			let autocompleteResultContainer = $('#autocomplete');

			//erstmal alles leeren
			autocompleteResultContainer.innerHTML  = '';

			//Erst nach 2 Zeichen beginnen zu suchen
			if(inputVal.length > 2) {
				let searchSuggestions = generiereSearchResults(inputVal, searchArray);
				console.log(searchSuggestions);
				searchSuggestions.forEach(search => {
					
					//Für jeden Eintrag das Listenelement erstellen
					const searchLi = generiereLiAutocomplete(search);

					//Das Listenelement an den Container hängen
					autocompleteResultContainer.appendChild(searchLi);

					searchLi.on("click", (liClickedElem) => selectFromAutocomplete(liClickedElem.target.innerHTML));
					//autocompleteResultContainer.style.display = 'block';
				});
			} else {

				autocompleteResultContainer.innerHTML  = '';
			}
		});
	}

	const generiereLiAutocomplete = value => {
		const li = document.createElement("li");
		li.classList.add('autocomplete');
		li.textContent = value;

		return li;
	}

	const selectFromAutocomplete = (value) => {
		$('#search input[type="search"]').value = value;

		$('#autocomplete').innerHTML = '';

		submitSearchForm();

	}
	const generiereSearchResults = (searchValue, searchInArray) => searchInArray.filter(search => search.indexOf(searchValue) > -1);

	const submitSearchForm = () => $('#search').submit();

	initAutocomplete(searchSuggestions);

}