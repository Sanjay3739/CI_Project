<header>
    <div class="container-fluid border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between border-bottom py-1 align-items-center">
                <div class="col-md-4 col-sm-6">
                    <div class="d-flex justify-content-end">
                        <div class="px-4">
                            <a class="btn text-muted no-decor" href="{{ url('/sharestory') }}">Stories</a>
                        </div>
                        <div class="dropdown show ">
                            <a class="btn text-muted btn-white dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Policy
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                style="max-height: 200px; width:50px;overflow-y:auto;">
                                @foreach ($policies as $policy)
                                    @if ($policy->status == '1')
                                        <li class="nav-item">
                                            <a href="{{ url('policy') . '#' . $policy->slug }}"
                                                style="cursor: pointer;text-decoration:none;">
                                                <div class="d-flex justify-content-between">
                                                    <span class="nav-link text-dark"
                                                        style="font-size: 12px">{{ $policy->title }}</span>
                                                </div>
                                            </a>
                                            <hr>
                                        </li>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="btn text-muted btn-white dropdown-toggle" href="#" role="button"
                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle px-3" id="header-avatar"
                            src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('Images/user-img1.png') }}"
                            alt="Profile" style="height:54px">
                        <span
                            id="userAvatar">{{ isset($user) ? $user->first_name . ' ' . $user->last_name : '' }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item"
                            href="{{ route('edit-profile', ['user_id' => Auth::user()->user_id]) }}">My Profile</a>
                        <a class="dropdown-item" href="{{ url('timesheet') }}">Volunteering Timesheet</a>
                        <a class="dropdown-item" href="{{ url('storylisting') }}">Story Listing</a>
                        <a class="dropdown-item" href="{{ route('userlogout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
