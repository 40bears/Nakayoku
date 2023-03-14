@extends('layout.user')
@section('title', 'Edit CII Banks | CII')
@section('main-container')

<div class="col-md-9 col-sm-12 ps-5 common-space">
    <h3 class="pb-5 signup-h3 text-center">Admin Section</h3>
    <div class="menu menu-1 pt-4">
        <ul class="navbar-nav scroll">
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('notification-mmt') ? 'active' : '' }}" href="{{ route('notification-mmt') }}">Notification Portal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('view-games') ? 'active' : '' }}" href="{{ route('view-games') }}">Game List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('id-approvals') ? 'active' : '' }}" href="{{ route('id-approvals') }}">Id Approvals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('cii-bank-accounts') || Route::is('edit-cii-bank-account') || Route::is('add-cii-bank-account') ? 'active' : '' }}" href="{{ route('cii-bank-accounts') }}">CII Bank Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('transactions-management') ? 'active' : '' }}" href="{{ route('transactions-management') }}">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('withdraw-requests-management') ? 'active' : '' }}" href="{{ route('withdraw-requests-management') }}">Withdraw Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('view-pages') ? 'active' : '' }}" href="{{ route('view-pages') }}">USer Guide Pages</a>
            </li>
        </ul> 
    </div>
    <hr class="pb-5" />

