@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">Вклад №{{$bankDeposit->id}}</h1>
                        <a href="{{route('admin.bankDeposits.edit', ['bankDeposit' => $bankDeposit->id])}}"
                           class="text-info mr-2">
                        <button class="btn">
                            <i class="fas fa-paint-brush"></i>
                        </button>
                        </a>
                        <form action="{{route('admin.bankDeposits.destroy', ['bankDeposit' => $bankDeposit->id])}}" method="post">
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
                                <p><b>ID: </b> {{$bankDeposit->id}}</p>
                                <p><b>Клиент: </b> {{$bankDeposit->client->surname . ' ' . $bankDeposit->client->name}}</p>
                                <p><b>Сотрудник: </b>
                                    @isset($bankDeposit->worker)
                                        {{$bankDeposit->worker->surname . ' ' . $bankDeposit->worker->name}}
                                    @endisset
                                </p>
                                <p><b>Тип Вклада: </b>
                                    <a href="{{route('admin.typeDeposits.show', $bankDeposit->typeDeposit->id)}}" target="_blank">
                                        {{$bankDeposit->typeDeposit->title}}
                                    </a>
                                    </p>
                                <p><b>Процент: </b> {{$bankDeposit->percent}}%</p>
                                <p><b>Сумма вклада: </b> {{number_format($bankDeposit->amount,0)}}р</p>
                                <p><b>Статус: </b>
                                    @isset($bankDeposit->is_approved)
                                        @if($bankDeposit->is_approved === 1)
                                            <span class="text-success">Утвержден</span>
                                        @else
                                            <span class="text-danger">Отклонен</span>
                                        @endif
                                    @else
                                        <span class="text-info">Ожидает</span>
                                    @endisset
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div>
                        <a href="{{route('admin.bankDeposits.index')}}" class="btn btn-dark">Вернуться</a>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection

