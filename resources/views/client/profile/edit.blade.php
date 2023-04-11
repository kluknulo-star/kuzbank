@extends('client.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование профиля</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-6">

                        <form action="{{route('client.profile.update')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-50 mb-2">
                                <label>Фамилия</label>
                                <input type="text" class="form-control" name="surname" value="{{$user->surname}}">
                                @error('surname')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50 mb-2">
                                <label>Имя</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50 mb-2">
                                <label>Отчество</label>
                                <input type="text" class="form-control" name="patronymic" value="{{$user->patronymic}}">
                                @error('patronymic')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <a href="{{route('client.profile.show')}}" class="btn btn-outline-dark">Вернуться</a>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-dark">Обновить</button>
                                </div>
                            </div>
                        </form>
                        {{-- Удалять по слову Ctrl + Backspace--}}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

