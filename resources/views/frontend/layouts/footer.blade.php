<section class="wrapper__section p-0">
    <div class="wrapper__section__components">
        <!-- Footer -->
        <div class="wrapper__footer bg__footer-dark pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                            <footer>
                            <div class="widget__footer">
                                <figure class="image-logo">
                                    <img src="{{ asset(@$footerInfo->logo) }}" alt="" class="logo-footer">
                                </figure>

                                <p>{{ $footerInfo->description }}</p>


                            <div class="social__media mt-4">
                                <ul class="list-inline">
                                    @foreach ($socialLinks as $link)
                                        <li class="list-inline-item">
                                            <a href="{{ $link->url }}"
                                                class="btn btn-social rounded text-white">
                                                <i class="{{ $link->icon }}"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        entertainment
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach ($footerGridOne as $gridOne)
                                        <li>
                                            <a href="{{ $gridOne->url }}">{{ $gridOne->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ __('health') }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>
                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach ($footerGridTwo as $gridOne)
                                        <li>
                                            <a href="{{ $gridOne->url }}">{{ $gridOne->name }}</a>
                                        </li>
                                    @endforeach
                                
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        business
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">
                                    <li>
                                        <a href="#">merkets</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                <li>
                                    <a href="#">features</a>
                                </li>
                                <li>
                                    <a href="#">property</a>
                                    </li>
                                    <li>
                                        <a href="#">business leaders</a>
                                    </li>

                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer bottom -->
            <div class="wrapper__footer-bottom bg__footer-dark">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="border-top-1 bg__footer-bottom-section">
                                <p class="text-white text-center">
                                    Copyright © {{ $footerInfo->copyright }}</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </footer>
    </div>
</section>
