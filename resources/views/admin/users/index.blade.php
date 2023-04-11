@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
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
                                        <th>Фамилия</th>
                                        <th>Имя</th>
                                        <th>Роль</th>
                                        <th colspan="3" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->surname}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->role->title}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin.users.show', ['user' => $user->id])}}"
                                                   class="text-dark">
                                                <button class="btn">
                                                <i class="far fa-eye"></i>
                                                </button></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('admin.users.edit', ['user' => $user->id])}}"
                                                   class="text-info">
                                                <button class="btn">
                                                    <i class="fas fa-paint-brush"></i>
                                                </button>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{route('admin.users.destroy', ['user' => $user->id])}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn">
                                                        <a href="" class="text-danger" data-toggle="modal"
                                                           data-target="#deleteCategoryModal{{$user->id}}">
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
                {{$users->withQueryString()->links()}}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection

