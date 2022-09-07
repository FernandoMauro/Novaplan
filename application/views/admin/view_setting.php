<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Seção Configurações</h1>
	</div>
</section>

<section class="content" style="min-height:auto;margin-bottom: -30px;">
	<div class="row">
		<div class="col-md-12">
			<?php
	        if($this->session->flashdata('error')) {
	            ?>
				<div class="callout callout-danger">
					<p><?php echo $this->session->flashdata('error'); ?></p>
				</div>
	            <?php
	        }
	        if($this->session->flashdata('success')) {
	            ?>
				<div class="callout callout-success">
					<p><?php echo $this->session->flashdata('success'); ?></p>
				</div>
	            <?php
	        }
	        ?>

		</div>
	</div>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-12">
							
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_logo" data-toggle="tab">Logo</a></li>
						<li><a href="#tab_favicon" data-toggle="tab">Favicon</a></li>
						<li><a href="#tab_top_bar" data-toggle="tab">Barra superior</a></li>
						<li><a href="#tab_footer" data-toggle="tab">Rodapé</a></li>
						<li><a href="#tab_email" data-toggle="tab">E-mail</a></li>
						<li><a href="#tab_banner" data-toggle="tab">Banner</a></li>
						<li><a href="#tab_sidebar" data-toggle="tab">Barra Lateral</a></li>
                        <li><a href="#tab_color" data-toggle="tab">Cor</a></li>
					</ul>

					<div class="tab-content">

          				<div class="tab-pane active" id="tab_logo">
          					<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
          					<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">Foto existente</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['logo']; ?>" class="existing-photo" style="height:80px;">
							            </div>
							        </div>
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">Nova Foto</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <input type="file" name="photo_logo">
							            </div>
							        </div>
							        <div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_logo">Atualizar Logo</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>
          				</div>


          				<div class="tab-pane" id="tab_favicon">

          					<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">Foto existente</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['favicon']; ?>" class="existing-photo" style="height:40px;">
							            </div>
							        </div>
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">Nova Foto</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <input type="file" name="photo_favicon">
							            </div>
							        </div>
							        <div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_favicon">Atualizar Favicon</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>
          				</div>


          				<div class="tab-pane" id="tab_top_bar">
							<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
							<div class="box box-info">
								<div class="box-body">									
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Top Bar E-mail </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="top_bar_email" value="<?php echo $setting['top_bar_email']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">Top Bar Telefone </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="top_bar_phone" value="<?php echo $setting['top_bar_phone']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_top_bar">Atualizar</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>
          				</div>



          				<div class="tab-pane" id="tab_footer">
          					<div class="box box-info">
								<div class="box-body">
									

									<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
									<div class="box collapsed-box">
										<div class="box-header with-border">
											<h3 class="box-title">Seção Geral</h3>

											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
										<!-- /.box-header -->
										<div class="box-body"">

											<div class="form-group">
												<label for="" class="col-sm-3 control-label">Título da coluna 1  </label>
												<div class="col-sm-6">
													<input class="form-control" type="text" name="footer_col1_title" value="<?php echo $setting['footer_col1_title']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label">Título da coluna 2  </label>
												<div class="col-sm-6">
													<input class="form-control" type="text" name="footer_col2_title" value="<?php echo $setting['footer_col2_title']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label">Título da coluna 3  </label>
												<div class="col-sm-6">
													<input class="form-control" type="text" name="footer_col3_title" value="<?php echo $setting['footer_col3_title']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label">Título da coluna 4  </label>
												<div class="col-sm-6">
													<input class="form-control" type="text" name="footer_col4_title" value="<?php echo $setting['footer_col4_title']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label">Rodapé - Copyright </label>
												<div class="col-sm-6">
													<input class="form-control" type="text" name="footer_copyright" value="<?php echo $setting['footer_copyright']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label">Endereço do rodapé </label>
												<div class="col-sm-6">
													<textarea class="form-control" name="footer_address" style="height:70px;"><?php echo $setting['footer_address']; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label">E-mail do rodapé </label>
												<div class="col-sm-6">
													<textarea class="form-control" name="footer_email" style="height:70px;"><?php echo $setting['footer_email']; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label">Rodapé do Telefone </label>
												<div class="col-sm-6">
													<textarea class="form-control" name="footer_phone" style="height:70px;"><?php echo $setting['footer_phone']; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label">Número de Notícias Recentes </label>
												<div class="col-sm-6">
													<input class="form-control" type="text" name="footer_recent_news_item" value="<?php echo $setting['footer_recent_news_item']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label">Numero Recente de Portfolios </label>
												<div class="col-sm-6">
													<input class="form-control" type="text" name="footer_recent_portfolio_item" value="<?php echo $setting['footer_recent_portfolio_item']; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label"></label>
												<div class="col-sm-6">
													<button type="submit" class="btn btn-success pull-left" name="form_footer_general">Atualizar</button>
												</div>
											</div>
										</div>
									</div>
									<?php echo form_close(); ?>



									<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
									<div class="box collapsed-box">
										<div class="box-header with-border">
											<h3 class="box-title">Seção Newsletter</h3>

											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
										<!-- /.box-header -->
										<div class="box-body"">
											<div class="form-group">
				                                <label for="" class="col-sm-3 control-label">Texto Newsletter </label>
				                                <div class="col-sm-6">
				                                    <textarea class="form-control" name="newsletter_text" style="height:70px;"><?php echo $setting['newsletter_text']; ?></textarea>
				                                </div>
				                            </div>
				                            <div class="form-group">
												<label for="" class="col-sm-3 control-label"></label>
												<div class="col-sm-6">
													<button type="submit" class="btn btn-success pull-left" name="form_footer_newsletter">Atualizar</button>
												</div>
											</div>
										</div>
									</div>
									<?php echo form_close(); ?>



									<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
									<div class="box collapsed-box">
										<div class="box-header with-border">
											<h3 class="box-title">Seção de Call To Action - CTA</h3>

											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
										<!-- /.box-header -->
										<div class="box-body"">
				                            <div class="form-group">
				                                <label for="" class="col-sm-3 control-label">Texto CTA </label>
				                                <div class="col-sm-6">
				                                    <textarea name="cta_text" class="form-control" cols="30" rows="10" style="height:80px;"><?php echo $setting['cta_text']; ?></textarea>
				                                </div>
				                            </div>
				                            <div class="form-group">
				                                <label for="" class="col-sm-3 control-label">Texto do botão CTA </label>
				                                <div class="col-sm-6">
				                                    <input type="text" name="cta_button_text" class="form-control" value="<?php echo $setting['cta_button_text']; ?>">
				                                </div>
				                            </div>
				                            <div class="form-group">
				                                <label for="" class="col-sm-3 control-label">URL do botão CTA </label>
				                                <div class="col-sm-6">
				                                    <input type="text" name="cta_button_url" class="form-control" value="<?php echo $setting['cta_button_url']; ?>">
				                                </div>
				                            </div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label"></label>
												<div class="col-sm-6">
													<button type="submit" class="btn btn-success pull-left" name="form_footer_cta">Atualizar</button>
												</div>
											</div>
										</div>
									</div>
									<?php echo form_close(); ?>




									<?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
									<div class="box collapsed-box">
										<div class="box-header with-border">
											<h3 class="box-title">Foto de Background da Call To Action - CTA</h3>

											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
										<!-- /.box-header -->
										<div class="box-body"">
											<div class="form-group">
				                                <label for="" class="col-sm-3 control-label">Foto Existente </label>
				                                <div class="col-sm-6">
				                                    <img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['cta_background']; ?>" alt="" style="width:300px;">
				                                </div>
				                            </div>
				                            <div class="form-group">
				                                <label for="" class="col-sm-3 control-label">Nova Foto </label>
				                                <div class="col-sm-6">
				                                    <input type="file" name="photo" style="padding-top:5px;">
				                                </div>
				                            </div>
											<div class="form-group">
												<label for="" class="col-sm-3 control-label"></label>
												<div class="col-sm-6">
													<button type="submit" class="btn btn-success pull-left" name="form_footer_cta_background">Atualizar</button>
												</div>
											</div>
										</div>
									</div>
									<?php echo form_close(); ?>
								</div>
							</div>
          				</div>



          				<div class="tab-pane" id="tab_email">
          					<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
							<div class="box box-info">
								<div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Enviar email de <span>*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="send_email_from" maxlength="255" autocomplete="off" value="<?php echo $setting['send_email_from']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Receber email em <span>*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="receive_email_to" maxlength="255" autocomplete="off" value="<?php echo $setting['receive_email_to']; ?>">
                                        </div>
                                    </div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_email">Atualizar</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>
          				</div>



          				<div class="tab-pane" id="tab_banner">
          					<div class="box box-info">
								<div class="box-body">
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <table class="table table-bordered">                                
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Sobre</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_about']; ?>" alt="" style="width: 100%;height:auto;">
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_about">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Depoimento</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_testimonial']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_testimonial">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Notícias</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_news']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_news">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Eventos</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_event']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_event">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Contato</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_contact']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_contact">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Procurar</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_search']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_search">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Privacidade</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_privacy']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_privacy">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Verifique o assinante</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_verify_subscriber']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_verify_subscriber">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        
		                                    </table>
		                                </div>
		                                <div class="col-md-6">
		                                    <table class="table table-bordered">    
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página FAQ</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_faq']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_faq">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>

		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Produtos</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_service']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_service">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Obras</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_portfolio']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_portfolio">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Equipe</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_team']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_team">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Peços</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_pricing']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_pricing">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Galeria de Fotos</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_photo_gallery']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_photo_gallery">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Termos</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_terms']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_terms">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        <tr>
		                                            <?php echo form_open_multipart(base_url().'admin/setting/update',array('class' => '')); ?>
		                                            <td style="width:50%">
		                                                <h4>Página Representadas</h4>
		                                                <p>
		                                                    <img src="<?php echo base_url().'public/uploads/'.$setting['banner_represented']; ?>" alt="" style="width: 100%;height:auto;">  
		                                                </p>                                        
		                                            </td>
		                                            <td style="width:50%">
		                                                <h4>Alterar Banner</h4>
		                                                Selecionar foto<input type="file" name="photo">
		                                                <input type="submit" class="btn btn-success btn-xs" value="Alterar" style="margin-top:10px;" name="form_banner_represented">
		                                            </td>
		                                            <?php echo form_close(); ?>
		                                        </tr>
		                                        
		                                    </table>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
          				</div>



          				<div class="tab-pane" id="tab_sidebar">
          					<?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
							<div class="box box-info">
								<div class="box-body">

									<div class="box collapsed-box">
										<div class="box-header with-border">
											<h3 class="box-title">Página de Notícias - Seção da Barra Lateral</h3>

											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
										<!-- /.box-header -->
										<div class="box-body"">                                    
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Total de postagens recentes <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_total_recent_post" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_total_recent_post']; ?>">
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Título - Categoria <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_news_heading_category" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_news_heading_category']; ?>">
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Título - Postagem recente <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_news_heading_recent_post" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_news_heading_recent_post']; ?>">
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="box collapsed-box">
										<div class="box-header with-border">
											<h3 class="box-title">Página do Evento - Seção da Barra Lateral</h3>

											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
										<!-- /.box-header -->
										<div class="box-body""> 
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Total de próximos eventos <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_total_upcoming_event" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_total_upcoming_event']; ?>">
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Total de eventos passados <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_total_past_event" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_total_past_event']; ?>">
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Título - Próximo evento <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_event_heading_upcoming" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_event_heading_upcoming']; ?>">
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Título - Evento passado <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_event_heading_past" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_event_heading_past']; ?>">
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="box collapsed-box">
										<div class="box-header with-border">
											<h3 class="box-title">Página única de Produtos - seção da barra lateral</h3>

											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
										<!-- /.box-header -->
										<div class="box-body""> 
											<div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Título - Nossos Produtos <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_service_heading_service" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_service_heading_service']; ?>">
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Título - Contato Rápido <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_service_heading_quick_contact" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_service_heading_quick_contact']; ?>">
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="box collapsed-box">
										<div class="box-header with-border">
											<h3 class="box-title">Página Única do Obras - Seção da Barra Lateral</h3>

											<div class="box-tools pull-right">
												<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
										<!-- /.box-header -->
										<div class="box-body""> 
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Hreading - Detalhes da Obra <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_portfolio_heading_project_detail" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_portfolio_heading_project_detail']; ?>">
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="" class="col-sm-3 control-label">Título - Contato Rápido <span>*</span></label>
		                                        <div class="col-sm-4">
		                                            <input type="text" class="form-control" name="sidebar_portfolio_heading_quick_contact" maxlength="255" autocomplete="off" value="<?php echo $setting['sidebar_portfolio_heading_quick_contact']; ?>">
		                                        </div>
		                                    </div>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form_sidebar">Atualizar</button>
										</div>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>
          				</div>


                        
                        <div class="tab-pane" id="tab_color">
                            <?php echo form_open(base_url().'admin/setting/update',array('class' => 'form-horizontal')); ?>
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Cor Site </label>
                                        <div class="col-sm-4">
                                            <input type="text" name="front_end_color" class="form-control jscolor" value="<?php echo $setting['front_end_color']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_color">Atualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        










          			</div>
				</div>

			
		</div>
	</div>

</section>