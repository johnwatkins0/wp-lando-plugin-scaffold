/**
 * External dependencies
 */
const ExtractTextPlugin = require( 'extract-text-webpack-plugin' );
const path = require( 'path' );
const { BundleAnalyzerPlugin } = require( 'webpack-bundle-analyzer' );
const packageJson = require( './package.json' );

let name = packageJson.name;
name = name.substring( name.indexOf( '/' ) + 1 );

module.exports = ( env, argv ) => {
	const entry = {
		[name]: './assets/src/frontend',
		[`${name}-admin`]: './assets/src/admin/',
	};

	const plugins = [ new ExtractTextPlugin( '[name].css' ) ];

	if ( ! argv.watch ) {
		plugins.push( new BundleAnalyzerPlugin( { analyzerMode: 'static' } ) );
	}

	return {
		entry,
		output: {
			path: path.resolve( __dirname, 'assets/dist' ),
		},
		plugins,
		externals: {
			lodash: 'lodash	',
			react: 'React',
			'@wordpress/api-fetch': 'wp.apiFetch',
			'@wordpress/blocks': 'wp.blocks',
			'@wordpress/components': 'wp.components',
			'@wordpress/compose': 'wp.compose',
			'@wordpress/data': 'wp.data',
			'@wordpress/dom-ready': 'wp.domReady',
			'@wordpress/editor': 'wp.editor',
			'@wordpress/element': 'wp.element',
			'@wordpress/html-entities': 'wp.htmlEntities',
			'@wordpress/i18n': 'wp.i18n',
			'@wordpress/url': 'wp.url',
		},
		module: {
			rules: [
				{
					test: /\.js$/,
					exclude: /node_modules/,
					use: [
						{
							loader: 'babel-loader',
							options: { babelrc: true },
						},
					],
				},
				{
					test: /\.scss$/,
					use: ExtractTextPlugin.extract( {
						fallback: 'style-loader',
						use: [ 'css-loader', 'sass-loader' ]
					} ),
				},
			],
		},
	};
};
