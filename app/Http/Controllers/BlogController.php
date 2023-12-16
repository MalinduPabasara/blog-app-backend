<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;
use App\Http\Requests\BlogValidationRequest;

class BlogController extends Controller
{

    /**
     * @var BlogService
     */
    protected BlogService $blogService;

    /**
     * @param BlogService $blogService
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blogService->getAllBlogs();

        return response()->json($blogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogValidationRequest $request)
    {
        $result = $this->blogService->addBlog($request);

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = $this->blogService->getBlog($id);

        return response()->json($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogValidationRequest $request, $id)
    {
        $result = $this->blogService->updateBlog($request, $id);

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->blogService->deleteBlog($id);

        return response()->json($result, isset($result['error']) ? 404 : 201);
    }

    public function disable(Request $request, $id)
    {
        $status = $request->status;

        $result = $this->blogService->disableBlog($id, $status);

        return response()->json($result, isset($result['error']) ? 404 : 201);;
    }
}
