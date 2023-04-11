@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование бонусной системы</h1>
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

                        <form action="{{route('admin.bonusRates.update', ['bonusRate' => $bonusRate->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Название
                                    <input type="text" class="form-control" name="title" value="{{$bonusRate->title}}">
                                </label>
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Процент
                                    <input type="number" step="0.1" class="form-control" name="percent" value="{{$bonusRate->percent}}">
                                </label>
                                @error('percent')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-auto">
                                    <a href="{{route('admin.bonusRates.index')}}" class="btn btn-outline-dark">Вернуться</a>
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