<div class="container sp-100 w-80">
    <div class="d-flex flex-column justify-content-start align-items-start">

    <h3 class="pb-3 head-h3">Edit Bank Accounts</h3>
    <p class="select-game">
        Make sure, if you change bank account, Please change it in both the languages.
    </p>

    <!-- Felis bank accounts dropdown -->
    <label class="signup-lbl pb-2 mt-3">Bank Name</label>
    <form action="{{ route('edit-cii-bank-account', [ 'id' => $bankAccount->id ] ) }}" class="w-100 mb-4" id="changeBankForm">
        <label for="exampleFormControlSelect1" class="d-none">Select</label>
        <select class="select-2 buy-p w-100 minimal-1 changeBankSelect" id="exampleFormControlSelect1" name="felis_bank">
            @foreach ($felisBankAccounts as $felisBankAccount)
            <option value="{{$felisBankAccount->id}}" {{$felisBankAccount->id == $bankAccount->id ? 'selected' : ''}}>{{$felisBankAccount->bank_name}} -- {{$felisBankAccount->account_number}}</option>
            @endforeach
        </select>
    </form>

    <form action="" class="w-100 " method="POST">
        @csrf
        <div class="d-flex flex-column">
            <label class="signup-lbl pb-2 mt-3">Default Product</label>
            <label for="" class="d-none">Select</label>
            <select class="select-2 buy-p  minimal-1 changeBankSelect mb-4" id="" name="default_product">
                <option value="">No Default Product</option>
                <option value="ITEM" {{$bankAccount->default_product == "ITEM" ? 'selected' : ''}}>Item</option>
                <option value="CURRENCY" {{$bankAccount->default_product == "CURRENCY" ? 'selected' : ''}}>Currency</option>
                <option value="ACCOUNT" {{$bankAccount->default_product == "ACCOUNT" ? 'selected' : ''}}>Account</option>
            </select> <br>
        </div>

        <label class="head-h3 pb-5 align-self-start">English Email</label>


        <p class="signup-lbl mb-0 pb-2">Bank Name</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->bank_name != null ? $bankAccount->bank_name : '--'  : '--'}}</p>
                <input type="text" name="bank_name" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->bank_name != null ? $bankAccount->bank_name : ''  : ''}} "/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4">Account Type</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->account_type != null ? ($bankAccount->account_type == 'TIME_DEPOSIT' ? 'Time Deposit' : $bankAccount->account_type) : '--'  : '--'}}</p>
                <select name="account_type" class="bank-input english_account_type w-50 hide" id="textUpdate">
                    <option value="Savings" {{$bankAccount != null && $bankAccount->account_type == 'SAVINGS' ? 'selected' : ''}}>普通</option>
                    <option value="Current" {{$bankAccount != null && $bankAccount->account_type == 'CURRENT' ? 'selected' : ''}}>当座</option>
                </select>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4">Branch Name</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->branch_name != null ? $bankAccount->branch_name : '--'  : '--'}}</p>
                <input type="text" name="branch_name" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->branch_name != null ? $bankAccount->branch_name : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4">Branch Code</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between  py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->branch_code != null ? $bankAccount->branch_code : '--'  : '--'}}</p>
                <input type="text" name="branch_code" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->branch_code != null ? $bankAccount->branch_code : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4">Account Number</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->account_number != null ? $bankAccount->account_number : '--'  : '--'}}</p>
                <input type="number" name="account_number" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->account_number != null ? $bankAccount->account_number : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4 d-none">Swift Code</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between py-3 d-none">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->swift_code != null ? $bankAccount->swift_code : '--'  : '--'}}</p>
                <input type="text" name="swift_code" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->swift_code != null ? $bankAccount->swift_code : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr d-none" />

        <p class="signup-lbl mb-0 pb-2 pt-4">Account Name</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between  py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->account_name != null ? $bankAccount->account_name : '--'  : '--'}}</p>
                <input type="text" name="account_name" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->account_name != null ? $bankAccount->account_name : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class="drop-hr" />

        <label class="head-h3 pb-4 align-self-start mt-5 pt-3">Japanese Email</label>

        <p class="signup-lbl mb-0 pb-3 pt-4">銀行口座名</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between  py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->japanese_bank_name != null ? $bankAccount->japanese_bank_name : '--'  : '--'}}</p>
                <input type="text" name="japanese_bank_name" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->japanese_bank_name != null ? $bankAccount->japanese_bank_name : ''  : ''}} "/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4">口座タイプ</p>
        <hr class="drop-hr" />
        <div class="d-flex justify-content-between py-3">
                @if($bankAccount != null && $bankAccount->account_type == 'SAVINGS')
                <p class="min-p mb-0 pe-4" id="textLabel">普通</p>
                @elseif($bankAccount != null && $bankAccount->account_type == 'CURRENT')
                <p class="min-p mb-0 pe-4" id="textLabel">当座</p>
                @else
                <p class="min-p mb-0 pe-4" id="textLabel">定期</p>
                @endif
                <select name="japanese_account_type" class="bank-input japanese_account_type w-50 hide" id="textUpdate">
                    <option value="Savings" {{$bankAccount != null && $bankAccount->account_type == 'SAVINGS' ? 'selected' : ''}}>普通</option>
                    <option value="Current" {{$bankAccount != null && $bankAccount->account_type == 'CURRENT' ? 'selected' : ''}}>当座</option>
                    <option value="Time_deposit" {{$bankAccount != null && $bankAccount->account_type == 'TIME_DEPOSIT' ? 'selected' : ''}}>定期</option>
                </select>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4">支店名</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->japanese_branch_name != null ? $bankAccount->japanese_branch_name : '--'  : '--'}}</p>
                <input type="text" name="japanese_branch_name" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->japanese_branch_name != null ? $bankAccount->japanese_branch_name : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4">支店番号</p>
        <hr class="drop-hr" />
        <div class="d-flex justify-content-between py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->branch_code != null ? $bankAccount->branch_code : '--'  : '--'}}</p>
                <input type="text" name="branch_code" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->branch_code != null ? $bankAccount->branch_code : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class="drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4">口座番号</p>
        <hr class="drop-hr" />
        <div class="d-flex justify-content-between py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->account_number != null ? $bankAccount->account_number : '--'  : '--'}}</p>
                <input type="number" name="account_number" class="bank-input bg-transparent hide" id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->account_number != null ? $bankAccount->account_number : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class="drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4 d-none">スウィフトコード</p>
        <hr class="drop-hr d-none" />
        <div class="d-flex justify-content-between py-3 d-none">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->swift_code != null ? $bankAccount->swift_code : '--'  : '--'}}</p>
                <input type="text" name="swift_code" class="bank-input bg-transparent hide " id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->swift_code != null ? $bankAccount->swift_code : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" d-none drop-hr" />

        <p class="signup-lbl mb-0 pb-2 pt-4">口座名</p>
        <hr class=" drop-hr" />
        <div class="d-flex justify-content-between  py-3">
                <p class="min-p mb-0 pe-4" id="textLabel">{{ $bankAccount != null ? $bankAccount->japanese_account_name != null ? $bankAccount->japanese_account_name : '--'  : '--'}}</p>
                <input type="text" name="japanese_account_name" class="bank-input bg-transparent hide " id="textUpdate" value="{{ $bankAccount != null ? $bankAccount->japanese_account_name != null ? $bankAccount->japanese_account_name : ''  : ''}}"/>
                <a style="cursor: pointer;" id="edit" class="min-p show  pe-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
        </div>
        <hr class=" drop-hr" />

        <div class="d-flex flex-column align-items-center mt-5">

            @if(Route::is('edit-cii-bank-account'))
            <input type="submit" formaction="{{ route('update-cii-bank-account', [ 'id' => $bankAccount->id ] ) }}" class="signup-btn w-50 mb-4" id="update" name="update" value="Update" />
            @else
            <input type="submit" formaction="{{ route('add-cii-bank-account') }}" class="signup-btn w-50 mb-4" id="submit" name="submit" value="Submit" />
            @endif
            <a href="{{ route('cii-bank-accounts') }}" class="signup-a">back</a>

        </div>
    </form>
    </div>
</div>

<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection