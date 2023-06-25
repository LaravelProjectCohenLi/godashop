<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository extends BaseRepository
{
    /**
     * @var Tag
     */

    protected $model;

    public function __construct(Tag $model)
    {
        $this->model = $model;   
    }

    public function getAllTags()
    {
        $tags = [];

        $this->chunk(100, function ($chunk) use (&$tags) {
            foreach ($chunk as $tag) {
                $tags[] = $tag;
            }
        });

        return $tags;
    }
}