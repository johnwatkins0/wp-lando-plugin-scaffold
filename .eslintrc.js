module.exports = {
	extends: ['plugin:@wordpress/eslint-plugin/recommended'],
	plugins: ['jest'],
	rules: {
		'lines-around-comment': ['error', { beforeLineComment: true, allowBlockStart: true }],
	},
	env: {
		'jest/globals': true,
	},
};
