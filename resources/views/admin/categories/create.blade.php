@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card border-primary mb-3" >
                <div class="card-header">{{ __('Create new Category') }}</div>
                <div class="card-body text-primary">
                    
                 <form action="{{route('admin.categories.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Write the category's name" value="{{ old('name')}}">           
                    </div>

                    <button type="submit" class="btn btn-success">Add category</button>
                </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection