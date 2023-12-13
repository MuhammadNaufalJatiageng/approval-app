<section>
    <nav class="navbar header p-2">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand text-white">APPROVAL APPLICATION</a>
        </div>
    </nav>

    <nav class="navbar navbar-expand-md bg-dark p-1">
        <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item mx-1 {{ Request::is('dashboard')  ? 'activated' : ''}}">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="/dashboard">DASHBOARD</a>
                        </li>
                        <li class="nav-item mx-1 {{ Request::is('setting')  ? 'activated' : ''}}">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="/setting">SETTING</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="#">MENU</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="#">MENU</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="#">MENU</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="#">MENU</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="#">MENU</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="#">MENU</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="#">MENU</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link fw-semibold text-light" aria-current="page" href="#">MENU</a>
                        </li>
                    </ul>
                </div>
                <div style="padding-right: 65px">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item fw-semibold" href="#">Proflie</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item fw-semibold" href="/logout">Logout</a></li>
                            </ul>
                          </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</section>