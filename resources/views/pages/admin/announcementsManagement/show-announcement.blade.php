@extends('layouts.app')

@section('template_title')
  {!! trans('usersmanagement.showing-user', ['name' => $announcement->title]) !!}
@endsection


@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

                    <div class="card-header text-white bg-success">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {!! trans('Read mode') !!}
                            </span>



                            <div class="pull-right">
                                    <a class="btn btn-primary btn-sm" href="/announcements">
                                        {!! trans('Back to Announcements') !!}
                                    </a> 
                                    <a class="btn btn-info btn-sm" href="/announcements/create">
                                        {!! trans('+ New Announcement') !!}
                                    </a>                     
                            </div>

                        </div>
                    </div>


          <div class="card-body">
            <h4>{{$announcement->title}}</h4>
            <h4>{{$announcement->category}}</h4>
            <p>{{$announcement->body}}</p>
            <div class="row">

              <div class="col-md-6">
                  <small class="pull-left">by {{$announcement->postedBy}}</small>
              </div>
              <div class="col-md-6">
              <small class="pull-right"> Written on {{$announcement->created_at}}</small>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                
                  <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('announcements/' . $announcement->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                      {!! trans('Edit') !!}
                  </a>
              </div>
              <div class="col-md-6">
                    {!! Form::open(array('url' => 'announcements/' . $announcement->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}

                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::button(trans('Remove'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                    {!! Form::close() !!}
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

  @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @if(config('usersmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
