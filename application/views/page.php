<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Penjadwalan Laboratorium Komputer</title>
      <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link rel="shortcut icon" href="<?php echo base_url();?>favicon/android-chrome-192x192.png" />

      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/theme.css" />
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/badger.min.css" />
	  
      <link rel="stylesheet" href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.css" />
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/lib/datepicker/css/datepicker.css" />
	  
      <script src="<?php echo base_url()?>assets/lib/jquery-latest.min.js" type="text/javascript"></script>	  
      
      <!-- Demo page code -->
      <style type="text/css">
		 body .frmModalMsg {
			/* new custom width */
			width: 740px;
			/* must be half of the width, minus scrollbar on the left (30px) */
			margin-left: -280px;
		 }
   
         #line-chart {
			height:300px;
			width:800px;
			margin: 0px auto;
			margin-top: 1em;
         }
         .brand { font-family: georgia, serif; }
         .brand .first {
         color: #ccc;
			font-style: italic;
         }
         .brand .second {
			color: #fff;
			font-weight: bold;
         }
		 
		 #loading-div-background{
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			background: #000000;
			width: 100%;
			height: 100%;
		}
		
		#loading-div{
			width: 300px;
			height: 150px;
			background-color: #ffffff;
			border: 5px solid #ffffff;
			text-align: center;
			color: #336699;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
		}
      </style>

      <script type="text/javascript">
	     
	     
	     
		
		$(document).ready(function (){
			$("#loading-div-background").css({ opacity: 0.8 });
		 <?php if(isset($clear_text_box)) { ?>    
			$('input[type=text]').each(function() {
			    $(this).val('');
			});
		 <?php } ?>
		});
	
		function ShowProgressAnimation(){
			$("#loading-div-background").show();
		}
		 
		 function change_get(){		
		 	var semester_tipe = document.getElementById('semester_tipe');
			var tahun_akademik = document.getElementById('tahun_akademik');
		 	window.location.href = "<?php echo base_url().'web/pengampu/' ?>" + semester_tipe.options[semester_tipe.selectedIndex].value  + "/"	  + tahun_akademik.options[tahun_akademik.selectedIndex].value;		
		 }
		 
		 function change_dosen_tidak_bersedia() {
			
			var kode_dosen = document.getElementById('kode_dosen');			
			window.location.href = "<?php echo base_url().'web/waktu_tidak_bersedia/' ?>" + kode_dosen.options[kode_dosen.selectedIndex].value;		
		 }
		 
		function get_matakuliah() {		   
			var semester_tipe = document.getElementById('semester_tipe');
			//
			$.ajax({
			   type:"POST",
			   async   : false,
			   cache   : false,
			   url: "<?php echo base_url()?>web/option_matakuliah_ajax/" + semester_tipe.options[semester_tipe.selectedIndex].value,
			   success: function(msg){
				  //alert(msg);
				  $('#option_matakuliah').html(msg);
			   }
			});
			return false;		 
		}
		
		/*
	  $('#myTable tr').click({
		 $(this).remove();
		   return false;
	   };
		
		*/
		function delete_row(link,kode) {
		 	var answer =  confirm('Anda yakin ingin menghapus data ini?');
			if(answer){
			   $.ajax({
				  type:"POST",
				  async   : false,
				  cache   : false,
				  url: "<?php echo base_url()?>" + link + kode,
				  success: function(msg){
					 //alert(msg);
					 //$('#option_matakuliah').html(msg);
					 var tr  = $('#row_' + kode);
					 tr.css("background-color","#FF3700");
					 tr.fadeOut(400, function(){
					   tr.remove();
					 });				  
				  }
			   });
			   
			}
			return false;
		}
		
        $(function() {
                applyPagination();
             
			    function applyPagination() {
                 $("#ajax_paging a").click(function() {             
             
                   var url = $(this).attr("href");
                   $.ajax({
                     type: "POST",
                     data: "ajax=1",
                     url: url, 
                     success: function(msg) {
                       $('#content_ajax').fadeOut(0,function(){
                           $('#content_ajax').html(msg);
						   $("#content_ajax").removeAttr("style");
                           applyPagination();                 
                       }).fadeIn(0);                       
                     }
                   });              
                   return false;
                 });
               }
             });
      </script>
   </head>
               <body class="">
                  <!--<![endif]-->
                  <div class="navbar">
                     <div class="navbar-inner">
                        <a class="brand" href="#"><img width="48" height="48" src="<?php echo base_url();?>favicon/android-chrome-192x192.png"><span class="second"> </span><span class="first"> </span></a>
                     </div>
                  </div>
                  <div class="sidebar-nav" style="margin-top: 6px">	 
                     <a href="<?php echo base_url();?>" class="nav-header"><i class="icon-th-list"></i>Beranda</a>
                     <a class="nav-header" ><i class="icon-book"></i>Data Master</a>
                     <ul id="content-menu" class="nav nav-list collapse in">                        
						<li><a href="<?php echo base_url()?>web/dosen"><i class="icon-user"></i>Dosen</a></li>   
						<li><a href="<?php echo base_url()?>web/matakuliah"><i class="icon-book"></i>Mata Kuliah</a></li>
						<li><a href="<?php echo base_url();?>web/pengampu"><i class="icon-th-list"></i>Pengampu</a></li>
						<li><a href="<?php echo base_url()?>web/ruang"><i class="icon-home"></i>Ruang</a></li>
						<li><a href="<?php echo base_url()?>web/jam"><i class="icon-time"></i>Jam</a></li>
						<li><a href="<?php echo base_url()?>web/hari"><i class="icon-calendar"></i>Hari</a></li>
						<li><a href="<?php echo base_url()?>web/waktu_tidak_bersedia"><i class="icon-ban-circle"></i>Waktu Tidak Bersedia</a></li>
                     </ul>

					 <a class="nav-header" ><i class="icon-book"></i>Proses Data </a>
                     <ul id="content-menu" class="nav nav-list collapse in">                        
						<li><a href="<?php echo base_url();?>web/penjadwalan"><i class="icon-th-list"></i>Penjadwalan</a></li>
					 </ul>	
                  </div>
                  

                 <?php 
                    $page_name .= ".php";
                    include $page_name;
                  ?>

      
				  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/jquery.slugit.js"></script>  
				  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/datepicker/js/bootstrap-datepicker.js"></script>
				  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.js"></script>
				  <script type="text/javascript" src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap-filestyle.min.js"> </script>
	  
                  <script type="text/javascript">
                     $("[rel=tooltip]").tooltip();
                     $(function() {
                         $('.demo-cancel-click').click(function(){return false;});
                     });
                  </script>
   </body>
</html>