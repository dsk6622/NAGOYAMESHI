@extends('layouts.app')

@section('content')   
<div class="container">
    <h1 class="text-center mb-3">カテゴリ登録</h1>
        

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
            <form method="POST" action="{{ route('dashboard.categories.store') }}">
                @csrf
                <div class="form-group row mb-3">
                    <label for="name" class="col-md-5 col-form-label text-md-left fw-bold">カテゴリ名</label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div> 

                <div class="form-group d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-primary shadow-sm w-100">登録</button>
                </div>
            </form>
        </div> 
    </div>
</div>    
@endsection