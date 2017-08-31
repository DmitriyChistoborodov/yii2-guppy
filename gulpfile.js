let gulp = require("gulp"),
    sass = require("gulp-sass")
autoprefixer = require("gulp-autoprefixer");


/* CSS LIBRARIES  */

gulp.task("sass-compile", () =>
{
    return gulp.src("src/assets/src/sass/**/*.+(sass|scss)")
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest("src/assets/dist/css"));
});
