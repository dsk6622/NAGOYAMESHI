@extends('layouts.app')

@section('content')           
<div class="container py-4">
    <h1 class="text-center mb-3">{{ $restaurant->name }}</h1>    
    
    <div class="row">
        <div class="col-12 col-md-6">
            <img src="{{ asset('storage/restaurants/' . $restaurant->image) }}" class="w-100">
        </div>

        <div class="col">
            <table class="table table-striped">        
                <tr>
                    <th scope="col">ID</th>                
                    <td>{{ $restaurant->id }}</td>                                     
                </tr>                                      
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
                    <td>〒{{ substr($restaurant->postal_code, 0, 3) . '-' . substr($restaurant->postal_code, 3) }}</td>
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
        </div>       
    </div>             
</div>    
@endsection