@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nav-tabs-custom">    
        @include('admin.'.$module.'.header')
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Branch Name</th>
                                    <th>User Name</th>
                                    <th>Reminaing Qty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php $count = 0; ?>
                                @foreach ($allData as $row)
                                <?php $count++; ?>
                                <tr class="">
                                    <td>{{$count}}</td>
                                    <td><a href="{{ URL::to('branch_stock/'.$row->id.'/view')}}">{!!$row->product_name!!}</a></td>
                                    <td>{{$row->branch_name}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->remaining_qty}}</td>
                                    <td>
                                        <a href="{{URL::to('branch_stock/'.$row->id.'/view')}}" class="btn btn-sm btn-success"> view</a>
                                        <a href="{{URL::to('branch_stock/'.$row->id.'/edit')}}" class="btn btn-sm btn-warning"> Edit </a>
                                        <a href="{{URL::to('branch_stock/'.$row->id.'/delete')}}" class="btn btn-sm btn-danger"> Delete </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!!$allData->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
