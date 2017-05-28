@extends('layouts.app-full-center')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-info center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <strong>{!! Session::get('message')  !!} </strong>
        </div>
    @endif

    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo pull-left">
                <img src="assets/images/logo.png" height="54" alt="Porto Admin" />
            </a>

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' =>  url('/login') , 'class' => 'form-horizontal', 'files' => true,'role'=>'form']) !!}
                    <div class="form-group mb-lg">
                        <label>Email</label>
                        <div class="input-group input-group-icon">
                            {!! Form::text('email', null, ['class' => 'form-control input-lg']) !!}
                            <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                        </div>
                        {!! $errors->first('email', '<div class="alert alert-danger">:message</div>') !!}
                    </div>

                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left">Password</label>
                        </div>
                        <div class="input-group input-group-icon">
                            {!! Form::password('password', ['class' => 'form-control input-lg']) !!}
                            <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                        </div>
                        {!! $errors->first('password', '<div class="alert alert-danger">:message</div>') !!}
                    </div>

                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class=" col-sm-8 text-right">
                            {!! Form::submit('Sign In', ['class' => 'btn btn-primary hidden-xs']) !!}
                            {!! Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-lg visible-xs mt-lg']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>

            <p class="text-center text-muted mt-md mb-md">&copy; BRITECH 2016. All Rights Reserved.</p>
        </div>
    </section>
@endsection