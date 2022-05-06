<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Category;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $post = Post::get()->count();
        $category = Category::get()->count();

        return view('backend.dashboard',[
            'post' => $post,
            'category' => $category
        ]);
    }
}
