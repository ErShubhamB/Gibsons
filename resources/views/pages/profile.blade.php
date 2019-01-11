@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-4 mT-30">
            <div class="card">
                <div class="header-bg" width="250" height="70" id="header-blur" style="
    background: url({{Session::get('user_avatar')}});"></div>
    			<div class="seperator" width="250" height="60"></div>
                <div class="avatar">
                    <img src="/uploads/{{Auth::user()->avatar}}" alt="" id="profile_img"/>
                </div>
                <div class="content">
                    <p>{{Auth::user()->name}}<br>
                       {{Auth::user()->email}}</p>
                       <form id="avatar_form">
                        

                       <input type="file" name="avatar" id="avatar" style="display:none;" accept="image/*">
                       <form>
                    <p><button type="button" class="btn customBtn" id="change_avatar">Change Avatar</button></p>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6 mT-30">
        	<div class="panel panel-default">
			  <div class="panel-heading">Profile</div>
			  <div class="panel-body">
                <form role="form" onsubmit="return false;">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="text-normal text-dark">Name</label>
                        <input type="text" class="form-control" placeholder="Your Name" name="name" required autofocus value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                            <label class="text-normal text-dark">Email</label>
                            <input type="email" class="form-control" placeholder="name@email.com" name="email" required value="{{Auth::user()->email}}">
                            </div>
                            <div class="form-group">
                                <div class="peers ai-c jc-sb fxw-nw">
                                            
                                    <div class="peer">
                                            <button type="button" class="btn customBtn btn-sm change_pwd_btn">Change Password</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group chng_pwd pwd">
                                <label class="text-normal text-dark">New Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group chng_pwd pwd">
                                    <label class="text-normal text-dark">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <div class="peers ai-c jc-sb fxw-nw">
                                            
                                    <div class="peer">
                                            <button class="btn customBtn">Done</button>
                                    </div>
                                </div>
                            </div>
                </form>         
              </div>
			</div>
        </div>
	</div>
</div>

@endsection