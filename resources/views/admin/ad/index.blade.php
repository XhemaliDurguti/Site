@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Advertisement') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Advertisement') }}</h4>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ad.update',1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5 class="text-primary">Home Page Ads</h5>
                    <div class="form-group">
                        <img src="{{ asset($ad->home_top_bar_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('Top bar ad') }}</label>
                        <input type="file" name="home_top_bar_ad" class="form-control" />
                        @error('home_top_bar_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label class="custom-switch mt-2"> 
                            <input {{ $ad->home_top_bar_ad_status == 1 ? 'checked':'' }} value="1" type="checkbox" name="home_top_bar_ad_status" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset($ad->home_middle_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('Middle Ads') }}</label>
                        <input type="file" name="home_middle_ad" class="form-control" />
                        @error('home_middle_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label class="custom-switch mt-2"> 
                            <input {{ $ad->home_middle_ad_status == 1 ? 'checked':'' }} value="1" type="checkbox" name="home_middle_ad_status" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    
                    <h5 class="text-primary">News View Page Ads</h5>

                    <div class="form-group">
                        <img src="{{ asset($ad->view_page_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('Bottom ad') }}</label>
                        <input type="file" name="view_page_ad" class="form-control" />
                        @error('view_page_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label class="custom-switch mt-2"> 
                            <input {{ $ad->view_page_ad_status == 1 ? 'checked':'' }} value="1" type="checkbox" name="view_page_ad_status" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>

                    <h5 class="text-primary">News View Page Ads</h5>

                    <div class="form-group">
                        <img src="{{ asset($ad->news_page_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('Bottom ad') }}</label>
                        <input type="file" name="news_page_ad" class="form-control" />
                        @error('news_page_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label class="custom-switch mt-2"> 
                            <input {{ $ad->news_page_ad_status == 1 ? 'checked':'' }} value="1" type="checkbox" name="news_page_ad_status" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>

                    <h5 class="text-primary">Sidebar Ad</h5>
                    <div class="form-group">
                        <img src="{{ asset($ad->side_bar_ad) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('Top bar ad') }}</label>
                        <input type="file" name="side_bar_ad" class="form-control" />
                        @error('side_bar_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2"> 
                            <input {{ $ad->side_bar_ad_status == 1 ? 'checked':'' }} value="1" type="checkbox" name="side_bar_ad_status" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
