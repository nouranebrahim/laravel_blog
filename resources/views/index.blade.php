<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="{{route('posts.index')}}">
    <img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    ALL POSTS
  </a>
</nav>
    <h1> my posts</h1>
    <table class="table">
  <thead>
  <a href="{{route('posts.create')}}" class="btn btn-primary">create post</a>
    <tr>
      <th scope="col">id</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">user</th>
      <th colspan="3" scope="col-3">actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      
      
      <td>{{$post->id}}</td>
      <td>{{$post->created_at}}</td>
      <td>{{$post->updated_at}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{ $post->user ? $post->user->name : 'not exist'}}</td>
      <td><a href="{{route('posts.show',['post'=> $post->id,'user'=> $post->user ? $post->user->id : 'not exist'])}}" class="btn btn-primary">view</a></td>
      <td><a href="{{route('posts.edit',['post'=> $post->id])}}" class="btn btn-secondary">update</a></td>
      
      <td><a data-toggle="modal" data-target="#myModal" class="btn btn-warning">delete</a></td>
   @endforeach
    </tr>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <a href="{{route('posts.destroy',['post'=> $post])}}" class="btn btn-warning">yes</a>
        <a href="{{route('posts.index')}}" class="btn btn-warning">no</a>
      </div>
    </div>

  </div>
</div>
   
  </tbody>
</table>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>
</html>