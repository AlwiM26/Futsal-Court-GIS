<?php $this->load->view('templates/header');?>
<style>
	img{
		width: 65%;
	}
</style>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Info futsal Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $Harga; ?></td></tr>
	    <tr><td>Lapangan</td><td><?php echo $Lapangan; ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo $No_hp; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $Foto; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>G000</td><td><?php echo $g000; ?></td></tr>
	    <tr><td>G001</td><td><?php echo $g001; ?></td></tr>
	    <tr><td>G010</td><td><?php echo $g010; ?></td></tr>
	    <tr><td>G011</td><td><?php echo $g011; ?></td></tr>
	    <tr><td>G020</td><td><?php echo $g020; ?></td></tr>
	    <tr><td>G021</td><td><?php echo $g021; ?></td></tr>
	    <tr><td>G030</td><td><?php echo $g030; ?></td></tr>
	    <tr><td>G031</td><td><?php echo $g031; ?></td></tr>
	    <tr><td>G040</td><td><?php echo $g040; ?></td></tr>
	    <tr><td>G041</td><td><?php echo $g041; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('index.php/info_futsal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>