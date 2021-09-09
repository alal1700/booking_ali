@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">{{ __('Welcome') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-stats">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col">
                                          <h5 class="card-title text-uppercase text-muted mb-0">All Customers</h5>
                                          <span class="h2 font-weight-bold mb-0">{{ $customers->count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="ni ni-chart-pie-35"></i>
                                            </div>
                                        </div>
                                      </div>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-stats">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col">
                                          <h5 class="card-title text-uppercase text-muted mb-0">Total Appointments</h5>
                                          <span class="h2 font-weight-bold mb-0">{{ $all_appoints->count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                          <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                          </div>
                                        </div>
                                      </div>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-stats">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col">
                                          <h5 class="card-title text-uppercase text-muted mb-0">Today Appointments</h5>
                                          <span class="h2 font-weight-bold mb-0">{{ $today_appoints->count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                          <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                          </div>
                                        </div>
                                      </div>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-stats">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col">
                                          <h5 class="card-title text-uppercase text-muted mb-0">Upcoming Appointments</h5>
                                          <span class="h2 font-weight-bold mb-0">{{ $upcoming_appoints->count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                          <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                          </div>
                                        </div>
                                      </div>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-stats">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col">
                                          <h5 class="card-title text-uppercase text-muted mb-0">Previous Appointments</h5>
                                          <span class="h2 font-weight-bold mb-0">{{ $prev_appoints->count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                          <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                          </div>
                                        </div>
                                      </div>                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
