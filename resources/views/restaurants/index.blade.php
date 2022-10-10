@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-3">検索結果</h1>

    <div class="d-flex justify-content-center mb-4">
        <form method="GET" action="{{ route('restaurants.index') }}" class="search-box">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="店舗名で検索" name="keyword" value="{{ $keyword }}">
                <button type="submit" class="btn btn-primary shadow-sm">検索</button> 
            </div>               
        </form>   
    </div>    

    <div class="row justify-content-center mb-4">
        <div class="col-12 col-md-8">
            @foreach ($categories as $category)
                <a class="btn btn-secondary mb-2" href="{{ url("/restaurants/?category_id={$category->id}") }}" role="button">{{ $category->name }}</a>
            @endforeach 
        </div>   
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-12 col-md-8">
            @foreach ($restaurants as $restaurant)
                <div class="row">
                    <div class="col-12 col-md-4">
                        <a href="{{ route('restaurants.show', $restaurant) }}"><img src="{{ asset('storage/restaurants/' . $restaurant->image) }}" class="w-100"></a>
                    </div>

                    <div class="col">
                        <table class="table table-striped">                                             
                            <tr>
                                <th scope="col">店舗名</th>                             
                                <td>{{ $restaurant->name }}</td>                                                            
                            </tr>  
                            <tr>
                                <th scope="col">説明</th>                             
                                <td>{{ $restaurant->description }}</td>                                                            
                            </tr>    
                            <tr>
                                <th scope="col">営業時間</th>                             
                                <td>{{ date('H時i分', strtotime($restaurant->opening_time)) }}～{{ date('H時i分', strtotime($restaurant->closing_time)) }}</td>                                                            
                            </tr>     
                            <tr>
                                <th scope="col">価格</th>                             
                                <td>{{ $restaurant->lowest_price }}円～{{ $restaurant->highest_price }}円</td>                                                            
                            </tr>                                          
                            <tr>
                                <th scope="col">カテゴリ</th>
                                <td>{{ $restaurant->category->name }}</td>
                            </tr>            
                        </table>    
                    </div>               
                </div>
            @endforeach 
        </div>
    </div> 
    <div class="d-flex justify-content-center">
        {{ $restaurants->appends(request()->query())->links() }}
    </div>    
</div>
@endsection
