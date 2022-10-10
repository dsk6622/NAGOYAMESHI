@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">            
            <h1 class="text-center mb-3">有料プラン解約</h1>                                                       

            <p class="text-center">本当に有料プランを解約してもよろしいですか？</p>  
            <form id="cardForm" action="{{ route('subscription.destroy') }}" method="post">
                @csrf
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-danger shadow-sm">解約</button>      
                </div>                                
            </form>
        </div>                          
    </div>
</div>       
@endsection