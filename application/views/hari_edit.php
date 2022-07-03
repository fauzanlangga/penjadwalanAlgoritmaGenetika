<?php foreach($rs_hari->result() as $hari) {} ?>
<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/hari">Data Hari</a> <span class="divider">/</span></li>
      <li class="active">Edit Data</li>
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
            <label>Nama Hari</label>
            <input id="nama" type="text" value="<?php echo $hari->nama;?>" name="nama" class="input-xsmall" />
            
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url() .'web/hari'; ?>"><button type="button" class="btn">Cancel</button></a>
            </div>
        </form>

        <!-- <footer>
          <p class="pull-right">Redesign by <a href="http://www.mycoding.net">MyCoding</a></p>
          <p>&copy;2012 by Portnine - Redeveloped by MyCoding 2020</p>
        </footer> -->
      </div>
   </div>
</div>      