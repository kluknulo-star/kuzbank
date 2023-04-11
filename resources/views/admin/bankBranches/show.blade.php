@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">Отделение банка №{{$bankBranch->id}}</h1>
                        <a href="{{route('admin.bankBranches.edit', ['bankBranch' => $bankBranch->id])}}"
                           class="text-info mr-2">
                        <button class="btn">
                            <i class="fas fa-paint-brush"></i>
                        </button>
                        </a>
                        <form action="{{route('admin.bankBranches.destroy', ['bankBranch' => $bankBranch->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="" class="text-danger">
                                <button type="submit" class="btn">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </a>
                        </form>
                    </div><!-- /.col -->

                </div><!-- /.row -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto mb-2">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="px-4 py-4 card-body p-0">
                                <p><b>ID:</b> {{$bankBranch->id}}</p>
                                <p><b>Город:</b> {{$bankBranch->city}}</p>
                                <p><b>Улица:</b> {{$bankBranch->street}}</p>
                                <p><b>Дом:</b> {{$bankBranch->house}}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div>
                        <a href="{{route('admin.bankBranches.index')}}" class="btn btn-dark">Вернуться</a>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection

