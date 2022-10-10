@extends('layouts.app')

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>   
    <script src="{{ asset('/js/subscription.js') }}"></script> 
@endpush

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">            
            <h1 class="text-center mb-3">有料プラン登録</h1>                                                       

            <div class="alert alert-danger card-error" id="card-error" role="alert">
                <ul class="mb-0" id="error-list"></ul>                                        
            </div>                

            <form id="card-form" action="{{ route('subscription.store') }}" method="post">
                @csrf                    
                <input class="form-control mb-3 card-holder-name" id="card-holder-name" type="text" placeholder="カード名義人" required>
                <div class="card-element mb-4" id="card-element"></div>                                                                
            </form>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary shadow-sm" id="card-button" data-secret="{{ $intent->client_secret }}">登録</button>      
            </div>                                                              
        </div>                          
    </div>
</div>  
@endsection