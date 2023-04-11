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
                        <h1 class="m-0">Заявки на вклад</h1>
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
                        <div class="card w-75 overflow-hidden">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Клиент</th>
                                        <th>Тип вклада</th>
                                        <th>Процент</th>
                                        <th>Сумма</th>
                                        <th class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bankDeposits as $bankDeposit)
                                        <tr>
                                            <td>{{$bankDeposit->id}}</td>
                                            <td>{{$bankDeposit->client->surname . ' ' . $bankDeposit->client->name}}</td>
                                            <td>
                                                <a href="{{route('worker.typeDeposits.show', $bankDeposit->typeDeposit->id)}}"
                                                   target="_blank">
                                                    {{$bankDeposit->typeDeposit->title}}
                                                </a>
                                            </td>
                                            <td>{{$bankDeposit->percent}}%</td>
                                            <td>{{number_format($bankDeposit->amount,0)}}р</td>
                                            <td class="text-center">
                                                <a href="{{route('worker.bankDeposits.show', ['bankDeposit' => $bankDeposit->id])}}"
                                                   class="text-dark">
                                                    <button class="btn btn-outline-dark">
                                                        Рассмотреть
                                                    </button>
                                                </a>
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
                {{$bankDeposits->withQueryString()->links()}}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection

