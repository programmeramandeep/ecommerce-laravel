@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="javascript:void(0);">Search</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Shop Page Start -->
<div class="main-shop-page pb-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <div class="col-lg-12">
                {{-- Messages --}}
                @include('partials._messages')
            </div>

            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3  order-2">
                <div class="sidebar white-bg">
                    <div class="single-sidebar">
                        <div id="clear-refinements" class="mb-3"></div>
                        <div class="group-title">
                            <h2>categories</h2>
                        </div>
                        <div id="refinement-list"></div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Shopping Option End -->

            <!-- Product Categorie List Start -->
            <div class=" col-lg-9 order-lg-2">
                <div id="searchbox"></div>
                <div id="stats"></div>
                <div id="hits"></div>

                <!--Breadcrumb and Page Show Start -->
                <div class="pagination-box fix mt-3">
                    {{-- Pagination --}}
                    <div id="pagination"></div>
                </div>
                <!--Breadcrumb and Page Show End -->
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>

<!-- Shop Page End -->
@endsection

@push('extra_js')
<script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.0.0/dist/algoliasearch-lite.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.0.0/dist/instantsearch.production.min.js"></script>
<script src="js/algolia-instantsearch.js"></script>
@endpush