@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
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

                        <form action="{{route('admin.users.update', ['user' => $user->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-50 mb-2">
                                <label>Фамилия</label>
                                <input type="text" class="form-control" name="surname" value="{{$user->surname}}">
                                @error('surname')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50 mb-2">
                                <label>Имя</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50 mb-2">
                                <label>Отчество</label>
                                <input type="text" class="form-control" name="patronymic" value="{{$user->patronymic}}">
                                @error('patronymic')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50 mb-2">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50 mb-2">
                                <label for="categorySelect">Выберите роль</label>
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        <option
                                            {{$role->id == $user->role->id ? ' selected ' : ''}}
                                            value="{{$role->id}}">{{$role->title}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50 mb-2">
                                <label for="categorySelect">Выберите отделение(для сотрудника)</label>
                                <select class="form-control" name="bank_branch_id">
                                    <option selected ></option>
                                    @foreach($bankBranches as $bankBranch)
                                        <option
                                            {{$bankBranch->id == optional($user->bankBranch)->id ? ' selected ' : ''}}
                                            value="{{$bankBranch->id}}">
                                            {{'г.' . $bankBranch->city . ', ул.' . $bankBranch->street . ', д.' . $bankBranch->house}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('bank_branch_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50 mb-2">
                                <label for="categorySelect">Выберите бонусную систему(для клиента)</label>
                                <select class="form-control" name="bonus_rate_id">
                                    <option selected ></option>
                                    @foreach($bonusRates as $bonusRate)
                                        <option
                                            {{$bonusRate->id == optional($user->bonusRate)->id ? ' selected ' : ''}}
                                            value="{{$bonusRate->id}}">{{$bonusRate->title}}</option>
                                    @endforeach
                                </select>
                                @error('bonus_rate_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Обновить</button>
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

