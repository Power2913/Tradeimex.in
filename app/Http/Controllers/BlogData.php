<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Database\QueryException; // Import the QueryException class
class BlogData extends Controller
{
    //
    public function recentPosts()
    {
        try {
            // Fetch the title, summary, and image_big columns from the posts table
            $recentPosts = DB::table('posts')->select('title', 'summary', 'image_big')
                ->orderByDesc('created_at')->take(4)->get();

            // Return the data to your view or do whatever you want with it
            return view('frontend.index', compact('recentPosts'));
        } catch (QueryException $e) {
            // Handle database query exception
            // Log the error, redirect, or display a custom error message
            return back()->withError('Error fetching recent posts: ' . $e->getMessage())->withInput();
        }
    }
}
