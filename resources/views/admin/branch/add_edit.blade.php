@extends('layouts.app')

@section('actions')
    @if($singleData->id)
    <li @if(Request::is('*edit')) class="active" @endif><a href="{{URL::to('branch/'.$singleData->id.'/edit')}}"><i class="fa fa-edit"></i> <span>Edit</span></a></li>
    <li @if(Request::is('*view')) class="active" @endif><a href="{{URL::to('branch/'.$singleData->id.'/view')}}"><i class="fa fa-search-plus"></i> <span>View</span></a></li>
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
                            <div class="form-group {{ $errors->has('branch_name') ? 'has-error' : '' }}">
                                {!!Form::label("Branch Name *")!!}
                                {!!Form::text('branch_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Branch Name'])!!}
                                <em class="error-msg">{!!$errors->first('branch_name')!!}</em>
                            </div>
                            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                {!!Form::label("Location *")!!}
                                {!!Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Enter Location'])!!}
                                <em class="error-msg">{!!$errors->first('location')!!}</em>
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