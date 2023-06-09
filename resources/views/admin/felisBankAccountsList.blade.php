@extends('layout.user')
@section('title', 'Banks | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space">
    <h3 class="pb-5 signup-h3 padt-5">Bank Details</h3>

    <div class="d-flex justify-content-between align-items-center py-4 px-4 bank-wh mb-4">
        <h3 class="bank-h3">Bank Accounts</h3>
        <a class="nav-link view " href="{{route('add-cii-bank-account')}}">
            <i class="fa-solid fa-circle-plus me-2"></i>
            ADD ACCOUNT
        </a>
    </div>

    <div>
        @if(count($bankAccounts) != 0)
        <div class="row py-4">
        @foreach($bankAccounts as $bankAccount)
            <div class="col-md-12 col-sm-12 sp-mb mb-4">
                <div class="white-box bank-list-div d-flex justify-content-center">
                    <div class="col-4 text-center py-3">
                         <i class="fa-solid fa-building-columns bank-icon"></i>
                    </div>
                    <div class="col-8 bank-details">
                        <p class=" my-3 bank-name">{{$bankAccount->bank_name}}</p>
                        <div class="d-flex">
                            <p class=" mb-0 col-md-4 display bank-account-number">{{$bankAccount->account_number}}</p>
                            <p class=" mb-0 col-md-4 text-center display bank-update-date">{{$bankAccount->updated_at->format('d/m/Y')}}</p>
                            <form class="col-md-4" action="{{ route('change-default-cii-bank-account', [ 'id' => $bankAccount->id ] ) }}" id="default_bank_form">
                                <div class="d-flex justify-content-around">
                                    @if($bankAccount->default_product != null)
                                    <p class="min-p mb-0 pe-4" id="textLabel">({{Str::title($bankAccount->default_product)}})</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 ">
                        <a class="bank-edit-button" href="{{ route('edit-cii-bank-account', [ 'id' => $bankAccount->id ] ) }}">EDIT</a>
                        <a class="bank-delete-button" href="{{ route('delete-cii-bank-account', [ 'id' => $bankAccount->id ] ) }}" onclick="return confirm('Are you sure you want to delete this?')">DELETE</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        @else
        <div class="text-center">
            <h3 class="pb-5 border-0">No Bank Accounts Added</h3>
        </div>
        @endif

    </div>
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection