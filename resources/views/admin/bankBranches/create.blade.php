@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавлить отделение банка</h1>
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

                        <form action="{{route('admin.bankBranches.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Город
                                    <input type="text" class="form-control" name="city" value="{{old('city')}}">
                                </label>
                                @error('city')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Улица
                                    <input type="text" class="form-control" name="street" value="{{old('street')}}">
                                </label>
                                @error('street')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25 mb-2">
                                <label>
                                    Дом
                                    <input type="text" class="form-control" name="house" value="{{old('house')}}">
                                </label>
                                @error('house')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Добавить</button>
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




