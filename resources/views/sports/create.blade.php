@extends('layouts.app')

@section('content')
    @php

    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('store') }}">
                    @foreach ($sports as $sport)
                        <div class="card mb-4">
                            <div class="card-header">{{ $sport->name }}</div>

                            <div class="card-body">
                                @csrf

                                <div class="form-group row">
                                    <label for="first" class="col-md-4 col-form-label text-md-right">1st place:</label>

                                    <div class="col-md-6">
                                        <select name="first_{{$sport->id}}"
                                                class="form-control @error("first_$sport->id") is-invalid @enderror">
                                            <option disabled>-- choose country --</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error("first_$sport->id")
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="second" class="col-md-4 col-form-label text-md-right">2nd place:</label>

                                    <div class="col-md-6">
                                        <select name="second_{{$sport->id}}" id="second"
                                                class="form-control @error("second_$sport->id") is-invalid @enderror">
                                            <option disabled>-- choose country --</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error("second_$sport->id")
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="third" class="col-md-4 col-form-label text-md-right">3rd place:</label>

                                    <div class="col-md-6">
                                        <select name="third_{{$sport->id}}" id="third"
                                                class="form-control @error("third_$sport->id") is-invalid @enderror">
                                            <option disabled>-- choose country --</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error("third_$sport->id")
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
