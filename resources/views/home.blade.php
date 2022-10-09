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
<div class="container">
    <div>
        <ul class="slider">
          <li><img src="{{ asset('') }}" alt="CanonのCamera" class="mainpic"></li>
          <li><img src="image/main2.png" alt="機材一式" class="mainpic"></li>
          <li><img src="image/main3.png" alt="海の撮影" class="mainpic"></li>
        </ul>
    </div>
</div>
@endsection
