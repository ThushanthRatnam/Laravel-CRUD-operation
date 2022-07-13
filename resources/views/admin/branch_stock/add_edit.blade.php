@extends('layouts.app')

@section('actions')
    @if($singleData->id)
    <li @if(Request::is('*edit')) class="active" @endif><a href="{{URL::to('branch_stock/'.$singleData->id.'/edit')}}"><i class="fa fa-edit"></i> <span>Edit</span></a></li>
    <li @if(Request::is('*view')) class="active" @endif><a href="{{URL::to('branch_stock/'.$singleData->id.'/view')}}"><i class="fa fa-search-plus"></i> <span>View</span></a></li>
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
                            <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
                                {!!Form::label("Product Name *")!!}
                                {!!Form::select('product_id',$productData, null, ['class' => 'form-control', 'placeholder' => 'Select Product Name'])!!}
                                <em class="error-msg">{!!$errors->first('product_id')!!}</em>
                            </div>
                            <div class="form-group {{ $errors->has('branch_id') ? 'has-error' : '' }}">
                                {!!Form::label("Branch *")!!}
                                {!!Form::select('branch_id', $branchData, null, ['class' => 'form-control', 'placeholder' => 'Select branch'])!!}
                                <em class="error-msg">{!!$errors->first('branch_id')!!}</em>
                            </div>
                            <div class="form-group {{ $errors->has('remaining_qty') ? 'has-error' : '' }}">
                                {!!Form::label("Remainig Qty *")!!}
                                {!!Form::number('remaining_qty', null, ['class' => 'form-control', 'placeholder' => 'Enter Remaining Qty'])!!}
                                <em class="error-msg">{!!$errors->first('remaining_qty')!!}</em>
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