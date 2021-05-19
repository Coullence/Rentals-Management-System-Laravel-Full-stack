@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-cube text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Submission</p>
            <div class="fluid-container">
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>My Submissions </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
          </div>
          <div class="float-right">
              <h3 class="font-weight-medium text-right mb-0">246</h3>
            <div class="fluid-container">
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Projects </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-poll-box text-success icon-lg"></i>
          </div>
          <div class="float-right">
              <h3 class="font-weight-medium text-right mb-0">246</h3>
            <div class="fluid-container">
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Downloads </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">246</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales </p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Orders</h4>
        <div class="table-responsive  ">
          <table class="table table-striped table-condensed">
            <thead>
              <tr>
                <th> # </th>
                <th> Name </th>
                <th> Project Title </th>
                <th> Category </th>
                <th> Created On </th>
                <th> View </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="font-weight-medium"> 1 </td>
                <td> Herman Beck </td>
                
                <td>Lab Information System</td>
                <td class="text-success"> Corporate 
                </td>
                <td> May 15, 2015 </td>
                <td> <button class="btn btn-info btn-sm" >View</button></td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 2 </td>
                <td> Messsy Adam </td>
               
                <td>Lab Information System</td>
                <td class="text-success"> Individual 
                </td>
                <td> July 1, 2015 </td>
                <td> <button class="btn btn-info btn-sm" >View</button></td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 3 </td>
                <td> John Richards </td>
                
                <td>Lab Information System</td>
                <td class="text-success"> Individual </i>
                </td>
                <td> Apr 12, 2015 </td>
                <td> <button class="btn btn-info btn-sm" >View</button></td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 4 </td>
                <td> Peter Meggik </td>
                
                <td>Lab Information System</td>
                <td class="text-success"> Institution 
                </td>
                <td> May 15, 2015 </td>
                <td> <button class="btn btn-info btn-sm" >View</button></td>
              </tr>
              <tr>
                <td class="font-weight-medium"> 5 </td>
                <td> Edward </td>
               
                <td>Lab Information System</td>
                <td class="text-success"> Coporate
                </td>
                <td> May 03, 2015 </td>
                <td> <button class="btn btn-info btn-sm" >View</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection