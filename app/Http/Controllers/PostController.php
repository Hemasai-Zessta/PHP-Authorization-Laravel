<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestValidator;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('policy.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $this->authorize('view',$post);
        return view('policy.show')->with('post',$post);
    }

    public function destroy(Post $post)//($post)
    {
        // This will also works
        $this->authorize('delete',$post);
        $post->delete();
        session()->flash('deleteMessage','Post Deleted Successfully');
        return redirect()->route('post.index');
        

        // This will also works bt the above parameter should be commented one
        /*$post =Post::where('id',$post)->first();

        if ($post != null) {
            $post->delete();
            return redirect()->route('post.index')->with(['message'=> 'Successfully deleted!!']);
        }

        return redirect()->route('post.index')->with(['message'=> 'Wrong ID!!']);*/
    }

    // --------------- create --------------------------
    public function create()
    {
        $users = User::all();
        return view('policy.createPost', ['users' => $users]);
        
        //$posts = Post::with('user')->get();
        //dd($user);
        //return view('policy.createPost', compact('posts'));
    }

    // --------------- store --------------------------
    public function store() 
    {
        $data = request()->validate([
            'user_id' => ['integer', Rule::exists('users','id')],
            'title' => ['string'],
            'description' => ['string']
        ]);

        Post::create($data);
        session()->flash('createMessage','Post Created Successfully');
        return redirect()->route('post.index');
        
    }
}
