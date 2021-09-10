@extends('admin.layouts.mainlayout')

@section('content')
        
    <div class="container-fluid">
        <h1 class="mt-4">Edit Admin User</h1>
        
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
        		<form action="{{ url('/admin/user/'.$data->id) }}" method="post">
                @method('PATCH') 
        		@csrf        	
        		<div class="form-group">
        		    <label for="">User Full Name</label>
        		    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" autofocus autocomplete="name" required> 
        		    @error('name')
        		        <span class="invalid-feedback" role="alert">
        		            <strong>{{ $message }}</strong>
        		        </span>
        		    @enderror
        		</div>
        		<div class="form-group">
        		    <label for="">User Email</label>
        		    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}"  autofocus autocomplete="email" required> 
        		    @error('email')
        		        <span class="invalid-feedback" role="alert">
        		            <strong>{{ $message }}</strong>
        		        </span>
        		    @enderror
        		</div>
        		<div class="form-group">
        		    <label for="">User Mobile</label>
        		    <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $data->mobile }}" autofocus autocomplete="mobile" required> 
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
	    		      <option value="">Select a option</option>
	    		      <option {{ $data->type == 'Supper Admin' ? 'selected' : '' }}>Supper Admin</option>
	    		      <option {{ $data->type == 'Admin' ? 'selected' : '' }}>Admin</option>
	    		      <option {{ $data->type == 'Product Manager' ? 'selected' : '' }}>Product Manager</option>
	    		      <option {{ $data->type == 'Product Lister' ? 'selected' : '' }}>Product Lister</option>
	    		      <option {{ $data->type == 'Manager' ? 'selected' : '' }}>Manager</option>
	    		    </select>
	    		    @error('type')
	    		        <span class="invalid-feedback" role="alert">
	    		            <strong>{{ $message }}</strong>
	    		        </span>
	    		    @enderror
	    		</div>
	    		<div class="form-group">
	    		    <label for="password">Password</label>
			        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" disabled>

			        @error('password')
			            <span class="invalid-feedback" role="alert">
			                <strong>{{ $message }}</strong>
			            </span>
			        @enderror
	    		</div>
	    		<div class="form-group">
	    		    <label for="">Status</label>
	    		    <select class="form-control @error('status') is-invalid @enderror" name="status" required="required">
	    		      <option value="">Select a option</option>
	    		      <option {{ $data->status == 'Active' ? 'selected' : '' }}>Active</option>
	    		      <option {{ $data->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
        		<button type="submit" class="btn btn-primary mb-2">Update</button>
        	</div>
        </div>
        </form>
    </div>                

@endsection
