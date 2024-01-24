<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
class HomeController extends Controller
{
    public function index(){
        $slider = Slider::with(['images' => function ($query) {
            $query->where('imageable_type', Slider::class);
        }])->where('status','active')->orderBy('serial','asc')->get();
        $category= Category::with('SubCategory.childcategories')->get();

        return view('frontend.home.home',['slider'=>$slider,'category'=>$category]);
    }
}
