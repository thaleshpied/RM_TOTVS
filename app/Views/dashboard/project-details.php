<?php echo $this->extend('layouts/default') ?>
        
<?php echo $this->section('content') ?>
<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12">
				<div class="row">
					<div class="col-xl-12">
						<div class="card overflow-hidden">
							<div class="company-profile">
								<img src="<?php echo base_url('public/assets/images/back1.jpg'); ?>" alt="">
							</div>
							<div class="card-body">
								<div class="row border-bottom pb-5">
									<div class="col-xl-8 col-lg-9">
										<div>
											<h4 class="fs-32 font-w700">Workload  Company Profile Websites Development</h4>
											<span class="mb-2 d-block">Created by Tommy Hank on June 31, 2020</span>
											<div class="workload-button">
												<a href="javascript:void(0);" class="btn btn-primary btn-rounded">New<i class="fas fa-caret-down ms-2 scale5"></i></a>
												<a href="javascript:void(0);" class="btn btn-primary light btn-rounded"><i class="fas fa-user-plus scale2 me-3"></i>Invite People</a>
												<a href="javascript:void(0);" class="btn btn-outline-light btn-rounded">Edit</a>
												<a href="javascript:void(0);" class="btn btn-outline-light btn-rounded">Private</a>
												<a href="javascript:void(0);" class="btn btn-outline-light btn-rounded"><i class="far fa-envelope scale5 me-3 text-primary"></i>45 Comments</a>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-3 info">
										<div class="kanbanimg1">
											<span><i class="fas fa-info-circle me-3"></i>Project Details</span>
											<div class="dropdown ms-3">
												<div class="btn-link" data-bs-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5"/>
														<circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5"/>
														<circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)">Delete</a>
													<a class="dropdown-item" href="javascript:void(0)">Edit</a>
												</div>
											</div>
										</div>
										<div class="kanbanimg1">
											<ul class="kanbanimg me-3 mb-3">
												<li><img src="<?php echo base_url('public/assets/images/profile/small/pic1.jpg'); ?>" alt=""></li>
												<li><img src="<?php echo base_url('public/assets/images/profile/small/pic2.jpg'); ?>" alt=""></li>
												<li><img src="<?php echo base_url('public/assets/images/profile/small/pic3.jpg'); ?>" alt=""></li>
												<li><img src="<?php echo base_url('public/assets/images/profile/small/pic4.jpg'); ?>" alt=""></li>
												<li><img src="<?php echo base_url('public/assets/images/profile/small/pic5.jpg'); ?>" alt=""></li>
												<li><span>5+</span></li>
											</ul>
										</div>	
									</div>
									<div class="col-xl-3 mt-4 col-sm-6">
										<div class="d-flex">
											<span><i class="far fa-clock scale5 text-primary mt-2 me-3"></i></span>
											<div>
												<h4 class="fs-18 font-w500 text-black">Project Create</h4>
												<span>Monday, October 31th, 2020</span>
											</div>
										</div>
									</div>
									<div class="col-xl-3 mt-4 col-sm-6">
										<div class="d-flex">
											<span><i class="far fa-clock scale5 text-primary mt-2 me-3"></i></span>
											<div>
												<h4 class="fs-18 font-w500 text-black">Due date</h4>
												<span>Monday, October 31th, 2020</span>
											</div>
										</div>
									</div>
									<div class="col-xl-6 mt-4 col-sm-12">
										<div class="mb-3">
											<span class="fs-18 font-w500">Total Progress 60%</span>
										</div>
										<div class="progress default-progress1">
											<div class="progress-bar progress-animated" style="width: 40%; height:14px;" role="progressbar">
												<span class="sr-only">45% Complete</span>
											</div>
										</div>
										
									</div>
								</div>
								<div class="project-description">
									<span class="fs-18 font-w500 mb-3 d-block">PROJECT DESCRIPTION</span>
									<p class="fs-18 font-w500">
										"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
									</p>
									<span class="fs-18 font-w500 my-4 d-block">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</span>
									<p class="fs-18 font-w500">
										"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliqui
									</p>
								</div>
								<div class="message1">
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Type comment here..."></textarea>
									<div class="msg-button">
										<i class="fas fa-smile me-3 "></i>
										<i class="fas fa-paperclip me-3"></i>
										<a href="javascript:void(0);" class="btn btn-primary"><i class="fas fa-paper-plane me-2 text-white fs-18 btn-rounded"></i>SEND</a>
									</div>
								</div>
								<div class="comments">
									<div class="d-flex justify-content-between align-items-center">
										<span class="text-uppercase fs-18 font-w500">comment</span>
										<div>
											<select class="default-select dashboard-select">
												<option data-display="Newest Comment">Newest Comment</option>
												<option value="2">Oldest Comment</option>
											</select>
										</div>
									</div>
								</div>
								<div class="user-comment row border-bottom pb-3 align-items-center">
									<div class="col-lg-9">
										<div class="d-flex align-items-center">
											<img src="<?php echo base_url('public/assets/images/pic1.jpg'); ?>" alt="">
											<div class="ms-3">
												<h4 class="fs-18 font-w600">Kevin Sirait</h4>
												<span class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </span>
											</div>
										</div>
									</div>
									<div class="col-lg-3 d-flex justify-content-end">
										<div class="like-reply">
											<span class="fs-18 font-w600 me-2"><i class="far fa-thumbs-up text-primary me-2"></i>45 Like</span>
											<span class="fs-18 font-w600"><i class="fas fa-reply-all me-2 text-blue"></i>Reply</span>
										</div>
									</div>	
								</div>
								<div class="user-comment row border-bottom pb-3 align-items-center">
									<div class="col-lg-9">
										<div class="d-flex align-items-start">
											<img src="<?php echo base_url('public/assets/images/pic2.jpg'); ?>" alt="">
											<div class="ms-3">
												<h4 class="fs-18 font-w600">Hendric Suneo</h4>
												<span class="fs-16">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima ve </span>
											</div>
										</div>
									</div>
									<div class="col-lg-3 d-flex justify-content-end">
										<div class="like-reply">
											<span class="fs-18 font-w600 me-2"><i class="far fa-thumbs-up text-primary me-2"></i>45 Like</span>
											<span class="fs-18 font-w600"><i class="fas fa-reply-all me-2 text-blue"></i>Reply</span>
										</div>
									</div>	
								</div>
								<div class="user-comment row border-bottom pb-3 align-items-center">
									<div class="col-lg-9">
										<div class="d-flex align-items-start ms-5">
											<img src="<?php echo base_url('public/assets/images/pic2.jpg'); ?>" alt="">
											<div class="ms-3">
												<h4 class="fs-18 font-w600">Kesha Jean</h4>
												<span class="fs-16">m quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima ve </span>
											</div>
										</div>
									</div>
									<div class="col-lg-3 d-flex justify-content-end">
										<div class="like-reply">
											<span class="fs-18 font-w600 me-2"><i class="fas fa-star text-orange"></i></span>
											<span class="fs-18 font-w600"><i class="fas fa-star text-orange"></i></span>
										</div>
									</div>	
								</div>
								<div class="user-comment row border-bottom pb-3 align-items-center">
									<div class="col-lg-9">
										<div class="d-flex align-items-start ms-5">
											<img src="<?php echo base_url('public/assets/images/pic3.jpg'); ?>" alt="">
											<div class="ms-3">
												<h4 class="fs-18 font-w600">Kesha Jean</h4>
												<span class="fs-16">m quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima ve </span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div>
<!--**********************************
	Content body end
***********************************-->
<?php echo $this->endSection() ?>