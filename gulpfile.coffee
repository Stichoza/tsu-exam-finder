autoprefixer = require 'gulp-autoprefixer'
coffee       = require 'gulp-coffee'
gulp         = require 'gulp'
gutil        = require 'gulp-util'
ignore       = require 'gulp-ignore'
minifycss    = require 'gulp-minify-css'
notify       = require 'gulp-notify'
plumber      = require 'gulp-plumber'
rename       = require 'gulp-rename'
sourcemaps   = require 'gulp-sourcemaps'
stylus       = require 'gulp-stylus'
uglify       = require 'gulp-uglify'

# Stylus
gulp.task 'stylus', ->
    gulp.src 'resources/stylus/**/*.styl'
        .pipe sourcemaps.init()
        .pipe plumber
            errorHandler: notify.onError 'Error: <%= error.message %>'
        .pipe ignore.exclude '**/_*.styl'
        .on 'error', gutil.log
        .pipe stylus()
        .pipe autoprefixer
            browsers: ['last 6 versions']
        .pipe rename
            suffix: '.min'
        .pipe minifycss
            processImport: yes
        .pipe sourcemaps.write()
        .pipe gulp.dest 'public/css/dist'

# Front-end scripts
gulp.task 'coffee', ->
    gulp.src 'resources/coffee/**/*.coffee'
        .pipe sourcemaps.init()
        .pipe plumber
            errorHandler: notify.onError 'Error: <%= error.message %>'
        .pipe coffee
            bare: no
        .on 'error', gutil.log
        .pipe uglify()
        .pipe rename
            suffix: '.min'
        .pipe sourcemaps.write()
        .pipe gulp.dest 'public/js/dist'

# Watch task
gulp.task 'watch', ->
    gulp.watch 'resources/stylus/**/*', ['stylus']
    gulp.watch 'resources/coffee/**/*', ['coffee']
    return

# Other tasks
gulp.task 'build', ['stylus', 'coffee'], ->
gulp.task 'default', ['watch', 'build'], ->