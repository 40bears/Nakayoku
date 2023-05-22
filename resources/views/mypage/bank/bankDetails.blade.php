@extends('layout.user')
@section('title', 'Bank Details | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space">


    <!-- Bank info starts -->
    <div class="container sp-100 w-80 padt-5">
        <div class="d-flex flex-column justify-content-start align-items-start">
            <h3 class="pb-5 signup-h3 text-center">Bank Info</h3>
        <form action="{{ route('update-bank-details') }}" method="POST">
            @csrf
            <div class="d-flex flex-column align-items-start">

                {{-- <div class="d-flex justify-content-between w-input py-4">
                    <p class="signup-lbl mb-0">Bank</p>
                    <div class="d-flex justify-content-around">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->bank_name != null ? $bankAccount->bank_name : '--'  : '--'}}</p>
                        <input type="text" name="bank_name" autocomplete="off" class="hide bank_name" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->bank_name != null ? $bankAccount->bank_name : ''  : ''}} " />
                        <a style="cursor: pointer;" id="edit" class="min-p show green pe-2">
                        <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <img src="{{ url('assets/images/edit-icon.png') }}" class="img-fluid" alt="edit" />
                    </div>
                </div> --}}


                    <p class="signup-lbl mb-0 pt-5 pb-3">Bank</p>
                    <div class="d-flex justify-content-between bg-bank w-100 px-2 py-3">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->bank_name != null ? $bankAccount->bank_name : '--'  : '--'}}</p>
                        <input type="text" name="bank_name" autocomplete="off" class=" bank_name bank-input hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->bank_name != null ? $bankAccount->bank_name : '--'  : '--'}} " />
                        <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </div>

                    <p class="signup-lbl mb-0 py-3">Account type</p>    
                    <div class="d-flex justify-content-between w-input py-3 px-2 bg-bank w-100">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? ($bankAccount->account_type != null ? ($bankAccount->account_type == 'Savings' ? '普通' : '当座') : '--')  : '--'}}</p>
                        <select name="account_type" class="bank-input w-80 hide" id="textUpdate" >
                            <option value="Savings" {{$bankAccount != null && $bankAccount->account_type == 'Savings' ? 'selected' : ''}}>普通</option>
                            <option value="Current" {{$bankAccount != null && $bankAccount->account_type == 'Current' ? 'selected' : ''}}>当座</option>
                        </select>
                            <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                    </div>

                <p class="signup-lbl mb-0 py-3">Branch code</p>
                <div class="d-flex justify-content-between w-input py-3 px-2 bg-bank w-100">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->branch_code != null ? $bankAccount->branch_code : '--'  : '--'}}</p>
                        <input type="text" name="branch_code" class="bank-input hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->branch_code != null ? $bankAccount->branch_code : '--'  : '--'}}" />
                        <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                </div>

                <p class="signup-lbl mb-0 py-3">Account Number</p>
                <div class="d-flex justify-content-between w-input py-3 px-2 bg-bank w-100">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->account_number != null ? $bankAccount->account_number : '--'  : '--'}}</p>
                        <input type="number" name="account_number" class="bank-input hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->account_number != null ? $bankAccount->account_number : '--'  : '--'}}" />
                        <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                </div>

                <p class="signup-lbl mb-0 py-3 d-none">Swift Code</p>
                <div class="d-flex justify-content-between w-input w-100 py-3 px-2 bg-bank d-none">
                        {{-- <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->swift_code != null ? $bankAccount->swift_code : '--'  : '--'}}</p> --}}
                        <input type="text" name="swift_code" class="bank-input " id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->swift_code != null ? $bankAccount->swift_code : '--'  : '--'}}" />
                        <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                </div>

                <p class="signup-lbl mb-0 py-3">Name In Bank</p>
                <div class="d-flex justify-content-between w-input py-3 px-2 w-100 bg-bank">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->account_name != null ? $bankAccount->account_name : '--'  : '--'}}</p>
                        <input type="text" name="account_name" class="bank-input hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->account_name != null ? $bankAccount->account_name : '--'  : '--'}}" />
                        <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                </div>

                <label class="signup-lbl pb-3 align-self-start pt-5">Important Notice</label>
                <p class="select-game">
                    1. If the payee is incorrect, <span>the transfer fee will be charged again.</span> <br><br>

                    2. If the registered name does not match the name on the account to which the sales proceeds (or balance) will be transferred, you will not be able to apply for the transfer. If the registered name and the name of the account to which the sales proceeds (or balance) will be transferred do not match, the transfer cannot be applied for.<br><br>

                    3. Only accounts in your own name can be used for transfers. If the name on the account is your maiden name, please change it to your new name. If the name on the account is your maiden name, please change the name and apply for a new account.
                </p>
            </div>

            <div class="d-flex flex-column align-items-center">
                <input type="submit" class="signup-btn w-50" id="update" name="update" value="UPDATE" />
            </div>
        </form>
        </div>
    </div>
    <!-- Bank info ends -->
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection