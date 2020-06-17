import gulp from 'gulp'

import * as fs from 'fs-extra'
import * as path from 'path'

import gulpLoadPlugins from 'gulp-load-plugins'
import browserSync from 'browser-sync'

const paths = {
  dev: './src',
  distCss: './css',
  vendorCss: './css/vendors',
  distJs: './js',
  vendorJs: './js/vendors',
}

const plugins = gulpLoadPlugins()
const toSyncronize = plugins.sync(gulp)

const sassOpts = { outputStyle: 'compressed', errLogToConsole: true }
const AUTOPREFIXER_BROWSERS = [
  'ie >= 10',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 7',
  'android >= 4.4',
  'bb >= 10'
]

gulp.task('stylesheets', () => {
  return gulp.src([
    `${paths.dev}/main.scss`
  ]).pipe(plugins.sourcemaps.init())
  .pipe(plugins.sass(sassOpts).on('error', plugins.sass.logError))
  .pipe(plugins.autoprefixer(AUTOPREFIXER_BROWSERS))
  .pipe(plugins.rename('styles.min.css'))
  .pipe(plugins.sourcemaps.write('.'))
  .pipe(gulp.dest(`${paths.distCss}/`))
  .pipe(plugins.size({title: 'generated styles.min.css'}))
})

gulp.task('scripts', () => {
  return gulp.src([
    `${paths.dev}/base/utils.js`,
    `${paths.dev}/atoms/**/*.js`,
    `${paths.dev}/organisms/**/*.js`,
    `${paths.dev}/pages/**/*.js`,
    `${paths.dev}/main.js`,
  ]).pipe(plugins.concat('bundle.js'))
  .pipe(plugins.rename('main.min.js'))
  .pipe(gulp.dest(`${paths.distJs}`));
})

gulp.task('createStylesVendors', () => {
  return gulp.src([
    `${paths.vendorCss}/*.css`,
    `${paths.vendorCss}/*.min.css`
  ]).pipe(plugins.concat('bundle_vendors.css'))
  .pipe(gulp.dest(paths.vendorCss))
  .pipe(plugins.rename('vendors.min.css'))
  .pipe(gulp.dest(paths.distCss))
})

gulp.task('isExistsStylesVendors', () => {
  fs.stat(`${paths.distCss}/vendors.css`, (err, stat) => {
    if (err == null) {
      let regexp = /\w*(\-\w{8}\.js){1}$|\w*(\-\w{8}\.css){1}$/
      return gulp.src([
        `${paths.vendorCss}/bundle_vendors.css`,
        `${paths.distCss}/vendors.min.css`,
        `${paths.distCss}/vendors.min.css.map`
      ]).pipe(plugins.deleteFile({ reg: regexp, deleteMatch: false }))
    } else {
      return false
    }
  })
})

gulp.task('createScriptsVendors', () => {
  return gulp.src([
    `${paths.vendorJs}/*.js`,
    `${paths.vendorJs}/*.min.js`
  ]).pipe(plugins.concat('bundle_vendors.js'))
  .pipe(gulp.dest(paths.vendorJs))
  .pipe(plugins.rename('vendors.min.js'))
  .pipe(gulp.dest(paths.distJs))
})

gulp.task('isExistsScriptsVendors', () => {
  fs.stat(`${paths.distJs}/vendors.min.js`, (err, stat) => {
    if (err == null) {
      let regexp = /\w*(\-\w{8}\.js){1}$|\w*(\-\w{8}\.css){1}$/

      return gulp.src([
        `${paths.vendorJs}/bundle_vendors.js`,
        `${paths.distJs}/vendors.min.js`,
        `${paths.distJs}/vendors.min.js.map`
      ]).pipe(plugins.deleteFile({ reg: regexp, deleteMatch: false }))
    } else {
      return false
    }
  })
})

gulp.task('default', ['stylesheets', 'scripts'])

gulp.task('generate-vendors',
  toSyncronize.sync([ 'isExistsStylesVendors', 'isExistsScriptsVendors', 'createStylesVendors', 'createScriptsVendors'])
)

gulp.task('watch', ['default'], () => {
  gulp.watch([`${paths.dev}/**/*.scss`, `!${paths.dev}/packages`], ['stylesheets'])
  gulp.watch([`${paths.dev}/**/*.js`, `!${paths.dev}/packages`], ['scripts'])

  // Live reload
  plugins.livereload.listen()

  browserSync({
    port: 8082
  })

  gulp.watch(
    [
      `${paths.dev}/**/*.scss`,
      `${paths.dev}/**/*.js`,
      `!${paths.dev}/packages/`,
    ], (files) => {
      plugins.livereload.changed(files)
    }
  )
})
