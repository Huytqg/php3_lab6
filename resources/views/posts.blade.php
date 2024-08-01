<!doctype html>  
<html lang="en">  

<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Danh sách</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>  

<body class="container">  
    <h1 class="text-center m-3">Danh sách sản phẩm</h1>  

    @auth  
    <div class="alert alert-warning d-flex justify-content-between align-items-center">  
        <div>  
            <strong>Username:</strong> <a href="{{ route('profile.show') }}">{{ Auth::user()->username }}</a>  
            <span class="badge bg-{{ Auth::user()->active ? 'success' : 'danger' }}">{{ Auth::user()->active ? 'Đang hoạt động' : 'Không hoạt động' }}</span>
   
        </div>  
        <div>
            <img src="{{ asset('/storage/' . Auth::user()->avatar ) }}" width="50" alt="">
       
        </div>  
        </div>
        <a href="{{ route('logout') }}" class="btn btn-danger m-2">Logout</a>  
    @endauth  

    @if(session('message'))  
        <div class="alert alert-success">  
            {{ session('message') }}  
        </div>  
    @endif  

    <table class="table">  
        <thead>  
            <tr>  
                <th scope="col">#ID</th>  
                <th scope="col">Title</th>  
                <th scope="col">Image</th>  
                <th scope="col">Description</th>  
                <th scope="col">Content</th>  
                <th scope="col">View</th>  
                <th scope="col">Cate Name</th>  
                <th scope="col">User Active</th>  
                <th scope="col">  
                    <a href="{{ route('post.create') }}" class="btn btn-success mb-1">Create new</a>  
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Manage Users</a> <!-- Nút mới thêm vào -->  
                    
                </th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($posts as $post)  
                <tr>  
                    <th scope="row">{{ $post->id }}</th>  
                    <td>{{ $post->title }}</td>  
                    <td>  
                        <img src="{{ asset('/storage/' . $post->image) }}" width="50" alt="">  
                    </td>  
                    <td>{{ $post->description }}</td>  
                    <td>{{ $post->content }}</td>  
                    <td>{{ $post->view }}</td>  
                    <td>{{ $post->category->name }}</td>  
                    <td>{{ optional($post->user)->active ? 'Active' : 'Inactive' }}</td> <!-- Sử dụng optional helper -->  
                    <td class="d-flex gap-1">  
                        <a href="{{ route('post.edit', $post) }}" class="btn btn-warning text-white">Edit</a>  
                        <form action="{{ route('post.destroy', $post) }}" method="post">  
                            @csrf  
                            @method('DELETE')  
                            <button onclick="return confirm('Bạn có muốn xóa không')" type="submit" class="btn btn-danger">Delete</button>  
                        </form>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody> 
        <a href="{{ route('test') }}" class="btn btn-success">Trang chủ</a> <!-- Nút mới cho route /test -->    
    </table>  
    {{ $posts->links() }}  
</body>  

</html>