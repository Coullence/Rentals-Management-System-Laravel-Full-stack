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
                            {!! trans('Create Post') !!}
                            <div class="pull-right">
                                <a href="{{ route('announcements') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('Back to Announcements') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    {!! trans('Back to Announcements') !!}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        {!! Form::open(array('route' => ['announcements.update', $announcement->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}
        <div class="form-group">
            {{Form::label('category', 'Category')}}
            {{Form::text('category',$announcement->category, ['class' => 'form-control', 'placeholder' => 'Category'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title',$announcement->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $announcement->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('Cover Image')}}<br>
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
