@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card border-primary mb-3" >
                <div class="card-header">post ID -> {{$post['id']}}</div>
                <div class="card-body text-primary">
                    
                 <form action="{{route('admin.posts.update', $post['id'])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Write the post's title" value="{{ old('title') ? old('title') : $post['title'] }}">           
                    </div>

                    {{-- <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Write the post's username" value="{{ old('username') ? old('username') : $post['username'] }}">
                    </div> --}}

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Write the post's content">{{ old('content') ? old('content') : $post['content'] }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

