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
                                <h2 class="box-title">Edit Category</h2>
                            </div>
                        @include('admin.partials.flash')
                            <!-- /.box-header -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="box-body">
                                <div class="col-md-6">
                                    <form action="{{route('category.update')}}" method="POST">
                                        @method('PATCH')
                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Название</label>
                                            <input class="form-control " type="text" name="name" id="name" value="{{ old('name', $targetCategory->name) }}"/>
                                            <input type="hidden" name="id" value="{{ $targetCategory->id }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="parent">Parent Category <span class="m-l-5 text-danger"> *</span></label>
                                            <select id=parent class="form-control custom-select mt-15" name="parent_id">
                                                <option value="0">Select a parent category</option>
                                                @foreach($categories as $category)
                                                @if ($targetCategory->parent_id == $category->id)
                                                        <option value="{{ $category->id }}" selected> {{ $category->name }} </option>
                                                @else
                                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-warning">Update</button>
                                        </div>
                                    </form>
                                </div>
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
