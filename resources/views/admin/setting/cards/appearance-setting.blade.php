<div class="card border-primary">
    <div class="card-body">
        <form action="{{ route('admin.appearance-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                        <label>{{ __('Pick Your Color') }}</label>
                        <div class="input-group colorpickerinput">
                            <input type="text" name="site_color" class="form-control" value="{{ $setting['site_color'] }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-fill-drip"></i>
                                </div>
                            </div>
                            @error('color')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>
@push('scripts')
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush