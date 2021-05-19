@extends('layouts.app')

@section('template_title')
    {!! trans('usersmanagement.create-new-user') !!}
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            {!! trans('Create Announcement') !!}
                            <div class="pull-right">
                                <a href="{{ route('announcements') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('Back to Announcements') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    {!! trans('Back to Announcements') !!}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        {!! Form::open(array('route' => 'announcements.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation', 'files'=>true)) !!}



                                       <div class="form-group has-feedback row {{ $errors->has('role') ? ' has-error ' : '' }}">

                                {!! Form::label('role', trans('Designed to? '), array('class' => 'col-md-3 control-label')); !!}

                                <div class="col-md-9">
                                    <div class="input-group">
                                       <select name="category" type="text", placeholder="section", class="" name="category" value="" required  >
                                          <option value="captains">Captains</option>
                                          <option value="players" >Players</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('Additional File')}}<br>
           {!! Form::file('files[]', array('multiple'=>true),'file', NULL, array('id' => 'file', 'class' => 'form-control', 'placeholder')) !!}
    </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
