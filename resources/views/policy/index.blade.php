@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ Auth::user()->name }}</h3>
    <a href="{{ route('post.create', Auth::user()->id) }}" class="btn btn-sm btn-success">Add Post</a>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('createMessage'))
              <div class="alert alert-success">
                  {{ session()->get('createMessage') }}
              </div>
            @elseif(session()->has('deleteMessage'))
              <div class="alert alert-danger">
                {{ session()->get('deleteMessage') }}
              </div>
            @endif
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">User</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $post)
                     <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                          @can('view',$post)
                            <a href="{{ route('post.show',$post) }}" class="btn btn-sm btn-success">View</a>
                          @endcan

                          @can('delete',$post)
                            <a href="{{ route('post.delete',$post) }}" class="btn btn-sm btn-danger">Delete</a>
                          @endcan

                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection