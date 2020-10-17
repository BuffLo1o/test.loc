<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models\Post;

class PostController extends Controller
{
    public function index()
    {
        //TODO в переменные нужно класть значения вот так $variable = $data
        //TODO Post::query()->get() рабочий вариант, но проще использовать Post::all()
        $posts=Post::query()->get();          //Принимаю данные с таблицы 
        //TODO при вызове функции, не надо делать отступ от агрументов function($argument)
        return view ('posts')->with(['posts'=> $posts]); //Передаю на шаблон
    }

    //TODO Посмотри в интернете на routeModelBinding там показывается как сразу получать модель в контроллере
    public function like($id)
    {
        //TODO where('id', '=', $id) как-то не удобно, да? Есть Post::find($id)
        $posts=Post::where('id','=',$id)->get();         //Выбираю нужный пост
        return view ('like')->with(['posts'=> $posts]);             //Передаю на шаблон
    }

    public function popular()
    {
        //TODO тут твоя функция слишком узко специализированная, а если ты захочешь все посты, у которых лайков больше 1000? Добавь не обязательный аргумент кол-во лайков с дефолтным значением 100
        $posts=Post::query()->orderBy('like', 'desc')->where('like', '>', 100)->get();          //Принимаю данные с таблицы, задаю параметры интересного поста и сортирую like по убыванию
        return view ('popular')->with(['posts'=> $posts]);          //Передаю на шаблон
        
    }

    //TODO Плохой нейминг
    public function popular5()
    {
        //TODO аналогично прошлому комментарию, только два аргукмента, кол-во лайков и кол-во постов, которые хочешь получить
        $posts=Post::query()->orderBy('like', 'desc')->where('like', '>', 100)->limit(5)->get();          //Принимаю данные с таблицы, задаю параметры интересного поста и сортирую like по убыванию и ограничиваю их до 5
        return view ('popular5')->with(['posts'=> $posts]); //Передаю на шаблон
    }
    //TODO вообще считаю что функции popular и popular5 нужно объединить, а еще лучше объединить, а логику фильтрации вынести в сервис

    //TODO Тоже проблемы с неймингом, update подразумевает изменение значения на любое, а ты всегда увеличиваешь на 1, мб назвать setLike?
    public function likeupdate($id)
    {   
        $i=Post::where('id','=',$id)->pluck('like')->first();
        $i++;
        //TODO тут вообще какая-то дичь...
        $post=Post::where('id','=',$id)->get();
        $post=Post::where('id','=',$id)->update(['like' => $i]);
        
        $posts=Post::where('id','=',$id)->get();
        return view ('like')->with(['posts'=> $posts]);
    }

    //TODO Все твои комментарии бесполезные, ты просто переводишь то что ты написал на русский язык, в этом нет необходимости, лучше посмотри что такое PHP-DOC
}
