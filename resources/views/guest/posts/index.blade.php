@extends('layouts.guest')

@section('blogContent')
<div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        Recent posts
      </h3>


      @foreach ($posts as $post)
      <div class="blog-post">
        <h2 class="blog-post-title"><a href="{{route('singlePost', $post['slug'])}}">{{$post['title']}}</a></h2>
        <p class="blog-post-meta">Posted {{$post['created_at']->diffForHumans()}} by <a href="#">{{$post['username']}}</a></p>

        <p>{{$post['content']}}</p>
      </div><!-- /.blog-post -->
      @endforeach

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">

      <div class="p-3">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            <li><a href="#">January 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">March 2021</a></li>
            <li><a href="#">April 2021</a></li>
            <li><a href="#">May 2021</a></li>
            <li><a href="#">June 2021</a></li>
            <li><a href="#">July 2021</a></li>
            <li><a href="#">August 2021</a></li>
            <li><a href="#">September 2021</a></li>
            <li><a href="#">October 2021</a></li>
            <li><a href="#">Nvember 2021</a></li>
        </ol>
      </div>

      <div class="p-3">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

</div><!-- /.row -->
@endsection