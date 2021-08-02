/**
 * Gulpfile.
 *
 * Gulp with WordPress.
 *
 * Implements:
 *      1. CSS: SASS to CSS conversion, Autoprefixing, CSS minification.
 *      2. JS: Concatenation & minification of Vendor and Custom JS files.
 *      3. Images: Minifies PNG, JPEG, GIF and SVG images.
 *      4. Watches files for changes in HTML, CSS, JS and PHP and raw images folder.
 *      5. Live reloads browser with BrowserSync.
 */

/**
 * Load WPGulp Configuration.
 *
 * TO DO: Customize your project in the wpgulp.js file.
 */
const config = require("./wpgulp.config.js"); //Changed for OurWpGulp

/**
 * Load Plugins.
 *
 * Load gulp plugins and passing them semantic names.
 */
const gulp = require("gulp"); // Gulp of-course.

// CSS related plugins.
const sass = require("gulp-sass"); // Gulp plugin for Sass compilation.
const cleancss = require("gulp-clean-css"); // Minifies CSS files.
const autoprefixer = require("gulp-autoprefixer"); // Autoprefixing magic.

// JS related plugins.
const concat = require("gulp-concat"); // Concatenates JS files.
const minify = require("gulp-minify");
const uglify = require("gulp-uglify"); // Minifies JS files.

// Image related plugins.
const imagemin = require("gulp-imagemin"); // Minify PNG, JPEG, GIF and SVG images with imagemin.

// Utility related plugins.
const rename = require("gulp-rename"); // Renames files
const lineec = require("gulp-line-ending-corrector"); // Consistent Line Endings for non UNIX systems.
const filter = require("gulp-filter"); // Enables you to work on a subset of the original files by filtering them using a glob.
const notify = require("gulp-notify"); // Sends message notification to you.
const browserSync = require("browser-sync").create(); // Reloads browser and injects CSS. Time-saving synchronized browser testing.
const cache = require("gulp-cache"); // Cache files in stream for later use.
const remember = require("gulp-remember"); // Adds all the files it has ever seen back into the stream.
const plumber = require("gulp-plumber"); // Prevent pipe breaking caused by errors from gulp plugins.
const beep = require("beepbeep");
const count = require("gulp-count");
const zip = require("gulp-zip");
const rimraf = require("gulp-rimraf");

/**
 * Custom Error Handler.
 *
 * @param r
 * @param Mixed err
 */
const errorHandler = (r) => {
	notify.onError("\n\n❌  ===> ERROR: <%= error.message %>\n")(r); // Message to be displayed when error function is called
	beep(2); // Beep two times on error
	// this.emit('end');
};

/**
 * Task: `browser-sync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 *
 * @link http://www.browsersync.io/docs/options/
 *
 * @param {Mixed} done Done.
 */
const browsersync = (done) => {
	browserSync.init({
		proxy: config.projectURL,
		open: config.browserAutoOpen,
		injectChanges: config.injectChanges,
		watchEvents: ["change", "add", "unlink", "addDir", "unlinkDir"],
	});
	done();
};

// Helper function to allow browser reload with Gulp 4.
const reload = (done) => {
	browserSync.reload(); // Reload browser
	done();
};

/**
 * Task: `styles`.
 *
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 *    3. Writes Sourcemaps for it
 *    4. Autoprefixes it and generates style.css
 *    5. Renames the CSS file with suffix .min.css
 *    6. Minifies the CSS file and generates style.min.css
 *    7. Injects CSS or reloads the browser via browserSync
 */
gulp.task("styles", () => {
	return gulp
		.src(config.styleSRC, {
			allowEmpty: false, // If main.scss not found - then it gives error because empty file is not permitted
		})
		.pipe(plumber(errorHandler)) // to explain error with better comment
		.pipe(
			sass({
				errLogToConsole: config.errLogToConsole,
				outputStyle: config.outputStyle,
				precision: config.precision,
				includePaths: config.includePathVar,
			}),
		)
		.on("error", sass.logError)
		.pipe(autoprefixer(config.BROWSERS_LIST))
		.pipe(lineec()) // Consistent Line Endings for non UNIX systems.
		.pipe(rename(config.cssBundleFilename + ".css"))
		.pipe(gulp.dest(config.styleDestination))
		.pipe(filter("**/*.css")) // Filtering stream to only css files.
		.pipe(
			rename({
				suffix: ".min",
			}),
		)
		.pipe(cleancss())
		.pipe(lineec()) // Consistent Line Endings for non UNIX systems.
		.pipe(gulp.dest(config.styleDestination))
		.pipe(filter("**/*.css")) // Filtering stream to only css files.
		.pipe(browserSync.stream()) // Reloads style.min.css if that is enqueued.
		.pipe(
			notify({
				message: "\n\n✅ ===> STYLES ✅ completed!\n",
				onLast: true,
			}),
		);
});

