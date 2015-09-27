'use strict';

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    prefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    rigger = require('gulp-rigger'),
    cssmin = require('gulp-minify-css'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    fileinclude = require('gulp-file-include'),
    browserSync = require("browser-sync"),
    spritesmith = require('gulp.spritesmith'),
    reload = browserSync.reload;

var path = {
    build: { //Тут мы укажем куда складывать готовые после сборки файлы
        html: 'build/',
        css: 'build/assets/stylesheets/',
        img: 'build/assets/images/',
        sprite: 'src/assets/images/',
        sprite2x: 'src/assets/images/'
    },
    src: { //Пути откуда брать исходники
        html: 'src/*.html', 
        style: 'src/assets/stylesheets/*.scss',
        img: 'src/assets/images/**/*.*',
        sprite: 'src/sprite/*.*',
        sprite2x: 'src/sprite/2x/*.*'
    },
    watch: { //Тут мы укажем, за изменением каких файлов мы хотим наблюдать
        html: 'src/**/*.html',
        style: 'src/assets/stylesheets/**/*.scss',
        img: 'src/assets/images/**/*.*',
        sprite: 'src/sprite/*.*',
        sprite2x: 'src/sprite/2x/*.*'
    },
    clean: './build'
};

var config = {
    server: {
        baseDir: "./build"
    },
    tunnel: false,
    host: 'localhost',
    port: 9000,
    logPrefix: "Frontend"
};

gulp.task('html:build', function () {
    gulp.src(path.src.html) //Выберем файлы по нужному пути
        .pipe(rigger())
        .pipe(fileinclude({
          prefix: '@@',
          basepath: '@file'
        }))
        .pipe(gulp.dest(path.build.html)) //И сохраним в папку build
        .pipe(reload({stream: true})); //И перезагрузим наш сервер для обновлений
});


gulp.task('style:build', function () {
    gulp.src(path.src.style)
        .pipe(sourcemaps.init())
        .pipe(sass({errLogToConsole: true}))
        // .pipe(cssmin({compatibility:'ie8'})) //Сожмем
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.css))
        .pipe(reload({stream: true}));
});

gulp.task('image:build', function () {
    gulp.src(path.src.img)
        .pipe(imagemin({
            optimizationLevel: 7,
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()],
            interlaced: true
        }))
        .pipe(gulp.dest(path.build.img))
        .pipe(reload({stream: true}));
});

gulp.task('sprite:build', function() {
    var spriteData = 
        gulp.src(path.src.sprite) // путь, откуда берем картинки для спрайта
            .pipe(spritesmith({
                imgName: 'sprite.png',
                imgPath: '../images/sprite.png',
                cssName: '_sprite.scss',
                cssFormat: 'scss',
                algorithm: 'binary-tree'
            }));

    spriteData.img.pipe(gulp.dest(path.build.sprite)); // путь, куда сохраняем картинку
    spriteData.css.pipe(gulp.dest('src/assets/stylesheets/config/')); // путь, куда сохраняем стили
});
gulp.task('sprite2x:build', function() {
    var spriteData = 
        gulp.src(path.src.sprite2x) // путь, откуда берем картинки для спрайта
            .pipe(spritesmith({
                imgName: 'sprite@2x.png',
                imgPath: '../images/sprite@2x.png',
                cssName: '_sprite2x.scss',
                cssFormat: 'scss',
                cssVarMap: function (sprite) {
                  sprite.name = 'sprite_' + sprite.name;
                },
                algorithm: 'binary-tree'
            }));

    spriteData.img.pipe(gulp.dest(path.build.sprite2x)); // путь, куда сохраняем картинку
    spriteData.css.pipe(gulp.dest('src/assets/stylesheets/config/')); // путь, куда сохраняем стили
});

gulp.task('build', [
    'html:build',
    'style:build',
    'image:build',
    'sprite:build',
    'sprite2x:build'
]);

gulp.task('watch', function(){
    watch([path.watch.html], function(event, cb) {
        gulp.start('html:build');
    });
    watch([path.watch.style], function(event, cb) {
        gulp.start('style:build');
    });
    watch([path.watch.img], function(event, cb) {
        gulp.start('image:build');
    });
    watch([path.watch.sprite], function(event, cb) {
        gulp.start('sprite:build');
    });
    watch([path.watch.sprite2x], function(event, cb) {
        gulp.start('sprite2x:build');
    });
});

gulp.task('webserver', function () {
    browserSync(config);
});

gulp.task('default', ['build', 'webserver', 'watch']);
