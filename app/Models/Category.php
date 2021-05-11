<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Category Model
 * 
 * @property int $id
 * @property string $name
 */
class Category extends Model
{
    use HasFactory;

    /**
     * Disable created_at, updated_at field
     */
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
