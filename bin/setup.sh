set -e

# Cleanup, because not all commands play well with already existing directories
rm -rf $LANDO_WEBROOT
rm -rf $WP_TESTS_DIR
echo Y | mysqladmin -u$DB_USER -p$DB_PASS -h$DB_HOST drop $DB_NAME
mysqladmin -u$DB_USER -p$DB_PASS -h$DB_HOST create $DB_NAME

# Install and configure WordPress
# we can't use 'latest' here, because we need the explicit version
# later to fetch the tests for it
WP_VERSION=5.0.3
cd $LANDO_MOUNT
wp core download --path=$LANDO_WEBROOT --version=$WP_VERSION
wp config create \
	--path=$LANDO_WEBROOT \
	--dbname=$DB_NAME \
	--dbuser=$DB_USER \
	--dbpass=$DB_PASS \
	--dbhost=$DB_HOST
wp config set \
	--path=$LANDO_WEBROOT \
	--type=constant \
	--raw \
	WP_DEBUG true
wp core install \
	--path=$LANDO_WEBROOT \
	--url="http://wp-lando-plugin-scaffold.lndo.site" \
	'--title="Test Site"' \
	--admin_user="wordpress" \
	--admin_password="wordpress" \
	--admin_email="admin@site.com" \
	--skip-email

# Link our plugin
ln -sF $LANDO_MOUNT $LANDO_WEBROOT/wp-content/plugins/wp-lando-plugin-scaffold
wp plugin activate wp-lando-plugin-scaffold --path=$LANDO_WEBROOT

# Install tests infrastructure
# We could have installed the development version of WordPress, which includes the tests,
# but it would have required a build and a lot more mving around of directories
svn co --quiet https://develop.svn.wordpress.org/tags/$WP_VERSION/tests/phpunit/includes/ $WP_TESTS_DIR/includes
svn co --quiet https://develop.svn.wordpress.org/tags/$WP_VERSION/tests/phpunit/data/ $WP_TESTS_DIR/data
ln -sf $LANDO_MOUNT/.wp-tests-config.php $WP_TESTS_DIR/wp-tests-config.php
