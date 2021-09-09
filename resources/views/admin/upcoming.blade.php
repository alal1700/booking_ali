@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3 class="mb-0">{{ __('Upcpming Appointments') }}</h3>
                            </div>
                        </div>
                    </div>    
                    <div class="card-body">

                        <div class="table-responsive py-4">
                            <table class="table align-items-center table-flush text-center"  id="datatable-basic">
                                <thead class="thead-light">
                                    <tr>                                   
                                        <th scope="col">{{ __(' Name') }}</th>
                                        <th scope="col">{{ __(' Gender') }}</th>
                                        <th scope="col">{{ __(' Birthday') }}</th>
                                        <th scope="col">{{ __(' Email') }}</th>
                                        <th scope="col">{{ __(' Phone') }}</th>  
                                        <th scope="col">{{ __(' Type')}}</th>  
                                        <th scope="col">{{ __(' Date')}}</th>  
                                        <th scope="col">{{ __(' Time')}}</th> 
                                        <th scope="col">{{ __(' Information')}}</th>  
                                        <th scope="col"></th>                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appoints as $option)
                                        <tr>         
                                            <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                            <input type="hidden" name="name" class="name" value="{{$option->name}}" />  
                                            <input type="hidden" name="image" class="image" value="{{$option->image}}" />  
                                            <input type="hidden" name="info" class="info" value="{{$option->info}}" />  
                                        
                                            <td> 
                                                @forelse($customers as $customer)
                                                    @php
                                                        if($customer->id == $option->customers_id){
                                                            echo $customer->fname.' '.$customer->lname;
                                                        } 
                                                    @endphp
                                                @empty       
                                                
                                                @endforelse   
                                            </td>

                                            <td> 
                                                @forelse($customers as $customer)
                                                    @php
                                                        if($customer->id == $option->customers_id){
                                                            echo $customer->gender;
                                                        } 
                                                    @endphp
                                                @empty       
                                                
                                                @endforelse   
                                            </td>

                                            <td> 
                                                @forelse($customers as $customer)
                                                    @php
                                                        if($customer->id == $option->customers_id){
                                                            echo $customer->birthday;
                                                        } 
                                                    @endphp
                                                @empty       
                                                
                                                @endforelse   
                                            </td>

                                            <td> 
                                                @forelse($customers as $customer)
                                                    @php
                                                        if($customer->id == $option->customers_id){
                                                            echo $customer->email;
                                                        } 
                                                    @endphp
                                                @empty       
                                                
                                                @endforelse   
                                            </td>

                                            <td> 
                                                @forelse($customers as $customer)
                                                    @php
                                                        if($customer->id == $option->customers_id){
                                                            echo $customer->phone;
                                                        } 
                                                    @endphp
                                                @empty       
                                                
                                                @endforelse   
                                            </td>

                                            <td>{{ $option->about }}</td>
                                            <td>{{ $option->appoint_date }}</td>
                                            <td>{{ $option->appoint_time }}</td>
                                            <td>{{ $option->info }}</td>
                                            
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
                                                        <a href="{{route('upcoming.delete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    
@endpush

@push('js')
<script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush
