@extends('layouts.guest')

@section('blogContent')
<div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        Recent posts
      </h3>

      <div class="blog-post">
        <h2 class="blog-post-title"><a href="{{route('singlePost', $post['slug'])}}">{{$post['title']}}</a></h2>
        <p class="blog-post-meta">Posted {{$post['created_at']->diffForHumans()}} by <a href="#">{{$post['username']}}</a></p>

        <p>{{$post['content']}}</p>
      </div><!-- /.blog-post -->

</div><!-- /.row -->
@endsection