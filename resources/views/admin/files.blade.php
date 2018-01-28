@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                @foreach($files as $file)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="{{ asset("images/$file->file_name") }}" alt="...">
                            <div class="caption">
                                <h3>{{ $file->file_name }}</h3>
                                <h3>{{ $file->type }}</h3>
                                <h3>{{ $file->user->name }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
