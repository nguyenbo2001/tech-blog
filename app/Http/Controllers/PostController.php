<?php

namespace App\Http\Controllers;

use App\Term;
use App\Post;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terms = Term::all();
        $categories = Category::all();

        return view('admin.posts.create', ['terms' => $terms, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
    		[
    			'category_id'=>'required',
    			'title' => 'required|unique:posts,title|min:3',
    			'excerpt' => 'required',
    			'content'=> 'required|min:20',
            ]
        );

        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;

    	if($request->hasFile('feature_image'))
    	{
    		$img_file = $request->file('feature_image');

    		$img_file_extension = $img_file->getClientOriginalExtension();

    		if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
    		{
    			return back()->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
    		}

    		$img_file_name = $img_file->getClientOriginalName();

    		$random_file_name = time().'_'.$img_file_name;
    		while(File::exists(public_path('upload/posts/'.$random_file_name)))
    		{
    			$random_file_name = time().'_'.$img_file_name;
    		}

    		$img_file->move(public_path('upload/posts'),$random_file_name);
    		$post->feature_image = $random_file_name;
    	}
    	else
    		$post->feature_image = '';

        $post->top = $request->top ? $request->top : 0;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->save();

    	return redirect()->route('admin.posts.create')->with('message','Thêm Bài viết mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $terms = Term::all();
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'terms', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'category_id'=>'required',
            'title' => 'required|min:3|unique:posts,title,'. $post->id,
            'excerpt' => 'required',
            'content'=> 'required|min:20',
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;

    	if($request->hasFile('feature_image'))
    	{
    		$img_file = $request->file('feature_image');

    		$img_file_extension = $img_file->getClientOriginalExtension();

    		if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
    		{
    			return back()->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
    		}

            $img_file_name = $img_file->getClientOriginalName();

    		$random_file_name = time().'_'.$img_file_name;
    		while(File::exists(public_path('upload/posts/'.$random_file_name)))
    		{
    			$random_file_name = time().'_'.$img_file_name;
    		}

            $img_file->move(public_path('upload/posts'), $random_file_name);
            if (File::exists(public_path('upload/posts/' . $post->feature_image))) {
                File::delete(public_path('upload/posts/' . $post->feature_image));
            }
    		$post->feature_image = $random_file_name;
    	}

        $post->top = $request->top ? $request->top : 0;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('admin.posts.edit', $post)->with('message','Sửa Bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (File::exists(public_path('upload/posts/' . $post->feature_image))) {
            File::delete(public_path('upload/posts/' . $post->feature_image));
        }
        $post->comment()->delete();
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', 'Xoá bài viết thành công');
    }
}
