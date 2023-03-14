@extends('layout.main')
@section('title', 'Identity Verification | CII')
@section('main-container')


<!-- {{-- Identity Verification Document starts --}} -->

<div class="container-fluid px-0 bg-lgreen pb-5 padt-6">

    <div class="container form-container-ID d-flex flex-column justify-content-center align-items-center py-5 bank-info">

        <h3 class="signup-h3">Identity Verification</h3>

        <p class="select-game pt-4">Your photo ID and actions captured during the ID verification process may constitute biometric data. Please see our Privacy Policy for more information about how we store and use your biometric data. Select ID type to proceed.</p>

        <form action="{{ route('identity-verification-document-post', ['id' => Auth::id() ]) }}" method="POST" class="pt-5 form-container-ID" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{Auth::user()->document_type != null ? Auth::user()->document_type : 'passport' }}" id="document_type" name="document_type" />

            <!-- {{-- Radio starts --}} -->
            <div class="d-flex flex-column sp-identity  pb-5">
                <div class="radiobuttons d-flex align-items-center align-self-center text-center pe-4">
                    <div class="rdio rdio-primary radio-inline d-flex pe-4">
                        <input name="radio" value="1" id="radio1" type="radio" {{Auth::user()->document_type == 'passport' ?'checked' : ''}}>
                        <label for="radio1" class="disabled"></label>
                    </div>
                    <div class="rdio rdio-primary radio-inline pb-4 {{Auth::user()->document_type !== 'passport' ? 'opacity' : ''}}" for="radio1" id="radio1-border">
                        <div class="d-flex justify-content-center align-items-center identity-div {{Auth::user()->document_type == 'passport' ? 'active' : ''}}">
                            <i class="fa-solid fa-passport passport {{Auth::user()->document_type == 'passport' ? 'active' : ''}}"></i>
                        </div>
                    </div>
                    <div class="ps-3">
                        <label for="radio1" class="signup-lbl {{Auth::user()->document_type == 'passport' ?'lbl active' : ''}}" id="radio1-label">Passport</label>
                    </div>
                </div>

                <div class="radiobuttons d-flex align-items-center align-self-center ps-5">
                    <div class="rdio rdio-primary radio-inline d-flex pe-4">
                        <input name="radio" value="2" id="radio2" type="radio" {{Auth::user()->document_type == 'driving_license' ? 'checked' : ''}}>
                        <label for="radio2" class="disabled"></label>
                    </div>
                    <div class="rdio rdio-primary radio-inline pb-4 {{Auth::user()->document_type !== 'driving_license' ? 'opacity' : ''}}" for="radio2" id="radio2-border">
                        <div class="d-flex justify-content-center align-items-center identity-div {{Auth::user()->document_type == 'driving_license' ? 'active' : ''}}">
                            <i class="fa-solid fa-id-card license {{Auth::user()->document_type == 'driving_license' ? 'active' : ''}}"></i>
                        </div>
                    </div>
                    <div class="ps-3">
                        <label for="radio2" class="signup-lbl {{Auth::user()->document_type == 'driving_license' ? 'lbl active' : ''}}" id="radio2-label">Driver’s License</label>
                    </div>
                </div>
            </div>
            <!-- {{-- Radio ends --}} -->

            <div class="d-flex justify-content-center gap-5 flex-column flex-md-row">
            <!-- Image select starts -->
            <div class="d-flex flex-column sp-identity justify-content-around pb-5 w-45 upload-game-img">
                <!-- {{-- Right side starts --}} -->
                <div class="d-flex flex-column justify-content-center">
                    <p class="signup-lbl pb-2">Upload image</p>

                    <div class="d-flex flex-column image-box image-select-div bg-white {{ Auth::user()->document != null ? 'hide' : '' }} ">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ url('assets/images/img-upload.svg') }}" class="img-fluid upload-img" alt="upload" />
                            <span class="profile-p text-center py-3">Upload image</span>
                            <label for="image-upload" class="custom-file-upload">
                                <span class="browse-txt">Browse</span>
                            </label>
                            <input type="file" name="image1" id="image-upload">
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center image-box image-preview-div {{ Auth::user()->document == null ? 'hide' : '' }}">
                        @if(Auth::user()->document == null)
                        <img src="" class="upload-game-img" id="image-upload-preview" alt="">
                        @else
                        <img src="{{ url('storage/uploads/' . Auth::user()->document ) }}" class="upload-game-img" id="image-upload-preview">
                        @endif
                    </div>
                    <p class="image-preview-para">Please select JPG or PNG files under 3 MB. Square photos are recommended. Changes will not take effect until you save</p>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="request-a remove-uploaded-pic px-4 py-2 text-end image-preview-delete-button">Delete</a>
                    </div>
                </div>
                <!-- {{-- Right side ends --}} -->
            </div>
            <!-- Image select ends -->


            <!--2nd Image select starts -->
            <div class="d-flex flex-column sp-identity justify-content-around pb-5 w-45  upload-game-img {{Auth::user()->document_type !== 'driving_license' ? 'hide' : ''}}" id="second-document">
                <!-- {{-- Right side starts --}} -->
                <div class="d-flex flex-column justify-content-center">
                    <p class="signup-lbl pb-2">Upload image</p>

                    <div class="d-flex flex-column image-box image-select-div2 bg-white {{ Auth::user()->document != null ? 'hide' : '' }}">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ url('assets/images/img-upload.svg') }}" class="img-fluid upload-img" alt="upload" />
                            <span class="profile-p text-center py-3">Upload image</span>
                            <label for="image-upload2" class="custom-file-upload-2">
                                <span class="browse-txt">Browse</span>
                            </label>
                            <input type="file" name="image2" id="image-upload2">
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center image-box image-preview-div2 {{ Auth::user()->document == null ? 'hide' : '' }}">
                        @if(Auth::user()->document == null)
                        <img src="" class="upload-game-img" id="image-upload-preview2" alt="document">
                        @else
                        <img src="{{ url('storage/uploads/' . Auth::user()->document_two ) }}" class="upload-game-img" id="image-upload-preview2" alt="document">
                        @endif
                    </div>
                    <p class="image-preview-para">Please select JPG or PNG files under 3 MB. Square photos are recommended. Changes will not take effect until you save</p>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="request-a remove-uploaded-pic2 px-4 py-2 text-end image-preview-delete-button">Delete</a>
                    </div>
                </div>
                <!-- {{-- Right side ends --}} -->
            </div>
            <!--2nd Image select ends -->
            </div>

            @if($errors->has('image1'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('image1')}}</p>
            </div>
            @endif

            <!-- Residential certificate starts -->
            <div class="d-flex sp-identity justify-content-around pb-5">
                <div class="radiobuttons d-flex flex-column align-items-center align-self-center">
                    <div class="pb-3">
                        <label for="radio3" class="buy-p lbl active" id="radio3-label">Certificate of residence</label>
                    </div>
                    <div class="rdio rdio-primary radio-inline pb-4" for="radio3" id="radio3-border">
                        <div class="d-flex justify-content-center align-items-center identity-div active">
                            <img src="{{ url('assets/images/others.svg') }}" class="img-fluid" alt="others" />
                        </div>
                    </div>
                    <!-- <div class="rdio rdio-primary radio-inline d-flex">
                        <input name="radio" value="3" id="radio3" type="radio" class="checked-radio">
                        <label for="radio3" class="disabled"></label>
                    </div> -->
                </div>
            </div>

            <div class="d-flex sp-identity justify-content-around pb-5">
                <!-- {{-- Right side starts --}} -->
                <div class="d-flex flex-column justify-content-center w-45 upload-game-img">
                    <p class="signup-lbl pb-2">Upload image</p>

                    <div class="d-flex flex-column image-box image-select-div3 bg-white {{ Auth::user()->document != null ? 'hide' : '' }}">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ url('assets/images/img-upload.svg') }}" class="img-fluid upload-img" alt="upload" />
                            <span class="profile-p text-center py-3">Upload image</span>
                            <label for="image-upload3" class="custom-file-upload-2">
                                <span class="browse-txt">Browse</span>
                            </label>
                            <input type="file" name="image3" id="image-upload3">
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center image-box image-preview-div3 {{ Auth::user()->document == null ? 'hide' : '' }}">
                        @if(Auth::user()->document == null)
                        <img src="" class="upload-game-img" id="image-upload-preview3" alt="document">
                        @else
                        <img src="{{ url('storage/uploads/' . Auth::user()->residence_certificate ) }}" class="upload-game-img" id="image-upload-preview3" alt="document">
                        @endif
                    </div>
                    <p class="image-preview-para">Please select JPG or PNG files under 3 MB. Square photos are recommended. Changes will not take effect until you save</p>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="request-a remove-uploaded-pic3 px-4 py-2 text-end image-preview-delete-button">Delete</a>
                    </div>
                </div>
                <!-- {{-- Right side ends --}} -->
            </div>

            @if($errors->has('image3'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('image3')}}</p>
            </div>
            @endif

            <!-- Residential certificate ends -->

            <div class="d-flex flex-column align-items-center pt-5">
                <input type="submit" class="signup-btn w-50" id="upload" name="upload" value="Upload" />
            </div>
        </form>
    </div>

</div>
<!-- {{-- Identity Verification Document ends --}} -->

@endsection