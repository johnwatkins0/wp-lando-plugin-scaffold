module.exports = function( api ) {
	if ( api.env( 'test' ) ) {
		return {
			presets: [ '@babel/preset-env', '@babel/preset-react' ],
		};
	}

	api.cache( true );
	return {
		presets: [ '@wordpress/babel-preset-default' ],
	};
};
