@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Role') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create Role') }}</h4>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Role Name') }}</label>
                        <input type="text" class="form-control" name="role">
                        @error('role')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <hr>

                    @foreach ($premissions as $groupName => $premission)
                        <div class="form-group">
                            <h6 class="text-primary">{{ $groupName }}</h6>
                            <div class="row">
                                @foreach ($premission as $item)
                                    <div class="col-md-2">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" value="{{ $item->name }}" name="permissions[]"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description text-primary">{{ $item->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
@endpush
