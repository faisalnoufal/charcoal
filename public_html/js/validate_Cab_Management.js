var FormsValidationsParsley = {

	default: function () {
		var parsleyOptionsDefault = {
			errorMessage: 'This field is required.',
			successClass: 'has-success',
			errorClass: 'has-error',
			errorsWrapper: '<span class="help-block"></span>',
			errorTemplate: '<span></span>',
			classHandler : function( _el ) {
				return _el.$element.closest('.form-group');
			},
			errorsContainer: function (_el) {
				return _el.$element.closest('.inputer');
			},
		};
		$('.parsley-validate').parsley( parsleyOptionsDefault );
	},

	

	init: function () {
		this.default();
		//this.onlyIcon();

		//$('.summernote-default').summernote(); // Summernote WYSIWYG Plugin
	}
}