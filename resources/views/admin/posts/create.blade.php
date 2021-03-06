@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card border-primary mb-3" >
                <div class="card-header">{{ __('Create new Post') }}</div>
                <div class="card-body text-primary">
                    
                 <form action="{{route('admin.posts.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Write the post's title" value="{{ old('title')}}">           
                    </div>

                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Write the post's username" value="{{Auth::user()->name}}">
                    </div>
                    

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Write the post's content">{{ old('content')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Add post</button>
                </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection