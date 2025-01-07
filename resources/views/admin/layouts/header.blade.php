<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Ravi Intitute</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <!-- Logout Button -->
            <li class="nav-item">
                <form action="/logout" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link px-3">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
