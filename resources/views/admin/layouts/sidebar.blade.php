<div class="navbar-bg"></div>
<!-- Navbar Start -->
@include('admin.layouts.navbar')
<!-- Navbar End -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="{{ route('admin.category.index') }}"><i class="far fa-square"></i> <span>Category</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.language.index') }}"><i class="far fa-square"></i> <span>Language</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.news.index') }}" class="nav-link">All News</a></li>
                    <li><a href="#" class="nav-link">All News</a></li>
                    <li><a href="#" class="nav-link">All News</a></li>
                </ul>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
