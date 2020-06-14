<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['title','content','author', 'status'];

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('\App\User');
    }

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }
}
