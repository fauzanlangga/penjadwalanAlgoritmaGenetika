<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title;?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Beranda</a> <span class="divider">/</span></li>
      <li><a href="<?php echo base_url();?>web/pengampu">Data Pengampu</a> <span class="divider">/</span></li>
      <li class="active">Tambah Data</li>
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
          
            <label>Semester</label>
            <select id = "semester_tipe" name="semester_tipe" class="input-xlarge" onchange="get_matakuliah();">            
              <option value="1" <?php echo isset($semester_tipe) ? ($semester_tipe === '1' ? 'selected':'') : '' ;?> /> GANJIL
              <option value="0" <?php echo isset($semester_tipe) ? ($semester_tipe === '0' ? 'selected':'') : '' ;?> /> GENAP
            </select>
          
            <label>Mata Kuliah</label>
            <select name="kode_mk" class="input-xlarge" id="option_matakuliah">
              <?php foreach($rs_mk->result() as $mk) { ?>
                <option value="<?php echo $mk->kode;?>" <?php echo set_select('kode_mk',$mk->kode);?> /> <?php echo $mk->nama;?>
              <?php } ?>            
            </select>
            
            <label>Dosen</label>
            <select name="kode_dosen" class="input-xlarge">
              <?php foreach($rs_dosen->result() as $dosen) { ?>
                <option value="<?php echo $dosen->kode;?>" <?php echo set_select('kode_dosen',$dosen->kode);?> /> <?php echo $dosen->nama;?>
              <?php } ?>
            </select>
            
            <label>Kelas</label>
            <input id="kelas" type="text" value="<?php echo set_value('kelas');?>" name="kelas" class="input-xsmall" />
            
            
            <label>Tahun Akademik</label>
            <select id="tahun_akademik" name="tahun_akademik" class="input-xlarge">
              <option value="2020-2021" <?php echo set_select('tahun_akademik','2020-2021');?> /> 2020-2021
              <option value="2021-2022" <?php echo set_select('tahun_akademik','2021-2022');?> /> 2021-2022
              <option value="2022-2023" <?php echo set_select('tahun_akademik','2022-2023');?> /> 2022-2023
              <option value="2023-2024" <?php echo set_select('tahun_akademik','2023-2024');?> /> 2023-2024
              <option value="2024-2025" <?php echo set_select('tahun_akademik','2024-2025');?> /> 2024-2025
              <option value="2025-2026" <?php echo set_select('tahun_akademik','2025-2026');?> /> 2025-2026
              <option value="2026-2027" <?php echo set_select('tahun_akademik','2026-2027');?> /> 2026-2027
              <option value="2027-2028" <?php echo set_select('tahun_akademik','2027-2028');?> /> 2027-2028
              <option value="2028-2029" <?php echo set_select('tahun_akademik','2028-2029');?> /> 2028-2029
              <option value="2029-2030" <?php echo set_select('tahun_akademik','2029-2030');?> /> 2029-2030
            </select>
			
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url() .'web/pengampu'; ?>"><button type="button" class="btn">Cancel</button></a>
            </div>
        </form>

        <!-- <footer>
          <p class="pull-right">Redesign by <a href="http://www.mycoding.net">MyCoding</a></p>
          <p>&copy;2012 by Portnine - Redeveloped by MyCoding 2020</p>
        </footer> -->

      </div>
   </div>
</div>      