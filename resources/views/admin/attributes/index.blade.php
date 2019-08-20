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
                    @include('admin.partials.flash')
                    <div class="box-body">
                        <div class="">
                            <div class="box-header">
                                <h2 class="box-title">Attributes</h2>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <a href="{{route('attribute.create')}}" class="btn btn-success btn-lg">Create</a> <br> <br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Filterable</th>
                                        <th>Required</th>
                                        <th>Front-Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                 @foreach($attributes as $attribute)
                                        <td>{{$attribute->id}}</td>
                                        <td>{{$attribute->code}}</td>
                                        <td>{{$attribute->name}}</td>
                                        <td>
                                        @if ($attribute->is_filterable == 1)
                                            <span class="badge badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                        </td>
                                        <td class="text-center">
                                        @if ($attribute->is_required == 1)
                                            <span class="badge badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                        </td>
                                            <td>{{$attribute->frontend_type}}</td>
                                            <td><a href="{{route('attribute.edit',$attribute->id)}}" class="fa fa-pencil"></a>
                                                <form method="POST" action="{{route('attribute.destroy',$attribute->id)}}">
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
