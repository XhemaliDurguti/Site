@extends('frontend.layouts.master')
@section('title', $news->title)
@section('meta_description', $news->meta_description)
@section('meta_og_title', $news->meta_title)
@section('meta_og_description', $news->meta_description)
@section('meta_og_image', public_path($news->image))
@section('meta_tw_title', $news->meta_title)
@section('meta_tw_description', truncate($news->content, 200))
@section('meta_tw_image', public_path($news->image))

@section('content')
    <section class="pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- breaddcrumb -->
                    <!-- Breadcrumb -->
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a href="{{ url('/') }}" class="breadcrumbs__url">
                                <i class="fa fa-home"></i> {{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="javascript:;" class="breadcrumbs__url">{{ $news->category->name }}</a>
                        </li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
                <div class="col-md-8">
                    <!-- content article detail -->
                    <!-- Article Detail -->
                    <div class="wrap__article-detail">
                        <div class="wrap__article-detail-title">
                            <h1>
                                {!! $news->title !!}
                            </h1>
                        </div>
                        <hr>
                        <div class="wrap__article-detail-info">
                            <ul class="list-inline d-flex flex-wrap justify-content-start">
                                <li class="list-inline-item">
                                    {{ __('By') }}
                                    <a href="#">
                                        {{ $news->auther->name }}
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        {{ date('M D,Y', strtotime($news->created_at)) }}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize">
                                        {{ __('in') }}
                                    </span>
                                    <a href="#">
                                        {{ $news->category->name }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="wrap__article-detail-image mt-4">
                            <figure>
                                <img src="{{ asset($news->image) }}" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="wrap__article-detail-content">
                            <div class="total-views">
                                <div class="total-views-read">
                                    {{ convertToKFormat($news->views) }}
                                    <span>
                                        {{ __('views') }}
                                    </span>
                                </div>

                                <ul class="list-inline">
                                    <span class="share">{{ __('share on') }}:</span>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o facebook" href="#">
                                            <i class="fa fa-facebook-f"></i>
                                            <span>{{ __('facebook') }}</span>
                                        </a>

                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o twitter" href="#">
                                            <i class="fa fa-twitter"></i>
                                            <span>{{ __('twitter') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o whatsapp" href="#">
                                            <i class="fa fa-whatsapp"></i>
                                            <span>{{ __('whatsapp') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o telegram" href="#">
                                            <i class="fa fa-telegram"></i>
                                            <span>{{ __('telegram') }}</span>
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a class="btn btn-linkedin-o linkedin" href="#">
                                            <i class="fa fa-linkedin"></i>
                                            <span>{{ __('linkedin') }}</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <p class="has-drop-cap-fluid">
                                {!! $news->content !!}
                            </p>
                        </div>
                    </div>
                    <!-- end content article detail -->

                    <!-- tags -->
                    <!-- News Tags -->
                    <div class="blog-tags">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <i class="fa fa-tags">
                                </i>
                            </li>
                            @foreach ($news->tags as $tag)
                                <li class="list-inline-item">
                                    <a href="#">
                                        #{{ $tag->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end tags-->

                    <!-- authors-->
                    <!-- Profile author -->
                    <div class="wrap__profile">
                        <div class="wrap__profile-author">
                            <figure>
                                <img src="{{ asset($news->auther->image) }}" alt=""
                                    class="img-fluid rounded-circle" style="width: 200px;height:200px;object-fit:cover;">
                            </figure>
                            <div class="wrap__profile-author-detail">
                                <div class="wrap__profile-author-detail-name">{{ __('author') }}</div>
                                <h4>{{ $news->auther->name }}</h4>
                                <p>{{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laboriosam ad
                                                                                                                                                                    beatae itaque ea non
                                                                                                                                                                    placeat officia ipsum praesentium! Ullam?') }}
                                </p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o facebook ">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o twitter ">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o instagram ">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o telegram ">
                                            <i class="fa fa-telegram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o linkedin ">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end author-->

                    @auth
                        <!-- Comment  -->
                        <div id="comments" class="comments-area">
                            <h3 class="comments-title">{{ __('2 Comments') }}:</h3>

                            <ol class="comment-list">
                                @foreach ($news->comments()->whereNUll('parent_id')->get() as $comment)
                                    <li class="comment">
                                        <aside class="comment-body">
                                            <div class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="{{ asset('frontend/images/users.png') }}" class="avatar"
                                                        alt="image">
                                                    <b class="fn">{{ $comment->user->name }}</b>
                                                    <span class="says">{{ __('says') }}:</span>
                                                </div>

                                                <div class="comment-metadata">
                                                    <a href="javascript:;">
                                                        <span>{{ date('M,d,Y H:i', strtotime($comment->created_at)) }}</span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="comment-content">
                                                <p>{{ $comment->comment }}
                                                </p>
                                            </div>

                                            <div class="reply">
                                                <a href="#" class="comment-reply-link" data-toggle="modal"
                                                    data-target="#exampleModal-{{ $comment->id }}">{{ __('Reply') }}</a>
                                                <span class="delete-msg" data-id="{{ $comment->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </div>
                                        </aside>
                                        @if ($comment->replay()->count() > 0)
                                            @foreach ($comment->replay as $replay)
                                                <ol class="children">
                                                    <li class="comment">
                                                        <aside class="comment-body">
                                                            <div class="comment-meta">
                                                                <div class="comment-author vcard">
                                                                    <img src="{{ asset('frontend/images/users.png') }}"
                                                                        class="avatar" alt="image">
                                                                    <b class="fn">{{ $replay->user->name }}</b>
                                                                    <span class="says">{{ __('says') }}:</span>
                                                                </div>

                                                                <div class="comment-metadata">
                                                                    <a href="#">
                                                                        <span>{{ date('M,d,Y H:i', strtotime($replay->created_at)) }}</span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <div class="comment-content">
                                                                <p>{{ $replay->comment }}</p>
                                                            </div>

                                                            <div class="reply">
                                                                @if ($loop->last)
                                                                    <a href="#" class="comment-reply-link"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal-{{ $comment->id }}">{{ __('Reply') }}</a>
                                                                @else
                                                                    <a href="#"></a>
                                                                @endif
                                                                <span class="delete-msg" data-id="{{ $replay->id }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </span>
                                                            </div>
                                                        </aside>
                                                    </li>
                                                </ol>
                                            @endforeach
                                        @endif
                                    </li>
                                    <!-- Modal -->
                                    <div class="comment_modal">
                                        <div class="modal fade" id="exampleModal-{{ $comment->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('Write Your Comment') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('news-comment-replay') }}" method="POST">
                                                            @csrf
                                                            <textarea name="replay" cols="30" rows="7" placeholder="Type. . ."></textarea>
                                                            <input type="hidden" name="news_id"
                                                                value="{{ $news->id }}" />
                                                            <input type="hidden" name="parent_id"
                                                                value="{{ $comment->id }}" />
                                                            <button type="submit">{{ __('submit') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ol>

                            <div class="comment-respond">
                                <h3 class="comment-reply-title">{{ __('Leave a Reply') }}</h3>

                                <form action="{{ route('news-comment') }}" method="POST" class="comment-form">
                                    @csrf
                                    <p class="comment-notes">
                                        <span id="email-notes">{{ __('Your email address will not be published.') }}</span>
                                        {{ __('Required fields are marked') }}
                                        <span class="required">*</span>
                                    </p>
                                    <p class="comment-form-comment">
                                        <label for="comment">{{ __('Comment') }}</label>
                                        <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>
                                        <input type="hidden" name="news_id" value="{{ $news->id }}" />
                                        <input type="hidden" name="parent_id" value="" />
                                        @error('comment')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </p>
                                    <p class="form-submit mb-0">
                                        <input type="submit" name="submit" id="submit" class="submit"
                                            value="Post Comment">
                                    </p>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="card my-5">
                            <div class="card-body">
                                <h5 class="p-0">{{ __('Please') }} <a
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                    {{ __('to comment in the post!') }}
                                </h5>
                            </div>
                        </div>
                    @endauth
                    <!-- end comment -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="single_navigation-prev">
                                @if ($previousPost)
                                    <a href="{{ route('news-details', $previousPost->slug) }}">
                                        <span>{{ __('previous post') }}</span>
                                        {!! truncate($previousPost->title, 100) !!}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single_navigation-next text-left text-md-right">
                                @if ($nextPost)
                                    <a href="{{ route('news-details', $nextPost->slug) }}">
                                        <span>{{ __('next post') }}</span>
                                        {!! truncate($nextPost->title, 100) !!}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($ad->view_page_ad_status == 1)
                        <a href="{{ $ad->view_page_ad_url }}">
                            <div class="small_add_banner mb-5 pb-4">
                                <div class="small_add_banner_img">
                                    <img src="{{ asset($ad->view_page_ad) }}" alt="adds">
                                </div>
                            </div>
                        </a>
                    @endif

                    <div class="clearfix"></div>

                    @if (count($relatedPost) > 0)
                        <div class="related-article">
                            <h4>
                                {{ __('you may also like') }}
                            </h4>

                            <div class="article__entry-carousel-three">
                                @foreach ($relatedPost as $post)
                                    <div class="item">
                                        <!-- Post Article -->
                                        <div class="article__entry">
                                            <div class="article__image">
                                                <a href="{{ route('news-details', $post->slug) }}">
                                                    <img src="{{ asset($post->image) }}" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="article__content">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by {{ $post->auther->name }}
                                                        </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span>
                                                            {{ date('M d,Y', strtotime($post->created_at)) }}
                                                        </span>
                                                    </li>

                                                </ul>
                                                <h5>
                                                    <a href="{{ route('news-details', $post->slug) }}">
                                                        {!! truncate($post->title) !!}
                                                    </a>
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    @endif
                </div>

            </div>
            <div class="col-md-4">
                <div class="sticky-top">
                    <aside class="wrapper__list__article ">
                        <!-- <h4 class="border_section">Sidebar</h4> -->
                        <div class="mb-4">
                            <div class="widget__form-search-bar  ">
                                <div class="row no-gutters">
                                    <div class="col">
                                        <input class="form-control border-secondary border-right-0 rounded-0"
                                            value="" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper__list__article-small">
                            @foreach ($recentNews as $news)
                                @if ($loop->index <= 2)
                                    <div class="mb-3">
                                        <!-- Post Article -->
                                        <div class="card__post card__post-list">
                                            <div class="image-sm">
                                                <a href="{{ route('news-details', $news->slug) }}">
                                                    <img src="{{ asset($news->image) }}" class="img-fluid"
                                                        alt="">
                                                </a>
                                            </div>

                                            <div class="card__post__body ">
                                                <div class="card__post__content">
                                                    <div class="card__post__author-info mb-2">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                    {{ __('by') }} {{ $news->auther->name }}
                                                                </span>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <span class="text-dark text-capitalize">
                                                                    {{ date('M d, Y', strtotime($news->created_at)) }}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card__post__title">
                                                        <h6>
                                                            <a href="{{ route('news-details', $news->slug) }}">
                                                                {!! truncate($news->title) !!}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($loop->index === 3)
                                    <!-- Post Article -->
                                    <div class="article__entry">
                                        <div class="article__image">
                                            <a href="{{ route('news-details', $news->slug) }}">
                                                <img src="{{ asset($news->image) }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="article__content">
                                            <div class="article__category">
                                                {{ $news->category->name }}
                                            </div>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <span class="text-primary">
                                                        {{ __('by') }} {{ $news->auther->name }}
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="text-dark text-capitalize">
                                                        {{ date('M d, Y', strtotime($news->created_at)) }}
                                                    </span>
                                                </li>
                                            </ul>
                                            <h5>
                                                <a href="{{ route('news-details', $news->slug) }}">
                                                    {!! truncate($news->title) !!}
                                                </a>
                                            </h5>
                                            <p>
                                                {!! truncate($news->content, 160) !!}
                                            </p>
                                            <p>
                                                <a href="{{ route('news-details', $news->slug) }}"
                                                    class="btn  text-capitalize"></a>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </aside>

                    <!-- social media -->
                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{ __('stay conected') }}</h4>
                        <!-- widget Social media -->
                        <div class="wrap__social__media">
                            @foreach ($socialCounts as $socialCount)
                                <a href="{{ $socialCount->url }}" target="_blank">
                                    <div class="social__media__widget mt-2"
                                        style="background-color: {{ $socialCount->color }}">
                                        <span class="social__media__widget-icon">
                                            <i class="{{ $socialCount->icon }} m-2"></i>
                                        </span>
                                        <span class="social__media__widget-counter">
                                            {{ $socialCount->fan_count }} {{ $socialCount->fan_type }}
                                        </span>
                                        <span class="social__media__widget-name">
                                            {{ $socialCount->button_text }}
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </aside>
                    <!-- End social media -->

                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{ __('tags') }}</h4>
                        <div class="blog-tags p-0">
                            <ul class="list-inline">
                                @foreach ($mostCommonTags as $tag)
                                    <li class="list-inline-item">
                                        <a href="#">
                                            #{{ $tag->name }} - ({{ $tag->count }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{ __('newsletter') }}</h4>
                        <!-- Form Subscribe -->
                        <div class="widget__form-subscribe bg__card-shadow">
                            <h6>
                                {{ __('The most important world news and events of the day') }}.
                            </h6>
                            <p><small>{{ __('Get magzrenvi daily newsletter on your inbox') }}.</small></p>
                            <form action="" class="newsletter-form">
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="email"
                                        placeholder="Your email address">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary newsletter-button"
                                            type="submit">{{ __('sign up') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </aside>
                    @if ($ad->side_bar_ad_status == 1)
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('Advertise') }}</h4>
                            <a href="{{ $ad->side_bar_ad_url }}">
                                <figure>
                                    <img src="{{ asset($ad->side_bar_ad) }}" alt="" class="img-fluid">
                                </figure>
                            </a>
                        </aside>
                    @endif

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('content')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.delete-msg').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                // console.log('ID:', id); // Kontrollo ID-në
                Swal.fire({
                    title: '{{ __('Are you sure?') }}',
                    text: "{{ __("You won\'t be able to revert this!") }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __('Yes, delete it!') }}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: "{{ route('news-comment-destroy') }}",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                console.log('Response data:',
                                    data); // Kontrollo përgjigjen
                                if (data.status === 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status === 'error') {
                                    Swal.fire(
                                        'Error!',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                });
            });
        })
    </script>
@endpush
