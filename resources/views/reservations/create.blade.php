@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">                
                <h1 class="text-center mb-3">店舗予約</h1>                     
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                
            
                <form method="POST" action="{{ route('restaurants.reservations.store', $restaurant) }}">
                    @csrf    
                    
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <label for="reservation_date" class="form-label text-md-left fw-bold">予約日</label>
                        </div>

                        <div class="col">
                            <select class="form-control form-select resevation-select" id="reservation_date" name="reservation_date" required>
                                <option value="">選択してください</option>
                                @for ($i = 0; $i <= 30; $i++)
                                @if (date('Y-m-d', strtotime($reservation_start_date . "+{$i} day")) == old('reservation_date'))
                                    <option value="{{ date('Y-m-d', strtotime($reservation_start_date . "+{$i} day")) }}" selected>{{ date('Y-m-d', strtotime($reservation_start_date . "+{$i} day")) }}</option>
                                @else
                                    <option value="{{ date('Y-m-d', strtotime($reservation_start_date . "+{$i} day")) }}">{{ date('Y-m-d', strtotime($reservation_start_date . "+{$i} day")) }}</option>
                                @endif
                                @endfor
                            </select>  
                        </div>
                    </div>                 
                    
                    <div class="row mb-3">
                        <div class="col-12 col-md-3">
                            <label for="reservation_time" class="form-label text-md-left fw-bold">時間</label>
                        </div>

                        <div class="col">
                            <select class="form-control form-select resevation-select" id="reservation_time" name="reservation_time" required>
                                <option value="">選択してください</option>
                                @for ($i = 0; $i <= (strtotime($reservation_end_time) - strtotime($reservation_start_time)) / 60 / $time_unit; $i++)
                                    {{ $reservation_time = date('H:i', strtotime($reservation_start_time . '+' . $i * $time_unit . 'minute')) }}
                                    @if ($reservation_time == old('reservation_time'))
                                        <option value="{{ $reservation_time }}" selected>{{ $reservation_time }}</option>
                                    @else
                                        <option value="{{ $reservation_time }}">{{ $reservation_time }}</option>
                                    @endif
                                @endfor                                                        
                            </select>                            
                        </div>
                    </div>    
                    
                    <div class="row mb-4">
                        <div class="col-12 col-md-3">
                            <label for="number_of_people" class="form-label text-md-left fw-bold">人数</label>
                        </div>

                        <div class="col">
                            <select class="form-control form-select resevation-select" id="number_of_people" name="number_of_people" required>
                                <option value="">選択してください</option>
                                @for ($i = 1; $i <=50; $i++)
                                    <option value="{{ $i }}">{{ $i }}名</option>
                                @endfor 
                            </select>                            
                        </div>
                    </div>                     

                    <div class="form-group d-flex justify-content-center mb-4">
                        <button type="submit" class="btn btn-primary shadow-sm">予約</button>
                    </div>
                </form>                
            </div>                          
        </div>
    </div>   
@endsection