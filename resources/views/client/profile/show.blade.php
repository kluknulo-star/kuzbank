@extends('client.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">Профиль</h1>
                        <a href="{{route('client.profile.edit', ['user' => $user->id])}}"
                           class="text-info mr-2">
                        <button class="btn">
                            <i class="fas fa-paint-brush"></i>
                        </button>
                        </a>
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
                                <p><b>ID:</b> {{$user->id}}</p>
                                <p><b>Фамилия:</b> {{$user->surname}}</p>
                                <p><b>Имя:</b> {{$user->name}}</p>
                                <p><b>Email:</b> {{$user->email}}</p>
                                @isset($user->patronymic)
                                    <p><b>Отчество:</b> {{$user->patronymic}}</p>
                                @endisset
                                @isset($user->bank_branch_id)
                                    <p><b>Отделение
                                            банка:</b> {{'г.' . $user->bankBranch->city . ', ул.' . $user->bankBranch->street . ', д.' . $user->bankBranch->house}}
                                    </p>
                                @endisset
                                @isset($user->bonus_rate_id)
                                    <p><b>Бонусная система: </b>
                                        <a href="{{route('client.bonusRates.show', $user->bonusRate->id)}}" target="_blank">{{$user->bonusRate->title}}</a>
                                    </p>
                                @endisset
                                @isset($user->passport_info)
                                    <p><b>Паспортные данные:</b> {{$user->passport_info}}</p>
                                @endisset
                                {{--                                <p><b>Дата создания:</b> {{$user->created_at?? 'Неизвестно'}}</p>--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection

