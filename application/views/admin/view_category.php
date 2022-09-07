<?php
if(!$this->session->userdata('id')) {
  redirect(base_url().'admin');
}
?>

<section class="content-header">
  <div class="content-header-left">
    <h1>Exibir categorias</h1>
  </div>
  <div class="content-header-right">
    <a href="<?php echo base_url(); ?>admin/category/add" class="btn btn-primary btn-sm">Add New</a>
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
                <th>SL</th>
                <th>Nome Categoria</th>
                <th>Banner Categoria</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              foreach ($category as $row) {
                $i++;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td>
                  <img src="<?php echo base_url(); ?>public/uploads/<?php echo $row['category_banner']; ?>" alt="<?php echo $row['category_name']; ?>" style="width:250px;">
                </td>
                <td>
                  <a href="<?php echo base_url(); ?>admin/category/edit/<?php echo $row['category_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
                  <button type="button" class="btn btn-danger btn-xs" value="<?php echo base_url(); ?>admin/category/delete/<?php echo $row['category_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Excluir</button>
                  <!--<a href="<?php echo base_url(); ?>admin/category/delete/<?php echo $row['category_id']; ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete">Delete</a>-->
                </td>
              </tr>
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