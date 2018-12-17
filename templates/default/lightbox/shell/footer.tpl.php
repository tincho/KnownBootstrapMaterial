<!-- new version of ekko-lightbox compatible with Bootstrap 4 -->
<script src="<?= \Idno\Core\site()->config()->url; ?>Themes/BootstrapMaterial/vendor/ekko-lightbox/ekko-lightbox.min.js"></script>
<script type="text/javascript">
$(document).on('click', '[data-toggle="lightbox"][data-remote]', function(event) {
	event.preventDefault();
	event.stopPropagation();
	var $extLink = $('<a target="blank" class="badge badge-light ml-2" href=""><i class="fa fa-external-link-alt"></i></a>');
	var _timeout;
	$(this).ekkoLightbox({
		onShown: function() {
			clearTimeout(_timeout);
			// clicking on video controls may trigger the navigation . 
			// _timeout = setTimeout(this._$modalArrows.show.bind(this._$modalArrows), 1000);
		},
		onContentLoaded: function() {
			var showLink = this._$element.attr('href') != this._$element.data('remote');
			if (showLink) {
				$extLink.attr('href', this._$element.attr('href'));
				this._$modalFooter.append($extLink.fadeIn());
			}
		}
	});
});
</script>
