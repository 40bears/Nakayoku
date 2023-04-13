@extends('layout.main')
@section('title', 'Add Product | Nakayoku')
@section('main-container')

<!-- Sell item starts -->
<div class="container-fluid px-0 bg-lgreen py-5">

    <div class="container padt-6 padb-10">
        <div class="d-flex flex-column justify-content-center align-items-center ">
        <h3 class="signup-h3 pb-5">Sell Item</h3>
        <form method="POST" enctype="multipart/form-data" class="sell-w">
            @csrf
            <div class="pb-4 d-flex flex-column">

                <label class="signup-lbl pb-2">Select Game Name</label>
                <input type="text" class="signup-input" autocomplete="off" name="game_name" id="game_name" placeholder="Select Game Name" value="{{Route::is('edit-product') ? $product->games->name : ''}}" />
                <input type="hidden" class="signup-input" name="game_id" id="game_id" value="{{Route::is('edit-product') ? $product->game_id : ''}}" />
                <div class="form-group hide">
                    <label for="exampleFormControlSelect1" class="d-none">Select</label>
                    <select class="select-bank w-100" name="" id="exampleFormControlSelect1">
                        <option value="">Please Select</option>
                        @foreach($games as $game)
                        <option value="{{$game->id}}">{{$game->name}}--{{$game->devices->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('game_id'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">Please select game from the list.</p>
                </div>
                @endif

                <input type="checkbox" class="delete-btn-click-listener" name="delete-image-confirmation" id="" hidden/>

                @if(Route::is('add-product'))
                <div class="d-flex flex-column justify-content-center">
                    <p class="signup-lbl pt-4 pb-2">Upload image</p>

                    <div class="d-flex flex-column image-box image-select-div-new">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ url('assets/images/img-upload.svg') }}" class="img-fluid upload-img" alt="upload" />
                            <span class="profile-p text-center py-3">Upload image</span>
                            <label for="image-upload-new" class="custom-file-upload">
                                <span class="browse-txt">Browse</span>
                            </label>
                            <input type="file" name="image" id="image-upload-new">
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center image-box image-preview-new hide">
                        <img src="" class="upload-game-img image-upload-preview-new" id="" alt="">
                    </div>
                    <p class="image-preview-para">Please select JPG or PNG files under 3 MB. Square photos are recommended. Changes will not take effect until you save</p>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="request-a remove-uploaded-pic-new px-4 py-2 text-end">Delete</a>
                    </div>
                </div>
                @elseif(Route::is('edit-product'))
                <div class="d-flex flex-column justify-content-center">
                    <p class="signup-lbl pt-4 pb-2">Upload image</p>

                    <div class="d-flex flex-column image-box image-select-div-new {{ $product->image != null ? 'hide' : ''}}">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ url('assets/images/img-upload.svg') }}" class="img-fluid upload-img" alt="upload" />
                            <span class="profile-p text-center py-3">Upload image</span>
                            <label for="image-upload-new" class="custom-file-upload">
                                <span class="browse-txt">Browse</span>
                            </label>
                            <input type="file" name="image" id="image-upload-new">
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center image-box image-preview-new {{ $product->image != null ? '' : 'hide'}}">
                        <img src="{{ url('storage/uploads/' . $product->image ) }}" class="upload-game-img image-upload-preview-new" id="" alt="">
                    </div>
                    <p class="image-preview-para">Please select JPG or PNG files under 3 MB. Square photos are recommended. Changes will not take effect until you save</p>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="request-a remove-uploaded-pic-new px-4 py-2 text-end">Delete</a>
                    </div>
                </div>
                @endif

                <!-- <label class="signup-lbl pb-2 pt-4">Upload Image</label>
                <div class="d-flex flex-column image-box image-select-div">

                    <div class="d-flex justify-content-center text-center flex-column align-items-center">
                        {{-- <img src="{{ url('assets/images/img-upload.svg') }}" class="img-fluid upload-img" alt="upload" /> --}}
                        <i class="fa-solid fa-cloud-arrow-up cloud-upload"></i>
                            <span class="profile-p text-center py-3">Upload Image</span>
                        @if(Route::is('edit-product'))
                        <div class="d-flex flex-column">
                            @if($product->image != null)
                            <img src="{{ url('storage/uploads/' . $product->image) }}" class="top-image" alt="" id="delete-image-upload">
                            @else
                            <img src="{{ url('assets/images/default-product.jpeg') }}" class="top-image" alt="" id="delete-image-upload">
                            @endif
                            <div class="d-flex pt-2 justify-content-center align-items-center">
                                <label for="image-upload">
                                    <span class="browse-txt">Browse</span>
                                </label>
                            </div>
                            <a class="request-a align-self-center remove-uploaded-pic">Delete</a>
                            <input type="file" name="image" id="image-upload">
                        </div>
                        @else
                        <label for="image-upload" class="custom-file-upload">
                            <span class="browse-txt">Browse</span>
                        </label>
                        <input type="file" name="image" id="image-upload">
                        @endif
                    </div>

                </div>

                <div class="d-flex flex-column align-items-center image-box image-preview-div hide">
                    <img src="" class="top-image" id="image-upload-preview" alt="">
                    <a class="request-a remove-uploaded-pic py-2 text-danger">Delete</a>
                </div> -->

                <!-- <label class="form-label pb-2 pt-4">Platforms</label>
                <input type="text" class="form-input-2 font-pswd " id="platforms" placeholder="PC" /> -->

                <label class="signup-lbl pb-2 pt-4">Product Name</label>
                <input type="text" class="signup-input" name="name" id="platforms" placeholder="Enter Product Name" value="{{Route::is('edit-product') ? $product->name : ''}}" />
                @if($errors->has('name'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('name')}}</p>
                </div>
                @endif

                <label class="signup-lbl pb-2 pt-4">Type of Item</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect2" class="d-none">Select</label>
                    <select class="select-bank w-100 minimal" name="product_type" id="exampleFormControlSelect2" value="{{Route::is('edit-product') ? $product->product_type : ''}}">
                        <option value="">Please Select</option>
                        <option value="account" {{Route::is('edit-product') ? $product->product_type == 'account' ? 'selected': '' : ''}}>Account</option>
                        <option value="item" {{Route::is('edit-product') ? $product->product_type == 'item' ? 'selected': '' : ''}}>Item</option>
                        <option value="currency" {{Route::is('edit-product') ? $product->product_type == 'currency' ? 'selected': '' : ''}}>Currency</option>
                    </select>
                </div>
                @if($errors->has('product_type'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('product_type')}}</p>
                </div>
                @endif

                <label class="signup-lbl pb-2 pt-4">Price (per unit)</label>
                <div class="d-flex justify-content-between align-items-center form-input-2">
                    <span class="big-lbl">{{ Auth::user()->base_currency  }}</span>
                    <input type="number" class="input-text text-end big-lbl flex-grow-1" id="number" name="price" placeholder="0" min="0" value="{{Route::is('edit-product') ? round(showConvertedPrice($product->price)) : ''}}" />
                </div>
                @if($errors->has('price]'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('price')}}</p>
                </div>
                @endif

                <label class="signup-lbl pb-2 pt-4">Unit</label>
                <input type="number" class="signup-input text-end big-lbl flex-grow-1" id="unit" name="stock_quantity" placeholder="0" min="0" value="{{Route::is('edit-product') ? $product->stock_quantity : ''}}" />
                @if($errors->has('stock_quantity'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('stock_quantity')}}</p>
                </div>
                @endif

                <label class="signup-lbl pb-2 pt-4">Delivery Time (in minutes)</label>
                <input type="text" class="signup-input" name="delivery_time" id="platforms" placeholder="Enter Delivery Time" value="{{Route::is('edit-product') ? $product->delivery_time : ''}}" />
                @if($errors->has('delivery_time'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('delivery_time')}}</p>
                </div>
                @endif

                <label class="signup-lbl pb-2 pt-4">Minimum Quantity</label>
                <input type="text" class="signup-input" name="min_quantity" id="platforms" placeholder="Enter Minimum Quantity" value="{{Route::is('edit-product') ? $product->min_quantity : ''}}" />
                @if($errors->has('min_quantity'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('min_quantity')}}</p>
                </div>
                @endif

                <label class="signup-lbl pt-5 pb-2">Product Description</label>

                <textarea class="signup-input h-100 contact_field" id="description" name="description" rows="5" cols="50" placeholder=" Please write product description...">{{Route::is('edit-product') ? $product->description : ''}}</textarea>

            </div>

            <div class="d-flex flex-column align-items-center">

                <p class="text-para pb-4">Please be sure to check the “Prohibited Activities and Items to be Exhibited. Also, please agree to the Merchant Agreement and Privacy Policy before clicking the “Submit Button.”</p>

                @if(Route::is('edit-product'))
                <input type="submit" formaction="{{ route('edit-product-post', [ 'id' => $product->id ]) }}" class="signup-btn w-100 mb-4" id="update" name="update" value="Update" />

                <a class="show pt-3 me-3" href="{{ route('currently-on-display') }}">Back</a>
                @else
                <input type="submit" formaction="{{ route('add-product-post') }}" class="signup-btn w-100 mb-4" id="submit" name="submit" value="SUBMIT" />

                <input type="submit" formaction="{{ route('add-product-draft-post') }}" class="view w-100" id="draft" name="draft" value="PUT IN DRAFT" />
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