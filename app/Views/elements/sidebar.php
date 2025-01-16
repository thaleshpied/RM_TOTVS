<!--**********************************
    Sidebar start
***********************************-->

<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
        
          
            <?php  if ($sessionData['CLIENTE'] === 1 || $sessionData['CLIENTE'] === 0) { ?>  
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/index'); ?>">Início</a></li>
                </ul>
               
            </li>
            <?php } ?>

            <?php  if ($sessionData['CLIENTE'] === 0) { ?>  
               <li>
                    <a href="<?php echo site_url('/Usuarios'); ?>" class="" aria-expanded="false">
                    <i class="fas fa-user-check"></i>
                    <span class="nav-text">Usuários</span>
                    </a>
                <li> 
            <?php } ?>



            <?php  if ($sessionData['CLIENTE'] != 3) { ?>  

            <li>
                <!-- <a href="assinatura-eletronica" aria-expanded="false">
                    <i class="fa fa-spinner" aria-hidden="true"></i>
                    <span class="nav-text">TOTVS SIGN</span>
                </a> -->
                <!-- <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/'); ?>">Opções</a></li>
                </ul> -->
            </li>

            <?php  if ($sessionData['CLIENTE'] === 0) { ?>
                <li><a href="<?php echo site_url('/SCAndaimes'); ?>"  href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-clone"></i>            
                        <span class="nav-text">Andaimes</span>
                    </a>
                    <!-- <ul aria-expanded="false">
                        <li><a href="<?php echo site_url('SCAndaimes'); ?>">Solicitação</a></li>
                        <li><a href="<?php echo site_url('/VSAndaimes'); ?>">Visitas</a></li>
                        <li><a href="<?php echo site_url('/PRAndaimes'); ?>">Projetos</a></li>
                        <li><a href="<?php echo site_url('/Orcamento'); ?>">Orçamento (TESTE)</a></li>
                        <li><a href="<?php echo site_url('/rdo'); ?>">RDO</a></li>
                    </ul> -->
                </li>
            <?php } ?>


            <!-- <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-chart-line"></i>
                    <span class="nav-text">Andaimes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('PLAndaimes'); ?>">Planejamento/Programação</a></li>
                    <li><a href="<?php echo site_url(''); ?>">Programação</a></li>
                </ul>
            </li> -->
            <?php } ?>

            <li><a href="<?php echo site_url('/rdo'); ?>" class="" aria-expanded="false">
                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                    <span class="nav-text">RDO</span>
                </a>
            </li>
            
            <?php  if ($sessionData['CLIENTE'] === 0) { ?>
            <!-- <li><a href="<?php echo site_url('/'); ?>" class="" aria-expanded="false">
                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                    <span class="nav-text">BM</span>
                </a>
            </li> -->

            <li><a href="<?php echo site_url('Parametrizador'); ?>" aria-expanded="false">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span class="nav-text">Parametrizador</span>
                </a>
            </li>
            <?php } ?>

            <!-- <li><a href="<?php echo site_url('GeradorXML'); ?>" aria-expanded="false">
                    <i class="fa fa-file-code-o" aria-hidden="true"></i>
                    <span class="nav-text">Gerador de XML</span>
                </a>
            </li> -->

            <!-- <hr>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-qrcode" aria-hidden="true"></i>
                    <span class="nav-text">QR CODE</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/Qr_code'); ?>">Geração</a></li>
                    <li><a href="<?php echo site_url('/Qr_code'); ?>">Gerados</a></li>
                    <li><a href="<?php echo site_url('/Qr_code_ler/1213'); ?>">Informação do Andaime</a></li>
                </ul>
            </li> -->

            
           



            

            
            
            <!-- <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-info-circle"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/app-profile'); ?>">Profile</a></li>
                    <li><a href="<?php echo site_url('/post-details'); ?>">Post Details</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo site_url('/email-compose'); ?>">Compose</a></li>
                            <li><a href="<?php echo site_url('/email-inbox'); ?>">Inbox</a></li>
                            <li><a href="<?php echo site_url('/email-read'); ?>">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('/app-calender'); ?>">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo site_url('/ecom-product-grid'); ?>">Product Grid</a></li>
                            <li><a href="<?php echo site_url('/ecom-product-list'); ?>">Product List</a></li>
                            <li><a href="<?php echo site_url('/ecom-product-detail'); ?>">Product Details</a></li>
                            <li><a href="<?php echo site_url('/ecom-product-order'); ?>">Order</a></li>
                            <li><a href="<?php echo site_url('/ecom-checkout'); ?>">Checkout</a></li>
                            <li><a href="<?php echo site_url('/ecom-invoice'); ?>">Invoice</a></li>
                            <li><a href="<?php echo site_url('/ecom-customers'); ?>">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-chart-line"></i>
                    <span class="nav-text">Charts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/chart-flot'); ?>">Flot</a></li>
                    <li><a href="<?php echo site_url('/chart-morris'); ?>">Morris</a></li>
                    <li><a href="<?php echo site_url('/chart-chartjs'); ?>">Chartjs</a></li>
                    <li><a href="<?php echo site_url('/chart-chartist'); ?>">Chartist</a></li>
                    <li><a href="<?php echo site_url('/chart-sparkline'); ?>">Sparkline</a></li>
                    <li><a href="<?php echo site_url('/chart-peity'); ?>">Peity</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fab fa-bootstrap"></i>
                    <span class="nav-text">Bootstrap</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/ui-accordion'); ?>">Accordion</a></li>
                    <li><a href="<?php echo site_url('/ui-alert'); ?>">Alert</a></li>
                    <li><a href="<?php echo site_url('/ui-badge'); ?>">Badge</a></li>
                    <li><a href="<?php echo site_url('/ui-button'); ?>">Button</a></li>
                    <li><a href="<?php echo site_url('/ui-modal'); ?>">Modal</a></li>
                    <li><a href="<?php echo site_url('/ui-button-group'); ?>">Button Group</a></li>
                    <li><a href="<?php echo site_url('/ui-list-group'); ?>">List Group</a></li>
                    <li><a href="<?php echo site_url('/ui-card'); ?>">Cards</a></li>
                    <li><a href="<?php echo site_url('/ui-carousel'); ?>">Carousel</a></li>
                    <li><a href="<?php echo site_url('/ui-dropdown'); ?>">Dropdown</a></li>
                    <li><a href="<?php echo site_url('/ui-popover'); ?>">Popover</a></li>
                    <li><a href="<?php echo site_url('/ui-progressbar'); ?>">Progressbar</a></li>
                    <li><a href="<?php echo site_url('/ui-tab'); ?>">Tab</a></li>
                    <li><a href="<?php echo site_url('/ui-typography'); ?>">Typography</a></li>
                    <li><a href="<?php echo site_url('/ui-pagination'); ?>">Pagination</a></li>
                    <li><a href="<?php echo site_url('/ui-grid'); ?>">Grid</a></li>

                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-heart"></i>
                    <span class="nav-text">Plugins</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/uc-select2'); ?>">Select 2</a></li>
                    <li><a href="<?php echo site_url('/uc-nestable'); ?>">Nestedable</a></li>
                    <li><a href="<?php echo site_url('/uc-noui-slider'); ?>">Noui Slider</a></li>
                    <li><a href="<?php echo site_url('/uc-sweetalert'); ?>">Sweet Alert</a></li>
                    <li><a href="<?php echo site_url('/uc-toastr'); ?>">Toastr</a></li>
                    <li><a href="<?php echo site_url('/map-jqvmap'); ?>">Jqv Map</a></li>
                    <li><a href="<?php echo site_url('/uc-lightgallery'); ?>">Light Gallery</a></li>
                </ul>
            </li>
            <li><a href="<?php echo site_url('/widget-basic'); ?>" class="" aria-expanded="false">
                    <i class="fas fa-user-check"></i>
                    <span class="nav-text">Widget</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-file-alt"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/form-element'); ?>">Form Elements</a></li>
                    <li><a href="<?php echo site_url('/form-wizard'); ?>">Wizard</a></li>
                    <li><a href="<?php echo site_url('/form-editor'); ?>">CkEditor</a></li>
                    <li><a href="<?php echo site_url('/form-pickers'); ?>">Pickers</a></li>
                    <li><a href="<?php echo site_url('/form-validation'); ?>">Form Validate</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-table"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/table-bootstrap-basic'); ?>">Bootstrap</a></li>
                    <li><a href="<?php echo site_url('/table-datatable-basic'); ?>">Datatable</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-clone"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo site_url('/page-login'); ?>">Login</a></li>
                    <li><a href="<?php echo site_url('/page-register'); ?>">Register</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo site_url('/page-error-400'); ?>">Error 400</a></li>
                            <li><a href="<?php echo site_url('/page-error-403'); ?>">Error 403</a></li>
                            <li><a href="<?php echo site_url('/page-error-404'); ?>">Error 404</a></li>
                            <li><a href="<?php echo site_url('/page-error-500'); ?>">Error 500</a></li>
                            <li><a href="<?php echo site_url('/page-error-503'); ?>">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('/page-lock-screen'); ?>">Lock Screen</a></li>
                    <li><a href="<?php echo site_url('/page-empty'); ?>">Empty Page</a></li>
                </ul>
            </li>  -->
        
        </ul>

     
        <?php  if ($sessionData['USUARIO'] == 'THALES.PIEDADE') { ?> 
        <div class="">
            <div class="text-center">
                <h4 class="fs-18 font-w600 mb-4"></h4>
                <a href="<?php echo site_url('/logsgeral'); ?>" class="btn btn-primary btn-rounded">LOGS </a>
            </div>
        </div>
        <?php } ?>

        <!-- <div class="copyright">
            <p><strong> Project Management</strong> © 2024 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by </p>
        </di> -->
    
    </div>
    
</div>
<!--**********************************
    Sidebar end
***********************************-->