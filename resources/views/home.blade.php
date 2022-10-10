@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('/js/carousel.js') }}"></script>
@endpush

@section('content')
<div class="container pb-4">
    <div class="mb-5">
        <ul class="slider ps-0">
          <li><img src="{{ asset('/images/top1.jpg') }}" alt="海辺のレストラン" class="w-100"></li>
          <li><img src="{{ asset('/images/top2.jpg') }}" alt="料理" class="w-100"></li>
          <li><img src="{{ asset('/images/top3.jpg') }}" alt="レストランの看板" class="w-100"></li>
        </ul>
    </div>

    @if (session('flash_message')) 
        <div class="text-center">
            <p class="text-success">{{ session('flash_message') }}</p>                    
        </div>                                   
    @endif     

    <h2 class="text-center">店舗検索</h2>

    <div class="d-flex justify-content-center mb-5">
        <form method="GET" action="{{ route('restaurants.index') }}" class="search-box">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="店舗名で検索" name="keyword">
                <button type="submit" class="btn btn-primary shadow-sm">検索</button> 
            </div>               
        </form>   
    </div>

    <h2 class="text-center">カテゴリ検索</h2>

    <div class="row justify-content-center mb-4">
        <div class="col-12 col-md-8">
            @foreach ($categories as $category)
                <a class="btn btn-secondary mb-2" href="{{ url("/restaurants/?category_id={$category->id}") }}" role="button">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>    

    <h2 class="text-center">新着</h2>

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
</div>
@endsection
