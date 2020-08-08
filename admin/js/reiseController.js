"use strict";
{	

	const initQuillEditor = id => {

		let quill = new Quill('#'+id, {
	    	theme: 'snow'
	  	});

		//Formular abgeschickt => den Wert in das entsprechende hidden Field setzen
	  	$('#'+id).closest('form').on("submit", function() {
	  		$('input[name='+id+']').value = quill.root.innerHTML;
	  	});
	  	
	}

	initQuillEditor('beschreibung');


}