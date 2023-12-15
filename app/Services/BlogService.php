<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Http\Request;
use Prewk\Result;

class BlogService
{
    /**
     * @param Request $request
     * @return Result
     */
    public function addBlog(Request $request)
    {
        $blog = new Blog();

        $blog->title = $request->title;
        $blog->blog_content = $request->blog_content;
        $blog->tag = $request->tag;
        $blog->date = $request->date;

        $blog->save();

        return $blog;
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->blog_content = $request->blog_content;
        $blog->tag = $request->tag;
        $blog->date = $request->date;
        $blog->status = $request->status;

        $blog->save();

        return $blog;
    }
}
