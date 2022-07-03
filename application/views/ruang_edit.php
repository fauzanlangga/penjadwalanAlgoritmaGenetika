<?php foreach($rs_ruang->result() as $ruang) {} ?>
<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/ruang">Data Ruang</a> <span class="divider">/</span></li>
      <li class="active">Ubah Data</li>
   </ul>
   
   <div class="container-fluid">
      <div class="row-fluid">
        <?php if(isset($msg)) { ?>                        
              <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">�</button>                
                <?php echo $msg;?>
              </div>  
        <?php } ?>    
                  


        <form id="tab" method="POST" >
            <label>Nama</label>
            <input id="nama" type="text" value="<?php echo $ruang->nama;?>" name="nama" class="input-xlarge" />
            
            <label>Kapasitas</label>
            <input id="kapasitas" type="text" value="<?php echo $ruang->kapasitas;?>" name="kapasitas" class="input-xsmall" />
            
            <label>Category</label>
            <select name="jenis" class="input-xlarge">            
              <option value="TEORI" <?php echo $ruang->jenis === 'TEORI' ? 'selected':'';?> /> TEORI
              <option value="LABORATORIUM" <?php echo $ruang->jenis === 'LABORATORIUM' ? 'selected':'';?> /> LABORATORIUM            
            </select>
			
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url() .'web/ruang'; ?>"><button type="button" class="btn">Cancel</button></a>
            </div>
        </form>

        <!-- <footer>
          <p class="pull-right">Redesign by <a href="http://www.mycoding.net">MyCoding</a></p>
          <p>&copy;2012 by Portnine - Redeveloped by MyCoding 2020</p>
        </footer> -->

      </div>
   </div>
</div>      