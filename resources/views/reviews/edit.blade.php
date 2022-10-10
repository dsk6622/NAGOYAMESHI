@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">                
                <h1 class="text-center mb-3">レビュー編集</h1>                     
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                
            
                <form method="POST" action="{{ route('restaurants.reviews.update', [$restaurant, $review]) }}">
                    @csrf    
                    @method('patch')
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <label class="form-label text-md-left fw-bold">評価</label>
                        </div>

                        <div class="col">
                            <select name="score" class="form-select text-warning text-warning">
                                <option value="5" class="text-warning">★★★★★</option>
                                <option value="4" class="text-warning">★★★★</option>
                                <option value="3" class="text-warning">★★★</option>
                                <option value="2" class="text-warning">★★</option>
                                <option value="1" class="text-warning">★</option>
                            </select> 
                        </div>
                    </div>                 
                    
                    <div class="row mb-4">
                        <div class="col-12 col-md-3">
                            <label for="content" class="form-label text-md-left fw-bold">内容</label>
                        </div>

                        <div class="col">
                            <textarea class="form-control" id="content" name="content" cols="30" rows="5">{{ old('content', $review->content) }}</textarea>                            
                        </div>
                    </div>                                                             

                    <div class="form-group d-flex justify-content-center mb-4">
                        <button type="submit" class="btn btn-primary shadow-sm">更新</button>
                    </div>
                </form>                
            </div>                          
        </div>
    </div>   
@endsection