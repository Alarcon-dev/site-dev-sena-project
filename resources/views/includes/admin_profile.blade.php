@if (Auth::user()->user_image)
    <div class="row">
        <div class="col-md-6">
            <div class="user_profile">
                <img alt="img" src="/user/profile/{{ Auth::user()->user_image }}" class="">
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-6">
            <div class="user_profile">
                <img alt="img" src="{{ asset('images/no_profile.png') }}" class="">
            </div>
        </div>
    </div>
@endif
