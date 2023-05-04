<nav class="sb-topnav navbar bg-white navbar-expand navbar justify-content-between" style="padding:0%; !important">
    <!-- Navbar Brand-->
    <!-- <a class="navbar-brand ps-3" href="index.html">CI platform</a> -->
    <!-- Sidebar Toggle-->
    <div style="width: 225px; background-color:#F88634; height: inherit;" id="filler-gap"></div>
    <div>
        <button class="btn btn-outline-warning btn-sm order-1 order-lg-0 me-4 me-lg-0 px-3" id="sidebarToggle"
            href="#!"><i class="fas fa-bars"></i></button>
    </div>
    <div class="position-absolute d-none d-lg-block" style="left: 230px">
        <span>{{ (new DateTime())->sub(new DateInterval('PT6H30M'))->format('l, F j, Y, g:i A') }}</span>
    </div>

    <div class="col-lg">
        <div class="boxs -3">

            <select onchange="changelanguage(this.value)">
                <option
                    {{ session()->has('lang_code')?(session()->get('lang_code') == 'en' ? 'selected' : '' ) :''}}
                    value='en'>🏁 English</option>
                <option
                    {{ session()->has('lang_code')?(session()->get('lang_code') == 'hin' ? 'selected' : '' ) :''}}
                    value='hin'> 🏁 Hindi</option>
                <option
                    {{ session()->has('lang_code')?(session()->get('lang_code') == 'cn' ? 'selected' : '' ) :''}}
                    value='cn'> 🏁 Chainese</option>
                <option
                    {{ session()->has('lang_code')?(session()->get('lang_code') == 'Gj' ? 'selected' : '' ) :''}}
                    value='Gj'> 🏁 Gujrati</option>
            </select>
        </div>
    </div>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <div class="dropdown">
                <a class="btn text-muted btn-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" id="header-avatar" src="{{ Auth::guard('admin')->user()->avatar ? asset(Auth::guard('admin')->user()->avatar) : asset('Images/volunteer1.png') }}" alt="Profile" style="height:54px;width:54px" >
                    <span id="userAvatar">{{ Auth::guard('admin')->user()->first_name . ' ' . Auth::guard('admin')->user()->last_name }}</span>
                  </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('adminlogout') }}">Logout</a>
                </div>
            </div>
        </li>
    </ul>
</nav>
