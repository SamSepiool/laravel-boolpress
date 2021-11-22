@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('POSTS') }}
                  <a href="{{route('admin.categories.create')}}" class="btn btn-outline-primary">New category</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Actions</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                          <tr>
                            <td>{{$category['id']}}</td>
                            <td>{{$category['name']}}</td>
                            <td>{{$category['slug']}}</td>
                            <td>
                              <a href="{{route('admin.categories.show', $category['id'])}}" class="btn btn-primary">Show</a>
                            </td>
                            <td>
                              <a href="{{route('admin.categories.edit', $category['id'])}}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                              <form onsubmit="return confirm('sure to delete POST-> {{$category['id']}}?')" action="{{route('admin.categories.destroy', $category['id'])}}" method="post">
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

