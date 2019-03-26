<?php
require(__dir__ . '/Helper.php');
return [
    'baseUrl' => 'https://polodev.github.io/jigsaw-blog',
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Blog Starter Template',
    'siteDescription' => 'Generate an elegant blog with Jigsaw',
    'siteAuthor' => 'Author Name',
    'build' => [
        'destination' => 'docs',
        // 'destination' => 'build_local',
    ],

    // collections
    'collections' => [
        'posts' => [
            'author' => 'Author Name', // Default author, if not provided in a post
            'sort' => '-date',
            'path' => function ($page) {
                return 'blog/' . Helper::slug($page->title);
            } 
        ],
        // taxonomy
        'categories' => [
            'path' => '/blog/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                $all_categories = $allPosts->filter(function ($post) use ($page) {
                    if ($post->categories) {
                    $categories = array_map(function ($category) {
                        return Helper::slug($category);
                    }, $post->categories);
                      return in_array($page->getFilename(), $categories, true);
                    }else {
                        return false;
                    }
                });
                return $all_categories;
            },
        ],
        // collection
        'series' => [
            'author' => 'Author Name', // Default author, if not provided in a post
            'sort' => '-date',
            'path' => function ($page) {
                $series_name_single = array_shift($page->series_names);
                $slug = Helper::slug($page->title);
                return  "series/{$series_name_single}/{$slug}";
            },
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
        $file_maps = Helper::generate_file_maps();
        $file_name = $page->getFilename();
        if ( array_key_exists($file_name, $file_maps) ) {
            return $file_maps[$file_name];
        }
        return false;
    },
    str_slug => function ($page, $string) {
        return Helper::slug($string);
    }
];
