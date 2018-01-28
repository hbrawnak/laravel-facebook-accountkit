@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users Table
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            @if(Session::has('errorMessage'))
                <div class="alert alert-danger">
                    <div class="col-md-4 col-md-offset-4 error">
                        {{ Session::get('errorMessage') }}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                    {{--<div class="box-header">--}}
                    {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
                    {{--</div>--}}
                    <!-- /.box-header -->
                        <div class="box-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Files</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->fbUserId }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->number }}</td>
                                        <td>{{ App\User::fileCount($user->id) }}</td>
                                        <td>
                                            <a href="{{ route('admin.getFile', ['id' => $user->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Files</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
