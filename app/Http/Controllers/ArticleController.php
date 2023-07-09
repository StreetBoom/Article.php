<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()->orderBy('created_at', 'DESC')->limit(3)->get();
        $likes = Like::all();

        return view('index',[
            'articles' => $articles,
            'likes' => $likes,

        ]);
    }

    public function show($id)
    {
        $articles = Article::paginate(1);
        $comments = Comment::paginate(5);

        //так надо отучиться тебе передавать
//        return view('show', compact('articles','comments'));
        return view('show', [
            'articles' => $articles,
            'comments' => $comments,
        ]);
    }

    public function comment(Request $request)
    {
        $data = $request->validate([
            'text'=> 'required|string|min:5',
            'article_id' =>'required'
        ]);
        $data['user_id'] = auth()->user()->id;

        try {
            Comment::create($data);
        }catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect(route('show', $data['article_id']));
    }

    public function addLike(Request $request) {
        $data = $request->validate([
            'count'=> 'required',
            'article_id' =>'required'
        ]);
        Like::create($data);


    }
}
