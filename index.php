<?php
    include_once("mysqlbase.php");
    $db = new MySQLBase("localhost", "searchmahasiswa", "root", null);
    $search = null;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $search = $_POST['search'];
        if (strlen($search) > 7) {
            $result = $db->getLike("mahasiswa", 'nim', $search);
            $totalMahasiswa = $result->num_rows;
        }else{
            $result = [];
            $totalMahasiswa = 0;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Search Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    background:#dcdcdc;
    margin-top:20px;}

.widget-26 {
  color: #3c4142;
  font-weight: 400;
}

.widget-26 tr:first-child td {
  border: 0;
}

.widget-26 .widget-26-job-emp-img img {
  width: 35px;
  height: 35px;
  border-radius: 50%;
}

.widget-26 .widget-26-job-title {
  min-width: 200px;
}

.widget-26 .widget-26-job-title a {
  font-weight: 400;
  font-size: 0.875rem;
  color: #3c4142;
  line-height: 1.5;
}

.widget-26 .widget-26-job-title a:hover {
  color: #68CBD7;
  text-decoration: none;
}

.widget-26 .widget-26-job-title .employer-name {
  margin: 0;
  line-height: 1.5;
  font-weight: 400;
  color: #3c4142;
  font-size: 0.8125rem;
  color: #3c4142;
}

.widget-26 .widget-26-job-title .employer-name:hover {
  color: #68CBD7;
  text-decoration: none;
}

.widget-26 .widget-26-job-title .time {
  font-size: 12px;
  font-weight: 400;
}

.widget-26 .widget-26-job-info {
  min-width: 100px;
  font-weight: 400;
}

.widget-26 .widget-26-job-info p {
  line-height: 1.5;
  color: #3c4142;
  font-size: 0.8125rem;
}

.widget-26 .widget-26-job-info .location {
  color: #3c4142;
}

.widget-26 .widget-26-job-salary {
  min-width: 70px;
  font-weight: 400;
  color: #3c4142;
  font-size: 0.8125rem;
}

.widget-26 .widget-26-job-category {
  padding: .5rem;
  display: inline-flex;
  white-space: nowrap;
  border-radius: 15px;
}

.widget-26 .widget-26-job-category .indicator {
  width: 13px;
  height: 13px;
  margin-right: .5rem;
  float: left;
  border-radius: 50%;
}

.widget-26 .widget-26-job-category span {
  font-size: 0.8125rem;
  color: #3c4142;
  font-weight: 600;
}

.widget-26 .widget-26-job-starred svg {
  width: 20px;
  height: 20px;
  color: #fd8b2c;
}

.widget-26 .widget-26-job-starred svg.starred {
  fill: #fd8b2c;
}
.bg-soft-base {
  background-color: #e1f5f7;
}
.bg-soft-warning {
    background-color: #fff4e1;
}
.bg-soft-success {
    background-color: #d1f6f2;
}
.bg-soft-danger {
    background-color: #fedce0;
}
.bg-soft-info {
    background-color: #d7efff;
}


.search-form {
  width: 80%;
  margin: 0 auto;
  margin-top: 1rem;
}

.search-form input {
  height: 100%;
  background: transparent;
  border: 0;
  display: block;
  width: 100%;
  padding: 1rem;
  height: 100%;
  font-size: 1rem;
}

.search-form select {
  background: transparent;
  border: 0;
  padding: 1rem;
  height: 100%;
  font-size: 1rem;
}

.search-form select:focus {
  border: 0;
}

.search-form button {
  height: 100%;
  width: 100%;
  font-size: 1rem;
}

.search-form button svg {
  width: 24px;
  height: 24px;
}

.search-body {
  margin-bottom: 1.5rem;
}

.search-body .search-filters .filter-list {
  margin-bottom: 1.3rem;
}

.search-body .search-filters .filter-list .title {
  color: #3c4142;
  margin-bottom: 1rem;
}

.search-body .search-filters .filter-list .filter-text {
  color: #727686;
}

.search-body .search-result .result-header {
  margin-bottom: 2rem;
}

.search-body .search-result .result-header .records {
  color: #3c4142;
}

