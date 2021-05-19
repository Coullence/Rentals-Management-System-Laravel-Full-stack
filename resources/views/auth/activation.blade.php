@extends('layouts.app-min')

@section('template_title')
	{{ trans('titles.activation') }}
@endsection
<style type="text/css" media="screen">
       
.container{
        margin: auto !important;
        margin-top: 10% !important;
   }


    </style>
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="card card-default">

                    <div class="card-header text-white bg-success">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        	{{ trans('titles.activation') }}

                         


                            <div class="pull-right">
                             <a class="btn btn-info btn-sm" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                Sign Out
            </a>    
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>                     
                            </div>

                        </div>
                    </div>
					<div class="card-body">
						<p>{{ trans('auth.regThanks') }}</p>
						<p>{{ trans('auth.anEmailWasSent',['email' => $email, 'date' => $date ] ) }}</p>
						<p>{{ trans('auth.clickInEmail') }}</p>
						<p><a href='/activation' class="btn btn-primary">{{ trans('auth.clickHereResend') }}</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
