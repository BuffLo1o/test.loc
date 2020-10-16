<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models\post;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::query()->get();          //Принимаю данные с таблицы 
                
        return view ('posts')->with(['posts'=> $posts]); //Передаю на шаблон
    }

    public function like($id)
    {
        $posts=Post::where('id','=',$id)->get();         //Выбираю нужный пост
        return view ('like')->with(['posts'=> $posts]);             //Передаю на шаблон
    }

    public function popular()
    {
        $posts=Post::query()->orderBy('like', 'desc')->where('like', '>', 100)->get();          //Принимаю данные с таблицы, задаю параметры интересного поста и сортирую like по убыванию
        return view ('popular')->with(['posts'=> $posts]);          //Передаю на шаблон
        
    }

    public function popular5()
    {
        $posts=Post::query()->orderBy('like', 'desc')->where('like', '>', 100)->limit(5)->get();          //Принимаю данные с таблицы, задаю параметры интересного поста и сортирую like по убыванию и ограничиваю их до 5
        return view ('popular5')->with(['posts'=> $posts]); //Передаю на шаблон     
        
    }
    public function likeupdate($id)
    {   
        $i=Post::where('id','=',$id)->pluck('like')->first();
        $i++;
        $post=Post::where('id','=',$id)->get();
        $post=Post::where('id','=',$id)->update(['like' => $i]);
        
        $posts=Post::where('id','=',$id)->get();
        return view ('like')->with(['posts'=> $posts]); 
        
        
        

    }
}
