"use strict";

{
	const initTabs = () => {
		$$('#tablist li.tab').on("click", function(elem) {
			tabClicked(elem.target);
		});
	}

	const tabClicked = (selectedTab) => {
		unsetActiveTab();

		selectTab(selectedTab);
	}

	const unsetActiveTab = () => {
		const currentSelectedTab = $('li.tab[aria-selected="true"]');
      	currentSelectedTab.setAttribute('aria-selected', false);

      	const currentShownTabContent = $('div.tab-content[aria-hidden="false"]');
		currentShownTabContent.setAttribute('aria-hidden', true);
	}

	const selectTab = (tabToSelect) => {
		tabToSelect.setAttribute('aria-selected', true);

		const targetTabContentID = tabToSelect.getAttribute('aria-controls');

		const targetTabContent = $('#'+ targetTabContentID);
		targetTabContent.setAttribute('aria-hidden', false);
	}

	initTabs();

}


