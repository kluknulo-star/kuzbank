@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление пользователя</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">

                        <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
                                <label>
                                    Имя
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </label>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label for="categorySelect">Выберите роль</label>
                                <select class="form-control" id="roleSelect" name="role_id">
                                    @foreach($roles as $id => $role)
                                        <option
                                            {{$id == old('role_id') ? ' selected ' : ''}}
                                            value="{{$id}}">{{$role}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Создать</button>
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




