
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(session('success'))
        <div class="alert alert-success  text-center">
        {{ session('success') }}
        </div>
       @endif
        @if ($errors->any())
      <div class="alert alert-danger  text-center">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
            <div class="card">
                <div class="card-header text-center"><b>{{ __('Add User') }}</b></div>

                <div class="card-body">
      <form method="post" action="{{url('list')}}" enctype="multipart/form-data" name="form" id="form">

      @csrf

      @php
    $user_type = Auth::user()->type;
      @endphp
      <div class="form-group row">
        <label for="create" class="col-md-4 col-form-label text-md-left">{{ __('Create') }}</label>

        <div class="col-md-8">

        <select name="type" id="type" class="form-control" >
            <option value="U" >User</option>
            @if($user_type=='A')
            <option value="A" >Admin</option>
            @endif
            </select>
       </div>
       </div>

      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>

        <div class="col-md-8">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" maxlength="35" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

        <div class="col-md-8">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

        <div class="col-md-8">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

        <div class="col-md-8">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label  text-md-left">{{ __('Address') }}</label>

        <div class="col-md-8">
            <input id="address" name="address" type="text" class="form-control" value="{{ old('address') }}" maxlength="400" required >

        </div>
    </div>

    <div class="form-group row">
        <label for="zip_code" class="col-md-4 col-form-label  text-md-left">{{ __('Zip Code') }}</label>

        <div class="col-md-8">
            <input id="zip_code" name="zip_code" type="number" class="form-control" value="{{ old('zip_code') }}"  maxlength="6" required>

        </div>
    </div>

    <div class="form-group row">
        <label for="mobile" class="col-md-4 col-form-label  text-md-left">{{ __('Mobile') }}</label>

        <div class="col-md-8">
            <input id="mobile" name="mobile" type="number" class="form-control" value="{{ old('mobile') }}" maxlength="10" required>

        </div>
    </div>


        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label">{{ __('Image') }}</label>
            <div class="col-md-4">
                <input type="file" name="image" id="image" onchange="imagePreview(this);" />
            </div>
            <div class="col-md-4" align="right">
                <img id="image_preview" width="100px" height="60px" src="{{URL::to('/')}}/img/no-image.jpg" />
            </div>
            <script type="text/javascript">
            function imagePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            </script>
        </div>


    <div  align="right" >
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>

      </form>

   </div>
            </div>
        </div>
    </div>
</div>
@endsection
