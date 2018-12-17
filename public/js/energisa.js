$(function () {
  $('[data-toggle="popover"]').popover()
})

$(function () {
  setNavigation();
})

function setNavigation() {
	var path = window.location.pathname;
	path = path.replace(/\/$/, "");
	path = decodeURIComponent(path);
	
	$('li a.nav-link')removeClass('active');
	$('.nav a').each(function () {
		var href = $(this).attr('href');
		if (path.replace('/', '') === href.replace('/', '')) {
			$(this).addClass('active');
		}
	});
}