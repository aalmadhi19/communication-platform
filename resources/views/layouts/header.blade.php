<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- logo -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('styles/img/logo_mu.svg') }}" width="133" height="66" alt="">
        </a>
        <!-- end -- logo -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                @if (auth()->user()->user_type == 'Admin/FacultyMember')
                    <li class="nav-item pl-10">
                        @if (Route::currentRouteName() == 'admin_home')
                            <a class="nav-link" href="{{ route('faculty_member_home') }}"
                                id="navbarDropdownMenuLink" role="button">
                                العودة الى صفحة عضو هيئة التدريس
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('admin_home') }}" id="navbarDropdownMenuLink"
                                role="button">
                                ادارة النظام
                            </a>
                        @endif
                    </li>
                @endif
                @if (auth()->user()->user_type == 'Admin' && Route::currentRouteName() == 'admin_home')
                    <li class="nav-item pl-10 pt-10">
                        @if ($TFA->status == 1)
                        <input type="checkbox"id="toggle-event" checked data-style="slow" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="التحقق الثنائي مفعل" data-off="التحقق الثنائي معطل" data-style="iso">
                        @else
                        <input type="checkbox"id="toggle-event" data-style="slow" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="التحقق الثنائي مفعل" data-off="التحقق الثنائي معطل" data-style="iso">
                        @endif
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        مرحباً : {{ Auth::user()->name }}
                    </a>


                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            تسجيل الخروج</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </li>


            </ul>
        </div>
    </div>
</nav>
@section('extend_js')
    <script>
         $(function() {
            $('#toggle-event').change(function() {
                var  status = $(this).prop('checked')
                axios.get("/admin/set2FA/" + status)
                .then(function (response) {
                });
            })
        })

    </script>
@endsection
