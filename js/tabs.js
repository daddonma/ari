"use strict";

{
	const initTabs = () => {
		$$('#tablist li.tab').on("click", function(elem) {
			changeTab(elem.target);
		});

		$$('.tab-next').on("click", function(elem) {
			const nextID = elem.target.dataset.next;
			const nextTab = $('#'+nextID);
			changeTab(nextTab);
		});
	}

	const changeTab = (tabToShow) => {
		unsetActiveTab();

		selectTab(tabToShow);
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


