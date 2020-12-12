@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="buttons-back">
                    <div class="btn back-btn"><a href="{{'/books'}}">← Назад</a></div>
                </div>
                <div class="card">

                    <div class="card-header">{{ __('Створити книжку') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{URL::to('/admin/books/save')}}">
                            @csrf
                            <div class="padding-form">
                                <label for="bookName">Назва</label>
                                <input type="text" class="form-control" name="bookName"
                                       required>
                                <label for="inventory">Інвентарний номер</label>
                                <input type="text" class="form-control" name="inventory"
                                       required>
                                <label for="author">Автор</label>
                                <select type="text" class="form-control" name="author"
                                        required>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{$author->name}}</option>
                                    @endforeach
                                </select>
                                <label for="publisher">Видавець</label>
                                <select type="text" class="form-control" name="publisher"
                                        required>
                                    @foreach($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">{{$publisher->name}}</option>
                                    @endforeach
                                </select>
                                <label for="type">Тип книжки</label>
                                <select type="text" class="form-control" name="type"
                                        required>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary btn-margin">{{__('Створити')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
