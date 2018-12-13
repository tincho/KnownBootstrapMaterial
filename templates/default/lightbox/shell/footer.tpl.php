<!-- new version of ekko-lightbox compatible with Bootstrap 4 -->
<script src="<?= \Idno\Core\site()->config()->url; ?>Themes/BootstrapMaterial/vendor/ekko-lightbox/ekko-lightbox.min.js"></script>
<script type="text/javascript">
$(document).on('click', '[data-toggle="lightbox"][data-remote]', function(event) {
	event.preventDefault();
	event.stopPropagation();
	var $link = $(this);
	$link.ekkoLightbox();
});
</script>
