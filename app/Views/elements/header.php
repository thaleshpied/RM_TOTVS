<!--**********************************
	Header start
***********************************-->
<div class="header border-bottom">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar" style="color: #f28836 !important">
					<?php echo $page_title; ?>
					</div>
				</div>

				
				<ul class="navbar-nav header-right">
					<!-- <?php  if ($sessionData['CLIENTE'] === 0 && $sessionData['CODCCUSTO'] === '02.0181.00') { ?>  
					<li class="nav-item d-flex align-items-center">
						<div class="input-group search-area">
							<input id="pesquisarheader" type="text" class="form-control" placeholder="Pesquisar...">
							<span class="input-group-text"><a href="javascript:void(0)" onclick="pesquisarheader()"><i class="flaticon-381-search-2"></i></a></span>
						</div>
					</li>
					<?php } ?> -->

					<!-- <li class="nav-item dropdown notification_dropdown">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon>
						</svg>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
								<ul class="timeline">
									<li>
										<div class="timeline-panel">
											<div class="media me-2">
												<img alt="image" width="50" src="https://topandaimes.com.br/obras/imagens/top-andaimes/FOTO_Vestimil_GUIMARAES_1.jpeg">
											</div>
											<div class="media-body">
												<h6 class="mb-1">Klabin</h6>
												<small class="d-block">X Andaimes montados</small>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
						</div>
					</li> -->
					

					
					<!-- ABAIXO OPÇÕES DE ALERTAS NO MENU SUPERIOR -->
					<!-- <li class="nav-item dropdown notification_dropdown">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"></path>
								<path d="M9.98192 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1839 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.98192Z" fill="#717579"></path>
							</svg>
							<span class="badge light text-white bg-blue rounded-circle">1</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3 ps" style="height:380px;">
								<ul class="timeline">
									<li>
										<div class="timeline-panel">
											<div class="media me-2">
												<img alt="image" width="50" src="https://topandaimes.com.br/obras/imagens/top-andaimes/FOTO_Vestimil_GUIMARAES_1.jpeg">
											</div>
											<div class="media-body">
												<h6 class="mb-1">RDO PENDENTE</h6>
												<small class="d-block">Referência [DATA]</small>
											</div>
										</div>
									</li>
								</ul>
							<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
							<a class="all-notification" href="javascript:void(0);">Central de Pendências<i class="ti-arrow-end"></i></a>
						</div>
					</li> -->


					<li class="nav-item dropdown header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<img src="<?php echo base_url('public/assets/images/user.png'); ?>" width="20" alt=""/>

							<div class="header-info ms-3">
								<span class="fs-18 font-w500 mb-2"><?php echo isset($sessionData['USUARIO']) ? $sessionData['USUARIO'] : ''; ?></span>
								<small class="fs-12 font-w400"><?php echo isset($sessionData['NOME_CENTRO_CUSTO']) ? $sessionData['NOME_CENTRO_CUSTO'] : ''; ?> - <?php echo isset($sessionData['CODCCUSTO']) ? $sessionData['CODCCUSTO'] : ''; ?></small>
							</div>							

						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- <a href="<?php echo site_url(''); ?>" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
								<span class="ms-2">Meu Perfil </span>
							</a>
							<a href="<?php echo base_url('/') ?>" class="dropdown-item ai-icon">
								<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
								<span class="ms-2">Mensagens </span>
							</a> -->
							<a onclick="logout()" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
								<span class="ms-2">Sair</span>
							</a>
						</div>
					</li>
					
				<?php  if ($sessionData['CLIENTE'] === 0) { ?>  
					
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link " href="javascript:void(0);" data-bs-toggle="dropdown">
							<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M22.1666 5.83331H20.9999V3.49998C20.9999 3.19056 20.877 2.89381 20.6582 2.67502C20.4394 2.45623 20.1427 2.33331 19.8333 2.33331C19.5238 2.33331 19.2271 2.45623 19.0083 2.67502C18.7895 2.89381 18.6666 3.19056 18.6666 3.49998V5.83331H9.33325V3.49998C9.33325 3.19056 9.21034 2.89381 8.99154 2.67502C8.77275 2.45623 8.47601 2.33331 8.16659 2.33331C7.85717 2.33331 7.56042 2.45623 7.34163 2.67502C7.12284 2.89381 6.99992 3.19056 6.99992 3.49998V5.83331H5.83325C4.90499 5.83331 4.01476 6.20206 3.35838 6.85844C2.702 7.51482 2.33325 8.40506 2.33325 9.33331V10.5H25.6666V9.33331C25.6666 8.40506 25.2978 7.51482 24.6415 6.85844C23.9851 6.20206 23.0948 5.83331 22.1666 5.83331Z" fill="#717579"/>
								<path d="M2.33325 22.1666C2.33325 23.0949 2.702 23.9851 3.35838 24.6415C4.01476 25.2979 4.90499 25.6666 5.83325 25.6666H22.1666C23.0948 25.6666 23.9851 25.2979 24.6415 24.6415C25.2978 23.9851 25.6666 23.0949 25.6666 22.1666V12.8333H2.33325V22.1666Z" fill="#717579"/>
							</svg>
							<span class="badge light text-white bg-primary rounded-circle"> </span>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<div id="DZ_W_TimeLine02" class="widget-timeline dlab-scroll style-1 ps ps--active-y p-3 height400">
								<ul class="timeline">
									<?php foreach ($log as $item): ?>
									<li>
										<div class="timeline-badge primary"></div>
										<a class="timeline-panel text-muted" href="javascript:void(0);">
											<span><?php echo $item['EXECUTADO_EM']; ?></span>
											<h6 class="mb-0"><?php echo $item['RECCREATEDBY']; ?> <strong class="text-primary"><?php echo $item['ROTINA']; ?></strong>.</h6>
										</a>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</li>
					
			<?php } ?>
					


					
					<li class="nav-item dropdown notification_dropdown">
					
						<a class="nav-link bell-link " href="javascript:void(0);">
							
						<svg fill="#000000" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>Steam icon</title><path d="M11.979 0C5.678 0 .511 4.86.022 11.037l6.432 2.658c.545-.371 1.203-.59 1.912-.59.063 0 .125.004.188.006l2.861-4.142V8.91c0-2.495 2.028-4.524 4.524-4.524 2.494 0 4.524 2.031 4.524 4.527s-2.03 4.525-4.524 4.525h-.105l-4.076 2.911c0 .052.004.105.004.159 0 1.875-1.515 3.396-3.39 3.396-1.635 0-3.016-1.173-3.331-2.727L.436 15.27C1.862 20.307 6.486 24 11.979 24c6.627 0 11.999-5.373 11.999-12S18.605 0 11.979 0zM7.54 18.21l-1.473-.61c.262.543.714.999 1.314 1.25 1.297.539 2.793-.076 3.332-1.375.263-.63.264-1.319.005-1.949s-.75-1.121-1.377-1.383c-.624-.26-1.29-.249-1.878-.03l1.523.63c.956.4 1.409 1.5 1.009 2.455-.397.957-1.497 1.41-2.454 1.012H7.54zm11.415-9.303c0-1.662-1.353-3.015-3.015-3.015-1.665 0-3.015 1.353-3.015 3.015 0 1.665 1.35 3.015 3.015 3.015 1.663 0 3.015-1.35 3.015-3.015zm-5.273-.005c0-1.252 1.013-2.266 2.265-2.266 1.249 0 2.266 1.014 2.266 2.266 0 1.251-1.017 2.265-2.266 2.265-1.253 0-2.265-1.014-2.265-2.265z"></path></g></svg>
							<!-- <span class="badge light text-white bg-secondary rounded-circle">27</span> -->
						</a>


					</li>	
					 <!-- <li class="nav-item dropdown header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<img src="<?php echo base_url('public/assets/images/eu.jpg'); ?>" width="20" alt=""/>
							<div class="header-info ms-3">
								<span class="fs-18 font-w500 mb-2">Thales Henrique</span>
								<small class="fs-12 font-w400">TOP Andaimes</small>
							</div>
						</a> -->
					<!--	<div class="dropdown-menu dropdown-menu-end">
							<a href="<?php echo site_url('/app-profile'); ?>" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
								<span class="ms-2">Profile </span>
							</a>
							<a href="<?php echo site_url('/email-inbox'); ?>" class="dropdown-item ai-icon">
								<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
								<span class="ms-2">Inbox </span>
							</a>
							<a href="<?php echo site_url('/page-login'); ?>" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
								<span class="ms-2">Logout </span>
							</a>
						</div>
					</li> -->
				</ul>
			</div>
		</nav>
	</div>
</div>
<!--**********************************
	Header end
***********************************-->