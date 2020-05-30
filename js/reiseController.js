"use strict";

{
	const initFilterForm = () => {
		$$('#filter select').on("change", submitFilterForm);
	};

	const submitFilterForm = () => {
		$('#filter').submit();
	};
}
