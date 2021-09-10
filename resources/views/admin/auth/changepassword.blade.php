@extends('admin.layouts.mainlayout')

@section('content')
        
    <div class="container-fluid">
        <h3 class="mt-4">Change User Password</h3>
        <hr>
        
            {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
            @if ($message = Session::get('success'))
	           <div class="alert alert-success alert-block">
	              <button type="button" class="close" data-dismiss="alert">×</button>
	              <strong>{{ $message }}</strong>
	           </div>
	           <br>
	        @endif
		
        <div class="row">
        	<div class="col-md-6 offset-3"> 
                <form action="{{ url('/admin/changepassword/'.Auth::user()->id) }}" method="post">
                @method('PATCH') 
                @csrf        	
        		
        		<div class="form-group">
        		    <label for="">User Email</label>
        		    <input type="email" class="form-control" disabled value="{{ Auth::user()->email }}" >         		    
        		</div>
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="old_password">

                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
        		<button type="submit" class="btn btn-primary mb-2">Update Password</button>
        	</div>
        	</form>
        </div>
        
        
    </div>                

@endsection

