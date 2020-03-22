<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Term;
use Validator;
use App\Contact;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct() {
        $data = [
            'terms' => Term::all(),
        ];
        view()->share('data', $data);

        view()->share('menu_category', Category::take(5)->get());

        $popular_post = Post::featurePost()->inRandomOrder()->take(3)->get();
        $recent_comment = Comment::recentComment()->inRandomOrder()->take(3)->get();
        view()->share('popular_post', $popular_post);
        view()->share('recent_comment', $recent_comment);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured_post = Post::featurePost()->take(3)->get();
        $new_post = Post::newPost()->paginate(15);

        return view('pages.home', compact('featured_post', 'new_post'));
    }

    public function about() {
        return view('pages.about');
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->paginate(10);

        return view('pages.category', compact('category', 'posts'));
    }

    public function author(User $user) {
        $posts = Post::where('user_id', $user->id)->paginate(15);

        return view('pages.author', compact('user', 'posts'));
    }

    public function post($slug) {
        $post = Post::where('slug', $slug)->first();
        $post->increment('views');
        $next_post = $post->next();
        $previous_post = $post->previous();
        $post_top = Post::where('top', 1)->take(4)->get();
        $recent_post = Post::where('category_id', $post->category_id)->inRandomOrder()->take(2)->get();

        return view('pages.post', compact('post', 'post_top', 'recent_post', 'next_post', 'previous_post'));
    }

    public function profile() {
        return view('pages.profile', ['user' => Auth::user()]);
    }

    public function storeProfile(Request $request) {
        $validators = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50'
        ]);

        if ($validators->fails()) {
            return response()->json(['status' => 0, 'errors' => $validators->errors()]);
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->role = $request->role == '1' ? 'admin' : 'user';

        if ($request->has('change_password') && $request->change_password == 1) {
            $validators = Validator::make($request->all(), [
                'password' => 'required|min:6|max:100',
                'password_again' => 'required|same:password'
            ]);

            if ($validators->fails()) {
                return response()->json(['status' => 0, 'errors' => $validators->errors()]);
            }

            $user->password = bcrypt($request->password);
        }

        $user->save();

        return response()->json(['status' => 1, 'message' => 'Thay đổi thông tin thành công']);
    }

    public function getCategoryByTerm(Term $term) {
        $categories = Category::where('term_id', $term->id)->select('ID', 'name')->get();

        return response()->json($categories);
    }

    public function getTermByCategory(Category $category) {
        $terms = $category->term()->select('ID', 'name')->first();

        return response()->json($terms);
    }

    public function contact(Request $request) {
        $validators = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required|min:6',
            'content' => 'required'
        ]);

        if ($validators->fails()) {
            return response()->json(['status' => 0, 'errors' => $validators->errors()]);
        }

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->content = $request->content;
        $contact->save();

        return response()->json(['status' => 1, 'message' => 'Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ sớm phản hồi']);
    }
}
