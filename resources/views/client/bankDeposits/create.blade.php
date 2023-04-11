@extends('client.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создать вклад</h1>
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

                        <form action="{{route('client.bankDeposits.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2 row">
                                <div class="col-auto">
                                    <label for="categorySelect">Выберите тип вклада</label>
                                    <select class="form-control" id="roleSelect" name="type_deposit_id">
                                        @foreach($typeDeposits as $typeDeposit)
                                            <option
                                                {{$typeDeposit->id == old('type_deposit_id') ? ' selected ' : ''}}
                                                value="{{$typeDeposit->id}}">{{$typeDeposit->title .' ('. $typeDeposit->percent . '% -> ' . $typeDeposit->duration_month . 'мес.)'}}</option>
                                        @endforeach
                                    </select>
                                    @error('type_deposit_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-auto">
                                        <label for="categorySelect">Добавочный процент по тарифу</label>
                                        <div> <b>{{auth()->user()->bonusRate->title}}</b> <big>{{auth()->user()->bonusRate->percent}}%</big></div>
                                </div>
                            </div>

                            <div class="form-group w-25 mb-2">
                                <label>
                                    Сумма
                                    <input type="number" min="0" max="10000000" step="10000" class="form-control" name="amount" value="{{old('amount') ?? '100000'}}">
                                </label>
                                @error('amount')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            @error('client_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            @error('percent_bonus')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            @error('closed_at')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
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




