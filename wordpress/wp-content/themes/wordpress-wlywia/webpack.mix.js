const mix = require('laravel-mix');
require('@tinypixelco/laravel-mix-wp-blocks');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix
  .setPublicPath('./public')
  .browserSync({
    proxy: 'https://wordpress-wlywia.test/wordpress/',
    https: true
  });

mix
  .sass('resources/styles/fonts.scss', 'styles')
  .sass('resources/styles/main.scss', 'styles')
  .sass('resources/styles/editor.scss', 'styles')
  .options({
    processCssUrls: false,
  });

mix
  .js('resources/scripts/main.js', 'scripts')
  .js('resources/scripts/customizer.js', 'scripts')
  .blocks('resources/scripts/editor.js', 'scripts')
  .autoload({ jquery: ['$', 'window.jQuery'] })
  .extract();

mix
  .copyDirectory('resources/images', 'public/images')
  .copyDirectory('resources/fonts', 'public/fonts');

mix
  .webpackConfig(webpack => {
    return {
      module: {
        rules: [
          {
            enforce: 'pre',
            test: /\.js/,
            loader: 'import-glob'
          },
          {
            enforce: 'pre',
            test: /\.scss/,
            loader: 'import-glob'
          },
        ]
      }
    };
  });

mix
  .sourceMaps()
  .version();
