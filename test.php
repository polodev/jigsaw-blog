<?php
function generate_file_maps () {
    $post_source_path = __dir__ . "/source/_posts/";
    $directory = new \RecursiveDirectoryIterator($post_source_path);
    $iterator = new \RecursiveIteratorIterator($directory);
    $path_array = [];
    foreach ($iterator as $name => $info) {
      if (preg_match('/(\.md)/i', $name)) {
        $filename = $info->getFilename();
        $filename = str_replace(".md","", $filename);
        // $filename = rtrim( $filename, '.md');
        $fullpath =  $name;
        $fullpath =  str_replace($post_source_path, '', $fullpath);
        $fullpath = str_replace(".md","", $fullpath);
        $fullpath = str_replace("/",".", $fullpath);
        // $fullpath = ltrim( $name, $path );
        // $fullpath = rtrim( $fullpath, '.md' );
        $path_array[$filename] = $fullpath;
      }
    }
    return $path_array;
}


var_dump(
  generate_file_maps()
 );
