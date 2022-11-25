@extends('admin.layouts.layout')

@section('title', 'Главная')

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                Start creating your amazing application!
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
