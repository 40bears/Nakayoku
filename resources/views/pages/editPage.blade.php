@extends('layout.main')
@section('title', 'Add Page | CII')
@section('main-container')

<div class="container-fluid px-0 bg-lgreen py-5">

    <div class="container  d-flex flex-column justify-content-center align-items-center padt-5">

        <h3 class="signup-h3 pb-5">Edit Page</h3>
        <form method="POST" enctype="multipart/form-data" class="wd-50">
            @csrf
            <div class="pb-4 d-flex flex-column">

                <label class="signup-lbl pb-2">Page Title</label>
                <input type="text" class="form-input-2 font-pswd " name="title" id="title" placeholder="Enter Page Title" value="{{str_replace('-',' ',$page->title)}}" />
                @if($errors->has('title'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cancel-mark.png') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('title')}}</p>
                </div>
                @endif

                <label class="signup-lbl pb-2 pt-4">Content</label>
                <textarea name="content" placeholder="enter content" id="content" cols="30" rows="10">{{$page->content}}</textarea>
                <p class="select-game mt-3">
                    Please click on '<>' tag on the top right of the editor when you start writing
                        and write class="about-p" inside &lt;p&gt; tag like this example shown below <br>
                        if not already there <br>
                        Example ---

                        &lt;p class="about-p"&gt;

                </p>
                @if($errors->has('content'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cancel-mark.png') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('content')}}</p>
                </div>
                @endif

                <label class="signup-lbl pb-2 pt-4">Status</label>
                <div class="form-group d-flex justify-content-center">
                    <label for="exampleFormControlSelect2" class="d-none">Select</label>
                    <select class="select-bank buy-p font-pswd minimal w-100" name="status" id="exampleFormControlSelect2">
                        <option value="">Please select</option>
                        <option value="PUBLISHED" {{$page->status == 'PUBLISHED' ? 'selected' : ''}}>Published</option>
                        <option value="DRAFT" {{$page->status == 'DRAFT' ? 'selected' : ''}}>Draft</option>
                    </select>
                </div>
                @if($errors->has('status'))
                <div class="d-flex align-items-center w-100 justify-content-center">
                    <img src="{{ url('assets/images/cancel-mark.png') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('status')}}</p>
                </div>
                @endif

                <label class="signup-lbl pb-2 pt-4">Category</label>
                <div class="form-group d-flex justify-content-center">
                    <label for="category" class="d-none">Select</label>
                    <select class="select-bank buy-p w-100 minimal font-pswd " name="category" id="category">
                        <option value="">Please select</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$page->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                        <option value="other">Other</option>
                    </select>
                </div>
                @if($errors->has('category'))
                <div class="d-flex align-items-center w-100 justify-content-center">
                    <img src="{{ url('assets/images/cancel-mark.png') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('category')}}</p>
                </div>
                @endif

                <div id="otherDeviceInput" class="d-flex flex-column align-items-center hide">
                    <label class="signup-lbl pb-2 pt-4 d-flex ">Add Other Category</label>
                    <input type="text" class="form-input-2 font-pswd w-100" name="other_category" placeholder="Add a category" />
                </div>

            </div>

            <div class="d-flex flex-column align-items-center mt-5">
                <input type="submit" formaction="{{ route('update-page', [ 'id' => $page->id ] ) }}" class="signup-btn w-50" id="submit" name="submit" value="SUBMIT" />
            </div>
        </form>
    </div>

</div>

@endsection