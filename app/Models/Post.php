<?php

namespace App\models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    private $slug;
    private $title;
    private $excerpt;
    private $body;
    private $date;

    public function __construct($slug, $title, $excerpt, $body, $date)
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->date = $date;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getExcerpt()
    {
        return $this->excerpt;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getDate()
    {
        return $this->date;
    }

    public static function all()
    {
        // i think the main idea of utilizing Yaml package is to convert
        // any file onto a an object that can be easily dealt with?
        // Cache::rememberForever(key, value (func))
        return Cache::rememberForever("posts.all", function () {
            return collect(File::files(resource_path('posts')))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(
                    fn ($document) =>
                    new Post(
                        $document->slug,
                        $document->title,
                        $document->excerpt,
                        $document->body(),
                        $document->date
                    )
                )
                ->sortByDesc("date");
        });
    }

    public static function find($slug)
    {
        return static::all()->firstWhere("slug", $slug);
    }
}
