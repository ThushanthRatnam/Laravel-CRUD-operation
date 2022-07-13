@extends('layouts.app')

@section('actions')
    @if($singleData->id)
    <li @if(Request::is('*edit')) class="active" @endif><a href="{{URL::to('product/'.$singleData->id.'/edit')}}"><i class="fa fa-edit"></i> <span>Edit</span></a></li>
    <li @if(Request::is('*view')) class="active" @endif><a href="{{URL::to('product/'.$singleData->id.'/view')}}"><i class="fa fa-search-plus"></i> <span>View</span></a></li>
    @endif
@endsection

@section('content')
<div class="container">  
    <div class="nav-tabs-custom">
        @include('admin.'.$module.'.header')
        <div class="tab-content">
            <div class="tab-pane active">
                {!!Form::model($singleData, array('files' => true, 'autocomplete' => 'off'))!!}
                {!!csrf_field()!!}
                <div class="row">
                    <div class="col-8">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('product_name') ? 'has-error' : '' }}">
                                {!!Form::label("Product Name *")!!}
                                {!!Form::text('product_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Name'])!!}
                                <em class="error-msg">{!!$errors->first('product_name')!!}</em>
                            </div>
                            <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                                {!!Form::label("Brand *")!!}
                                {!!Form::text('brand', null, ['class' => 'form-control', 'placeholder' => 'Enter brand'])!!}
                                <em class="error-msg">{!!$errors->first('brand')!!}</em>
                            </div>
                            <div class="form-group {{ $errors->has('import_from') ? 'has-error' : '' }}">
                                {!!Form::label("Import From *")!!}
                                {!!Form::text('import_from', null, ['class' => 'form-control', 'placeholder' => 'Enter import_from'])!!}
                                <em class="error-msg">{!!$errors->first('import_from')!!}</em>
                            </div>
                            <div class="form-group {{ $errors->has('unit_price') ? 'has-error' : '' }}">
                                {!!Form::label("Unit Price *")!!}
                                {!!Form::number('unit_price', null, ['class' => 'form-control', 'placeholder' => 'Enter unit_price'])!!}
                                <em class="error-msg">{!!$errors->first('unit_price')!!}</em>
                            </div>
                        </div>
            
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection