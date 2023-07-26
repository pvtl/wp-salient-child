const mix = require('laravel-mix');
const webpack = require('webpack');

mix
  .webpackConfig({
    externals: { jquery: 'jQuery' },
    plugins: [
      new webpack.IgnorePlugin({
        resourceRegExp: /^\.\/locale$/,
        contextRegExp: /moment$/,
      })
    ],
  })
  .js('assets/js/app.js', 'dist/js')
  .sass('assets/scss/app.scss', 'dist/css')
  .copy('assets/fonts', 'dist/fonts')
  .copy('assets/images', 'dist/images')
  .options({ processCssUrls: false })
  .browserSync({
    proxy: {
      target: 'pvtl20.pub.localhost',
      // proxyReq: [function(proxyReq) { proxyReq.setHeader('Host', 'pvtl20.pub.localhost'); }],
    },
    open: false,
    files: [
      'dist/css/{*,**/*}.css',
      'dist/js/{*,**/*}.js',
      '{*,**/*}.php',
    ],
  });
