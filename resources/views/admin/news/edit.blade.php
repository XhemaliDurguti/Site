@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('New Post') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create New Post') }}</h4>
                <div class="card-header-action">
                    {{-- <a href="#" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create New
                    </a> --}}
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('Language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">--{{ __('Select') }}--</option>
                            @foreach ($languages as $lang)
                                <option {{ $lang->lang == $news->language ? 'selected':'' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Category') }}</label>
                        <select name="category" id="category" class="form-control select2">
                            <option value="">--{{ __('Select') }}--</option>
                            @foreach ($categories as $category ) 
                                <option {{ $category->id == $news->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>                                
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Image') }}</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('Title') }}</label>
                        <input type="text" name="title" class="form-control" value="{{ $news->title }}"/>
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Content') }}</label>
                        <textarea name="content" class="summernote-simple form-control">{{ $news->content }}</textarea>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>{{ __('Tags') }}</label>
                        <input type="text" name="tags" value="{{ formatTags($news->tags()->pluck('name')->toArray()) }}" class="form-control inputtags">
                    </div>
                    @error('tags')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">{{ __('Meta Title') }}</label>
                        <input type="text" id="meta_title" value="{{ $news->meta_title }}" name="meta_title" class="form-control" />
                        @error('meta_title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Meta Description') }}</label>
                        <textarea name="meta_description" class="form-control">{{ $news->meta_description }}</textarea>
                        @error('met_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('Is Breaking News') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->is_breaking_news == 1 ? 'checked' : '' }} value="1" type="checkbox" name="is_breaking_news"
                                        class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('Show At Slider') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->show_at_slider == 1 ? 'checked' : ''  }} value="1" type="checkbox" name="show_at_slider" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('Show At Popular') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->show_at_popular == 1 ? 'checked' : ''  }} value="1" type="checkbox" name="show_at_popular"
                                        class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('Status') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->status == 1 ?'checked':'' }} value="1" type="checkbox" name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                "background-image": "url({{ asset($news->image) }})",
                "background-size": "cover",
                "background-position": "center",
            });
            $('#language-select').on('change', function() {
                // alert("hello");
                let lang = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.fetch-news-category') }}",
                    data: {
                        lang: lang
                    },
                    success: function(data) {
                        $('#category').html("");
                        $('#category').html(
                            `<option value="">--{{ __('Select') }}--</option>`);

                        $.each(data, function(index, data) {
                            $('#category').append(
                                `<option value="${data.id}">${data.name}</option>`
                            );
                        })
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            })
        });
    </script>
@endpush