.search-body .search-result .result-header .result-actions {
  text-align: right;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.search-body .search-result .result-header .result-actions .result-sorting {
  display: flex;
  align-items: center;
}

.search-body .search-result .result-header .result-actions .result-sorting span {
  flex-shrink: 0;
  font-size: 0.8125rem;
}

.search-body .search-result .result-header .result-actions .result-sorting select {
  color: #68CBD7;
}

.search-body .search-result .result-header .result-actions .result-sorting select option {
  color: #3c4142;
}

@media (min-width: 768px) and (max-width: 991.98px) {
  .search-body .search-filters {
    display: flex;
  }
  .search-body .search-filters .filter-list {
    margin-right: 1rem;
  }
}

.card-margin {
    margin-bottom: 1.875rem;
}

@media (min-width: 992px){
.col-lg-2 {
    flex: 0 0 16.66667%;
    max-width: 16.66667%;
}
}

.card-margin {
    margin-bottom: 1.875rem;
}
.card {
    border: 0;
    box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #ffffff;
    background-clip: border-box;
    border: 1px solid #e6e4e9;
    border-radius: 8px;
}















    </style>
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            <h2>Search Mahasiswa</h2>
        </div>
    </div>
    <div class="col-lg-12 card-margin">
        <div class="card search-form">
            <div class="card-body p-0">
                <form id="search-form" method="POST" action="">
                    <div class="row">
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <select name="type" class="form-control" id="exampleFormControlSelect1">
                                        <option value="mahasiswa">Mahasiswa</option>
                                    </select>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                    <input value="<?= $search ?>" type="text" placeholder="Tuliskan NIM, cth: 123456789" class="form-control" id="search" name="search" min="5" required>
                                </div>
                                <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                    <button type="submit" class="btn btn-base">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if ($_SERVER['REQUEST_METHOD'] == "POST") { ?>
<div class="row">
        <div class="col-12">
            <div class="card card-margin">
                <div class="card-body">
                    <div class="row search-body">
                        <div class="col-lg-12">
                            <div class="search-result">
                                <div class="result-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="records"><b><?= $totalMahasiswa ?></b> result</div>
                                        </div>
                                        <div class="col-lg-6">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="result-body">
                                    <div class="table-responsive">
                                        <table class="table widget-26">
                                            <tbody>
                                                <?php 
                                                    foreach ($result as $r) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="widget-26-job-emp-img">
                                                            <img src="image/<?= $r['photo'] ?>" alt="Company" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-title">
                                                            <a href="#"><?= $r['fullname'] ?></a>
                                                            <p class="m-0"><small><?= $r['nim'] ?></small></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-info">
                                                            <p class="type m-0"><?= $r['fakultas'] ?></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-salary"><?= $r['program_studi'] ?></div>
                                                    </td>
                                                    <td>
                                                        <?php if ($r['status']) { ?>
                                                        <div class="widget-26-job-category bg-soft-base">
                                                            <span style="margin-left: 10px;margin-right: 10px;"> Aktif </span>
                                                        </div>
                                                        <?php }else{ ?>
                                                        <div class="widget-26-job-category bg-soft-danger">
                                                            <span style="margin-left: 6px;margin-right: 6px;">Tidak Aktif</span>
                                                        </div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-starred">
                                                            <a href="#" data-toggle="modal" data-target="#modal<?= $r['id'] ?>">
                                                                Lihat Detail
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal -->
    <?php foreach ($result as $r) { ?>
    <div class="modal fade" id="modal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabel"><?= $r['fullname'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="d-flex justify-content-center mb-3">
                <img src="image/<?= $r['photo'] ?>" alt="Company" width="50%"/>
            </div>
            <table>
                <tr>
                    <td>Nama</td>
                    <td><?= $r['fullname'] ?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><?= $r['nim'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $r['email'] ?></td>
                </tr>
                <tr>
                    <td>Angkatan</td>
                    <td><?= $r['angkatan'] ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td><?= $r['fakultas'] ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td><?= $r['program_studi'] ?></td>
                </tr>
                <tr>
                    <td>Semester Terdaftar</td>
                    <td><?= $r['semester_terdaftar'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <?php if ($r['status']) { ?>
                    <td>Aktif</td>
                    <?php }else{ ?>
                    <td>Tidak Aktif</td>
                    <?php } ?>
                </tr>
            </table>
        </div>
        </div>
    </div>
    </div>
    <?php } ?>
<?php } ?>


<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>