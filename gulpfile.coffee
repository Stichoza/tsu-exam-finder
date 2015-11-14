coffee       = require 'gulp-coffee'
gulp         = require 'gulp'
gutil        = require 'gulp-util'
ignore       = require 'gulp-ignore'
minifycss    = require 'gulp-minify-css'
notify       = require 'gulp-notify'
plumber      = require 'gulp-plumber'
rename       = require 'gulp-rename'
stylus       = require 'gulp-stylus'
uglify       = require 'gulp-uglify'

# Stylus
gulp.task 'stylus', ->
    gulp.src 'resources/assets/stylus/**/*.styl'
    .pipe plumber
        errorHandler: notify.onError 'Error: <%= error.message %>'
    .pipe ignore.exclude '**/_*.styl'
    .on 'error', gutil.log
    .pipe stylus()
    .pipe rename
        suffix: '.min'
    .pipe minifycss
        processImport: yes
    .pipe gulp.dest 'public/css/dist'

# Front-end scripts
gulp.task 'coffee', ->
    gulp.src 'resources/assets/coffee/**/*.coffee' # CoffeeScript Directory
    .pipe plumber
        errorHandler: notify.onError 'Error: <%= error.message %>'
    .pipe coffee
        bare: no
    .on 'error', gutil.log
    .pipe uglify()
    .pipe rename
        suffix: '.min'
    .pipe gulp.dest 'public/js/dist'

# Watch task
gulp.task 'watch', ->
    gulp.watch 'resources/assets/stylus/**/*', ['stylus']
    gulp.watch 'resources/assets/coffee/**/*', ['stylus']
    return

# Other tasks
gulp.task 'build', ['stylus', 'stylus'], ->
gulp.task 'default', ['watch', 'build'], ->