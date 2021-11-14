@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

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
            </div>
            
        </div>
    </div>
</div>
@endsection

