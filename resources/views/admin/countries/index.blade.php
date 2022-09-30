@extends('admin.layouts.app')
@section('title')
    @lang('Lista de Países')
@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="categories-show-table table table-hover table-striped table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">@lang('SL')</th>
                                    <th scope="col">@lang('Identity Type')</th>
                                    <th scope="col">@lang('Status')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $Country)
                                    <tr>
                                        <td data-label="@lang('SL')">{{++$key}}</td>
                                        <td data-label="@lang('SL')">{{$Country->name}}</td>
                                        <td data-label="@lang('SL')">{{$Country->status}}</td>
                                        <td data-label="@lang('SL')">{{$Country->image}}</td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
