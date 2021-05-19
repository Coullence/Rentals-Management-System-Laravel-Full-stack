@extends('layouts.app')

@section('template_title')
    {!! trans('usersmanagement.showing-all-users') !!}
@endsection

@section('template_linked_css')
    @if(config('usersmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('usersmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
       
       .container{
        margin: auto !important;
       }
.blogs{
  margin: auto;
  padding: 10px;
}
.card-blocks{
  border: solid 1px black !important;
  padding: 10px;
  border-radius: 8px;
  background-color: lightyellow !important;
}
.post_card{
    height: 580px;
    overflow: scroll;
    background: lightblue;
    padding: 10px;
    border-radius: 8px;
}
h4{
    font-family: monospace;

}

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {!! trans('All Blogs') !!}
                            </span>



                            <div class="pull-right">
                                    <a class="btn btn-success btn-sm" href="/announcements/create">
                                        {!! trans('+ New Announcement') !!}
                                    </a>                     
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4 post_card">
                                    <h4>All Posts</h4>
                                    <hr>

                                    @foreach($announcements as $announcement)
                                            <small><a href="{{ URL::to('announcements/' . $announcement->id) }}">
                                        {{$announcement->title}}</a></small>
                                        <hr>
                                    @endforeach

                                </div>
                                <div class="col-md-8 col-sm-12">

                                    @foreach($announcements as $announcement)
                                    <div class="container">
                                        <div class="row blogs">
                                            <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-blocks">
                                            <h4><a href="">
                                        {{$announcement->title}}</a></h4>
                                        <img src="">                 
                                             <small class="pull-left">{{$announcement->category}}</small> 
                                             <br>        
                                             <small class="pull-left">by {{$announcement->postedBy}}</small> 
                                             <br>
                                             <small class="pull-right"> Written on {{$announcement->created_at}}</small>

                                            
                                                <div class="row">
                                                    <div class="col-md-4">
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('announcements/' . $announcement->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('Read') !!}
                                                </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('announcements/' . $announcement->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('Edit') !!}
                                                </a>
                                                    </div>
                                                    <div class="col-md-4">
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
                                    @endforeach
                                </div>

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
    @if ((count($announcements) > config('usersmanagement.datatablesJsStartCount')) && config('usersmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('usersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('usersmanagement.enableSearchUsers'))
        @include('scripts.search-users')
    @endif
@endsection
