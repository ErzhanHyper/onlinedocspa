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
 //


 mix.webpackConfig({



     // module: {
    //     rules: [
    //   {
    //     test: /\.jsx?$/,
    //     loader: 'babel-loader',
    //     exclude: /node_modules/,
    //   },
    // ],
     //      rules: [
    	// {
    	//   test: /\.s(c|a)ss$/,
    	//   use: [
    	// 	'vue-style-loader',
    	// 	'css-loader',
    	// 	{
    	// 	  loader: 'sass-loader',
    	// 	  options: {
    	// 		implementation: require('sass'),
    	// 		fiber: require('fibers'),
    	// 	  }
    	// 	}
    	//   ]
    	// }
     //  ]
     // },
 	// plugins: [
 	// 	new VuetifyLoaderPlugin()
 	// ],
 });
 //
 // Mix.listen('configReady', webpackConfig => {
 //   // Exclude vuetify folder from default sass/scss rules
 //   const sassConfig = webpackConfig.module.rules.find(
 //     rule =>
 //       String(rule.test) ===
 //       String(/\.sass$/)
 //   );
 //
 //   const scssConfig = webpackConfig.module.rules.find(
 //     rule =>
 //       String(rule.test) ===
 //       String(/\.scss$/)
 //   );
 //
 //   sassConfig.exclude.push(path.resolve(__dirname, 'node_modules/vuetify'))
 //   scssConfig.exclude.push(path.resolve(__dirname, 'node_modules/vuetify'))
 // });


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
