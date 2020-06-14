<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $data['posts'] = Post::get();

        return view("posts.index",compact('data'));
    }

    /**
     * @return Application|Factory|View
     */
    public function newPost()
    {
        return view('posts.posts');
    }

    /**
     * @param Request $request
     *
     * @return Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string'],
            'author' => ['required', 'string', 'max:50'],
        ]);

        if (Auth::user()['admin'] === 1) {
            Post::create([
                'title' => $request['title'],
                'content' => $request['content'],
                'author' => $request['author'],
                'status' => true
            ]);
        } else {
            Post::create([
                'title' => $request['title'],
                'content' => $request['content'],
                'author' => $request['author'],
            ]);
        }

        return redirect('posts');
    }

    /**
     * @param $id
     *
     * @return RedirectResponse
     */
    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'Post Deleted');

        return redirect('posts');
    }

    /**
     * @param $id
     *
     * @return RedirectResponse
     */
    public function approvePost($id){
        $post = Post::find($id);
        $post->status = true;
        $post->save();

        Session::flash('success', 'Post approved');

        return redirect('posts');
    }

    /**
     * @param $id
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updatePost($id, Request $request){
        print_r($id, $request['content']);
        $post = Post::find($id);
        $post->content = $request['content'];
        $post->save();

        Session::flash('success', 'Post update');

        return redirect('posts');
    }

    /**
     * @param $id
     *
     * @return View
     */
    public function previewPost($id)
    {
        $post = Post::find($id);

        return view("posts.preview",compact('post'));
    }
}