/**
 * Task: `Combine JS Files`.
 *
 * Concatenate and uglify all JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for JS all files
 *     2. Concatenates all the files and generates bundle.js
 *     3. Renames the JS file with suffix .min.js
 *     4. Uglifes/Minifies the JS file and generates bundle.min.js
 */
gulp.task("scripts", () => {
	return (
		gulp
			.src(config.jsSRC, {
				// since: gulp.lastRun('scripts')  // run task only on changed files
			}) // Only run on changed files.
			.pipe(count("## number of JS files selected")) // Count number of files to work with
			.pipe(plumber(errorHandler))
			.pipe(remember(config.jsVendorSRC)) // Bring all files back to stream.
			.pipe(
				concat(config.jsFile + ".js", {
					newLine: ";",
				}),
			)
			.pipe(lineec()) // Consistent Line Endings for non UNIX systems.
			.pipe(gulp.dest(config.jsDestination))
			.pipe(
				rename({
					basename: config.jsFile,
					suffix: ".min",
				}),
			)
			// .pipe(uglify())
			// .pipe(minify())
			.pipe(lineec()) // Consistent Line Endings for non UNIX systems.
			.pipe(gulp.dest(config.jsDestination))
			.pipe(
				notify({
					message: "\n\n✅ ===> JS Processes ✅ completed!\n",
					onLast: true,
				}),
			)
	);
});

/**
 * Task: `images`.
 *
 * Minifies PNG, JPEG, GIF and SVG images.
 *
 * This task does the following:
 *     1. Gets the source of images raw folder
 *     2. Minifies PNG, JPEG, GIF and SVG images
 *     3. Generates and saves the optimized images
 *
 * This task will run only once, if you want to run it
 * again, do it with the command `gulp images`.
 *
 * Read the following to change these options.
 *
 * @link https://github.com/sindresorhus/gulp-imagemin
 */
gulp.task("images", () => {
	return gulp
		.src(config.imgSRC)
		.pipe(
			cache(
				imagemin([
					imagemin.gifsicle({
						interlaced: true,
					}),
					imagemin.jpegtran({
						progressive: true,
					}),
					imagemin.optipng({
						optimizationLevel: 3,
					}), // 0-7 low-high.
					imagemin.svgo({
						plugins: [
							{
								removeViewBox: true,
							},
							{
								cleanupIDs: false,
							},
						],
					}),
				]),
			),
		)
		.pipe(gulp.dest(config.imgDST))
		.pipe(
			notify({
				message: "\n\n✅ ===> IMAGES ✅ completed!\n",
				onLast: true,
			}),
		);
});

/**
 * Task: `clear-images-cache`.
 *
 * Deletes the images cache. By running the next "images" task,
 * each image will be regenerated.
 */
gulp.task("clearCache", function (done) {
	return cache.clearAll(done);
});

/**
 * Build task that moves essential theme files for production-ready sites
 *
 * buildFiles copies all the files in buildInclude to build folder - check variable values at the top
 * buildImages copies all the images from img folder in assets while ignoring images inside raw folder if any
 */
gulp.task("zip", function () {
	return gulp
		.src(config.build + "/**/*")
		.pipe(zip(config.projectName + "-" + config.projectVersion + ".zip"))
		.pipe(gulp.dest(config.buildZip))
		.pipe(
			notify({
				message: "Zip fie completion complete",
				onLast: true,
			}),
		);
});

// Backup all theme related files only in build folder
gulp.task("build", function () {
	return gulp
		.src(config.buildInclude)
		.pipe(gulp.dest(config.build))
		.pipe(
			notify({
				message: "Copy from buildFiles complete",
				onLast: true,
			}),
		);
});

// Remove unnecassary files in theme folders e.g. _notes folder
gulp.task("clean", gulp.series("clearCache"), function () {
	return gulp
		.src(config.cleanFiles, {
			read: false,
			allowEmpty: true,
		})
		.pipe(
			rimraf({
				force: true,
			}),
		)
		.pipe(
			notify({
				message: "\n\n✅ ===> Clean Function ✅ completed!\n",
				onLast: true,
			}),
		);
});

// Task to be run as final to build zip file of theme assets and files
gulp.task("final", gulp.series("clean", "build", "zip", function () { }));

/**
 * Watch Tasks.
 *
 * Watches for file changes and runs specific tasks.
 */
gulp.task(
	"default",
	gulp.series("styles", "scripts", "images", browsersync, () => {
		gulp.watch(config.watchPhp, reload); // Reload on PHP file changes.
		gulp.watch(
			[config.watchStyles, "!assets/css/bundle.css", "!assets/css/bundle.min.css"],
			gulp.parallel("styles"),
		); // Reload on SCSS file changes.
		gulp.watch(
			[config.watchJs, "!assets/js/bundle.js", "!assets/js/bundle.min.js"],
			gulp.series("scripts", reload),
		); // Reload on customJS file changes.
		gulp.watch(config.imgSRC, gulp.series("images", reload)); // Reload on customJS file changes.
		gulp.watch(config.watchHtml, reload); // Reload on customJS file changes.
	}),
);
