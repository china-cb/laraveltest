@extends('layouts.art')
 
 <a class="btn btn-primary" href="{{route('articles.create')}}" rel="external nofollow" >添加文章</a>

 @foreach($articles as $v)
 <p class="panel panel-default">
 <p class="panel-body">
 {{ $v->title }}
 <a href="{{route('articles.show',$v->id)}}" rel="external nofollow" class="btn btn-info">阅读</a>
 <a href="{{route('articles.edit',$v->id)}}" rel="external nofollow" class="btn btn-info">修改</a>
  <form action="{{route('articles.destroy',$v->id)}}" method="post" style="display: inline-block;">
   {{ csrf_field() }}
   {{ method_field('DELETE') }}
   <button type="submit" class="btn btn-danger">删除</button>
  </form>
 </p>
 </p>
 @endforeach

<div>
    {{$pages}}
</div>
