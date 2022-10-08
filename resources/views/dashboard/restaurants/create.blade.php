@extends('layouts.app')

@section('content')   
<div class="container">
    <h1 class="text-center mb-3">店舗登録</h1>
        

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <form method="POST" action="{{ route('dashboard.restaurants.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-3">
                    <label for="name" class="col-md-5 col-form-label text-md-left fw-bold">店舗名</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div> 

                <div class="form-group row mb-3">
                    <label for="image" class="col-md-5 col-form-label text-md-left fw-bold">店舗画像</label>
                    
                    <div class="col-md-7">
                        <input type="file" class="form-control" id="restaurantImage" name="image">
                    </div>
                </div>   
                        
                <div class="row">
                    <img src="#" class="mb-3 w-100 display-none" id="restaurantImagePreview">
                </div>  

                <div class="form-group row mb-3">
                    <label for="description" class="col-md-5 col-form-label text-md-left fw-bold">説明</label>

                    <div class="col-md-7">
                        <textarea class="form-control" id="description" name="description" cols="30" rows="5">{{ old('description') }}</textarea>                            
                    </div>
                </div> 

                <div class="form-group row mb-3">
                    <label for="opening_hour" class="col-md-5 col-form-label text-md-left fw-bold">営業開始時間</label>

                    <div class="col-md-7 row">
                        <div class="col-5">
                            <input type="number" class="form-control" id="opening_hour" name="opening_hour" value="{{ old('opening_hour') }}" max="23" min="0" required>
                        </div>
                        <div class="col-1 px-0"><span class="form-control-plaintext">時</span></div>
                        <div class="col-5">
                            <input type="number" class="form-control" id="opening_minute" name="opening_minute" value="{{ old('opening_minute') }}" max="59" min="0" required> 
                        </div>
                        <div class="col-1 px-0"><span class="form-control-plaintext">分</span></div>          
                    </div>
                </div>  

                <div class="form-group row mb-3">
                    <label for="closing_hour" class="col-md-5 col-form-label text-md-left fw-bold">営業終了時間</label>

                    <div class="col-md-7 row">
                        <div class="col-5">
                            <input type="number" class="form-control" id="closing_hour" name="closing_hour" value="{{ old('closing_hour') }}" max="23" min="0" required>
                        </div>
                        <div class="col-1 px-0"><span class="form-control-plaintext">時</span></div>
                        <div class="col-5">
                            <input type="number" class="form-control" id="closing_minute" name="closing_minute" value="{{ old('closing_minute') }}" max="59" min="0" required> 
                        </div>
                        <div class="col-1 px-0"><span class="form-control-plaintext">分</span></div>          
                    </div>
                </div>
                
                <div class="form-group row mb-3">
                    <label for="lowest_price" class="col-md-5 col-form-label text-md-left fw-bold">価格（下限）</label>

                    <div class="col-md-7 row">
                        <div class="col-5">
                            <input type="number" class="form-control" id="lowest_price" name="lowest_price" value="{{ old('lowest_price') }}" required>
                        </div>
                        <div class="col-1 px-0"><span class="form-control-plaintext">円</span></div>                        
                    </div>
                </div>  
                
                <div class="form-group row mb-3">
                    <label for="lowest_price" class="col-md-5 col-form-label text-md-left fw-bold">価格（上限）</label>

                    <div class="col-md-7 row">                       
                        <div class="col-5">
                            <input type="number" class="form-control" id="highest_price" name="highest_price" value="{{ old('highest_price') }}" required>
                        </div>
                        <div class="col-1 px-0"><span class="form-control-plaintext">円</span></div>
                    </div>
                </div>                 

                <div class="form-group row mb-3">
                    <label for="postal_code" class="col-md-5 col-form-label text-md-left fw-bold">郵便番号</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="address" class="col-md-5 col-form-label text-md-left fw-bold">住所</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="phone_number" class="col-md-5 col-form-label text-md-left fw-bold">電話番号</label>
                    
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                    </div>                    
                </div>                
                
                <div class="form-group row mb-3">
                    <label for="regular_holiday" class="col-md-5 col-form-label text-md-left fw-bold">定休日</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" id="regular_holiday" name="regular_holiday" value="{{ old('regular_holiday') }}" required>
                    </div>                    
                </div>                  

                <div class="form-group row mb-4">
                    <label for="category_id" class="col-md-5 col-form-label text-md-left fw-bold">カテゴリ</label>

                    <div class="col-md-7">
                        <select class="form-control form-select" id="category_id" name="category_id">   
                            <option value="" hidden>選択してください</option>                                              
                            @foreach ($categories as $category)                                        
                                @if ($category->id == old("category_id"))                                        
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach                              
                        </select>                                
                    </div>                    
                </div>

                <div class="form-group d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-primary shadow-sm w-100">登録</button>
                </div>
            </form>
        </div> 
    </div>
</div>    

<script type="text/javascript">
    document.getElementById('restaurantImage').addEventListener('change', () => {
        if (document.getElementById('restaurantImage').files[0]) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
                document.getElementById('restaurantImagePreview').classList.remove('display-none');
                document.getElementById('restaurantImagePreview').setAttribute('src', fileReader.result);
            }
            fileReader.readAsDataURL(document.getElementById('restaurantImage').files[0]);
        }
    })
</script> 
@endsection