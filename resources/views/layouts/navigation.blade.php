<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand d-flex" href="#">
        <div><img src="/svg/insta.svg" style="height:25px; border-right:1px solid #333;" class="pe-3">
        </div>
        <div class="ps-3"> Instagram</div>

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{-- {{ Auth::user()->user_name }} --}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                <li>
                  {{-- < class="dropdown-item" href="#"> --}}
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a class="dropdown-item" href="{{route ('logout') }}"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            Logout
        </a></form></li>
       

            </ul>
          </li>

        </ul>

      </div>
    </div>
  </nav>



