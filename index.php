<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery, Bootstrap, Datatables -->
    <script src="js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <meta charset=utf-8 />
    <title>Reservasi Tiket</title>
</head>
<body>
<div class="card" style="width: 800px; margin: 0 auto;margin-top: 50px">
  <div class="card-header">
    <h4 style="text-align: center;">Buku Reservasi Tiket</h4>
  </div>
  <div class="card-body">
    <div class="container">

      <!-- Button trigger Modal Tambah -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
        Tambah Pesanan Tiket
      </button><hr>

      <!-- Table DataTable -->
      <table id="example" class="display nowrap" width="100%">
        <thead>
          <tr>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $csv = "databuku/data.csv";
            $fh = fopen($csv,'r');
            while (list($nama1,$kategori1,$jml1,$tgl1) = fgetcsv($fh,1024,',')) {
          ?>
            <tr>
              <td><?php echo $nama1;?></td>
              <td><?php echo $kategori1;?></td>
              <td align='center'><?php echo $jml1;?></td>
              <td align='center'><?php echo $tgl1;?></td>
            </tr>
          <?php
            }
          ?>
        </tbody>
      </table><hr

      <!--Button trigger Modal Reset-->
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
        Reset Data
      </button>        

      <!-- Modal Tambah Data-->
      <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pemesanan Tiket Saloka</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="tambahData.php" class="needs-validation" novalidate>
                <table align="center" id="table-form">
                  <tr>
                    <td width="150"><label for="nama">Nama</label></td>
                    <td><input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama..." required>
                      <div class="invalid-feedback">
                        Masukkan Nama terlebih dahulu!
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="150"><label for="kategori">Kategori</label></td>
                    <td>
                      <select name="kategori" id="kategori" class="form-control" required>
                        <option value="Dewasa">Dewasa</option>
                        <option value="Anak-Anak">Anak-Anak</option>
                      </select>
                      <div class="invalid-feedback">
                        Masukkan Kategori terlebih dahulu!
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="150"><label for="jumlah">Jumlah</label></td>
                    <td><input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah orang..." required>
                      <div class="invalid-feedback">
                        Masukkan Jumlah dengan benar!
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="150"><label for="jumlah">Tanggal Datang</label></td>
                    <td><input type="date" class="form-control" id="tanggal" name="tanggal" required>
                      <div class="invalid-feedback">
                        Masukkan Tanggal dengan benar!
                      </div>
                    </td>
                  </tr>
                </table><br>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-primary"> Tambah Pesanan!</button>
            </div>
              </form>
                <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                    });
                }, false);
                })();
                </script>
          </div>
        </div>
      </div>

      <!-- Modal Reset Data-->
      <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Reset Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method='post' action='hapusData.php' class="needs-validation" novalidate>
                <p>
                  <h6 style="text-align: center;">Apakah anda yakin ingin<br><b>Mereset semua data yang ada?</b></h6>
                </p>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-danger"> Reset Semua Data!</button>
            </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="footer">
  <b>Creator : Fakhri Rasyid Saputro</b>
</div>

<script type="text/javascript">
  $(document).ready( function () {
    var table = $('#example').DataTable();
  });
</script>

</body>
</html>