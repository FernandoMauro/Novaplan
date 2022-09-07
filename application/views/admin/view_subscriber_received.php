<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Email recebidos pelo formulario do Site</h1>
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

			<div class="box box-info">        
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>Data</th>
					    <th>Nome</th>
					    <th>Telefone</th>
					    <th>Email do Contato</th>
					    <th>Ação</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$i=0;
					foreach ($email_received as $row) {
						$i++;
						?>
						<tr>
							<td><?php echo $row['received_date_time']; ?></td>
					        <td><?php echo $row['received_name']; ?></td>
					        <td><?php echo $row['received_phone']; ?></td>
					        <td><?php echo $row['received_email']; ?></td>
					        <td>
					        	<a class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?php echo $i; ?>">Detalhes</a>
					        	<button type="button" class="btn btn-danger btn-xs" value="<?php echo base_url(); ?>admin/subscriber/received_delete/<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete">Excluir</button>
					    	</td>
					    </tr>
					    <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			                        <div class="modal-dialog" role="document">
			                            <div class="modal-content">
			                                <div class="modal-header">
			                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                                    <h4 class="modal-title" id="myModalLabel">Ver detalhes</h4>
			                                </div>
			                                <div class="modal-body">
			                                    <div class="rTable">
			                                    	<div class="rTableRow">
			                                            <div class="rTableHead"><strong>Data do envio</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['received_date_time']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Nome</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['received_name']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Telefone</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['received_phone']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Email</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['received_email']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Assunto</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['received_subject']; ?>
			                                            </div>
			                                        </div>
			                                        <div class="rTableRow">
			                                            <div class="rTableHead"><strong>Mensagem</strong></div>
			                                            <div class="rTableCell">
			                                                <?php echo $row['received_message']; ?>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="modal-footer">
			                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fecha</button>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
						<?php
					}
					?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle"></i> Confirmação de Exclusão</h4>
      </div>
      <div class="modal-body">
        Tem certeza de que deseja excluir este item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-danger btn-ok" >Excluir Registo</a>
      </div>
    </div>
  </div>
</div>