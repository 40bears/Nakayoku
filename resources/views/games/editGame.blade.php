@extends('layout.main')
@section('title', 'Edit Game | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Sell item starts -->
<div class="container-fluid px-0 bg-lgreen py-5">

    <div class="container">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('add-game') }}">Sell New</a></li>
        </ul>

        {{-- <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid" alt="goback" />
        <a href="/" class="go-back ps-3"> GO BACK</a> --}}
    </div>

    <div class="container form-container d-flex flex-column justify-content-center align-items-center pcontact">

        <h3 class="signup-h3 pb-4">Edit Game</h3>
        <div class="signup-box w-100">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="pb-4 d-flex flex-column">

                    <label class="signup-lbl py-2">Game Name</label>
                    <input type="text" class="signup-input" name="name" id="platforms" placeholder="GRAND THEFT AUTO V" value="{{ Route::is('edit-game') ? $game->name : ''}}" />
                    @if($errors->has('name'))
                    <div class="d-flex align-items-center">
                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p">{{$errors->first('name')}}</p>
                    </div>
                    @endif

                    <label class="signup-lbl pb-2 pt-4">Game Category</label>
                    <select class="select-bank select-game w-100" name="category" id="exampleFormControlSelect3" value="{{ Route::is('edit-game') ? $game->device : ''}}">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{Route::is('edit-game') ? $game->category_id == $category->id ? 'selected' : '' : ''}}>{{Str::upper($category->name)}}</option>
                        @endforeach
                        <option value="other">OTHER</option>
                    </select>
                    @if($errors->has('category'))
                    <div class="d-flex align-items-center">
                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p">{{$errors->first('category')}}</p>
                    </div>
                    @endif
                    
                    <div id="otherCategoryInput" class="d-flex flex-column hide">
                        <label class="signup-lbl pb-2 pt-4">Add new category</label>
                        <input type="text" class="signup-input" name="other_category" placeholder="Add a category" />
                    </div>

                    <label class="signup-lbl pb-2 pt-4">Device</label>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2" class="d-none">Select</label>
                        <select class="select-bank select-game w-100" name="device" id="exampleFormControlSelect2" value="{{ Route::is('edit-game') ? $game->device : ''}}">
                            @foreach($devices as $device)
                            <option value="{{$device->id}}" {{Route::is('edit-game') ? $game->device == $device->id ? 'selected' : '' : ''}}>{{Str::upper($device->name)}}</option>
                            @endforeach
                            <option value="other">OTHER</option>
                        </select>
                    </div>
                    @if($errors->has('device'))
                    <div class="d-flex align-items-center">
                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p">{{$errors->first('device')}}</p>
                    </div>
                    @endif

                    <div id="otherDeviceInput" class="d-flex flex-column hide">
                        <label class="signup-lbl pb-2 pt-4">Add new device</label>
                        <input type="text" class="signup-input" name="other_device" placeholder="Add a device" />
                    </div>

                    <input type="checkbox" class="delete-btn-click-listener" name="delete-image-confirmation" id="" hidden/>
                    <div class="d-flex flex-column justify-content-center">
                    <p class="signup-lbl pt-4 pb-2">Upload Image</p>

                    <div class="d-flex flex-column image-box image-select-div-new {{ $game->image != null ? 'hide' : ''}}">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ url('assets/images/img-upload-2.svg') }}" class="img-fluid upload-img" alt="upload" />
                            <span class="profile-p text-center py-3">Upload Image</span>
                            <label for="image-upload-new" class="custom-file-upload">
                                <span class="browse-txt">Browse</span>
                            </label>
                            <input type="file" name="image" id="image-upload-new">
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center image-box image-preview-new {{ $game->image != null ? '' : 'hide'}}">
                        <img src="{{ url('storage/uploads/' . $game->image ) }}" class="upload-game-img image-upload-preview-new" id="" alt="">
                    </div>
                    @if($errors->has('image'))
                    <div class="d-flex align-items-center">
                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p">{{$errors->first('image')}}</p>
                    </div>
                    @endif
                    <p class="image-preview-para">Please select JPG or PNG files under 3 MB. Square photos are recommended. Changes will not take effect until you save</p>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="request-a remove-uploaded-pic-new px-4 py-2 text-end">Delete</a>
                    </div>
                </div>
                </div>

                <div class="d-flex flex-column align-items-center">

                    <p class="text-para pb-4">Please be sure to check the “Prohibited Activities and Items to be Exhibited. Also, please agree to the Merchant Agreement and Privacy Policy before clicking the “submit button.”</p>
                    @if(Route::is('edit-game'))
                    <input type="submit" formaction="{{ route('update-game', [ 'id' => $game->id ]) }}" class="signup-btn w-100 mb-4" id="update" name="update" value="Update" />
                    @else
                    <input type="submit" formaction="{{ route('add-game-post') }}" class="signup-btn w-100 mb-4" id="submit" name="submit" value="Submit" />
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="container pb-5">
        <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid" alt="goback" />
        <a href="/" class="go-back ps-3"> GO BACK</a>
    </div> --}}

</div>
<!-- Sell item ends -->

@endsection