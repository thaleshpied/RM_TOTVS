<!-- DOCUMENTOS ANEXOS -->
<div class="accordion-item mt-4">
									<div class="accordion-header rounded-lg text-center collapsed" id="hd6<?php echo $p['IDMOV']; ?>" data-bs-toggle="collapse" data-bs-target="#collapsehd6<?php echo $p['IDMOV']; ?>" aria-controls="collapsehd6<?php echo $p['IDMOV']; ?>"   role="button" aria-expanded="false">
										<span class="accordion-header-text">Documentos Anexos</span>
										<span class="accordion-header-indicator"></span>
									</div>
									<div id="collapsehd6<?php echo $p['IDMOV']; ?>" class="collapse" aria-labelledby="hd6<?php echo $p['IDMOV']; ?>" data-bs-parent="#accordion-one">
										<div class="accordion-body-text">
											<div class="row"><!-- FOTOS E DOCUMENTOS AQUI --> 
												<div class="col-xl-6 col-lg-6">
													<!-- Tab panes -->
													<div class="tab-content">
														<!-- <div role="tabpanel" class="tab-pane fade show active" id="first">
															<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/product/4.jpg'); ?>" alt="">
														</div>
														<div role="tabpanel" class="tab-pane fade" id="second">
															<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/product/2.jpg'); ?>" alt="">
														</div>
														<div role="tabpanel" class="tab-pane fade" id="third">
															<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/product/3.jpg'); ?>" alt="">
														</div>
														<div role="tabpanel" class="tab-pane fade" id="for">
															<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/product/4.jpg'); ?>" alt="">
														</div> -->
														

															<?php foreach ($data7 as $img): ?>
																<?php if ($img['IDMOV'] == $p['IDMOV']): ?> 
																	<div role="tabpanel" class="tab-pane fade" id="<?php echo $img['NOMEARQUIVO'];?>">
																		<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/'). $img['NOMEARQUIVO'];?>" alt="">
																	</div>
																<?php endif; ?>
															<?php endforeach; ?>

													</div>								
												</div>

											<div class="col-xl-6 col-lg-12">
												<div class="card">
													<div class="card-header">
														<h4 class="card-title">Carregar foto</h4>
													</div>
													<div class="card-body">
														<div class="basic-form custom_file_input">															
															<form action="'<?php echo base_url('uploadimagem'); ?>'" method="post" enctype="multipart/form-data">
																<input type="hidden" name="idmov" value="<?php echo $p['IDMOV']; ?>">
																<label for="imageFiles">Selecione as imagens:</label><br>
																<input type="file" name="files[]" multiple accept=".jpg, .png"><br><br>
																<input type="submit" value="Enviar">
															</form>
														</div>
													</div>							
													<div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
														<!-- Nav tabs -->
														<ul class="nav slide-item-list mt-3" role="tablist">
															<!-- <li role="presentation" class="show">
																<a href="#first" role="tab" data-bs-toggle="tab">
																	<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/tab/4.jpg'); ?>" alt="" width="50">
																</a>
															</li> -->
															<!-- <li role="presentation">
																<a href="#second" role="tab" data-bs-toggle="tab">
																	<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/tab/2.jpg'); ?>" alt="" width="50"></a>
															</li>
															<li role="presentation">
																<a href="#third" role="tab" data-bs-toggle="tab">
																	<img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/tab/3.jpg'); ?>" alt="" width="50"></a>
															</li>
															<li role="presentation">
																<a href="#for" role="tab" data-bs-toggle="tab"><img class="img-fluid bg-image" src="<?php echo base_url('public/assets/images/tab/4.jpg'); ?>" alt="" width="50"></a>
															</li> -->
														

															<?php foreach ($data7 as $img): ?>
																<?php if ($img['IDMOV'] == $p['IDMOV']): ?> 
																	<li role="presentation">
																		<a href="#<?php echo $img['NOMEARQUIVO'];?>" role="tab" data-bs-toggle="tab">
																			<img class="img-fluid bg-image" src="<?= base_url('public/assets/images/') . $img['NOMEARQUIVO']; ?>" alt="" width="50">
																		</a>
																	</li>
																<?php endif; ?>
															<?php endforeach; ?>



														</ul>

														

													</div>
												</div>
											</div>
										</div>											
									</div><!-- FIM DOCUMENTOS ANEXOS -->