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
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="{{ route('admin.category.index') }}"><i class="far fa-square"></i>
                    <span>Category</span></a></li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.news.index') }}" class="nav-link">All News</a></li>
                    <li><a href="#" class="nav-link">Home Setting</a></li>
                    <li><a href="#" class="nav-link">All News</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.about.index') }}" class="nav-link">About Pages</a></li>
                    <li><a href="{{ route('admin.contact.index') }}" class="nav-link">Contact Pages</a></li>
                    <li><a href="#" class="nav-link">All News</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.contact-messages.index') }}"><i class="far fa-square"></i>
                    <span>Contact Messages</span>
                    @if ($unReadMessages > 0)
                        <i class="badge bg-danger" style="color: #fff;">
                            {{ $unReadMessages }}
                        </i>
                    @endif
                </a></li>

            <li><a class="nav-link" href="{{ route('admin.social-count.index') }}"><i class="far fa-square"></i>
                    <span>Social Count</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.home-section-setting.index') }}"><i class="far fa-square"></i>
                    <span>Home Setting</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.ad.index') }}"><i class="far fa-square"></i>
                    <span>Advertisement</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.language.index') }}"><i class="far fa-square"></i>
                    <span>Language</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.subscribers.index') }}"><i class="far fa-square"></i>
                    <span>Subscribers</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Footer
                        Setting</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.social-link.index') }}" class="nav-link">Social Links</a></li>
                    <li><a href="{{ route('admin.footer-info.index') }}" class="nav-link">Footer Info</a></li>
                    <li><a href="{{ route('admin.footer-grid-one.index') }}" class="nav-link">Footer Grid One</a></li>
                    <li><a href="{{ route('admin.footer-grid-two.index') }}" class="nav-link">Footer Grid Two</a></li>
                    <li><a href="{{ route('admin.footer-grid-three.index') }}" class="nav-link">Footer Grid Three</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
