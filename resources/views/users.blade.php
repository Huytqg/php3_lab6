<h1>User Management</h1>  
<table class="table">  
    <thead>  
        <tr>  
            <th>ID</th>  
            <th>Fullname</th>  
            <th>Username</th>  
            <th>Email</th>  
            <th>Role</th>  
            <th>Active</th>  
            <th>Actions</th>  
        </tr>  
    </thead>  
    <tbody>  
        @foreach($users as $user)  
        <tr>  
            <td>{{ $user->id }}</td>  
            <td>{{ $user->fullname }}</td>  
            <td>{{ $user->username }}</td>  
            <td>{{ $user->email }}</td>  
            <td>{{ ucfirst($user->role) }}</td> <!-- Hiển thị vai trò, sử dụng ucfirst để chữ đầu tiên viết hoa -->  
            <td>{{ $user->active ? 'Active' : 'Inactive' }}</td>  
            <td>  
                <form method="POST" action="/admin/users/{{ $user->id }}/toggle-active">  
                    @csrf  
                    <button type="submit" class="btn btn-warning">{{ $user->active ? 'Hoạt động' : 'Không hoạt động' }}</button>  
                </form>  
            </td> 
            <td>
                <div class="mt-5">  
                    <a href="{{ route('post.index') }}">Quay về danh sách bài viết</a>    
                </div>
            </td>
             
        </tr>  
        @endforeach  
    </tbody>  
</table>