var gulp = require("gulp"),
  plumber = require("gulp-plumber"),
  rename = require("gulp-rename");
var autoprefixer = require("gulp-autoprefixer");
var minifycss = require("gulp-minify-css");
var less = require("gulp-less");
var sass = require("gulp-sass");
const sourcemaps = require("gulp-sourcemaps");

gulp.task("styles", function () {
  gulp
    .src(["./less/**/*.less"])
    .pipe(
      plumber({
        errorHandler: function (error) {
          console.log(error.message);
          this.emit("end");
        },
      })
    )
    .pipe(less())
    .pipe(autoprefixer())
    .pipe(gulp.dest("./"));
  /*.pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('dist/styles/'))*/
});

gulp.task("sass", function () {
  return (
    gulp
      .src("./sass/**/*.scss")
      // .pipe(sourcemaps.init())
      .pipe(
        sass({
          noLineComments: true,
          outputStyle: "compressed",
        }).on("error", sass.logError)
      )
      // .pipe(sourcemaps.write())
      .pipe(
        autoprefixer({
          cascade: false,
        })
      )
      .pipe(gulp.dest("./"))
  );
});

/**
 * watch
 * ---------------------------------------------
 * Watches all files for changes and performs
 * runs the necessary build tasks.
 */
gulp.task("watch", () => {
  gulp.watch("./sass/**/*.scss", gulp.series("sass"));
});

gulp.task("default", function () {
  gulp.watch("./less/**/*.less", ["styles"]);
});
