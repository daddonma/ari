"use strict";


{

	const initSearchForm = () => {
		$$('#search input').on("change", submitSearchForm);
	}

	const submitSearchForm = () => $('#search').submit();

	initSearchForm();
}