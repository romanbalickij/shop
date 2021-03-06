@extends('admin.layouts.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content container-fluid">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$subTitle}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="">
                            <div class="box-header">
                                <h2 class="box-title">All Categories</h2>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <a href="{{route('category.create')}}" class="btn btn-success btn-lg">Create Category</a> <br> <br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>slug</th>
                                        <th>parent</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      @foreach($categories as $category)

                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>{{$category->parent->name}}</td>
                                        <td>

                                            <td><a href="{{route('category.edit',$category->id)}}" class="fa fa-pencil"></a>
                                                <form method="POST" action="{{route('category.delete',$category->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        По вопросам к главному администратору.
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->

        </section>
        <!-- /.content -->
    </div>


@endsection
