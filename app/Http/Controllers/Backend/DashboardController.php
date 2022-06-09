<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Category;
use App\Models\Auth\User;
use App\Models\ContactUs;

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
        $donor = User::where('user_type','Donor')->get()->count();
        $agent = User::where('user_type','Agent')->get()->count();
        $contact_us = ContactUs::where('status','Pending')->get()->count();

        return view('backend.dashboard',[
            'post' => $post,
            'donor' => $donor,
            'agent' => $agent,
            'contact_us' => $contact_us
        ]);
    }
}
