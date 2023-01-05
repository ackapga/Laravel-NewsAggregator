<style>
    .fon:hover {
        color: #d9d9d9;
    }
    .href {
        text-decoration: none;
        color: white;
    }
    .href:hover {
        color: #ffffb2;
    }
</style>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a href="/" class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 fon" >&#9776; News Aggregator</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <span class="form-control form-control-dark w-100 rounded-0 border-0">
        <a href="{{ route('account') }}" class="href"> &nbsp; &#10048; &nbsp;  {{ Auth::user()->name }} </a>
    </span>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#" OnClick="history.back();">&nbsp; Назад &nbsp;</a>
        </div>
    </div>
</header>
