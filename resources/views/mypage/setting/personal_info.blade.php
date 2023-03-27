@extends('layout.user')
@section('title', 'Personal Information | Nakayoku')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space">

    <!-- Bank info starts -->
    <div class="container padt-5">
        <div class="d-flex flex-column justify-content-start align-items-start">
            <h3 class="pb-5 signup-h3 text-center">Personal Info</h3>
        <form action="{{ route('update-personal-info') }}" method="POST" class="w-100">
            @csrf
            <div class="pb-4 d-flex flex-column align-items-start">

                <p class="signup-lbl mb-0 pt-5 pb-3">Name</p>
                <div class="d-flex justify-content-between bg-bank  w-100 px-2 py-3">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ Auth::user()->first_name }}</p>
                        <input type="text" name="first_name" class="bank-input hide" id="textUpdate" value="{{ Auth::user()->first_name != null ? Auth::user()->first_name : '--' }}"/>
                        <a style="cursor: pointer;" id="edit" class="min-p show pe-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                </div>

                <p class="signup-lbl mb-0 pt-5 pb-3">Date of Birth</p>
                <div class="d-flex justify-content-between bg-bank  w-100 px-2 py-3">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ Auth::user()->DOB != null ? Auth::user()->DOB : '--' }}</p>
                        <input type="date" name="dob" class="bank-input hide " id="textUpdate" value="{{ Auth::user()->DOB != null ? Auth::user()->DOB : '--' }}" />
                        <a style="cursor: pointer;" id="edit" class="min-p show pe-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                </div>

                <p class="signup-lbl mb-0 pt-5 pb-3">Phone</p>
                <div class="d-flex justify-content-between bg-bank w-100 px-2 py-3">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ Auth::user()->phone != null ? Auth::user()->phone : '--' }}</p>
                        <input type="number" name="phone" class="bank-input hide " id="textUpdate" value="{{ Auth::user()->phone != null ? Auth::user()->phone : '--' }}" />
                        <a style="cursor: pointer;" id="edit" class="min-p show pe-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                </div>

            </div>

            <div class="d-flex flex-column  pt-3 align-items-center">
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