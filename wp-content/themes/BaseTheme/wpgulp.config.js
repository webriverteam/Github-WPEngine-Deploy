/**
 * BaseTheme 2021 Gulp Configuration File
 *
 * 1. Edit the variables as per your project requirements.
 * 2. In paths you can add <<glob or array of globs>>.
 *
 * @package BaseTheme 2021
 */
module.exports = {
	// Project options.
	projectName: "BaseTheme 2021",
	projectURL: "http://wp-theme.local/", // Local project URL of your already running WordPress site. Could be something like wpgulp.local or localhost:3000 depending upon your local WordPress setup.
	projectVersion: "1.0",
	productURL: "", // Theme/Plugin URL. Leave it like it is, since our gulpfile.js lives in the root folder.
	browserAutoOpen: true,
	injectChanges: true,

	// Style options.
	styleSRC: "assets/css/main.scss", // Path to main .scss file.
	styleDestination: "assets/css/", // Path to place the compiled CSS file. Default set to root folder.
	outputStyle: "compact", // Available options Ã¢â€ â€™ 'compact' or 'compressed' or 'nested' or 'expanded'
	errLogToConsole: true,
	precision: 10,
	cssBundleFilename: "bundle", // Compiled CSS Bundle file name.
	cssVendorPath: "assets/css/vendor/",
	cssPath: "assets/css/",

	// JS Vendor options.
	jsVendorSRC: "assets/js/vendor/**/*.js", // Path to JS vendor folder.
	jsVendorPath: "assets/js/vendor/",

	// JS Custom options.
	jsSRC: ["assets/js/vendor/**/*.js", "!assets/js/partials/", "assets/js/partials/site_scripts.js"], // Path to JS custom scripts folder.
	jsDestination: "assets/js/", // Path to place the compiled JS custom scripts file.
	jsFile: "bundle", // Compiled JS custom file name. Default set to custom i.e. custom.js.

	// Images options.
	imgSRC: "./assets/img/raw/**/*", // Source folder of images which should be optimized and watched. You can also specify types e.g. raw/**.{png,jpg,gif} in the glob.
	imgDST: "./assets/img/", // Destination folder of optimized images. Must be different from the imagesSRC folder.

	// Watch files paths.
	watchStyles: "assets/css/**/*", // Path to all *.scss and .css files inside css folder and inside them.
	watchJs: "assets/js/**/*", // Path to all custom JS files.
	watchPhp: "**/*.php", // Path to all PHP files.
	watchHtml: "**/*.html", // Path to all PHP files.

	// Browsers you care about for autoprefixing. Browserlist https://github.com/ai/browserslist
	// The following list is set as per WordPress requirements. Though, Feel free to change.
	BROWSERS_LIST: [
		"last 2 version",
		"> 1%",
		"ie >= 11",
		"last 1 Android versions",
		"last 1 ChromeAndroid versions",
		"last 2 Chrome versions",
		"last 2 Firefox versions",
		"last 2 Safari versions",
		"last 2 iOS versions",
		"last 2 Edge versions",
		"last 2 Opera versions",
	],

	build: "buildtheme/files", // Files that you want to package into a zip go here
	buildZip: "buildtheme/", // Files that you want to package into a zip go here

	buildInclude: [
		// include common file types
		// Coding Files types
		"**/*.php",
		"**/*.html",
		"**/*.css",
		"**/*.js",
		"**/*.scss",
		// Image file types
		"**/*.svg",
		"**/*.png",
		"**/*.jpg",
		"**/*.jpeg",
		"**/*.gif",
		"**/*.ico",
		//Font file types
		"**/*.ttf",
		"**/*.otf",
		"**/*.eot",
		"**/*.woff",
		"**/*.woff2",
		// include specific files and folders
		"screenshot.png",
		"package-lock.json",
		"package.json",
		"gulpfile.js",
		"wpgulp.config.js",
		"readme.txt",
		// exclude files and folders
		"!node_modules/**/*",
		"!ignore/bower_components/**/*",
		"!style.css.map",
		"!buildtheme/**/*",
		"!backup/**/*",
		"!assets/img/raw/**/*",
	],

	cleanFiles: [
		// include common file types
		"**/.DS_Store",
		"**/*_notes*",
		"**/.sass-cache",
		// include specific files and folders
		// exclude files and folders
	],
};
