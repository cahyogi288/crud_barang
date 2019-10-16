<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<div class="container" style="margin-top: 25px;">
		<div class="widget-header">
			<i class="icon-user"></i>
			<h3>Tabel Penjualan</h3>
		</div> 
		<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  Tambah Barang
		</button> -->
		<div class="row" style="margin-top: 25px;">
			<div class="col-md-12">
				<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Kode Barang</th>
			      <th scope="col">Nama Barang</th>
			      <th scope="col">Harga Jual</th>
			      <th scope="col">Harga Beli</th>
			      <th scope="col">Satuan</th>
			      <th scope="col">Kategori</th>
			      <th scope="col">Stok</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no=1; foreach ($isian as $key){ ?>
				    <tr>
				    <td><?php echo $no++ ?></td>
				      <td scope="row"><?php echo $key->kode_barang ?></td>
				      <td><?php echo $key->nama_barang ?></td>
				      <td><?php echo $key->harga_jual ?></td>
				      <td><?php echo $key->harga_beli ?></td>
				      <td><?php echo $key->satuan ?></td>
				      <td><?php echo $key->kategori ?></td>
				      <td><?php echo $key->stok ?></td>
				      <?php if($key->stok != 0){ ?>
				      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $key->kode_barang?>">Beli</button>	<?php } ?>


				      </td>
				    </tr>
				  <?php } ?>  
			    
		</div>
		<?php foreach ($isian as $key1 ) {
				  	
				   ?>
				   <div class="modal fade " id="<?php echo $key1->kode_barang?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Pembelian Barang</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="<?php echo base_url('index.php/C_crud/beli_barang'); ?>" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Kode Barang</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" name="newkode" aria-describedby="emailHelp" value="<?php echo $key1->kode_barang?>" placeholder="Kode Barang" readonly required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Nama Barang</label>
				    <input type="text" class="form-control" id="exampleInputPassword1" name="newnama" placeholder="Nama Barang" value="<?php echo $key1->nama_barang?>" readonly required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Harga Jual</label>
				    <input type="number" class="form-control" id="harga_jual" name="newhargajual" value="<?php echo $key1->harga_jual?>" placeholder="Harga Jual" readonly required>
				  </div>
				  <div class="form-group">
				    <!-- <label for="exampleInputPassword1">Stok</label> -->
				    <input type="hidden" class="form-control" id="harga_jual" name="stok" value="<?php echo $key1->stok?>" placeholder="Harga Jual" readonly required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Nama Konsumen</label>
				    <input type="text" class="form-control" id="exampleInputPassword1" name="namakonsumen" value="" placeholder="Nama Konsumen" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Jumlah</label>
				    <input type="text" class="form-control" onkeyup="hitung()" id="jum" name="jumlah" value="" placeholder="Jumlah" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Tgl Faktur</label>
				    <input type="date" class="form-control" id="exampleInputPassword1" name="tglfaktur" value="" placeholder="Stok" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Total Harga</label>
				    <input type="number" class="form-control" id="tot" name="tot" value="" placeholder="Stok" readonly required>
				  </div>
				<!--   <button type="submit" class="btn btn-primary">Submit</button> -->
				<!-- </form> -->
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		    </div>
		</form>
		      </div>
		    </div>
		  </div>
		</div>
	<?php }?>
		
	</div>
  </tbody>
</table>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<script type="text/javascript">
	function hitung() {
		document.getElementById('tot').value =  document.getElementById('harga_jual').value * document.getElementById('jum').value;
	}
</script>
</html>