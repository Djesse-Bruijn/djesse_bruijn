@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>create post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('post.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <label>
                        <input type="text" name="name" class="form-control" placeholder="Title">
                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Text:</strong>
                    <label>
<textarea class="form-control" style="height:50px" name="Text"
          placeholder="Introduction"></textarea>
                    </label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Author:</strong>
                    <label>
                        <input type="text" name="location" class="form-control" placeholder="Author">
                    </label>
                </div>
            </div>

        </div>

    </form>
@endsection
