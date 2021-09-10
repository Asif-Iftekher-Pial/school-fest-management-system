@extends('admin.layouts.mainlayout')

@section('content')
        
    <div class="container-fluid">
        <h1 class="mt-4">Add New Admin User</h1>
        
            {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
            @if ($message = Session::get('success'))
	           <div class="alert alert-success alert-block">
	              <button type="button" class="close" data-dismiss="alert">×</button>
	              <strong>{{ $message }}</strong>
	           </div>
	           <br>
	        @endif
		
        <div class="row">
        	<div class="col-md-6">    
        		<form action="{{ url('/admin/register') }}" method="post">
        		@csrf        	
        		<div class="form-group">
        		    <label for="">User Full Name</label>
        		    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name" autofocus autocomplete="name" required> 
        		    @error('name')
        		        <span class="invalid-feedback" role="alert">
        		            <strong>{{ $message }}</strong>
        		        </span>
        		    @enderror
        		</div>
        		<div class="form-group">
        		    <label for="">User Email</label>
        		    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" autofocus autocomplete="email" required> 
        		    @error('email')
        		        <span class="invalid-feedback" role="alert">
        		            <strong>{{ $message }}</strong>
        		        </span>
        		    @enderror
        		</div>
        		<div class="form-group">
        		    <label for="">User Mobile</label>
        		    <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile Number" autofocus autocomplete="mobile" required> 
        		    @error('mobile')
        		        <span class="invalid-feedback" role="alert">
        		            <strong>{{ $message }}</strong>
        		        </span>
        		    @enderror
        		</div> 
        	</div>
        	<div class="col-md-6">
	    		<div class="form-group">
	    		    <label for="">User Type</label>
	    		    <select class="form-control @error('type') is-invalid @enderror" name="type" required="required">
	    		      <option value="" active>Select a option</option>
	    		      <option>Supper Admin</option>
	    		      <option>Admin</option>
	    		      <option>Product Manager</option>
	    		      <option>Product Lister</option>
	    		      <option>Manager</option>
	    		    </select>
	    		    @error('type')
	    		        <span class="invalid-feedback" role="alert">
	    		            <strong>{{ $message }}</strong>
	    		        </span>
	    		    @enderror
	    		</div>
	    		<div class="form-group">
	    		    <label for="password">Password</label>
			        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

			        @error('password')
			            <span class="invalid-feedback" role="alert">
			                <strong>{{ $message }}</strong>
			            </span>
			        @enderror
	    		</div>
	    		<div class="form-group">
	    		    <label for="">Status</label>
	    		    <select class="form-control @error('status') is-invalid @enderror" name="status" required="required">
	    		      <option value="" active>Select a option</option>
	    		      <option>Active</option>
	    		      <option>Inactive</option>
	    		    </select>
	    		    @error('type')
	    		        <span class="invalid-feedback" role="alert">
	    		            <strong>{{ $message }}</strong>
	    		        </span>
	    		    @enderror
	    		</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		<button type="submit" class="btn btn-primary mb-2">Create User</button>
        		<button type="reset" class="btn btn-primary mb-2">Reset</button>
        	</div>
        </div>
        </form>
    </div>                

@endsection

