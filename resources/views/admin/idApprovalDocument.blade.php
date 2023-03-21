@extends('layout.main')
@section('title', 'Identity Approval | CII')
@section('main-container')


{{-- Identity Verification Document starts --}}

<div class="container-fluid px-0 bg-lgreen py-5">

    <div class="container form-container-ID d-flex flex-column justify-content-center align-items-center pb-5 bank-info padt-5">

        <h3 class="border-0">Identity Verification</h3>

        <p class="profile-p">Your photo ID and actions captured during the ID verification process may constitute biometric data. Please see our Privacy Policy for more information about how we store and use your biometric data. Select ID type to proceed.</p>

        <input type="hidden" value="{{$user->document_type}}" id="document_type" name="document_type" />

        <!-- {{-- Radio starts --}} -->
        <div class="d-flex flex-column sp-identity justify-content-around pb-5">
            <div class="radiobuttons d-flex align-items-center align-self-center text-center pe-4">
                <div class="rdio rdio-primary radio-inline d-flex pe-4">
                    <input name="radio" value="1" id="radio1" type="radio" {{$user->document_type == 'passport' ? 'checked' : ''}}>
                    <label for="radio1" class="disabled {{$user->document_type == 'passport' ? 'lbl active' : ''}} " id="radio1-label"></label>
                </div>
                <div class="rdio rdio-primary radio-inline pb-4 {{$user->document_type !== 'passport' ? 'opacity' : ''}}" for="radio1" id="radio1-border">
                    <div class="d-flex justify-content-center align-items-center identity-div {{$user->document_type == 'passport' ? 'active' : ''}}">
                        <i class="fa-solid fa-passport passport "></i>
                    </div>
                </div>
                <div class="ps-3">
                    <label for="radio1" class="signup-lbl {{$user->document_type == 'passport' ?'lbl active' : ''}}" id="radio1-label">Passport</label>
                    <label for="radio1" class="disabled"></label>
                </div>
            </div>

            <div class="radiobuttons d-flex align-items-center align-self-center ps-5 ps-sm-0">
                    <div class="rdio rdio-primary radio-inline d-flex pe-4">
                        <input name="radio" value="2" id="radio2" type="radio" {{$user->document_type == 'driving_license' ? 'checked' : ''}}>
                    </div>
                    <div class="rdio rdio-primary radio-inline pb-4 {{$user->document_type !== 'driving_license' ? 'opacity' : ''}}" for="radio2" id="radio2-border">
                        <div class="d-flex justify-content-center align-items-center identity-div {{$user->document_type == 'driving_license' ? 'active' : ''}}">
                            <i class="fa-solid fa-id-card license {{$user->document_type == 'driving_license' ? 'active' : ''}}"></i>
                        </div>
                    </div>
                    <div class="ps-3">
                        <label for="radio2" class="signup-lbl {{$user->document_type == 'driving_license' ? 'lbl active' : ''}}" id="radio2-label">Driver’s License</label>
                    </div>
            </div>
        </div>
        <!-- {{-- Radio ends --}} -->

        <!-- Image select starts -->
        <div class="d-flex flex-column flex-md-row justify-content-around pb-5 w-80">
            <!-- {{-- Lefts side starts --}} -->
            <div class="document-div d-flex justify-content-center align-items-center me-3 w-45">
                @if($user->document == null)
                <img src="{{ url('assets/images/document-image.svg') }}" class="img-fluid" alt="document" />
                @else
                <img src="{{ url('storage/uploads/' . $user->document ) }}" class="img-fluid document-img" alt="document" />
                @endif
            </div>
            @if($user->document_type == 'driving_license')
            @if($user->document_two == null)
            <div class="document-div d-flex justify-content-center align-items-center me-3 w-45 default-id-border">
                <img src="{{ url('assets/images/document-image.svg') }}" class="img-fluid" alt="document" />
            </div>
            @else
            <div class="document-div d-flex justify-content-center align-items-center me-3 w-45">
                <img src="{{ url('storage/uploads/' . $user->document_two ) }}" class="img-fluid document-img" alt="document" />
            </div>
                @endif
            @endif
        </div>
        <!-- Image select ends -->

        <div class="radiobuttons d-flex flex-column align-items-center">
            <div class="pb-3">
                <label for="radio3" class="buy-p lbl active" id="radio3-label">Residence Certificate</label>
            </div>
            <div class="rdio rdio-primary radio-inline pb-4" for="radio3" id="radio3-border">
                <div class="d-flex justify-content-center align-items-center identity-div active">
                    <img src="{{ url('assets/images/others.svg') }}" class="img-fluid" alt="others" />
                </div>
            </div>
            <div class="rdio rdio-primary radio-inline d-flex">
                <!-- <input name="radio" value="3" id="radio3" type="radio">
                    <label for="radio3" class="disabled"></label> -->
            </div>
        </div>

        <div class="w-80 d-flex justify-content-center">
            @if($user->residence_certificate == null)
            <div class="document-div d-flex justify-content-center align-items-center me-3 w-45 default-id-border">
                <img src="{{ url('assets/images/document-image.svg') }}" class="img-fluid" alt="document" />
            </div>
            @else
            <div class="document-div d-flex justify-content-center align-items-center me-3 w-45">
                <img src="{{ url('storage/uploads/' . $user->residence_certificate ) }}" class="img-fluid document-img" alt="document" />
            </div>
            @endif
        </div>

        @if($user->document == null && $user->document_type == null)
        <div class="d-flex flex-column align-items-center pt-5">
            <p class="profile-p">Document has not been uploaded yet by the user</p>
            <a href="{{ route('id-approvals') }}" class="request-a py-2 ">Back</a>
        </div>
        @else
        <div class="d-flex flex-row align-items-center pt-5">
            <a class="signup-btn me-2 signup-btn-sp-padding" href="{{ route('id-approval-status', [ 'id' => $user->id, 'approval' => 1 ] ) }}">
                Approve
            </a>
            <a class="signup-btn bg-danger ms-2 signup-btn-sp-padding" href="{{ route('id-approval-status', [ 'id' => $user->id, 'approval' => 0 ] ) }}">
                Don't Approve
            </a>
        </div>
        @endif
    </div>

</div>
{{-- Identity Verification Document ends --}}

@endsection