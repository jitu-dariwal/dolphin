@extends('layouts.app')

@section('content')
<div class="container">
	@php
		/* echo "<pre>";
		print_r($errors);
		echo "</pre>"; */
	@endphp
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter name" data-validation="required length" data-validation-length="3-255" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter email" data-validation="required email length" data-validation-length="3-255" />

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-append">
										<span class="input-group-text">+44</span>
									</div>
									<input id="mobile_number" type="text" class="form-control{{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Mobile number(Without country code)" data-validation="required number length"  data-validation-length="min10" />
									@if ($errors->has('mobile_number'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('mobile_number') }}</strong>
										</span>
									@endif
								</div>
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter password" data-validation="required length" data-validation-length="min6" />

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Same as password" data-validation="required confirmation" data-validation-confirm="password" />
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Select Hint Question') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('hint_question') ? ' is-invalid' : '' }}" name="hint_question" id="hint_question" data-validation="required">
									<option value="">Select hint question</option>
									@if(!empty(config('constant.hint_questions')))
										@foreach(config('constant.hint_questions') as $k=>$v)
											<option value="{{$k}}">{{$v}}</option>
										@endforeach
									@endif
								</select>
                                @if ($errors->has('hint_question'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hint_question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hint Answer') }}</label>
							
                            <div class="col-md-6">
								<textarea name="hint_answer" id="hint_answer" class="form-control{{ $errors->has('hint_answer') ? ' is-invalid' : '' }}" placeholder="Enter answer" data-validation="required">{{old('hint_answer')}}</textarea>
								
								@if ($errors->has('hint_answer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hint_answer') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
                        
						<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
								<button type="reset" class="btn btn-danger">
                                    {{ __('Reset') }}
                                </button>
                            </div>
							<div class="col-md-4 offset-md-4 mt-2">
                                <a href="{{url('/login')}}" class="btn btn-warning">
                                    {{ __('Back to login') }}
                                </a>
							</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
