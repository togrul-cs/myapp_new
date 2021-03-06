@extends('layouts.admin')




@section('content')

    @if(Session::has('deleted_post'))

        <p class="bg-danger"> {{session('deleted_post')}}</p>

    @endif

<h1 class="page-header">Posts</h1>

       <table class="table">
           <thead>
             <tr>
                 <th>Id</th>
                 <th>Photo</th>
                 <th>Owner</th>
                 <th>Category</th>
                 <th>Title</th>
                 <th>Body</th>
                 <th>Posts</th>
                 <th>Comments</th>
                 <th>Created</th>
                 <th>Updated</th>
             </tr>
           </thead>
           <tbody>

           @if($posts)

               @foreach($posts as $post)

             <tr>
                 <td>{{$post->id}}</td>
                 <td><img height="50" src="{{$post->photo ? $post->photo->path : '/images/no-photo.png'}}" alt=""></td>
                 <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                 <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                 <td>{{$post->title}}</td>
                 <td>{{str_limit($post->body, 20)}}</td>
                 <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
                 <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
                 <td>{{$post->created_at->diffForHumans()}}</td>
                 <td>{{$post->updated_at->diffForHumans()}}</td>
             </tr>

             @endforeach

           @endif
           </tbody>
          </table>


@endsection