function clearSearch() {
	queryBox = document.getElementById('s');
  
	if ( queryBox.value == 'Search ...' ) {
		queryBox.value = '';
	}
	queryBox.style.color = '#292929';
}

jQuery(function ($) {
	/* You can safely use $ in this code block to reference jQuery */
    $(".entry a img").parent("a[href*=openparenthesis]").addClass("thickbox");
    $(".entry a img").parent("a[href*=openparenthesis]").attr('rel','gallery');
});

