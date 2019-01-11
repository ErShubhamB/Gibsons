<div class="sidebar">
					<div class="sidebar-inner">
						<div class="sidebar-logo">
							<div class="peers ai-c fxw-nw">
								<div class="peer peer-greed">
									<a class="sidebar-link td-n" href="https://colorlib.com/polygon/adminator/index.html" class="td-n">
										<div class="peers ai-c fxw-nw">
											<div class="peer">
												<div class="logo">
													<img src="assets/static/images/logo.png" alt="">
													</div>
												</div>
												<div class="peer peer-greed">
													<h5 class="lh-1 mB-0 logo-text">MathD</h5>
												</div>
											</div>
										</a>
									</div>
									<div class="peer">
										<div class="mobile-toggle sidebar-toggle">
											<a href="" class="td-n">
												<i class="ti-arrow-circle-left"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<ul class="sidebar-menu scrollable pos-r">
								<li class="nav-item mT-30 active">
									<a class="sidebar-link" href="/" default>
										<span class="icon-holder">
											<i class="c-blue-500 ti-home"></i>
										</span>
										<span class="title">Dashboard</span>
									</a>
								</li>
								<li class="nav-item dropdown">
									<a class="dropdown-toggle" href="javascript:void(0)">
										<span class="icon-holder">
											<i class="c-deep-purple-500 ti-book"></i>
										</span>
										<span class="title">Notes</span>
										<span class="arrow">
						                  <i class="ti-angle-right"></i>
						                </span>	
									</a>
									<ul class="dropdown-menu">
						                <li>
						                  <a class='sidebar-link' href="{{route('notes-list')}}">All Notes</a>
						                </li>
						                <li>
						                  <a class='sidebar-link' href="{{route('notes-upload')}}">Add Notes</a>
						                </li>
						            </ul>
								</li>
								<li class="nav-item">
									<a class="sidebar-link" href="">
										<span class="icon-holder">
											<i class="c-indigo-500 ti-money"></i>
										</span>
										<span class="title">Payment</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="sidebar-link" href="{{ url('/logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
										<span class="icon-holder">
											<i class="c-red-500 ti-power-off"></i>
										</span>
										<span class="title">Logout</span>
									</a>
								</li>
								
								<!-- <li class="nav-item dropdown">
									<a class="dropdown-toggle" href="javascript:void(0);">
										<span class="icon-holder">
											<i class="c-teal-500 ti-view-list-alt"></i>
										</span>
										<span class="title">Multiple Levels</span>
										<span class="arrow">
											<i class="ti-angle-right"></i>
										</span>
									</a>
									<ul class="dropdown-menu">
										<li class="nav-item dropdown">
											<a href="javascript:void(0);">
												<span>Menu Item</span>
											</a>
										</li>
										<li class="nav-item dropdown">
											<a href="javascript:void(0);">
												<span>Menu Item</span>
												<span class="arrow">
													<i class="ti-angle-right"></i>
												</span>
											</a>
											<ul class="dropdown-menu">
												<li>
													<a href="javascript:void(0);">Menu Item</a>
												</li>
												<li>
													<a href="javascript:void(0);">Menu Item</a>
												</li>
											</ul>
										</li>
									</ul>
								</li> -->
							</ul>
						</div>
					</div>