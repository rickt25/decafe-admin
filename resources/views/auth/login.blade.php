@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                  <div class="col-lg-6 d-none d-lg-block">
                    <img class="w-100" src="{{ asset('images/login.jpg') }}" alt="">
                  </div>
                  <div class="col-lg-6 align-self-center">
                      <div class="p-5">
                          <div class="text-center">
                              <h1 class="h3 text-gray-900 mb-5">Welcome Back!</h1>
                          </div>
                          <form class="user" method="POST" action="{{ route('login') }}">
                            @csrf
                              <div class="form-group">
                                  <x-input type="email" class="form-control-user" name="email"
                                      :error="$errors->first('email')"
                                      value="{{ old('email') }}"
                                      placeholder="Enter Email Address..." />
                              </div>
                              <div class="form-group">
                                <x-input type="password" class="form-control-user" name="password"
                                    :error="$errors->first('password')"
                                    value="{{ old('password') }}"
                                    placeholder="Password" />
                              </div>
                              <div class="form-group">
                                  <div class="custom-control custom-checkbox small">
                                      <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                      <label class="custom-control-label" for="customCheck">Remember
                                          Me</label>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary btn-user btn-block">
                                  Login
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div>

</div>
@endsection
