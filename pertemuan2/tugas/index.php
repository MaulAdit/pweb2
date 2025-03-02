<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Mahasiswa</title>
</head>
<body>
    <h1>Form Nilai Mahasiswa</h1>
    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form action="output.php" method="post">
     <div class="form-group ">
      <label class="control-label " for="nama">Nama Lengkap</label>
      <input class="form-control" id="nama" name="nama" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="matkul">Mata Kuliah</label>
      <select class="select form-control" id="matkul" name="matkul">
       <option value="Dasar-Dasar Pemograman">Dasar Dasar Pemograman</option>
       <option value="Basis Data">Basis Data</option>
       <option value="Pemograman WEB">Pemograman WEB</option>
      </select>
     </div>
     <div class="form-group ">
      <label class="control-label " for="nilai_uts">Nilai UTS</label>
      <input class="form-control" id="nilai_uts" name="nilai_uts" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="nilai_uas">Nilai UAS</label>
      <input class="form-control" id="nilai_uas" name="nilai_uas" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="nilai_tugas">Nilai Tugas/Praktikum</label>
      <input class="form-control" id="nilai_tugas" name="nilai_tugas" type="text"/>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="simpan" type="submit">
        Simpan
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>

</body>
</html>