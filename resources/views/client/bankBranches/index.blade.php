@extends('client.layouts.main')


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
                        <h1 class="m-0">Отделения банков</h1>
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
                                        <th>Город</th>
                                        <th>Улица</th>
                                        <th>Дом</th>
                                        <th class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bankBranches as $bankBranch)
                                        <tr>
                                            <td>{{$bankBranch->id}}</td>
                                            <td>{{$bankBranch->city}}</td>
                                            <td>{{$bankBranch->street}}</td>
                                            <td>{{$bankBranch->house}}</td>
                                            <td class="text-center">
                                                <a href="{{route('client.bankBranches.show', ['bankBranch' => $bankBranch->id])}}"
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
                {{$bankBranches->withQueryString()->links()}}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection

