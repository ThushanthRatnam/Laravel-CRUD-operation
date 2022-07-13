@extends('layouts.app')

@section('actions')
    <li @if(Request::is('*edit')) class="active" @endif><a href="{{URL::to('branch/'.$singleData->id.'/edit')}}"><i class="fa fa-edit"></i> <span>Edit </span></a></li>||
    <li @if(Request::is('*view')) class="active" @endif><a href="{{URL::to('branch/'.$singleData->id.'/view')}}"><i class="fa fa-search-plus"></i> <span>View</span></a></li> ||
@endsection

@section('content')
<div class="container">  
    <div class="nav-tabs-custom">
        @include('admin.'.$module.'.header')
        <div class="tab-content">
            <div class="tab-pane active">
            
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                        
                            <table class="table table-bordered table-view">
                                <tr><th>Branch</th> <td>{{$singleData->branch_name}}</td> </tr>
                                <tr><th>Location</th> <td>{{$singleData->location}}</td> </tr>
                                <tr><th>Created</th> <td>{{$singleData->created_at}}</td> </tr>
                                <tr><th>Updated</th> <td>{{$singleData->updated_at}}</td> </tr>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection