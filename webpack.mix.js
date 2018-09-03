let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
.sass('resources/assets/sass/app.scss', 'public/css')
.babel('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')
.copy('node_modules/materialize-css/dist/js/materialize.js', 'public/js/materialize.js')
.copy('node_modules/materialize-css/dist/css/materialize.css', 'public/css/materialize.css')
.copy('node_modules/material-design-icons/iconfont/material-icons.css', 'public/fonts/material-icons.css')
.copy('node_modules/material-design-icons/iconfont/MaterialIcons-Regular.woff2', 'public/fonts/MaterialIcons-Regular.woff2')
.copy('node_modules/material-design-icons/iconfont/MaterialIcons-Regular.woff', 'public/fonts/MaterialIcons-Regular.woff')
.copy('node_modules/material-design-icons/iconfont/MaterialIcons-Regular.ttf', 'public/fonts/MaterialIcons-Regular.ttf')
.copy('node_modules/sweetalert2/dist/sweetalert2.min.js', 'public/js/sweetalert.js')
.copy('node_modules/sweetalert2/dist/sweetalert2.css', 'public/css/sweetalert.css')
.babel(['resources/js/header.js','resources/js/sidenav.js'],'public/js/header.js')
.babel('resources/js/onlyone.js','public/js/onlyone.js')
.babel('resources/js/notificationsform.js','public/js/notificationsform.js')
.babel('resources/js/pre_register.js', 'public/js/pre_register.js')
.babel('resources/js/upfile_form.js', 'public/js/upfile_form.js')
.babel('resources/js/admon_users.js', 'public/js/admon_users.js');
