@extends('layouts.app')

@section('content')
<main>
    <div class="error404-area pb-60 pt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-wrapper text-center">
                        <div class="error-text">
                            @if (session('success'))
                            <p>{{ session('success') }}</p>
                            @endif
                        </div>
                        <div class="error-button">
                            <a href="{{ route('shop.index') }}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection