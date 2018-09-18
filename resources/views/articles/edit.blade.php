@extends('layouts.art')
<form class="form-horizontal" method="post" action="{{route('articles.update',$info['id'])}}">
   {{ csrf_field() }}
   {{ method_field('PATCH') }}
 <p class="form-group">
 <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
 <p class="col-sm-8">
  <input type="title" class="form-control" id="title" name="title" value="{{$info['title']}}">
 </p>
 </p>
 
 <p class="form-group">
 <label for="inputEmail3" class="col-sm-2 control-label">内容</label>
 <p class="col-sm-8">
  <textarea class="form-control" rows="5" id="content" name="content">{{$info['content']}}</textarea>
 </p>
 </p>
 
 <p class="form-group">
 <p class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-default">更新</button>
 </p>
 </p>
</form>