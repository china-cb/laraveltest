
@extends('layouts.art')
@section('content')
 
 <form class="form-horizontal" method="post" action="">
   {{ csrf_field() }}
 <p class="form-group">
 <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
 <p class="col-sm-8">
  <input type="title" class="form-control" id="title" name="title">
 </p>
 </p>
 
 <p class="form-group">
 <label for="inputEmail3" class="col-sm-2 control-label">内容</label>
 <p class="col-sm-8">
  <textarea class="form-control" rows="5" id="content" name="content"></textarea>
 </p>
 </p>
 
 <p class="form-group">
 <p class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-default">创建</button>
 </p>
 </p>
</form>
@endsection