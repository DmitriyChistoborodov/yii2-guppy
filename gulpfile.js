let gulp = require("gulp"),
    sass = require("gulp-sass")
    autoprefixer = require("gulp-autoprefixer");

/* CSS LIBRARIES  */

gulp.task("sass-compile", () =>
{
    return gulp.src("src/assets/sass/**/*.+(sass|scss)")
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
        .pipe(gulp.dest("src/assets/css"));
});
