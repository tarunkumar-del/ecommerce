<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\Image;
class Slider extends Model
{
    use HasFactory;
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
