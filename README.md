## Installation

1. [Install Lando](https://docs.devwithlando.io/)
2. Clone this repository into a directory representing the name of your plugin, lowercased and with hyphens for spaces (this slug is important as it is reused below).
3. Run the following case-sensitive project-wide search and replaces inside the repository:
    - WP Lando Plugin Scaffold > [Name of your plugin]
    - wp-lando-plugin-scaffold > [Your plugin slug from step 2]
    - JohnWatkins0 > [Your top-level PHP namespace]
    - Lando_Plugin_Scaffold > [PHP namespace for your project]
    - johnwatkins0 > [namespace for use in package names]
4. Run `composer install && npm install && npm run build`
5. Run `lando start`
6. When the Lando boot script is finished running, it will show you the URLs you can use to load the site.

## Development

Run `npm start` to run a Webpack watch task. See `composer.json` and `package.json` for other scripts.
