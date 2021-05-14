@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @alertSuccess
            @alertError
            @alertInfo
            <div class="card">
                <div class="card-header">Hash URL</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('url.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required placeholder="{{ __('Enter URL') }}" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="max_hits" type="number" class="form-control @error('max_hits') is-invalid @enderror" name="max_hits" value="{{ old('max_hits') }}" required placeholder="{{ __('Enter Max Hits Allowed on this Url.') }}">
                                @error('max_hits')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="emailHelp" class="form-text">This URL will expire after these max hits!</div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    @if (session('success'))
                        <div class="success-block mt-3">
                            <div class="shortened_url">
                                <strong>Actual URL:</strong> {{session('actualUrl')}}
                            </div>
                            <div class="shortened_url">
                                <strong>Shortened URL:</strong> {{session('aliasedUrl')}} <span><a href="{{session('aliasedUrl')}}"><i class="fas fa-arrow-circle-right"></i></a></span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
