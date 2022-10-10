@extends('layouts.app')

@section('content')           
<div class="container py-4">
    <h1 class="text-center mb-3">店舗一覧</h1>   
    
    <div class="text-center">
        <a href="{{ route('dashboard.restaurants.create') }}" class="btn btn-primary text-white shadow-sm mb-3">+ 新規作成</a>            
    </div>            

    @if (session('flash_message')) 
        <div class="text-center">
            <p class="text-success">{{ session('flash_message') }}</p>                    
        </div>                                   
    @endif                                             

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>                
                <th scope="col">店名</th>  
                <th scope="col">郵便番号</th>                        
                <th scope="col">住所</th>
                <th scope="col">電話番号</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>   
        <tbody>                 
            @foreach($restaurants as $restaurant)  
                <tr>
                    <td>{{ $restaurant->id }}</td>                    
                    <td>{{ $restaurant->name }}</td>                            
                    <td>〒{{ $restaurant->postal_code }}</td>
                    <td>{{ $restaurant->address }}</td>
                    <td>{{ $restaurant->phone_number }}</td>
                    <td><a href="{{ route('dashboard.restaurants.show', $restaurant) }}">詳細</a></td>
                    <td><a href="{{ route('dashboard.restaurants.edit', $restaurant) }}">編集</a></td>
                    <td>
                        <form action="{{ route('dashboard.restaurants.destroy', $restaurant) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link text-dark p-0" onclick="return confirm('削除してもよろしいですか？');">削除</button>
                        </form>                                    
                    </td>
                </tr>  
            @endforeach
        </tbody>
    </table>                        

    <div class="d-flex justify-content-center">
        {{ $restaurants->links() }}
    </div>
</div>    
@endsection