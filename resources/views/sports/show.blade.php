@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Results</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Country</th>
                                    <th scope="col">Gold</th>
                                    <th scope="col">Silver</th>
                                    <th scope="col">Bronze</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($countries as $country)
                                <tr>
                                    <td>{{$country->name}}</td>
                                    <td>{{$country->firstCount}}</td>
                                    <td>{{$country->secondCount}}</td>
                                    <td>{{$country->thirdCount}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No data</td>
                                </tr>
                            @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
