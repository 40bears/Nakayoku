@extends('layout.user')
@section('title', 'ID Approvals | CII')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 request-pad padt-5">
    <h3 class="pb-5 signup-h3">ID Approvals</h3>

    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('id-approvals-search') }}" method="POST" class="w-50 sp-100">
            <div class="d-flex">
                <div class="search-div-2">
                    @csrf
                    <input type="text" name="search" class="searchTerm-2" placeholder="Search" value="{{request()->search}}" />
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <a class="signup-a green mx-3" href="{{ route('id-approvals') }}">clear</a>
            </div>
        </form>
    </div>


    <div>
        @foreach($users as $user)
        <div class="row">
            <a href="{{ route('id-approval-document', [ 'id' => $user->id ] ) }}">
                <div class="d-flex align-items-center justify-content-between pb-3 pt-4">
                    <p class="product-name mb-0 col-md-3 col-sm-6">{{$user->display_name ? $user->display_name : $user->first_name . ' ' . $user->last_name}}</p>
                    <p class="product-name mb-0 col-md-3 text-center display">{{$user->document_type ? Str::title($user->document_type) : 'Not Uploaded'}}</p>
                    <p class="product-name mb-0 col-md-3 col-sm-3 text-center">{{ $user->updated_at ? $user->updated_at->format('Y/m/d') : '--'}}</p>
                    <div class="d-flex col-md-3 col-sm-3 ms-5 ml-0">
                        @if($user->document_verification === 'VERIFIED')
                        <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid me-2" alt="games" />
                        <p class="product-name mb-0 d-flex align-self-center">Verified</p>
                        @else
                        <img src="{{ url('assets/images/x-icon.svg') }}" class="img-fluid me-2" alt="games" />
                        <p class="product-name mb-0 d-flex align-self-center">Not Verified</p>
                        @endif

                    </div>
                </div>
            </a>
        </div>
        <hr class="drop-hr">
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{$users->links('partials.pagination')}}
    </div>
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection