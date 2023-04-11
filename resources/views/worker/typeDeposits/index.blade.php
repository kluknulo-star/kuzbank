@extends('worker.layouts.main')


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
                        <h1 class="m-0">Виды вкладов</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
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
                                        <th>Процент(годовой)</th>
                                        <th>Длительность</th>
                                        <th class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($typeDeposits as $typeDeposit)
                                        <tr>
                                            <td>{{$typeDeposit->id}}</td>
                                            <td>{{$typeDeposit->title}}</td>
                                            <td>{{$typeDeposit->percent}}%</td>
                                            <td>{{$typeDeposit->duration_month}} мес.</td>
                                            <td class="text-center">
                                                <a href="{{route('worker.typeDeposits.show', ['typeDeposit' => $typeDeposit->id])}}"
                                                   class="text-dark">
                                                <button class="btn">
                                                <i class="far fa-eye"></i>
                                                </button></a>
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
                {{$typeDeposits->withQueryString()->links()}}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection

