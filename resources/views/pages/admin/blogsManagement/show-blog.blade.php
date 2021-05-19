@extends('layouts.app')

@section('template_title')
  {!! trans('usersmanagement.showing-user', ['name' => $blog->title]) !!}
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
                                    <a class="btn btn-primary btn-sm" href="/blogs">
                                        {!! trans('Back to Blogs') !!}
                                    </a> 
                                    <a class="btn btn-info btn-sm" href="/blogs/create">
                                        {!! trans('+ New Blog') !!}
                                    </a>                     
                            </div>

                        </div>
                    </div>


          <div class="card-body">
            <h4>{{$blog->title}}</h4>
            <h2>Image</h2>

             @foreach($images as $image)
                        <tr>
                            <td class=""><a href="">{{ $image->fileName }}</a>
                            </td><br>
                        <img src="{{ asset("storage/uploads/$image->fileName") }}" alt="{{ $image->fileName }}" class="img-responsive" />


                       <img class="img-xs" src="<?php echo asset("storage/uploads/$image->fileName")?>">


                        <img src="{{ asset("storage/uploads/$image->fileName") }}" alt="{{ $image->fileName }}" class="img-responsive" />


                        </tr>
                        @endforeach


            <p>{{$blog->body}}</p>
            <div class="row">

              <div class="col-md-6">
                  <small class="pull-left">by {{$blog->postedBy}}</small>
              </div>
              <div class="col-md-6">
              <small class="pull-right"> Written on {{$blog->created_at}}</small>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                
                  <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('blogs/' . $blog->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                      {!! trans('Edit') !!}
                  </a>
              </div>
              <div class="col-md-6">
                    {!! Form::open(array('url' => 'blogs/' . $blog->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}

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
