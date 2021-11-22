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
                <div class="card-header">Category ID -> {{$category['id']}}</div>
                <div class="card-body text-primary">
                    
                  <h5 class="card-title">{{$category['name']}}</h5>
                  <p class="card-text">{{$category['slug']}}</p>

                  <blockquote class="blockquote mb-0">
                    <h3>Lista post associati a questa categoria</h3>

                    <ul>
                        @forelse ($category["posts"] as $post)
                            <li>{{ $post["title"] }}</li>
                        @empty
                            <p>Non ci sono post associati a questa categoria</p>
                        @endforelse
                    
                  </blockquote>
                  
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{route('admin.categories.edit', $category['id'])}}" class="btn btn-warning">Edit</a>

                        <form onsubmit="return confirm('sure to delete POST-> {{$category['id']}}?')" action="{{route('admin.categories.destroy', $category['id'])}}" method="post" class="d-inline-block">
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

