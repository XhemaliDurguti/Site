<div class="navbar-bg"></div>
<!-- Navbar Start -->
@include('admin.layouts.navbar')
<!-- Navbar End -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">{{ __('Stisla') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">{{ __('St') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Dashboard') }}</li>
            <li class="active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>{{ __('Dashboard') }}</span></a>
            </li>
            <li class="menu-header">{{ __('Starter') }}</li>

            @if (canAccess(['category index', 'category create', 'category update', 'category delete']))
                <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link"
                        href="{{ route('admin.category.index') }}"><i class="far fa-square"></i>
                        <span>{{ __('Category') }}</span></a></li>
            @endif

            @if (canAccess(['news index']))
                <li class="dropdown {{ setSidebarActive(['admin.news.*']) }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="far fa-file-alt"></i><span>{{ __('News') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['admin.news.*']) }}"><a href="{{ route('admin.news.index') }}"
                                class="nav-link">{{ __('All News') }}</a></li>
                    </ul>
                </li>
            @endif

            @if (canAccess(['about index', 'contact index']))
                <li class="dropdown {{ setSidebarActive(['admin.about.*', 'admin.contact.*']) }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="far fa-file-alt"></i><span>{{ __('Pages') }}</span></a>
                    <ul class="dropdown-menu">
                        @if (canAccess(['about index']))
                            <li class="{{ setSidebarActive(['admin.about.*']) }}"><a
                                    href="{{ route('admin.about.index') }}"
                                    class="nav-link">{{ __('About Pages') }}</a></li>
                        @endif
                        @if (canAccess(['contact index']))
                            <li class="{{ setSidebarActive(['admin.contact.*']) }}"><a
                                    href="{{ route('admin.contact.index') }}"
                                    class="nav-link">{{ __('Contact Pages') }}</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (canAccess(['contact message index']))
                <li class="{{ setSidebarActive(['admin.contact-messages.*']) }}">
                    <a class="nav-link" href="{{ route('admin.contact-messages.index') }}"><i
                            class="far fa-square"></i>
                        <span>{{ __('Contact Messages') }}</span>
                        @if ($unReadMessages > 0)
                            <i class="badge bg-danger" style="color: #fff;">
                                {{ $unReadMessages }}
                            </i>
                        @endif
                    </a>
                </li>
            @endif

            @if (canAccess(['social count index']))
                <li class="{{ setSidebarActive(['admin.social-count.*']) }}">
                    <a class="nav-link" href="{{ route('admin.social-count.index') }}"><i class="far fa-square"></i>
                        <span>{{ __('Social Count') }}</span></a>
                </li>
            @endif

            @if (canAccess(['home section index']))
                <li class="{{ setSidebarActive(['admin.home-section-setting.*']) }}">
                    <a class="nav-link" href="{{ route('admin.home-section-setting.index') }}"><i
                            class="far fa-square"></i>
                        <span>{{ __('Home Setting') }}</span></a>
                </li>
            @endif
            @if (canAccess(['advertisement index']))
                <li class="{{ setSidebarActive(['admin.ad.*']) }}">
                    <a class="nav-link" href="{{ route('admin.ad.index') }}"><i class="far fa-square"></i>
                        <span>{{ __('Advertisement') }}</span></a>
                </li>
            @endif
            @if (canAccess(['language index']))
                <li class="{{ setSidebarActive(['admin.language.*']) }}">
                    <a class="nav-link" href="{{ route('admin.language.index') }}"><i class="far fa-square"></i>
                        <span>{{ __('Language') }}</span></a>
                </li>
            @endif
            @if (canAccess(['subscriber index']))
                <li class="{{ setSidebarActive(['admin.subscribers.*']) }}">
                    <a class="nav-link" href="{{ route('admin.subscribers.index') }}"><i class="far fa-square"></i>
                        <span>{{ __('Subscribers') }}</span></a>
                </li>
            @endif
            @if (canAccess(['footer index']))
                <li
                    class="dropdown {{ setSidebarActive(['admin.social-link.*', 'admin.footer-info.*', 'admin.footer-grid-one.*', 'admin.footer-grid-two.*', 'admin.footer-grid-three.*']) }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="far fa-file-alt"></i><span>{{ __('Footer Setting') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a
                                href="{{ route('admin.social-link.index') }}"
                                class="nav-link">{{ __('Social Links') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-info.*']) }}"><a
                                href="{{ route('admin.footer-info.index') }}"
                                class="nav-link">{{ __('Footer Info') }}</a>
                        </li>
                        <li class="{{ setSidebarActive(['admin.footer-grid-one.*']) }}"><a
                                href="{{ route('admin.footer-grid-one.index') }}"
                                class="nav-link">{{ __('Footer Grid One') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-grid-two.*']) }}"><a
                                href="{{ route('admin.footer-grid-two.index') }}"
                                class="nav-link">{{ __('Footer Grid Two') }}</a></li>
                        <li class="{{ setSidebarActive(['admin.footer-grid-three.*']) }}"><a
                                href="{{ route('admin.footer-grid-three.index') }}"
                                class="nav-link">{{ __('Footer Grid Three') }}</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (canAccess(['access management index']))
                <li class="dropdown {{ setSidebarActive(['admin.role.*']) }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="far fa-file-alt"></i><span>{{ __('Access Managment') }}</span></a>

                    <ul class="dropdown-menu">
                        <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a
                                href="{{ route('admin.role-users.index') }}"
                                class="nav-link">{{ __('Roles Users') }}</a>
                        </li>
                        <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a
                                href="{{ route('admin.role.index') }}"
                                class="nav-link">{{ __('Roles and Permissions') }}</a></li>
                    </ul>
                </li>
            @endif
            @if (canAccess(['setting index']))
                <li class="{{ setSidebarActive(['admin.setting.*']) }}">
                    <a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="far fa-square"></i>
                        <span>{{ __('Settings') }}</span></a>
                </li>                
            @endif
        </ul>
    </aside>
</div>
