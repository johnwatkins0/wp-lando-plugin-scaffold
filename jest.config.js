module.exports = {
	testMatch: [ '<rootDir>/assets/src/**/test/(*.)test.js?(x)' ],
	collectCoverage: true,
	coverageDirectory: '<rootDir>/assets/coverage',
	collectCoverageFrom: [ '<rootDir>/assets/src/**/*.js' ],
	coveragePathIgnorePatterns: [ '/node_modules/', 'index.js', 'dist' ],
	moduleNameMapper: {
		'\\.scss$': '<rootDir>/assets/src/__mocks__/style-mock.js',
	},
};
