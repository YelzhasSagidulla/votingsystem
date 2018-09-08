@extends('layouts.app')

@section('content')
    <div class="vote-form">
        <form>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="firstnameInput">{{ trans('app.firstname') }}</label>
                <input type="firstname" class="form-control" id="firstnameInput" placeholder="{{ trans('app.enter firstname') }}">
            </div>
            <div class="form-group">
                <label for="lastnameInput">{{ trans('app.lastname') }}</label>
                <input type="lastname" class="form-control" id="lastnameInput" placeholder="{{ trans('app.enter lastname') }}">
            </div>
            <div class="form-group">
                <label for="patronymicInput">{{ trans('app.patronymic') }}</label>
                <input type="patronymic" class="form-control" id="patronymicInput" placeholder="{{ trans('app.enter patronymic') }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('app.vote') }}</button>
        </form>
    </div>
    <div class="vote-list">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('app.firstname') }}</th>
                    <th scope="col">{{ trans('app.lastname') }}</th>
                    <th scope="col">{{ trans('app.patronymic') }}</th>
                    <th scope="col">{{ trans('app.votes') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @for($i=0; $i<20; $i++)
                    <tr class="candidate-row">
                        <td>{{ $i+1 }}</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>0</td>
                        <td><button class="btn btn-primary">{{ trans('app.vote') }}</button></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection