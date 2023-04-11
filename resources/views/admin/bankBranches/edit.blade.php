@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование отделения банка</h1>
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

                        <form action="{{route('admin.bankBranches.update', ['bankBranch' => $bankBranch->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Город
                                    <input type="text" class="form-control" name="city" value="{{$bankBranch->city}}">
                                </label>
                                @error('city')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Улица
                                    <input type="text" class="form-control" name="street" value="{{$bankBranch->street}}">
                                </label>
                                @error('street')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Дом
                                    <input type="text" class="form-control" name="house" value="{{$bankBranch->house}}">
                                </label>
                                @error('house')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-auto">
                                    <a href="{{route('admin.bankBranches.index')}}" class="btn btn-outline-dark">Вернуться</a>
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

