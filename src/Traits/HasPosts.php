<?php

namespace Yaromir\ShopPackage\Traits;

use Yaromir\ShopPackage\Models\Post;

trait HasPosts
{
    public function posts()
    {
        return $this->morphMany(Post::class, 'author');
  }
}