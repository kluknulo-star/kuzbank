@extends('admin.layouts.main')


@section('content')

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ implode('', $errors->all(':message')) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Бонусные программы</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="col-12">
                    <a class="btn btn-dark" href="{{route('admin.bonusRates.create')}}" role="button">Добавить</a>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="card w-50 overflow-hidden">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Процент</th>
                                        <th colspan="3" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bonusRates as $bonusRate)
                                        <tr>
                                            <td>{{$bonusRate->id}}</td>
                                            <td>{{$bonusRate->title}}</td>
                                            <td>{{$bonusRate->percent}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin.bonusRates.show', ['bonusRate' => $bonusRate->id])}}"
                                                   class="text-dark">
                                                <button class="btn">
                                                <i class="far fa-eye"></i>
                                                </button></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('admin.bonusRates.edit', ['bonusRate' => $bonusRate->id])}}"
                                                   class="text-info">
                                                <button class="btn">
                                                    <i class="fas fa-paint-brush"></i>
                                                </button>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{route('admin.bonusRates.destroy', ['bonusRate' => $bonusRate->id])}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn">
                                                        <a href="" class="text-danger">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>


                </div>
                <!-- /.row -->
                {{$bonusRates->withQueryString()->links()}}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection

