@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Footer') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Footer Grid Two') }}</h4>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-grid-three.update',$footer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('Language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">--{{ __('Select') }}--</option>
                            @foreach ($languages as $lang)
                                <option {{ $footer->language == $lang->lang ? 'selected' : '' }} value="{{ $lang->lang }}">
                                    {{ $lang['name'] }}</option>
                            @endforeach
                        </select>
                        @error('language')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ $footer->name }}" />
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('Url') }}</label>
                        <input type="text" name="url" class="form-control" value="{{ $footer->url }}" />
                        @error('url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('Status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option {{ $footer->status == 1 ? 'selected' : '' }} value="1">{{ __('Active') }}
                            </option>
                            <option {{ $footer->status == 0 ? 'selected' : '' }} value="0">{{ __('Inactive') }}
                            </option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
