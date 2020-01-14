<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Info futsal <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('Nama') ?></label>
            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Harga <?php echo form_error('Harga') ?></label>
            <input type="text" class="form-control" name="Harga" id="Harga" placeholder="Harga" value="<?php echo $Harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Lapangan <?php echo form_error('Lapangan') ?></label>
            <input type="text" class="form-control" name="Lapangan" id="Lapangan" placeholder="Lapangan" value="<?php echo $Lapangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp <?php echo form_error('No_hp') ?></label>
            <input type="text" class="form-control" name="No_hp" id="No_hp" placeholder="No Hp" value="<?php echo $No_hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('Foto') ?></label>
            <input type="text" class="form-control" name="Foto" id="Foto" placeholder="Foto" value="<?php echo $Foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G000 <?php echo form_error('g000') ?></label>
            <input type="text" class="form-control" name="g000" id="g000" placeholder="G000" value="<?php echo $g000; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G001 <?php echo form_error('g001') ?></label>
            <input type="text" class="form-control" name="g001" id="g001" placeholder="G001" value="<?php echo $g001; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G010 <?php echo form_error('g010') ?></label>
            <input type="text" class="form-control" name="g010" id="g010" placeholder="G010" value="<?php echo $g010; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G011 <?php echo form_error('g011') ?></label>
            <input type="text" class="form-control" name="g011" id="g011" placeholder="G011" value="<?php echo $g011; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G020 <?php echo form_error('g020') ?></label>
            <input type="text" class="form-control" name="g020" id="g020" placeholder="G020" value="<?php echo $g020; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G021 <?php echo form_error('g021') ?></label>
            <input type="text" class="form-control" name="g021" id="g021" placeholder="G021" value="<?php echo $g021; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G030 <?php echo form_error('g030') ?></label>
            <input type="text" class="form-control" name="g030" id="g030" placeholder="G030" value="<?php echo $g030; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G031 <?php echo form_error('g031') ?></label>
            <input type="text" class="form-control" name="g031" id="g031" placeholder="G031" value="<?php echo $g031; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G040 <?php echo form_error('g040') ?></label>
            <input type="text" class="form-control" name="g040" id="g040" placeholder="G040" value="<?php echo $g040; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">G041 <?php echo form_error('g041') ?></label>
            <input type="text" class="form-control" name="g041" id="g041" placeholder="G041" value="<?php echo $g041; ?>" />
        </div>
	    <input type="hidden" name="Futsal_id" value="<?php echo $Futsal_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('index.php/info_futsal') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>