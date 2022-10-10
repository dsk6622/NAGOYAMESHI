@extends('layouts.app')

@section('content')           
<div class="container py-4">
    <h1 class="text-center mb-3">カテゴリ一覧</h1>   
    
    <div class="text-center">
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary text-white shadow-sm mb-3">+ 新規作成</a>            
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
                <th scope="col">カテゴリ名</th>  
                <th scope="col">設定されている店舗数</th>                        
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>   
        <tbody>                 
            @foreach($categories as $category)  
                <tr>
                    <td>{{ $category->id }}</td>                    
                    <td>{{ $category->name }}</td>                            
                    <td>{{ $category->restaurants()->count() }}件</td>                   
                    <td><a href="{{ route('dashboard.categories.edit', $category) }}">編集</a></td>
                    <td>
                        <form action="{{ route('dashboard.categories.destroy', $category) }}" method="post">
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
        {{ $categories->links() }}
    </div>
</div>    
@endsection