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
  border: solid, black, 1px !important;
  padding: 10px;
  border-radius: 8px;
  background-color: skyblue !important;
}
.post_card{
    height: 580px;
    overflow: scroll;
    background: lightgreen;
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

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-4 post_card">
                                    <h4>All Posts</h4>
                                    <hr>

                                    @foreach($blogs as $blog)
                                            <h6><a href="{{ URL::to('blogs/' . $blog->id) }}">
                                        {{$blog->title}}</a></h6>
                                        <hr>
                                    @endforeach

                                </div>
                                <div class="col-md-8 col-sm-12">

                                    @foreach($blogs as $blog)
                                    <div class="container">
                                        <div class="row blogs">
                                            <div class="col-md-12">

                                    <div class="card">
                                        <div class="card-blocks">
                                            <h4><a href="">
                                        {{$blog->title}}</a></h4>
                                        <img src="">
                                                              
                                             <small class="pull-left">by {{$blog->postedBy}}</small> 
                                             <br>
                                             <small class="pull-right"> Written on {{$blog->created_at}}</small>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('blogs/' . $blog->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('Read') !!}
                                                </a>
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
    @if ((count($users) > config('usersmanagement.datatablesJsStartCount')) && config('usersmanagement.enabledDatatablesJs'))
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
