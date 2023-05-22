@extends('layout.user')
@section('title', 'Identity Verification | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space">

    <!-- Identity Verification starts -->
    <div class="container d-flex flex-column justify-content-center align-items-center padt-5">
        <h3 class="pb-5 signup-h3 text-center">Identity Verification</h3>
        <form action="{{ route('identity-verification-document', [ 'id' => Auth::id() ] ) }}">
            <div class="pb-4 d-flex flex-column align-items-center">

                <div class="d-flex flex-column justify-content-center align-items-center w-input py-4">
                    @if(!Auth::user()->document && Auth::user()->document_verification === 'NOT_VERIFIED')
                    <img src="{{ url('assets/images/x-icon.svg') }}" class="img-fluid w-px" alt="cross" />
                    <p class="select-lbl mb-0">Not Verified</p>
                    @elseif(Auth::user()->document && Auth::user()->document_verification === 'NOT_VERIFIED')
                    <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid w-px" alt="cross" />
                    <p class="select-lbl mb-0">Pending Approval</p>
                    @else
                    <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid w-px" alt="right" />
                    <p class="select-lbl mb-0">Verified</p>
                    @endif
                </div>

            </div>

            <div class="d-flex flex-column align-items-center pt-3">
                <input type="submit" class="signup-btn w-100" id="update" name="update" value="PROCEED TO IDENTITY VERIFICATION" />
            </div>
        </form>
    </div>
    <!-- Identity Verification ends -->
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection