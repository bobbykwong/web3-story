wp.hooks.addFilter(
	'blocks.registerBlockType',
	'mauer-essentialist/gallery',
	function( settings, name ) {
		if (name === 'mauer-essentialist/gallery') {
			return lodash.assign({}, settings, {
				supports: lodash.assign({}, settings.supports, {
					align: false,
				}),
			});
		}
		return settings;
	}
);