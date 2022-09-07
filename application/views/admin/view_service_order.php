<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>

<style type="text/css">
		
		.dragHelper{
				display: block;
			   	padding: 30px;
			   	margin-top: 10px;
			    background: #fff;
			    border: 2px dashed red;
			    border-radius: 3px;
			    text-align: center;
			    -webkit-transition: background-color 0.2s ease;
			    transition: background-color 0.2s ease;
			}	

		.item{
			margin-top: 10px;
			padding: 10px;
			background-color: white;
			box-shadow: inset 0 0 1em white, 0 0 1em black;
		}

	 	.toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  		.toggle.ios .toggle-handle { border-radius: 20px; }

	</style>

<section class="content-header">
	<div class="content-header-left">
		<h1>Ordena Produtos</h1>
	</div>
</section>

<section class="content">
	<h3 class="sec_title">Arraste o produto para cima ou baixo de maneira que fique na ordem que se deseja que seja apresentado na tela.</h3>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8 sortable">

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

	        	<?php
	        	foreach ($service as $row) {
	        		?>
	        		<div class="alert alert-successs item" id="<?php echo $row['id']; ?>">
	        			<div class="row d-flex align-items-center">
	        				<div class="col-md-2 text-center" style="margin-top: 10px;">
	        					<input class="checkitem" type="checkbox" data-toggle="toggle" data-on="Ativo" data-off="inativo" data-onstyle="success" data-offstyle="danger" data-size="mini" id="<?php echo 'check'.$row['id']; ?>" <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>
	        				</div>
	        				<div class="col-md-7 text-center" style="margin-top: 10px;">
	        					<i class="fa fa-bars"></i>
	        					<?php echo $row['name']; ?>
	        				</div>
	        				<div class="col-md-3 text-center">
	        					<img src="<?php echo base_url(); ?>public/uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" style="width:75px;">
	        				</div>
	        			</div>
	        			
	        			
	        		</div>
	        		<?php
	        	}
	        	?>	
		</div>
		<div class="col-md-2">
		</div>
	</div>
</section>