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
        $fullpath =  $name;
        $fullpath =  str_replace($post_source_path, '', $fullpath);
        $fullpath = str_replace(".md","", $fullpath);
        $fullpath = str_replace("/",".", $fullpath);
        $path_array[$filename] = $fullpath;
      }
    }
    return $path_array;
}
return [
    // 'baseUrl' => 'https://polodev.github.io/jigsaw-blog',
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Blog Starter Template',
    'siteDescription' => 'Generate an elegant blog with Jigsaw',
    'siteAuthor' => 'Author Name',
    'build' => [
        // 'destination' => 'docs',
        'destination' => 'build_local',
    ],

    // collections
    'collections' => [
        'posts' => [
            'author' => 'Author Name', // Default author, if not provided in a post
            'sort' => '-date',
            'path' => 'blog/{slug}',
        ],
        // taxonomy
        'categories' => [
            'path' => '/blog/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
        // collection
        'series' => [
            'author' => 'Author Name', // Default author, if not provided in a post
            'sort' => '-date',
            'path' => 'series/{series_name_single}/{slug}',
        ],
        // taxonomy
        'series_tags' => [
            'path' => '/series/tags/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->series_tags ? in_array($page->getFilename(), $post->series_tags, true) : false;
                });
            },
        ],
        // taxonomy
        'series_names' => [
            'path' => '/series/{filename}',
            'order' => 0,
            'sort' => 'order',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->series_names ? in_array($page->getFilename(), $post->series_names, true) : false;
                });
            },
        ],

    ],

    // helpers
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) {
        $content = $page->excerpt ?? $page->getContent();
        $cleaned = strip_tags(
            preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content),
            '<code>'
        );

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'getFullFilePath' => function( $page ) {
        $file_maps = generate_file_maps();
        $file_name = $page->getFilename();
        if ( array_key_exists($file_name, $file_maps) ) {
            return $file_maps[$file_name];
        }
        return false;
    }
];
