<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\ChildCategory;
class Category extends Model
{
    use HasFactory;
    public function ChildCategory()
    {
        return $this->hasManyThrough(ChildCategory::class, SubCategory::class
        ,'category_id','subcategory_id','id','id');
    }
    public function SubCategory(){
        return $this->hasMany(SubCategory::class);
    }


}
