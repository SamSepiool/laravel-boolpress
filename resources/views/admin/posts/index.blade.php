@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('POSTS') }}
                  <a href="{{route('admin.posts.create')}}" class="btn btn-outline-primary">New post</a>
                </div>

                <div class="card-body">

                @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                          <strong>{{ $message }}</strong>
                  </div>
                @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope='col'>Category</th>
                            <th scope="col">Username</th>
                            <th scope="col">Actions</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                          <tr>
                            <td>{{$post['id']}}</td>
                            <td>{{$post['title']}}</td>
                            <td>{{$post['slug']}}</td>
                            <td>{{$post['category']['name'] ?? ''}}</td>
                            <td>{{$post['username']}}</td>
                            <td>
                              <a href="{{route('admin.posts.show', $post['id'])}}" class="btn btn-primary">Show</a>
                            </td>
                            <td>
                              <a href="{{route('admin.posts.edit', $post['id'])}}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                              <form onsubmit="return confirm('sure to delete POST-> {{$post['id']}}?')" action="{{route('admin.posts.destroy', $post['id'])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                    
                          </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

