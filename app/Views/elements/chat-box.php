<!--**********************************
	Chat box start
***********************************-->
<div class="chatbox" id="chatbox">
	<div class="chatbox-close"></div>

	<!-- MODAL PARA ALTERAR A OBRA -->
	<div class="modal fade" id="MODALOBRA">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal Obra</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal">
					</button>
				</div>
				<div class="modal-body">
					<p>Selecione a obra para alterar o contexto</p>
					<div>
						<h4 class="card-title">Obras disponíveis:</h4>						
							
						<?php if (!empty($chatData2) && is_array($chatData2)): ?>
							<select class="form-select border-dark" name = "CENTRODECUSTOCONTEXTO" id = "CENTRODECUSTOCONTEXTO"  aria-label="Default select example">
								<option value="<?php echo isset($sessionData['CODCCUSTO']) ? $sessionData['CODCCUSTO'] : ''; ?>">Atualmente em: <?php echo isset($sessionData['CODCCUSTO']) ? $sessionData['CODCCUSTO'] : ''; ?> - <?php echo isset($sessionData['NOME_CENTRO_CUSTO']) ? $sessionData['NOME_CENTRO_CUSTO'] : ''; ?></option>
								<?php foreach ($chatData2 as $CC): ?>
									<option value="<?php echo $CC['CODCCUSTO']; ?>"><?php echo $CC['CODCCUSTO']; ?> - <?php echo $CC['NOME_CENTRO_CUSTO']; ?></option>
								<?php endforeach; ?>
							</select>
							<?php else: ?>
							<p>Nenhuma informação, acione o suporte!</p>
						<?php endif; ?>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
					<button type="button" class="btn btn-primary" id="botaocarregarobra" onclick="alterarContexto()">Carregar Obra</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="custom-tab-1">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-bs-toggle="tab" href="#acoes">Ações</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#alerts">Config</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#chat">Pendências</a>
			</li> -->
		</ul>
		<div class="tab-content">
			<!-- <div class="tab-pane fade active show" id="chat" role="tabpanel"> -->
			<!-- <div class="tab-pane fade" id="chat" role="tabpanel">
				<div class="card mb-sm-3 mb-md-0 contacts_card dlab-chat-user-box">
					<div class="card-header chat-list-header text-center">
						<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink2" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" strok2e-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="112" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="112" width="16" height="2" rx="1"/></g></svg></a>
						<div>
							<h6 class="mb-1">Chat List</h6>
							<p class="mb-0">Show All</p>
						</div>
						<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink2" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" strok2e-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="02" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
					</div>
					<div class="card-body contacts_body p-0 dlab-scroll  " id="DLAB_W_Contacts_Body">
						<ul class="contacts">
							<li class="name-first-letter">A</li>
							<li class="active dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Archie Parker</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/2.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Alfie Mason</span>
										<p>Taherah left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/3.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>AharlieKane</span>
										<p>Sami is online</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/4.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Athan Jacoby</span>
										<p>Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">B</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/5.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Bashid Samim</span>
										<p>Rashid left 50 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Breddie Ronan</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/2.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Ceorge Carson</span>
										<p>Taherah left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">D</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/3.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Darry Parker</span>
										<p>Sami is online</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/4.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Denry Hunter</span>
										<p>Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">J</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/5.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Jack Ronan</span>
										<p>Rashid left 50 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Jacob Tucker</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/2.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>James Logan</span>
										<p>Taherah left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/3.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Joshua Weston</span>
										<p>Sami is online</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">O</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/4.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Oliver Acker</span>
										<p>Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dlab-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="<?php echo base_url('public/assets/images/avatar/5.jpg'); ?>" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Oscar Weston</span>
										<p>Rashid left 50 mins ago</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="card chat dlab-chat-history-box d-none">
					<div class="card-header chat-list-header text-center">
						<a href="javascript:void(0);" class="dlab-chat-history-back">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink2" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" strok2e-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="72" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
						</a>
						<div>
							<h6 class="mb-1">Chat with Khelesh</h6>
							<p class="mb-0 text-success">Online</p>
						</div>							
						<div class="dropdown">
							<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink2" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" strok2e-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="02" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
							<ul class="dropdown-menu dropdown-menu-end">
								<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
								<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
								<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
								<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
							</ul>
						</div>
					</div>
					<div class="card-body msg_card_body dlab-scroll" id="DLAB_W_Contacts_Body3">
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								Hi, how are you samim?
								<span class="msg_time">8:40 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								Hi Khalid i am good tnx how about you?
								<span class="msg_time_send">8:55 AM, Today</span>
							</div>
							<div class="img_cont_msg">
						<img src="<?php echo base_url('public/assets/images/avatar/2.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								I am good too, thank you for your chat template
								<span class="msg_time">9:00 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								You are welcome
								<span class="msg_time_send">9:05 AM, Today</span>
							</div>
							<div class="img_cont_msg">
						<img src="<?php echo base_url('public/assets/images/avatar/2.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								I am looking for your next templates
								<span class="msg_time">9:07 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								Ok, thank you have a good day
								<span class="msg_time_send">9:10 AM, Today</span>
							</div>
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/2.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								Bye, see you
								<span class="msg_time">9:12 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								Hi, how are you samim?
								<span class="msg_time">8:40 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								Hi Khalid i am good tnx how about you?
								<span class="msg_time_send">8:55 AM, Today</span>
							</div>
							<div class="img_cont_msg">
						<img src="<?php echo base_url('public/assets/images/avatar/2.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								I am good too, thank you for your chat template
								<span class="msg_time">9:00 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								You are welcome
								<span class="msg_time_send">9:05 AM, Today</span>
							</div>
							<div class="img_cont_msg">
						<img src="<?php echo base_url('public/assets/images/avatar/2.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								I am looking for your next templates
								<span class="msg_time">9:07 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								Ok, thank you have a good day
								<span class="msg_time_send">9:10 AM, Today</span>
							</div>
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/2.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="<?php echo base_url('public/assets/images/avatar/1.jpg'); ?>" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								Bye, see you
								<span class="msg_time">9:12 AM, Today</span>
							</div>
						</div>
					</div>
					<div class="card-footer type_msg">
						<div class="input-group">
							<textarea class="form-control" placeholder="Type your message..."></textarea>
							<div class="input-group-append">
								<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!-- <div class="tab-pane fade" id="alerts" role="tabpanel">
				<div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header chat-list-header text-center">
						<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink2" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" strok2e-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="02" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
						<div>
							<h6 class="mb-1">Notications</h6>
							<p class="mb-0">Show All</p>
						</div>
						<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink2" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" strok2e-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="02" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
					</div>
					<div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body1">
						<ul class="contacts">
							<li class="name-first-letter">SEVER STATUS</li>
							<li class="active">
								<div class="d-flex bd-highlight">
									<div class="img_cont primary">KK</div>
									<div class="user_info">
										<span>David Nester Birthday</span>
										<p class="text-primary">Today</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">SOCIAL</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont success">RU</div>
									<div class="user_info">
										<span>Perfection Simplified</span>
										<p>Jame Smith commented on your status</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">SEVER STATUS</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont primary">AU</div>
									<div class="user_info">
										<span>AharlieKane</span>
										<p>Sami is online</p>
									</div>
								</div>
							</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont info">MO</div>
									<div class="user_info">
										<span>Athan Jacoby</span>
										<p>Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="card-footer"></div>
				</div>
			</div> -->
			<div class="tab-pane fade active show" id="acoes">
				<div class="card mb-sm-3 mb-md-0 note_card">
					<div class="card-header chat-list-header text-center">
						<!-- <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink2" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" strok2e-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="112" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="112" width="16" height="2" rx="1"/></g></svg></a>
						<div>
							<h6 class="mb-1">Ação</h6>
							<p class="mb-0">Adicionr</p>
						</div>
						<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink2" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" strok2e-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="02" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a> -->
					</div>
					<div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body2">
						<ul class="contacts">

							<li class="mb-3" data-bs-toggle="modal" data-bs-target="#MODALOBRA" id="openModal">
								<div class="d-flex bd-highlight">
									<div class="user_info">
										<span>Alterar Obra</span>
										<p>ROTINA</p>
									</div>
									<!-- <div class="ms-auto">
										<a class="btn btn-primary btn-xs sharp me-1">
											<i class="fa fa-plus"></i>
										</a>
										<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a> -->
									</div>									
								</div>
							</li>



							<li class="active">
								<div class="d-flex bd-highlight">
									<!-- <div class="user_info">
										<span>Adicionar Solicitação</span>
										<p>ROTINA</p>
									</div> -->
									<!-- <div class="ms-auto">
										<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#MODALSC"></i></a>
										<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
									</div> -->
									<!-- MODAL ADICIONAR SOLICITAÇÃO -->
									<div class="modal fade" id="MODALSC">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Transferir Visita</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal">
													</button>
												</div>
												<div class="modal-body">
												<div class="row">   

												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<h4 class="card-title">OS cliente <code2>*</code2></h4>
														<input id="SAMF_CLI_OS2" width="100%" class="form-control" placehoolder = "0001" type="number"/>
													</div>
												</div>	

												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<h4 class="card-title">QR CODE</h4>
														<input id="SAMF_CLI_QRCODE2" width="100%" class="form-control" placehoolder = "0001" type="number"/>
													</div>
												</div>		

												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<h4 class="card-title">Previsão início <code2>*</code2></h4>
														<input id="mdate_old" name="datepicker2" width="100%" class="form-control" placehoolder = "TOP 2024" />
													</div>
												</div>

												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<h4 class="card-title">Previsão fim <code2>*</code2></h4>
														<input id="mdate2_old" name="datepicker22" width="100%" class="form-control" placehoolder = "TOP 2024" />
													</div>
												</div>					


												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<div class="mb-4">
															<h4 class="card-title">Técnico TOP <code2>*</code2></h4>
															<!-- <p>Selecione os <code>produtos</code> </p> -->
														</div>  
														<select class="form-select border-dark" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">					
															<option value="HARISON">HARISON</option> 								
														</select>
													</div>
												</div>	

												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<div class="mb-4">
															<h4 class="card-title">Solicitante <code2>*</code2></h4>
															<!-- <p>Selecione os <code>produtos</code> </p> -->
														</div>                                

														<select class="form-select border-dark" name = "tipocompra" id = "tipocompra"  aria-label="Default select example">									
															<option value="KLABIN">KLABIN</option> 									
														</select>
													</div>
												</div>	



												<!-- ABAIXO CAMPOS NOVOS --> 
												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<h4 class="card-title">Nome da tarefa </h4>
														<input id="SAMF_CLI_TEXTO_BREVE2" width="100%" class="form-control" placehoolder = "0001" type="text"/>
													</div>
												</div>
												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<h4 class="card-title">Descrição da ordem</h4>
														<input id="SAMF_CLI_DESC_OP2" width="100%" class="form-control" placehoolder = "0001" type="text"/>
													</div>
												</div>
												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<h4 class="card-title">Observações </h4>
														<input id="SAMF_OBSERVACAO2" width="100%" class="form-control" placehoolder = "0001" type="text"/>
													</div>
												</div>
												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<h4 class="card-title">TAG </h4>
														<input id="SAMF_CLI_TAG2" width="100%" class="form-control" placehoolder = "0001" type="text"/>
													</div>
												</div>
												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<h4 class="card-title">Predecessora </h4>
														<input id="SAMF_PREDECESSORA2" width="100%" class="form-control" placehoolder = "0001" type="number"/>
													</div>
												</div>

												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<label class="form-label">Prev. Duração Visita</label>
														<div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autobtn-close="true">
															<input type="text" class="form-control"  id="SAMF_TEMPO_VISITA" value="00:00"> 
															<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
													</div>
												</div>

												<div class="col-xl-3 col-xxl-4 col-md-6">
													<div class="card-body">
														<div class="mb-4">
															<h4 class="card-title">Status Inicial <code2>*</code2></h4>
															<!-- <p>Selecione os <code>produtos</code> </p> -->
														</div>  
														<select class="form-select border-dark" name = "STATUS2" id = "STATUS2"  aria-label="Default select example">					
															<option value="A">A - Aberta</option> 		
															<option value="B">B - Bloqueada</option> 
															<option value="C">C - Cancelada</option> 						
														</select>
													</div>
												</div>	

												<H2>COLOCAR O PISO A SER MONTADO</H2>






