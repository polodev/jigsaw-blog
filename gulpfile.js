// var gulp = require('gulp');
const { src, dest, parallel } = require('gulp');

// function text () {
//   return gulp.src(["./src/**/*.txt"], {base: "."})
//         .pipe(gulp.dest("dist/"));
// };
// gulp.task(txt)
// gulp.task('start', gulp.series(txt));

// gulp.task('default', ['txt'])

function post_image() {
  return src(['source/_posts/**/*.md', 'source/_posts/**/*.png',  'source/_posts/**/*.gif', ], {base: 'source/_posts'})
    .pipe(dest("source/assets/generated-images/posts"))
}
function series_image() {
  return src(['source/_series/**/*.md', 'src/**/*.png',  'src/**/*.gif', ], {base: 'source/_series'})
    .pipe(dest("source/assets/generated-images/series"))
}
exports.post_image = post_image;
exports.series_image = series_image;
exports.default = parallel(post_image, series_image);