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
  public static function rrmdir($src) {
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            $full = $src . '/' . $file;
            if ( is_dir($full) ) {
                self::rrmdir($full);
            }
            else {
                unlink($full);
            }
        }
    }
    closedir($dir);
    rmdir($src);
  }
}


class MyGen {
  public function generatTitle()
  {
    $text = "Lorem ipsum shiznit sizzle amizzle, consectetuer adipiscing boofron. Nullam crackalackin velit, shiznit volutpizzle, suscipizzle its fo rizzle, gravida vizzle, fizzle. Pellentesque owned boom shackalack. Sed erizzle. Daahng dawg dang dolor dapibus turpis daahng dawg pot. Maurizzle shizznit izzle gangster. We gonna chung izzle tortizzle. Pellentesque eleifend rhoncizzle fo shizzle. In shizzle my nizzle crocodizzle phat platea own yo'. Donec dapibizzle. Curabitur tellus urna, pretizzle ghetto, shut the shizzle up , eleifend vitae, nunc. Stuff suscipit. Integizzle sempizzle dawg ma nizzle purizzle. Maecenizzle shizznit mi. Dang erizzle. Proin condimentizzle, things shit yo mamma consectetizzle, metus libero consequat purizzle, egizzle ullamcorpizzle gangsta mammasay mammasa mamma oo sa non quizzle. Fizzle yippiyo yo mamma. Dizzle nibh lectizzle, consequat sizzle, break yo neck, yall sure, crazy ac, funky fresh. Prizzle sizzle urna. Shiz condimentum sheezy uhuh ... yih! go to hizzle. Pellentesque hendrerit euismizzle felis. Donizzle ultrices nisl mofo erat. Etiam mammasay mammasa mamma oo sa boom shackalack mi. Ut you son of a bizzle. Sed nisl metus, euismizzle izzle, eleifend ass, malesuada vel, yippiyo. Vivamizzle crunk consectetuer nisl. Sed vitae owned that's the shizzle break it down ultricies shiznit. In convallis, arcu ac dignissizzle crackalackin, shit lorem luctus pede, a ma nizzle augue dolizzle sizzle brizzle. Pellentesque away diam nec rizzle varius fo shizzle. Stuff turpizzle for sure, pulvinar at, porta fizzle, tincidunt sure, ass. Nunc sizzle you son of a bizzle. Lorizzle ipsum dolor sit doggy, you son of a bizzle adipiscing yo. Maecenas izzle elizzle. Nizzle congue. Gangster boom shackalack erat vitae fo shizzle aliquizzle rizzle. In break yo neck, yall my shizz yo mamma pot nibh. Cras break it down. Nunc my shizz ante et neque lacinia sagittizzle. Bling bling nizzle massa izzle shiz pharetra lobortizzle. Suspendisse break it down est, bibendum pulvinar, dizzle vizzle, imperdiet doggy, fo shizzle. Vivamizzle egizzle that's the shizzle fizzle massa adipiscing fo shizzle. Sure izzle nisl quizzle crackalackin ornare nonummy. Nulla own yo'. Etiam faucibizzle pharetra pot. Rizzle gangsta arcu fo maurizzle. Cras accumsizzle odio izzle ipsizzle. Yippiyo adipiscing nibh vel lectizzle. Fo shizzle laorizzle, dope egizzle eleifend tincidunt, dolor sem its fo rizzle orci, eu doggy fo shizzle maurizzle eget gizzle. Etiam adipiscing, dizzle izzle aliquet aliquizzle, shizznit orci, fizzle sagittizzle nulla mi check it out purizzle. Nizzle aliquizzle you son of a bizzle pede. In pulvinizzle aliquet for sure. Break it down leo enim, tempor shit, facilisizzle fizzle, laorizzle in, sizzle. Crunk eget gangster quis risus blandizzle da bomb. Vestibulizzle ullamcorper turpis boom shackalack sem tincidunt lobortizzle. Crackalackin quis own yo'. Maecenizzle that's the shizzle. Vivamizzle fermentizzle consequizzle rizzle. Pellentesque gangster. Lorizzle check it out dolor black amizzle, gizzle adipiscing elizzle. urna arcu, black egizzle, sagittis a, pharetra eu, shiz. Lorizzle check out this dolizzle sit amizzle, i'm in the shizzle adipiscing elit. Crizzle aliquam pede et mi. Sheezy shizzlin dizzle owned go to hizzle away magnizzle cool my shizz montes, nascetizzle mofo shizzlin dizzle. Ut purizzle diam, molestie sheezy, convallizzle izzle, sollicitudin izzle, check out this. Mah nizzle viverra urna commodo libero. Donizzle sagittizzle. Nullizzle augue fo shizzle, boofron away, bizzle fo, hizzle izzle, away. My shizz gangsta, cool its fo rizzle fo shizzle my nizzle commodo we gonna chung, crazy lectizzle ornare enizzle, a hendrerizzle nunc est scelerisque yo mamma. Fo shizzle quizzle dawg. Nizzle nonummy fo shizzle my nizzle yo metizzle. For sure facilisi. Nulla for sure shiz. Aliquam fo shizzle commodo tellizzle. Aenean viverra, sapizzle shizzlin dizzle vulputate hendrerit, sheezy urna hendrerit mah nizzle, non tellivizzle nunc fo izzle crazy. Donizzle eu mah nizzle. Vestibulizzle quis gizzle. Check it out elementum da bomb izzle. Integizzle nulla sizzle, volutpizzle own yo', shiznit egizzle, ghetto egizzle, nunc. Sed pharetra. You son of a bizzle owned. Curabitizzle sit amet i'm in the shizzle nizzle yippiyo blandizzle dignissizzle. Quisque dope tellizzle go to hizzle amizzle hizzle. Aenizzle tempizzle dignissizzle the bizzle. ";
    $length = strlen($text);
    $start = rand(0, $length - 10);
    $end   = rand($start, $length);
    $random_string = substr($text, $start, $end);
    $random_string = substr($random_string, 0, rand(30, 60));
    $random_string = str_replace('.', ' ', $random_string);
    $random_string = str_replace(',', ' ', $random_string);
    $random_string = str_replace('\'', ' ', $random_string);
    $random_string = ucfirst($random_string);
    return $random_string;
  }
  public function generateText()
  {
    $text = "Lorem ipsum shiznit sizzle amizzle, consectetuer adipiscing boofron. Nullam crackalackin velit, shiznit volutpizzle, suscipizzle its fo rizzle, gravida vizzle, fizzle. Pellentesque owned boom shackalack. Sed erizzle. Daahng dawg dang dolor dapibus turpis daahng dawg pot. Maurizzle shizznit izzle gangster. We gonna chung izzle tortizzle. Pellentesque eleifend rhoncizzle fo shizzle. In shizzle my nizzle crocodizzle phat platea own yo'. Donec dapibizzle. Curabitur tellus urna, pretizzle ghetto, shut the shizzle up , eleifend vitae, nunc. Stuff suscipit. Integizzle sempizzle dawg ma nizzle purizzle. Maecenizzle shizznit mi. Dang erizzle. Proin condimentizzle, things shit yo mamma consectetizzle, metus libero consequat purizzle, egizzle ullamcorpizzle gangsta mammasay mammasa mamma oo sa non quizzle. Fizzle yippiyo yo mamma. Dizzle nibh lectizzle, consequat sizzle, break yo neck, yall sure, crazy ac, funky fresh. Prizzle sizzle urna. Shiz condimentum sheezy uhuh ... yih! go to hizzle. Pellentesque hendrerit euismizzle felis. Donizzle ultrices nisl mofo erat. Etiam mammasay mammasa mamma oo sa boom shackalack mi. Ut you son of a bizzle. Sed nisl metus, euismizzle izzle, eleifend ass, malesuada vel, yippiyo. Vivamizzle crunk consectetuer nisl. Sed vitae owned that's the shizzle break it down ultricies shiznit. In convallis, arcu ac dignissizzle crackalackin, shit lorem luctus pede, a ma nizzle augue dolizzle sizzle brizzle. Pellentesque away diam nec rizzle varius fo shizzle. Stuff turpizzle for sure, pulvinar at, porta fizzle, tincidunt sure, ass. Nunc sizzle you son of a bizzle. Lorizzle ipsum dolor sit doggy, you son of a bizzle adipiscing yo. Maecenas izzle elizzle. Nizzle congue. Gangster boom shackalack erat vitae fo shizzle aliquizzle rizzle. In break yo neck, yall my shizz yo mamma pot nibh. Cras break it down. Nunc my shizz ante et neque lacinia sagittizzle. Bling bling nizzle massa izzle shiz pharetra lobortizzle. Suspendisse break it down est, bibendum pulvinar, dizzle vizzle, imperdiet doggy, fo shizzle. Vivamizzle egizzle that's the shizzle fizzle massa adipiscing fo shizzle. Sure izzle nisl quizzle crackalackin ornare nonummy. Nulla own yo'. Etiam faucibizzle pharetra pot. Rizzle gangsta arcu fo maurizzle. Cras accumsizzle odio izzle ipsizzle. Yippiyo adipiscing nibh vel lectizzle. Fo shizzle laorizzle, dope egizzle eleifend tincidunt, dolor sem its fo rizzle orci, eu doggy fo shizzle maurizzle eget gizzle. Etiam adipiscing, dizzle izzle aliquet aliquizzle, shizznit orci, fizzle sagittizzle nulla mi check it out purizzle. Nizzle aliquizzle you son of a bizzle pede. In pulvinizzle aliquet for sure. Break it down leo enim, tempor shit, facilisizzle fizzle, laorizzle in, sizzle. Crunk eget gangster quis risus blandizzle da bomb. Vestibulizzle ullamcorper turpis boom shackalack sem tincidunt lobortizzle. Crackalackin quis own yo'. Maecenizzle that's the shizzle. Vivamizzle fermentizzle consequizzle rizzle. Pellentesque gangster. Lorizzle check it out dolor black amizzle, gizzle adipiscing elizzle. urna arcu, black egizzle, sagittis a, pharetra eu, shiz. Lorizzle check out this dolizzle sit amizzle, i'm in the shizzle adipiscing elit. Crizzle aliquam pede et mi. Sheezy shizzlin dizzle owned go to hizzle away magnizzle cool my shizz montes, nascetizzle mofo shizzlin dizzle. Ut purizzle diam, molestie sheezy, convallizzle izzle, sollicitudin izzle, check out this. Mah nizzle viverra urna commodo libero. Donizzle sagittizzle. Nullizzle augue fo shizzle, boofron away, bizzle fo, hizzle izzle, away. My shizz gangsta, cool its fo rizzle fo shizzle my nizzle commodo we gonna chung, crazy lectizzle ornare enizzle, a hendrerizzle nunc est scelerisque yo mamma. Fo shizzle quizzle dawg. Nizzle nonummy fo shizzle my nizzle yo metizzle. For sure facilisi. Nulla for sure shiz. Aliquam fo shizzle commodo tellizzle. Aenean viverra, sapizzle shizzlin dizzle vulputate hendrerit, sheezy urna hendrerit mah nizzle, non tellivizzle nunc fo izzle crazy. Donizzle eu mah nizzle. Vestibulizzle quis gizzle. Check it out elementum da bomb izzle. Integizzle nulla sizzle, volutpizzle own yo', shiznit egizzle, ghetto egizzle, nunc. Sed pharetra. You son of a bizzle owned. Curabitizzle sit amet i'm in the shizzle nizzle yippiyo blandizzle dignissizzle. Quisque dope tellizzle go to hizzle amizzle hizzle. Aenizzle tempizzle dignissizzle the bizzle. ";
    $length = strlen($text);
    $start = rand(0, $length - 10);
    $end   = rand($start, $length);
    $random_string = substr($text, $start, $end);
    $random_string = substr($random_string, 0, rand(300, 800));
    $random_string = str_replace('.', ' ', $random_string);
    $random_string = ucfirst($random_string);
    return  $random_string ;
  }
  public function generateContent($value='')
  {
    $string = "";
    foreach (range(2, 8) as $value) {
      $title = $this->generatTitle();
      $text  = $this->generateText();
      $string .= " ### $title      \n\n$text       \n\n";
    }
    return $string;
  }
  public function generateFileContent($title, $description)
  {
    $content = $this->generateContent();
    $file_content =  <<<"TEXT"
---
extends: _layouts.post
section: content
title: $title
date: 2018-12-25
description: $description
cover_image: /assets/img/post-cover-image-2.png
featured: true
categories: [Configuration, Industrial Work]
---

$content

TEXT;
    return $file_content;

  }
  public function make_file()
  {
    $description = substr($this->generatTitle(), 0, rand(300, 450));
    $title = substr($description, 0, rand(35, 95));
    $file_content = $this->generateFileContent($title, $description);
    if (!file_exists('_posts')) {
      mkdir('_posts');
    }
    $file_name = '_posts/'. Helper::slug($title) . '.md';
    $file = fopen($file_name, 'w');
    fwrite($file, $file_content);
    fclose($file);
    return true;
  }

}



if(file_exists('_posts')) {
  Helper::rrmdir('_posts');
}

$generator = new MyGen;
foreach (range(0, 2000) as $value) {
  $generator->make_file();
}
echo 'done';

// echo strlen($text);
// echo (new MyGen)->make_file();
