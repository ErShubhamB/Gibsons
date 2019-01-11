<?php $__env->startSection('content'); ?>
<div class="peers ai-s fxw-nw h-100vh">
                <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url('<?php echo e(asset('images/gst-bg.png')); ?>')">
                    <div class="pos-a centerXY">
                        <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px">
                            <img class="pos-a centerXY w-80" src="<?php echo e(asset('images/gst-logo-new.png')); ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
                        <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
                        <form role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="text-normal text-dark">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="youremail@domain.com">
                                </div>
                                <div class="form-group">
                                    <label class="text-normal text-dark">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="peers ai-c jc-sb fxw-nw">
                                            <div class="peer">
                                                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                                    <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                                                        <label for="inputCall1" class="peers peer-greed js-sb ai-c">
                                                            <span class="peer peer-greed">Remember Me</span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="peer">
                                                    <button class="btn customBtn">Login</button>
                                                </div>

                                            </div>
                                            <div class="peers ai-c jc-sb fxw-nw">
                                                <div class="peer">
                                                    <span class="peer peer-greed">New User? <a href="<?php echo e(route('register')); ?>">Register here</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>