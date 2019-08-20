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
                            <!-- /.box-header -->
                            <div class="box-body">
                                <a href="{{route('attribute-values.create')}}" class="btn btn-success btn-lg">Create Attribute Values</a> <br> <br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>value</th>
                                        <th>attribute</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($attributeValues as $attribute)
                                            <td>{{$attribute->id}}</td>
                                            <td>{{$attribute->value}}</td>
                                            <td>{{$attribute->getAttributeName()}}</td>
                                            <td><a href="{{route('attribute-values.edit',$attribute->id)}}" class="fa fa-pencil"></a>
                                                <form method="POST" action="{{route('attribute-values.destroy',$attribute->id)}}">
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
