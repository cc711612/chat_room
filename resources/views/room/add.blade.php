@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create</div>

                    <div class="panel-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                              action="{{route('room.store')}}">
                            @method('post')
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">名稱</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                           value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('cover') ? ' has-error' : '' }}">
                                <label for="cover" class="col-md-4 control-label">封面</label>

                                <div class="col-md-6">
                                    <input type="file" id="cover" name="cover" value="{{ old('cover') }}" accept="image/*">

                                    @if ($errors->has('cover'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cover') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('isPrivate') ? ' has-error' : '' }}">
                                <label for="isPrivate" class="col-md-4 control-label">是否私密</label>

                                <div class="col-md-6">
                                    <label class="radio-inline">
                                        <input type="radio" class="isPrivate" name="isPrivate" value="0" checked> 否
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="isPrivate" name="isPrivate" value="1"> 是
                                    </label>

                                    @if ($errors->has('isPrivate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('isPrivate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group hidden {{ $errors->has('cipher') ? ' has-error' : '' }}"
                                 id="cipherDiv">
                                <label for="cipher" class="col-md-4 control-label">密碼</label>

                                <div class="col-md-6">
                                    <input id="cipher" type="password" class="form-control" name="cipher" autofocus>

                                    @if ($errors->has('cipher'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cipher') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/rooms/form.js?v='.config('app.version')) }}"></script>
@endsection
