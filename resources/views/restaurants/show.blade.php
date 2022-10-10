@extends('layouts.app')

@section('content')           
<div class="container py-4">
    <h1 class="text-center mb-3">{{ $restaurant->name }}</h1>    
    
    @if (session('flash_message')) 
        <div>
            <p class="text-success text-center">{{ session('flash_message') }}</p>                    
        </div>                                   
    @endif    
    
    <div class="row mb-4">
        <div class="col-12 col-md-6">
            <img src="{{ asset('storage/restaurants/' . $restaurant->image) }}" class="w-100">
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
                    <th scope="col">郵便番号</th>    
                    <td>〒{{ $restaurant->postal_code }}</td>
                </tr>
                <tr>
                    <th scope="col">住所</th>
                    <td>{{ $restaurant->address }}</td>
                </tr>
                <tr>
                    <th scope="col">電話番号</th>
                    <td>{{ $restaurant->phone_number }}</td>
                </tr>
                <tr>
                    <th scope="col">定休日</th>
                    <td>{{ $restaurant->regular_holiday }}</td>
                </tr>             
                <tr>
                    <th scope="col">カテゴリ</th>
                    <td>{{ $restaurant->category->name }}</td>
                </tr>            
            </table>  
            <div class="text-center">
                <a href="{{ route('restaurants.reviews.create', $restaurant) }}" class="btn btn-primary text-white shadow-sm mb-3">予約</a>
            </div>               
        </div>       
    </div>    

    <h2 class="text-center mb-3">レビュー</h2>

    <div class="text-center">
        <a href="{{ route('restaurants.reviews.create', $restaurant) }}" class="btn btn-primary text-white shadow-sm mb-3">+ 新規投稿</a>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-12 col-md-8">
            @foreach ($reviews as $review)
                <div class="mb-4">
                    <div class="d-flex justify-content-between">
                        <h3 class="fs-5 fw-bold">{{ $review->user->name }}</h3>
                        @if ($review->user->id == Auth::id())                  
                            <div class="d-flex">
                                <a href="{{ route('restaurants.reviews.edit', [$restaurant, $review]) }}" class="btn btn-link">編集</a>      
                                <form action="{{ route('restaurants.reviews.destroy', [$restaurant, $review]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link text-dark" onclick="return confirm('削除してもよろしいですか？');">削除</button>
                                </form>               
                            </div>                                                               
                        @endif                      
                    </div>
                    <p class="text-warning mb-2">{{ str_repeat('★', $review->score) }}</p>
                    <p>{{ $review->content }}</p>                  
                </div>
            @endforeach 
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $reviews->links() }}
    </div>      
</div>    
@endsection