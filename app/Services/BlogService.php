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
    private function saveBlog(Request $request, $id = null)
    {
        $blog = $id ? Blog::find($id) : new Blog();

        $blog->title = $request->title;
        $blog->blog_content = $request->blog_content;
        $blog->tag = $request->tag;
        $blog->date = $request->date;

        $blog->save();

        return $blog;
    }

    public function addBlog(Request $request)
    {
        return $this->saveBlog($request);
    }

    public function updateBlog(Request $request, $id)
    {
        return $this->saveBlog($request, $id);
    }

    public function getAllBlogs()
    {
        $blogs = Blog::all();

        return $blogs;
    }

    public function getBlog($id)
    {
        $blog = Blog::find($id);

        return $blog;
    }

    public function disableBlog($id, $status)
    {
        $blog = Blog::find($id);

        if ($blog) {

            $blog->status = $status;

            $blog->save();

            return ['message' => 'Status Updated'];
        }

        return ['error' => 'Blog not found'];
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);

        if ($blog) {

            $blog->delete();

            return ['message' => 'Blog Deleted Id->' . $blog->id];
        }

        return ['error' => 'Blog not found'];
    }
}
