@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')
<div class="row">
  <div class="col-md-6 col-sm-12 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
              <span id="card_title">
                  {!! trans('Blogs') !!}
              </span>
          </div>
      </div>
      <div class="card-body">

         @foreach($blogs as $blog)
              <small><a href="{{ URL::to('blogs/' . $blog->id) }}">
          {{$blog->title}}</a></small>
          <hr>
      @endforeach
        
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-12 grid-margin stretch-card">
    <div class="card card-statistics">

      <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
              <span id="card_title">
                  {!! trans('Announcements') !!}
              </span>
          </div>
      </div>
      <div class="card-body">

         @foreach($announcements as $announcement)
              <small><a href="{{ URL::to('announcements/' . $announcement->id) }}">
          {{$announcement->title}}</a></small>
          <hr>
      @endforeach
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Your details</h4>
        <div class="table-responsive">
          <table class="table table-striped">
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