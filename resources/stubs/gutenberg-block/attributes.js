const { __ } = wp.i18n;

const attributes = {
	content: {
		default: __('Hello World', 'custom-blocks'),
		type: 'string'
	},
};

export default attributes;
