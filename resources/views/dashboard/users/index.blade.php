@extends('layouts.app')

@section('content')     
<div class="container">     
    <h1 class="text-center mb-3">会員一覧</h1>     

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">氏名</th>
                <th scope="col">メールアドレス</th>                                                                                                                           
            </tr>
        </thead>   
        <tbody>                 
            @foreach($users as $user)  
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>                                                                                                                       
                </tr>  
            @endforeach
        </tbody>
    </table> 

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>  
</div>                                         
@endsection