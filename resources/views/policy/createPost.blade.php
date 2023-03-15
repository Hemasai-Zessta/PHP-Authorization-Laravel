@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <h3>{{ Auth::user()->name }}</h3> --}}
    <h3>{{ $users[Auth::user()->id-1]->name }}</h3>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{ url('/posts/create/'.Auth::user()->id) }}" method="post" >
                @csrf
                

                <div class='container'>
                    <h1 class='text-center'>Create Posts</h1>
        
                    <div class="form-group">
                        <label for=""><b>User Name</b></label>
                        <br>
                        <select name="user_id" class="black border-gray-500 w-80 mb-3 p-2">
                            <option value="{{ $users[Auth::user()->id-1]->id }}">{{ $users[Auth::user()->id-1]->name }}</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for=""><b>Title</b></label>
                        <input type="text" name="title" id="" class="form-control" value="{{ old('title') }}" placeholder="Enter Post Title" aria-describedby="helpId">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><b>Description</b></label><br>
                        <textarea name="description" rowa="3" value="{{ old('description') }}" placeholder="Enter Post Description" class="block border border-gray-500 w-80 mb-3"></textarea>
                    </div>
                    
                   
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection