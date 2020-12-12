@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.messages')
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="buttons">
                    <div class="btn btn-success link-btn"><a href="{{'/createTypeOfBook.blade.php'}}">Додати тип</a>
                    </div>
                    <div class="btn btn-secondary link-btn"><a href="{{'home'}}">Видані</a></div>
                    <div class="btn btn-secondary link-btn"><a href="{{'/books'}}">Книги</a></div>
                    <div class="btn btn-secondary link-btn"><a href="{{'/readers'}}">Читачі</a></div>
                    <div class="btn btn-secondary link-btn"><a href="{{'/authors'}}">Автори</a></div>
                    <div class="btn btn-secondary link-btn"><a href="{{'/publishers'}}">Видавці</a></div>
                    <div class="btn btn-secondary link-btn"><a href="{{'/users'}}">Користувачі</a></div>
                </div>
                <div class="card">

                    <div class="card-header">{{ __('Типи книжок') }}</div>

                    <div class="card-body scrollable">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Назва типу</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $typeOfBook)
                                <tr>
                                    <td>{{$typeOfBook->name}}</td>
                                    <td>
                                        <a class="btn btn-secondary" href="{{'/deleteTypeOfBook/'.$typeOfBook->id}}">Видалити</a>
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
@endsection
