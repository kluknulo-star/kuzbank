@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование вида вклада</h1>
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

                        <form action="{{route('admin.typeDeposits.update', ['typeDeposit' => $typeDeposit->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Название
                                    <input type="text" class="form-control" name="title" value="{{$typeDeposit->title}}">
                                </label>
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Процент
                                    <input type="number" step="0.1" class="form-control" name="percent" value="{{$typeDeposit->percent}}">
                                </label>
                                @error('percent')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Длительность(в месяцах)
                                    <input type="number" step="1" class="form-control" name="duration_month" value="{{$typeDeposit->duration_month}}">
                                </label>
                                @error('duration_month')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-auto">
                                    <a href="{{route('admin.typeDeposits.index')}}" class="btn btn-outline-dark">Вернуться</a>
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

