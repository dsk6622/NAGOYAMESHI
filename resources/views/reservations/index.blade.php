@extends('layouts.app')

@section('content')           
<div class="container py-4">
    <h1 class="text-center mb-3">予約一覧</h1>           

    @if (session('flash_message')) 
        <div class="text-center">
            <p class="text-success">{{ session('flash_message') }}</p>                    
        </div>                                   
    @endif                                             

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">予約日時</th>                
                <th scope="col">人数</th>  
                <th scope="col">予約店舗</th>                        
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>   
        <tbody>                 
            @foreach($reservations as $reservation)  
                <tr>
                    <td>{{ date('Y年m月d日H時i分', strtotime($reservation->reservation_datetime)) }}</td>                    
                    <td>{{ $reservation->number_of_people }}名</td>                            
                    <td>{{ $reservation->restaurant->name }}</td>
                    <td><a href="{{ route('restaurants.show', $reservation->restaurant) }}">店舗詳細</a></td>
                    <td>
                        @if ($reservation->reservation_datetime >= now())
                            <form action="{{ route('reservations.destroy', $reservation) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link text-dark p-0" onclick="return confirm('予約をキャンセルしてもよろしいですか？');">キャンセル</button>
                            </form>  
                        @endif                                  
                    </td>
                </tr>  
            @endforeach
        </tbody>
    </table>                        

    <div class="d-flex justify-content-center">
        {{ $reservations->links() }}
    </div>
</div>    
@endsection