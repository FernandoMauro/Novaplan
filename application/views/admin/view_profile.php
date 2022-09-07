<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Editar Usuários</h1>
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
					<li class="active"><a href="#tab_1" data-toggle="tab">Atualizar informação</a></li>
					<li><a href="#tab_2" data-toggle="tab">Atualizar Foto</a></li>
					<li><a href="#tab_3" data-toggle="tab">Atualizar Senha</a></li>
				</ul>
				<div class="tab-content">

      				<div class="tab-pane active" id="tab_1">						
						<?php echo form_open(base_url().'admin/profile/update',array('class' => 'form-horizontal')); ?>
						<input type="hidden" name="id" value="<?php echo $this->session->userdata('id'); ?>">
						<div class="box box-info">
							<div class="box-body">
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Email <span>*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="email" value="<?php echo $this->session->userdata('email'); ?>">
									</div>			
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Função <span>*</span></label>
									<div class="col-sm-4" style="padding-top:7px;">
										<?php echo $this->session->userdata('role'); ?>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label"></label>
									<div class="col-sm-6">
										<button type="submit" class="btn btn-success pull-left" name="form1">Salvar</button>
									</div>
								</div>
							</div>
						</div>
						<?php echo form_close(); ?>
      				</div>


      				<div class="tab-pane" id="tab_2">
						<?php echo form_open_multipart(base_url().'admin/profile/update',array('class' => 'form-horizontal')); ?>
						<input type="hidden" name="id" value="<?php echo $this->session->userdata('id'); ?>">
						<div class="box box-info">
							<div class="box-body">
								<div class="form-group">
						            <label for="" class="col-sm-2 control-label">Foto Existente</label>
						            <div class="col-sm-6" style="padding-top:6px;">
						            	<?php if($this->session->userdata('photo') ==''): ?>
						            		<img src="<?php echo base_url(); ?>public/img/no-photo.jpg" class="existing-photo" alt="profile photo" width="140">
						            	<?php else: ?>
						            		 <img src="<?php echo base_url(); ?>public/uploads/<?php echo $this->session->userdata('photo'); ?>" class="existing-photo" width="140">
						            	<?php endif; ?>							                
						            </div>
						        </div>
								<div class="form-group">
						            <label for="" class="col-sm-2 control-label">Nova Foto</label>
						            <div class="col-sm-6" style="padding-top:6px;">
						                <input type="file" name="photo">
						            </div>
						        </div>
						        <div class="form-group">
									<label for="" class="col-sm-2 control-label"></label>
									<div class="col-sm-6">
										<button type="submit" class="btn btn-success pull-left" name="form2">Salvar</button>
									</div>
								</div>
							</div>
						</div>
						<?php echo form_close(); ?>
      				</div>


      				<div class="tab-pane" id="tab_3">
						<?php echo form_open(base_url().'admin/profile/update',array('class' => 'form-horizontal')); ?>
						<input type="hidden" name="id" value="<?php echo $this->session->userdata('id'); ?>">
						<div class="box box-info">
							<div class="box-body">
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Senha </label>
									<div class="col-sm-4">
										<input type="password" class="form-control" name="password">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Repita a Senha </label>
									<div class="col-sm-4">
										<input type="password" class="form-control" name="re_password">
									</div>
								</div>
						        <div class="form-group">
									<label for="" class="col-sm-2 control-label"></label>
									<div class="col-sm-6">
										<button type="submit" class="btn btn-success pull-left" name="form3">Salvar</button>
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