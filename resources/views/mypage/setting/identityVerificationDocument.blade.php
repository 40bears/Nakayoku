@extends('layout.main')
@section('title', 'Identity Verification | CII')
@section('main-container')


<!-- {{-- Identity Verification Document starts --}} -->

<div class="container-fluid px-0 bg-lgreen pb-5 padt-6">
    <div class="row">
        <div class="col-md-3 col-12 py-5 px-5">
            <div class="d-flex justify-content-start align-items-center id-select-passport-div">
                <div class="{{Auth::user()->document_type == 'passport' ? 'active-document-border' : ''}} " style=""></div>
                <div class="d-flex justify-content-start align-items-center ps-2 pe-4 py-1 passport-icon-div">
                    <i class="fa-solid fa-passport passport {{Auth::user()->document_type == 'passport' ? 'active' : ''}}"></i>
                    <p class="text-light mb-0 ms-3">Passport</p>
                </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3 id-select-driving-license-div">
                <div class="{{Auth::user()->document_type == 'driving_license' ? 'active-document-border' : ''}} " style=""></div>
                <div class="d-flex justify-content-start align-items-center ps-2 pe-4 py-1 license-icon-div">
                    <i class="fa-solid fa-id-card license {{Auth::user()->document_type == 'driving_license' ? 'active' : ''}}"></i>
                    <p class="text-light mb-0 ms-3">Driving License</p>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-12 container d-flex flex-column justify-content-center align-items-center py-5 px-5 bank-info">
    
            <h3 class="signup-h3">IDENTITY VERIFICATION</h3>
    
            <p class="select-game pt-4">Your photo ID and actions captured during the ID verification process may constitute biometric data. Please see our Privacy Policy for more information about how we store and use your biometric data. Select ID type to proceed.</p>
    
            <form action="{{ route('identity-verification-document-post', ['id' => Auth::id() ]) }}" method="POST" class="pt-5 form-container-ID" enctype="multipart/form-data">
                @csrf
    
                <input type="hidden" value="{{Auth::user()->document_type != null ? Auth::user()->document_type : 'passport' }}" id="document_type" name="document_type" />
    
    
                <div class="d-flex justify-content-center gap-5 flex-column flex-md-row">
                <!-- Image select starts -->
                <input type="checkbox" name="document-1-delete" class="document-1-delete" id="" hidden>
                <div class="d-flex flex-column sp-identity justify-content-around pb-5 w-45 upload-game-img">
                    <!-- {{-- Right side starts --}} -->
                    <div class="d-flex flex-column justify-content-center">
                        <p class="signup-lbl pb-2">Upload image</p>
    
                        <div class="d-flex flex-column image-box image-select-div  {{ Auth::user()->document != null ? 'hide' : '' }} ">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center">
                                <img src="{{ url('assets/images/img-upload-2.svg') }}" class="img-fluid upload-img" alt="upload" />
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
    
                        <div class="d-flex flex-column image-box image-select-div2  {{ Auth::user()->document_two != null ? 'hide' : '' }}">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center">
                                <img src="{{ url('assets/images/img-upload-2.svg') }}" class="img-fluid upload-img" alt="upload" />
                                <span class="profile-p text-center py-3">Upload image</span>
                                <label for="image-upload2" class="custom-file-upload-2">
                                    <span class="browse-txt">Browse</span>
                                </label>
                                <input type="file" name="image2" id="image-upload2">
                            </div>
                        </div>
    
                        <div class="d-flex flex-column align-items-center image-box image-preview-div2 {{ Auth::user()->document_two == null ? 'hide' : '' }}">
                            @if(Auth::user()->document_two == null)
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
    
                @if($errors->has('image2'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('image2')}}</p>
                </div>
                @endif
    
                <!-- Residential certificate starts -->
                <div class="d-flex sp-identity justify-content-around pb-5">
                    <div class="radiobuttons d-flex align-items-center align-self-center">
                        <div class="d-flex rdio rdio-primary radio-inline pb-4" for="radio3" id="radio3-border">
                            <div class="d-flex justify-content-center align-items-center identity-div active p-2">
                                <img src="{{ url('assets/images/residence-certificate-icon.png') }}" class="img-fluid" alt="others" />
                            </div>
                            <div class="residence-certificate-label">
                                <label for="radio3" class="buy-p lbl active " id="radio3-label">Certificate of residence</label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="checkbox" name="document-2-delete" class="document-2-delete" id="" hidden>
                <input type="checkbox" name="document-3-delete" class="document-3-delete" id="" hidden>
                <div class="d-flex sp-identity justify-content-around pb-5">
                    <!-- {{-- Right side starts --}} -->
                    <div class="d-flex flex-column justify-content-center w-45 upload-game-img">
                        <p class="signup-lbl pb-2">Upload image</p>
    
                        <div class="d-flex flex-column image-box image-select-div3  {{ Auth::user()->residence_certificate != null ? 'hide' : '' }}">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center">
                                <img src="{{ url('assets/images/img-upload-2.svg') }}" class="img-fluid upload-img" alt="upload" />
                                <span class="profile-p text-center py-3">Upload image</span>
                                <label for="image-upload3" class="custom-file-upload-2">
                                    <span class="browse-txt">Browse</span>
                                </label>
                                <input type="file" name="image3" id="image-upload3">
                            </div>
                        </div>
    
                        <div class="d-flex flex-column align-items-center image-box image-preview-div3 {{ Auth::user()->residence_certificate == null ? 'hide' : '' }}">
                            @if(Auth::user()->residence_certificate == null)
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

</div>
<!-- {{-- Identity Verification Document ends --}} -->

@endsection