<form action="{{ route('register') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="new_auth">First Name</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="First Name" value="{{old('unique_id')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">&nbsp;</div>
                    </div>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror 
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="new_auth">Last Name</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Last Name/ Surname" value="{{old('unique_id')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">&nbsp;</div>
                    </div>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror 
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="new_auth">Phone Number</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone Number" value="{{old('phone')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">&nbsp;</div>
                    </div>
                    @error('phone')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror 
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="new_auth">Email</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">&nbsp;</div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror 
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="new_auth">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">&nbsp;</div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror 
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="new_auth">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Repeat Password" value="{{old('password_confirmation')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">&nbsp;</div>
                    </div>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror 
                </div>
            </div>
        </div>
    </div>
    <input id="user_type" name="user_type" type="hidden" value="patient" > 
    <div class="row">
        @include('partials.user.form-terms')
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block form-control">Create Account</button>
    </div>
</form>