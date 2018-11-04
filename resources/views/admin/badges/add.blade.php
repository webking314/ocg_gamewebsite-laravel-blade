@extends('admin.layout.app')
@section('meta')
<title>{{ trans('user.edit.title') }} - {{ trans('user.edit.title') }}</title>
@endsection

@section('content')
<div role="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="featured-boxes mt-none mb-none">
                    <div class="featured-box featured-box-primary mt-xl" style="text-align: left">
                        <div class="box-content">
                            <h1 class="mb-lg text-blue text-center">
                                @if(isset($badge))
                                Edit
                                @else
                                Add
                                @endif
                                Badges

                            </h1>
                            <hr>
                            @if(isset($badge))
                            {{ Form::model($badge, array('route' => array('badges.update',$badge->id), 'method' => 'post','class'=>'form-horizontal','enctype'=>'multipart/form-data')) }}
                            @else
                            {{ Form::open(['route' => 'badges.create','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
                            @endif

                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    {{ Form::text('name', Input::old('name'),['id'=>'name','class'=>'form-control','required'=>'required']) }}

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    {{ Form::text('description', Input::old('description'),['id'=>'description','class'=>'form-control','required'=>'required']) }}
                                    @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('relevance') ? ' has-error' : '' }}">
                                <label for="relevance" class="col-md-4 control-label">Relevance</label>

                                <div class="col-md-6">
                                    {{ Form::text('relevance', Input::old('relevance'),['id'=>'relevance','class'=>'form-control','required'=>'required']) }}
                                    @if ($errors->has('relevance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('relevance') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if(isset($badge))
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">&nbsp;</label>
                                <div class="col-md-6">
                                        {{ Html::image( $badge->image_url, 'alt text', array('width'=>'200','class' => 'css-class')) }}
                                </div>
                            </div>
                            @endif
                            <div class="form-group{{ $errors->has('image_url') ? ' has-error' : '' }}">
                                <label for="image_url" class="col-md-4 control-label">Image</label>

                                <div class="col-md-6">
                                    {{ Form::file('image_url', Input::old('image_url'),['id'=>'image_url','class'=>'form-control','required'=>'required']) }}
                                    @if ($errors->has('image_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_url') }}</strong>

                                        <input type="submit" value="" />
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if(isset($badge))
                                        Update
                                        @else
                                        Add
                                        @endif
                                    </button>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection