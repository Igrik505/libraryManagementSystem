@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="buttons-back">
                    <div class="btn back-btn"><a href="{{'/publishers'}}">← Назад</a></div>
                </div>
                <div class="card">

                    <div class="card-header">{{ __('Додати видавця') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{URL::to('/admin/publisher/save')}}">
                            @csrf
                            <div class="padding-form">
                                <label for="name">Назва</label>
                                <input type="text" class="form-control" name="name"
                                       required>
                                <label for="address">Адрес</label>
                                <input type="text" class="form-control" name="address"
                                       required>
                                <button type="submit" class="btn btn-primary btn-margin">{{__('Створити')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
