<div class="card border-primary">
    <div class="card-body">
        <form action="{{ route('admin.seo-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">{{ __('Site SEO Title') }}</label>
                <input type="text" name="site_seo_title" class="form-control" value="{{ $setting['site_seo_title'] }}">
                @error('site_seo_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="">{{ __('Site Seo Description') }}</label>
                <textarea name="site_seo_description" class="form-control" style="height: 300px" cols="30" rows="10">{{ $setting['site_seo_description'] }}</textarea>
                @error('site_seo_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="">{{ __('Site Seo Keywords') }}</label>
                <input type="text" name="site_seo_keywords" class="form-control inputtags" value="{{ $setting['site_seo_keywords'] }}">
                @error('site_seo_keywords')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>
