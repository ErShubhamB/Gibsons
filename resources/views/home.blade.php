@extends('layouts.app')

@section('content')

<div class="">
<div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Dashboard</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20 text-center">
            <h3>Welcome to GST App</h3>
            <h5>Easily claim your GST Returns</h5>
          </div>
         </div>
        <div class="col-md-6">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            
            <div class="mT-30 text-center">  
              <h5>This section is under development</h5>
            </div>
          </div>
         </div>
         <div class="col-md-6">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            
            <div class="mT-30">  
                <h4 class="c-grey-900 mB-20">Quick Email</h4>
                <form role="form" onsubmit="return false;">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="text-normal text-dark">Email Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Your Email subject">
                  </div>
                  <div class="form-group">
                    <label class="text-normal text-dark">Message</label>
                    <textarea class="summernote form-control" placeholder="Your message"></textarea>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-sm customBtn">Send Email</button>
                  </div>
                </form>
            </div>
            </div>
          </div>
         </div>
       </div>
</div>         
</div>
@endsection