<!-- <div class="col-xl-12 col-xxl-12 col-md-4">                           
	<div class="card-body">
		<div class="mb-4">
			<h4 class="card-title">Descrição das atividades</h4>
		</div>
		<div class="mb-3">
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
		</div>
	</div>                           
</div> -->

<div class="card-header">

	<div class="row">
		<button type="button" class="btn btn-primary btn-rounded mb-5 ml-5 btn-xxs" id="incluirrdo" style = "font-size: 1em;">Incluir</button>
	<div class="col-12">
		
</div>				

</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fechar</button>
													<button type="button" class="btn btn-primary">Transferir</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- ALTERAR CONTEXTO DA OBRA  -->
<script>
    function alterarContexto() {
       
		var botaordosalvar_js = document.getElementById('botaocarregarobra');
		botaordosalvar_js.disabled = true;
        botaordosalvar_js.innerHTML = "Alterando obra...";

		toastr.info( "Aguarde, alterando contexto...","CONTEXTO", {
				positionClass: "toast-top-right",
				timeOut: 10000,
				closeButton: true,
				debug: false,
				newestOnTop: true,
				progressBar: true,
				preventDuplicates: true,
				onclick: null,
				showDuration: "3000",
				hideDuration: "10000",
				extendedTimeOut: "10000",
				showEasing: "swing",
				hideEasing: "linear",
				showMethod: "fadeIn",
				hideMethod: "fadeOut",
				tapToDismiss: false
			});

		var CODCCUSTO = document.getElementById('CENTRODECUSTOCONTEXTO').value; 

        var dados = {
        	"CODCCUSTO": CODCCUSTO
        };
		
        console.log('Dados a serem enviados:', dados);


        fetch('<?php echo base_url('alterarContexto'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do backend:', data);
            if (data.status === 'success') {
                
				
				// Redireciona o usuário para a página da DevMedia após cinco segundos
				setTimeout(function() {
					window.location.href = "<?php echo base_url('index'); ?>";
				}, 1000);

				// window.location.reload(true);


            } else {
                // Trate o caso em que a resposta do backend não for 'success'
                console.error('Erro ao inserir registro:', data.message);
                toastr.error("Erro ao executar comando", "Tente novamente", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });

				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
            }
        })
        .catch(error => {
            console.error('Erro ao enviar dados:', error);
            // Exibe uma mensagem de erro caso ocorra um erro na requisição fetch
            toastr.error("Erro ao executar comando", "Tente novamente", {
                positionClass: "toast-top-right",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
				// btncancelar.disabled = false;
				// btncancelar.innerHTML = "Sim, cancelar!";
        });
    }
</script>





