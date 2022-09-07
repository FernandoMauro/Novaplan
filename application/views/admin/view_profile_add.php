<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Adiciona Usuário</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/profile/users" class="btn btn-primary btn-sm">Ver todos</a>
	</div>
</section>


<section class="content">

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
			
			<?php echo form_open_multipart(base_url().'admin/profile/add',array('class' => 'form-horizontal'));?>
				<div class="box box-info">
					<div class="box-body">
						<!--<div class="form-group">
							<label for="" class="col-sm-2 control-label">Foto <span>*</span></label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
							</div>
						</div>-->
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email </label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="email" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Senha </label>
							<div class="col-sm-6">
								<input type="password" autocomplete="off" class="form-control" name="password" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Repita a Senha </label>
							<div class="col-sm-6">
								<input type="password" autocomplete="off" class="form-control" name="re_password" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Grupo </label>
							<div class="col-sm-2">
								<select name="role" class="form-control select2">
									<option value="Admin">Administrador</option>
									<option value="Client">Cliente</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status </label>
							<div class="col-sm-2">
								<select name="status" class="form-control select2">
									<option value="Active">Ativo</option>
									<option value="Inactive">Inativo</option>
								</select>
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
	</div>

</section>