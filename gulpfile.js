var gulp = require('gulp'),
    svgSprite = require("gulp-svg-sprites");


gulp.task('sprites', function () {
    return gulp.src('lib/pic/icon/*.svg')
        .pipe(svgSprite({
            selector: "icon-%f",
            preview: {
                sprite: "index.html"
            }
        }))
        .pipe(gulp.dest("lib/pic/sprite"));
});


gulp.task('default', ['sprites']);