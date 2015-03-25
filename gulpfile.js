var gulp = require('gulp'),
    svgSprite = require("gulp-svg-sprites");


gulp.task('sprites', function () {
    return gulp.src('assets/svg/*.svg')
        .pipe(svgSprite({
            selector: "icon-%f"
        }))
        .pipe(gulp.dest("assets"));
});