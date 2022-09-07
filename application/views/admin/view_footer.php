		</div>

	</div>

	<script src="<?php echo base_url(); ?>public/admin/js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/select2.full.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jscolor.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.extensions.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/icheck.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/fastclick.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.fancybox.pack.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/app.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/summernote.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/sweetalert2.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/demo.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/bootstrap-toggle.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/adminlte.min.js"></script>

	
	<script>


	(function($) {
		
		$(document).ready(function() {
	        $('#editor1').summernote({
	        	height: 300
	        });
	        $('#editor2').summernote({
	        	height: 300
	        });
	        $('#editor3').summernote({
	        	height: 300
	        });
	        $('#editor4').summernote({
	        	height: 300
	        });
	        $('#editor5').summernote({
	        	height: 300
	        });
	        $('#editor6').summernote({
	        	height: 300
	        });
	        $('.editor').summernote({
	        	height: 300
	        });
	        $('.editor_short').summernote({
	        	height: 150,
	        	callbacks: {
			        onImageUpload: function(image) {
			            uploadImage(image[0]);
			        }
			    }
	        });
	        function uploadImage(image) {
			    //modalWaiting.show();
			    		    
			    const limitSize = image.size / 1000;
			    if(limitSize > 1000)
			    {
			        Swal.fire("O tamanho máximo da imagem é 1Mb");

			        return false;
			    }
			    if(image['type'] != 'image/jpeg' && image['type'] != 'image/jpg' && image['type'] != 'image/png'){
	            	Swal.fire("Atenção! Imagens aceitas: png, jpg ou jpeg.");
	                return false;
	            }
			    var data = new FormData();
			    data.append("image", image);
			    var base = 'page/upload';
			    const token = $('meta[name="X-CSRF-TOKEN"]').attr('content'); 
			    Swal.showLoading();
			    $.ajax({
			        url: base,
			        cache: false,
			        contentType: false,
			        processData: false,
			        data: data,
			        type: "post",
			        headers: {
			            'X-Requested-With': 'XMLHttpRequest',
			            'X-CSRF-TOKEN': token
			        },
			        success: function(url) {
			            //$('.editor_short').summernote("insertImage", url);
			            var image = $('<img>').attr('src', url)
			            						.width('50%');
            			$('.editor_short').summernote("insertNode", image[0]);
			            Swal.hideLoading()
			            Swal.fire("Imagem inserida com sucesso!");
			        },
			        error: function(data) {
			            Swal.hideLoading()
			            Swal.fire("Erro ao carregar...");
			        }
			    });
			};
	    });

	    //Initialize Select2 Elements
	    $(".select2").select2();

	    //Datemask dd/mm/yyyy
	    $("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	    //Datemask2 mm/dd/yyyy
	    $("#datemask2").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	    //Money Euro
	    $("[data-mask]").inputmask();

	    //Date picker
	    $('.datepicker').datepicker({
	      autoclose: true,
	      format: 'dd/mm/yyyy',
	      todayBtn: 'linked',
	      language: 'pt_br',
	    });

	    $('#datepicker').datepicker({
	      autoclose: true,
	      format: 'dd/mm/yyyy',
	      todayBtn: 'linked',
	      language: 'pt_br',
	    });

	    $('#datepicker1').datepicker({
	      autoclose: true,
	      format: 'dd/mm/yyyy',
	      todayBtn: 'linked',
	      language: 'pt_br',
	    });

	    $('#datepicker2').datepicker({
	      autoclose: true,
	      format: 'dd/mm/yyyy',
	      todayBtn: 'linked',
	      language: 'pt_br',
	    });

	    //iCheck for checkbox and radio inputs
	    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	      checkboxClass: 'icheckbox_minimal-blue',
	      radioClass: 'iradio_minimal-blue'
	    });
	    //Red color scheme for iCheck
	    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
	      checkboxClass: 'icheckbox_minimal-red',
	      radioClass: 'iradio_minimal-red'
	    });
	    //Flat red color scheme for iCheck
	    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	      checkboxClass: 'icheckbox_flat-green',
	      radioClass: 'iradio_flat-green'
	    });


	    $("#example1").DataTable({
	        "language": {
	            "url": "<?php echo base_url(); ?>public/admin/js/Portuguese-Brasil.json"
	        }
	    } );
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false
	    });

	    //Subistituido pelo codigo abaixo
	    /*$('#confirm-delete').on('show.bs.modal', function(e) {
	      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	    });*/

		$('#confirm-delete').on('show.bs.modal', function(e) {
	      var href = e.relatedTarget.value
	      $(this).find('.btn-ok').attr('href', href);
	      //alert(e.relatedTarget.value)
	    });

	    // Simulate ".btn-ok" button click to alert href value
		/*$('#confirm-delete .btn-ok').on('click', function (e) {
		  e.preventDefault()
		  alert(e.target.href)
		})*/


	})(jQuery);

	</script>

	<script type="text/javascript">

        $(document).ready(function () {

		    $("#btnAddNew").click(function () {

		        var rowNumber = $("#PhotosTable tbody tr").length;

		        var trNew = "";              

		        var addLink = "<div class=\"upload-btn" + rowNumber + "\"><input type=\"file\" name=\"photos[]\"></div>";
		           
		        var deleteRow = "<a href=\"javascript:void()\" class=\"Delete btn btn-danger btn-xs\">X</a>";

		        trNew = trNew + "<tr> ";

		        trNew += "<td>" + addLink + "</td>";
		        trNew += "<td style=\"width:28px;\">" + deleteRow + "</td>";

		        trNew = trNew + " </tr>";

		        $("#PhotosTable tbody").append(trNew);

		    });

		    $('#PhotosTable').delegate('a.Delete', 'click', function () {
		        $(this).parent().parent().fadeOut('slow').remove();
		        return false;
		    });

		    $(".sortable").sortable({
		    	connectWith: ".sortable",
		    	placeholder: 'dragHelper',
		    	scroll: true,
		    	revert: true,
		    	cursor: "move",
		    	//disabled: true,
		    	update: function(event, ui) {
		    		var id_item_list = $(this).sortable('toArray').toString();
		    		
					//alert(checkitem);	    		
					//alert(id_item_list);	    		
		    		$.ajax({
		    			url: '<?= base_url(); ?>admin/service/order',
		    			type: 'POST',
		    			dataType : 'json',
		    			data: {'id_order' : id_item_list},
		    			success: function(data) {
		    				console.log(data);
		    			}
		    		});
		    	},
		    	start: function( event, ui ) {

		    	},
		    	stop: function( event, ui ) {

		    	}
		    });

		    $('.checkitem').bind('change',function(){
		    	
		    	var idCheck = $(this).attr("id"); 
		    	if($(this).is(":checked"))
			    	var checked = 1;
			    else
			    	var checked = 0;

		    	$.ajax({
		    		url: '<?= base_url(); ?>admin/service/update_check',
		    		type: 'POST',
		    		dataType : 'json',
		    		data: {'idCheck' : idCheck, 'checked' : checked},
		    		success: function(data) {
		    			console.log(data);
		    		}
		    	});
		    })


		});

		selectEmailMethod = $('#selectEmailMethod').val();
        $('#selectEmailMethod').on('change',function() {
            selectEmailMethod = $('#selectEmailMethod').val();
            if ( selectEmailMethod == 'Normal' ) {
               	$('#smtpContainer').hide();
            } else if ( selectEmailMethod == 'SMTP' ) {
               	$('#smtpContainer').show();
            }
        });
        
       
    </script>

    <script>
        /*document.getElementById("upload").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("img").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };*/
    </script>

</body>
</html>