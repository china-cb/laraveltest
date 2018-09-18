<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class ArticlesController extends Controller
{
    

    public function index(Request $request)
    {
        $page =  is_null($request->get('page')) ? 1: $request->get('page');
        $pageSize = 10;
        $offset = ($page-1) * $pageSize;
        $articles = Article::orderBy('created_at','asc')->offset($offset)->limit($pageSize)->get();
        $pages = Article::orderBy('created_at','asc')->paginate(10);
        return view('articles.index',['articles'=>$articles,'pages'=>$pages]);

    }

    public function show(Request $request)
    {
        $id = $request->id;
        $info = Article::where('id',$id)->get();
        $infoarr = objectToArray($info);
        return view('articles.show',['info'=>$infoarr[0]]);

    }

    public function create()
    {
        //dd(1);
        //die();
        return view('articles.create');
    }

    //
    public function store(Request $request)
    {
        //dd($request);
        //数据验证 错误处理
        $this->validate($request,[
            'title' => 'required|max:50',
            'content' => 'required|max:500',
        ]);

        //1:orm方式写入
        $article = Article::create([
            'title'=>$request->title,
            'content'=>$request->content,
        ]);

        //2 或者
        /* $article = new Article();
        $article->title =$request->title;
        $article->content = $request->content;
        $article->save();*/

        //3 db方式写入
        //insert()方法返回值为true 和 false
        //$res = DB::table('articles')->insert(['title'=>$request->title,'content'=>$request->content]);
        return redirect()->action('ArticlesController@index');
    }

    public function edit(Request $request)
    {
        //dd($request);
        $id = $request->id;
        $info = Article::where('id',$id)->get();
        $infoarr = objectToArray($info);
        return view('articles.edit',['info'=>$infoarr[0]]);
       
    }

    public function update(Request $request,$id)
    {
        //dd($request);
        $this->validate($request,[
            'title' => 'required|max:50',
            'content' => 'required|max:500',
        ]);

        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        //return redirect()->route('articles.index');
        return Redirect()->action('ArticlesController@show',$id);

    }

    public function destroy(Request $request,$id)
    {
        //所有数据做然删除处理
        $article = Article::findOrFail($id);
        $article->delete();
        if($article->trashed()){
            echo '软删除成功！';
            //dd($article);
        }else{
            echo '软删除失败！';
        }

        //withTrashed,restore方法也可用于关联查询
        //实例化一个包含软删除的模型withTrashed
        $art = Article::withTrashed()
            ->where('id',53)
            ->get();
        //恢复软删除模型 restore();
        $art->restore();

        //永久删除模型
        $art->forceDelete();

        return back();
    }

    
}
