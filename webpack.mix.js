const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/sass/style.scss', 'public/css')
   .styles([
      'node_modules/bootstrap/dist/css/bootstrap.css',
      'resources/css/fonts.min.css',
      'node_modules/easy-autocomplete/dist/easy-autocomplete.css',
      'node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
      'node_modules/font-awesome/css/font-awesome.css',
      'node_modules/ionicons/dist/css/ionicons.css',
      'node_modules/select2/dist/css/select2.css',
      'node_modules/icheck/skins/square/blue.css',
      'resources/css/adminlte.css',
      'resources/css/skin-blue.css',
      'resources/css/animated.css',
      'node_modules/sweetalert2/dist/sweetalert2.min.css',
      'node_modules/slick-carousel/slick/slick.css',
      'public/css/style.css'
   ], 'public/css/app.css');

mix.copy('resources/fonts', 'public/fonts')
   .copy('node_modules/font-awesome/fonts', 'public/fonts')
   .copy('node_modules/ionicons/dist/fonts', 'public/fonts')
   .copy('node_modules/bootstrap/fonts', 'public/fonts')
   .copy('node_modules/icheck/skins/square/blue.png', 'public/css/')
   .copy('node_modules/icheck/skins/square/blue@2x.png', 'public/css/')
   .copyDirectory('node_modules/ckeditor', 'public/plugins/ckeditor');

mix.js('resources/js/stack.js', 'public/js')
   .scripts([
      'public/js/stack.js',
      'node_modules/moment/moment.js',
      'node_modules/bootstrap-filestyle/src/bootstrap-filestyle.js',
      'node_modules/chart.js/Chart.js',
      'node_modules/easy-autocomplete/dist/jquery.easy-autocomplete.js',
      'node_modules/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js',
      'node_modules/fastclick/lib/fastclick.js',
      'node_modules/jquery-slimscroll/jquery.slimscroll.js',
      'node_modules/icheck/icheck.js',
      'node_modules/sweetalert2/dist/sweetalert2.min.js',
      'node_modules/slick-carousel/slick/slick.min.js',
      'resources/js/adminlte.js',
   ], 'public/js/app.js');

// style untuk ujian online
mix.sass('resources/sass/ujian.scss', 'public/css')
   .styles([
      'node_modules/bootstrap/dist/css/bootstrap.css',
      'resources/css/fonts.min.css',
      'node_modules/ionicons/dist/css/ionicons.css',
      'node_modules/sweetalert2/dist/sweetalert2.min.css',
      'node_modules/slick-carousel/slick/slick.css',
      'public/css/ujian.css'
   ], 'public/css/ujian-online.css');

mix.scripts([
      'public/js/stack.js',
      'node_modules/sweetalert2/dist/sweetalert2.min.js',
      'node_modules/slick-carousel/slick/slick.min.js',
      'resources/js/ujian-online.js'
   ], 'public/js/ujian-online.js');