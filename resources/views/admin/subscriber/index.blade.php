@extends('admin.layouts.master')
@section('content')
   <section class="section">
        <div class="section-header">
            <h1>{{ __('Subscribers') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Send Mail To Subscribers') }}</h4>

            </div>

            <div class="card-body">
                <form action="{{ route('admin.subscribers.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Subject') }}</label>
                        <input type="text" class="form-control" name="subject">
                        @error('subject')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Message') }}</label>
                        <textarea name="message" class="summernote" id="" cols="30" rows="10"></textarea>
                        @error('message')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                </form>
            </div>


        </div>
    </section>
    <section class="section">      
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Subscribers') }}</h4>

            </div>
            <div class="card-body">
                <div class="tab-content tab-bordered" id="myTab3Content">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-subs">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subs as $sub)
                                        <tr>
                                            <td class="text-center"> {{ $sub->id }}</td>
                                            <td> {{ $sub->email }} </td>

                                            <td>

                                                <a href="{{ route('admin.subscribers.destroy', $sub->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $("#table-subs").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [1]
            }]
        });
    </script>
@endpush
