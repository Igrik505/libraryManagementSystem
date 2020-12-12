@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="buttons-back">
                    <div class="btn back-btn"><a href="{{'home'}}">← Назад</a></div>
                </div>
                <div class="card">

                    <div class="card-header">{{ __('Видати книжку') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{URL::to('/admin/lend/save')}}">
                            @csrf
                            <div class="padding-form">
                                <label for="book">Назва книжки</label>
                                <select type="text" class="form-control" name="book"
                                        required>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{$book->name}}</option>
                                    @endforeach
                                </select>
                                <label for="reader">Читач</label>
                                <select type="text" class="form-control" name="reader"
                                        required>
                                    @foreach($readers as $reader)
                                        <option value="{{ $reader->id }}">{{$reader->name}}</option>
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
