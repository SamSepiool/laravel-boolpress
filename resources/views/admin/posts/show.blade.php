@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="card border-primary mb-3" >
                <div class="card-header">post ID -> {{$post['id']}}</div>
                <div class="card-body text-primary">
                    
                  <h5 class="card-title">{{$post['title']}}</h5>
                  <p class="card-text">{{$post['content']}}</p>

                  <blockquote class="blockquote mb-0">
                    <p>SLUG: {{$post['slug']}}</p>
                    <footer class="blockquote-footer">
                        <strong>posted by</strong> 
                        <cite title="Source Title">{{$post['username']}}</cite></footer>
                  </blockquote>
                  
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{route('admin.posts.edit', $post['id'])}}" class="btn btn-warning">Edit</a>

                        <form onsubmit="return confirm('sure to delete POST-> {{$post['id']}}?')" action="{{route('admin.posts.destroy', $post['id'])}}" method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</div>
@endsection

