@extends('layout.user')
@section('title', 'Add CII Banks | CII')
@section('main-container')

<div class="col-md-9 col-sm-12 ps-5 request-pad padt-5">

<div class="container sp-100  d-flex flex-column justify-content-start align-items-center">
    <h3 class="pb-5 signup-h3 align-self-start">Bank Details</h3>
    <h3 class="border-0 mb-5 align-self-start select-lbl">Add Bank Account</h3>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="pb-4 d-flex flex-column">

            <label class="signup-lbl pb-2">Bank Name</label>
            <input type="text" class="signup-input" name="bank_name" id="bank_name" placeholder="Enter Bank Name" />
            @if($errors->has('bank_name'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('bank_name')}}</p>
            </div>
            @endif

            <label class="signup-lbl pb-2 mt-4">Bank Name in Japanese</label>
            <input type="text" class="signup-input" name="japanese_bank_name" id="japanese_bank_name" placeholder="Enter Bank Name in Japanese" />

            <label class="signup-lbl pb-2 mt-4">Swift Code</label>
            <input type="text" class="signup-input" name="swift_code" id="swift_code" placeholder="Enter Swift Code" value="{{ Route::is('edit-cii-bank-account') ? $bankAccount->swift_code : '' }}" />
            @if($errors->has('swift_code'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('swift_code')}}</p>
            </div>
            @endif

            <label class="signup-lbl pb-2 mt-4">Branch Name</label>
            <input type="text" class="signup-input" name="branch_name" id="branch_name" placeholder="Enter Branch Name" />
            @if($errors->has('branch_name'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('branch_name')}}</p>
            </div>
            @endif

            <label class="signup-lbl pb-2 mt-4">Branch Name in Japanese</label>
            <input type="text" class="signup-input" name="japanese_branch_name" id="japanese_branch_name" placeholder="Enter Branch Name" />

            <label class="signup-lbl pb-2 mt-4">Account Type</label>
            <div class="form-group">
                <label for="exampleFormControlSelect2" class="d-none" value="{{ Route::is('edit-cii-bank-account') ? $bankAccount->account_type : '' }}">Select</label>
                <select class="select-bank buy-p w-100 font-pswd " name="account_type" id="exampleFormControlSelect2">
                    <option value="">Please Select</option>
                    <option value="SAVINGS" {{Route::is('edit-cii-bank-account') ? $bankAccount->account_type == 'SAVINGS' ? 'selected' : '' : '' }}>Savings</option>
                    <option value="CURRENT" {{Route::is('edit-cii-bank-account') ? $bankAccount->account_type == 'CURRENT' ? 'selected' : '' : '' }}>Current</option>
                </select>
            </div>
            @if($errors->has('account_type'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('account_type')}}</p>
            </div>
            @endif

            <label class="signup-lbl pb-2 mt-4">Branch Code</label>
            <input type="text" class="signup-input" name="branch_code" id="branch_code" placeholder="Enter Branch Code" value="{{ Route::is('edit-cii-bank-account') ? $bankAccount->branch_code : '' }}" />
            @if($errors->has('branch_code'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('branch_code')}}</p>
            </div>
            @endif

            <label class="signup-lbl pb-2 mt-4">Account Number</label>
            <input type="number" class="signup-input" name="account_number" id="account_number" placeholder="Enter Account Number" value="{{ Route::is('edit-cii-bank-account') ? $bankAccount->account_number : '' }}" />
            @if($errors->has('account_number'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('account_number')}}</p>
            </div>
            @endif

            <label class="signup-lbl pb-2 mt-4">Account Name</label>
            <input type="text" class="signup-input" name="account_name" id="account_name" placeholder="Enter Account Name" />
            @if($errors->has('account_name'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('account_name')}}</p>
            </div>
            @endif

            <label class="signup-lbl pb-2 mt-4">Account Name in Japanese</label>
            <input type="text" class="signup-input" name="japanese_account_name" id="japanese_account_name" placeholder="Enter Account Name" />

        </div>

        <div class="d-flex flex-column align-items-center">

            <p class="select-game pb-4">Please be sure to check the “Prohibited Activities and Items to be Exhibited. Also, please agree to the Merchant Agreement and Privacy Policy before clicking the “Submit Button.”</p>
            @if(Route::is('edit-cii-bank-account'))
            <input type="submit" formaction="{{ route('update-cii-bank-account', [ 'id' => $bankAccount->id ] ) }}" class="signup-btn w-100 mb-4" id="update" name="update" value="Update" />
            @else
            <input type="submit" formaction="{{ route('add-cii-bank-account') }}" class="signup-btn w-50 mb-4" id="submit" name="submit" value="SUBMIT" />
            @endif
            <a href="{{ route('cii-bank-accounts') }}" class="signup-a">back</a>

        </div>
    </form>
</div>

<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection