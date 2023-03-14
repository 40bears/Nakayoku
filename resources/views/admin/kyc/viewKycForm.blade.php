@extends('layout.main')
@section('title', 'Identity Verification | CII')
@section('main-container')


<!-- {{-- Identity Verification Document starts --}} -->

<div class="container-fluid px-0 bg-lgreen py-5">

    <div class="container form-container-ID d-flex flex-column justify-content-center align-items-center pb-5 bank-info padt-5">

        <h3 class="border-0">Identity Verification</h3>

        <p class="profile-p">Your photo ID and actions captured during the ID verification process may constitute biometric data. Please see our Privacy Policy for more information about how we store and use your biometric data. Select ID type to proceed.</p>

        <form action="{{ route('user-kyc') }}" method="POST" class="pt-5 form-container-ID" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="passport" id="document_type" name="document_type" />
            <input type="hidden" value="{{$email}}" id="email" name="email" />

            <!-- {{-- Radio starts --}} -->
            <div class="d-flex flex-column sp-identity justify-content-around pb-5">
                <div class="radiobuttons d-flex align-items-center align-self-center text-center pe-4">
                    <div class="rdio rdio-primary radio-inline d-flex pe-4">
                        <input name="radio" value="1" id="radio1" type="radio" checked>
                        <label for="radio1" class="disabled"></label>
                    </div>
                    <div class="rdio rdio-primary radio-inline pb-4 " for="radio1" id="radio1-border">
                        <div class="d-flex justify-content-center align-items-center identity-div ">
                            <i class="fa-solid fa-passport passport "></i>
                        </div>
                    </div>
                    <div class="ps-3">
                        <label for="radio1" class="signup-lbl " id="radio1-label">Passport</label>
                    </div>
                </div>

                <div class="radiobuttons d-flex align-items-center align-self-center ps-5">
                    <div class="rdio rdio-primary radio-inline d-flex pe-4">
                        <input name="radio" value="2" id="radio2" type="radio">
                        <label for="radio2" class="disabled"></label>
                    </div>
                    <div class="rdio rdio-primary radio-inline pb-4 " for="radio2" id="radio2-border">
                        <div class="d-flex justify-content-center align-items-center identity-div ">
                            <i class="fa-solid fa-id-card license "></i>
                        </div>
                    </div>
                    <div class="ps-3">
                        <label for="radio2" class="signup-lbl " id="radio2-label">Driver’s License</label>
                    </div>
                </div>
            </div>
            <!-- {{-- Radio ends --}} -->
            @if($errors->has('document_type'))
            <div class="d-flex align-items-center justify-content-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('document_type')}}</p>
            </div>
            @endif

            <div class="d-flex justify-content-center gap-5">
            <!-- Image select starts -->
            <!-- {{--Right side starts--}} -->
            <div class="d-flex flex-column sp-identity justify-content-around pb-5 w-45">
                <div class="d-flex flex-column justify-content-center">
                    <p class="signup-lbl pb-2">Upload image</p>

                    <div class="d-flex flex-column image-box image-select-div bg-white ">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ url('assets/images/img-upload.svg') }}" class="img-fluid upload-img" alt="upload" />
                            <span class="profile-p text-center py-3">Upload image</span>
                            <label for="image-upload" class="custom-file-upload">
                                <span class="browse-txt">Browse</span>
                            </label>
                            <input type="file" name="document" id="image-upload">
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center image-box image-preview-div hide">
                        <img src="" class="upload-game-img" id="image-upload-preview" alt="">
                    </div>
                    <p class="image-preview-para">Please select JPG or PNG files under 3 MB. Square photos are recommended. Changes will not take effect until you save</p>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="request-a remove-uploaded-pic px-4 py-2 text-end image-preview-delete-button">Delete</a>
                    </div>
                </div>
                <!-- {{-- Right side ends --}} -->
            </div>
            @if($errors->has('document'))
            <div class="d-flex align-items-center ">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('document')}}</p>
            </div>
            @endif
            <!-- Image select ends -->

            <!--2nd Image select starts -->
            <div class="d-flex flex-column sp-identity justify-content-around pb-5 w-45 hide" id="second-document">
                <!-- {{-- Right side starts --}} -->
                <div class="d-flex flex-column justify-content-center ">
                    <p class="signup-lbl pb-2">Upload image</p>

                    <div class="d-flex flex-column image-box image-select-div2 bg-white">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ url('assets/images/img-upload.svg') }}" class="img-fluid upload-img" alt="upload" />
                            <span class="profile-p text-center py-3">Upload image</span>
                            <label for="image-upload2" class="custom-file-upload-2">
                                <span class="browse-txt">Browse</span>
                            </label>
                            <input type="file" name="document2" id="image-upload2">
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center image-box image-preview-div2 hide">
                        <img src="" class="upload-game-img" id="image-upload-preview2" alt="document">
                    </div>
                    <p class="image-preview-para">Please select JPG or PNG files under 3 MB. Square photos are recommended. Changes will not take effect until you save</p>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="request-a remove-uploaded-pic2 px-4 py-2 text-end image-preview-delete-button">Delete</a>
                    </div>
                </div>
                <!-- {{-- Right side ends --}} -->
            </div>
            </div>
            @if($errors->has('document_two'))
            <div class="d-flex align-items-center justify-content-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('document_two')}}</p>
            </div>
            @endif
            <!--2nd Image select ends -->


            <div class="d-flex sp-identity justify-content-around pb-5">
                <div class="radiobuttons d-flex flex-column align-items-center">
                    <div class="pb-3">
                        <label for="radio3" class="buy-p lbl active" id="radio3-label">Certificate of residence</label>
                    </div>
                    <div class="rdio rdio-primary radio-inline pb-4" for="radio3" id="radio3-border">
                        <div class="d-flex justify-content-center align-items-center identity-div active">
                            <img src="{{ url('assets/images/others.svg') }}" class="img-fluid" alt="others" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex sp-identity justify-content-around pb-5">
                <!-- {{-- Right side starts --}} -->
                <div class="d-flex flex-column justify-content-center w-45">
                    <p class="signup-lbl pb-2">Upload image</p>

                    <div class="d-flex flex-column image-box image-select-div3 bg-white">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ url('assets/images/img-upload.svg') }}" class="img-fluid upload-img" alt="upload" />
                            <span class="profile-p text-center py-3">Upload image</span>
                            <label for="image-upload3" class="custom-file-upload-2">
                                <span class="browse-txt">Browse</span>
                            </label>
                            <input type="file" name="document3" id="image-upload3">
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center image-box image-preview-div3 hide">
                        <img src="" class="upload-game-img" id="image-upload-preview3" alt="document">
                    </div>
                    <p class="image-preview-para">Please select JPG or PNG files under 3 MB. Square photos are recommended. Changes will not take effect until you save</p>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="request-a remove-uploaded-pic3 px-4 py-2 text-end image-preview-delete-button">Delete</a>
                    </div>
                </div>
                <!-- {{-- Right side ends --}} -->
            </div>

            @if($errors->has('document3'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('document3')}}</p>
            </div>
            @endif

            <div class="d-flex flex-column align-items-center pt-5">
                <input type="submit" class="signup-btn w-50" id="upload" name="upload" value="Upload" />
            </div>
        </form>
    </div>

</div>
<!-- {{-- Identity Verification Document ends --}} -->

@endsection