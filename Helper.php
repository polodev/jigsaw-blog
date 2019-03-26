<?php 

class Helper {
  public static function lower($value)
  {
    return mb_strtolower($value, 'UTF-8');
  }
  public static function slug($title, $separator = '-')
  {
    $flip = $separator === '-' ? '_' : '-';

    $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

        // Replace @ with the word 'at'
    $title = str_replace('@', $separator.'at'.$separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
    $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', static::lower($title));

        // Replace all separator characters and whitespace by a single separator
    $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

    return trim($title, $separator);
  }
  public static function generate_file_maps () {
      $post_source_path = __dir__ . "/source/_posts/";
      $directory = new \RecursiveDirectoryIterator($post_source_path);
      $iterator = new \RecursiveIteratorIterator($directory);
      $path_array = [];
      foreach ($iterator as $name => $info) {
        if (preg_match('/(\.md)/i', $name)) {
          $filename = $info->getFilename();
          $filename = str_replace(".md","", $filename);
          $fullpath =  $name;
          $fullpath =  str_replace($post_source_path, '', $fullpath);
          $fullpath = str_replace(".md","", $fullpath);
          $fullpath = str_replace("/",".", $fullpath);
          $path_array[$filename] = $fullpath;
        }
      }
      return $path_array;
  }
}

