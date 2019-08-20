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
                    @include('admin.partials.flash')
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
                                <h2 class="box-title">Edit Attribute</h2>
                            </div>
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
                                    <form action="{{route('attribute.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Code</label>
                                            <input type="text" name="code" class="form-control"
                                                   placeholder="Enter attribute code"
                                                   id="code"
                                                   value="{{ old('code') }}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter attribute name"
                                                   id="name"
                                                   name="name"
                                                   value="{{ old('name') }}"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Frontend Type</label>
                                            <select class="form-control select2" name="frontend_type" style="width: 100%;">
                                                @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                                                @foreach($types as $key => $label)
                                                    <option value="{{ $key }}">{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="is_filterable" name="is_filterable"/>Filterable
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="is_required" name="is_required"/>Required
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success">Save Attribute</button>
                                            <a class="btn btn-danger" href="{{ route('attribute.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
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
