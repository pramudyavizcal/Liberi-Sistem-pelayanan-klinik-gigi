
<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php');
if (isset($_GET['id'])) {
  $sql = "UPDATE appointment SET delete_status='1' WHERE departmentid='$_GET[id]'";
  $qsql = mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn) == 1) {
?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Success
        </h3>
        <p>Appoinrment record deleted successfully</p>
        <p>
          <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
          <?php echo "<script>setTimeout(\"location.href = 'view-appointments.php';\",1500);</script>"; ?>
        </p>
      </div>
    </div>
  <?php
    //echo "<script>alert('Department record deleted successfully..');</script>";
    //echo "<script>window.location='view-appointment.php';</script>";
  }
}


if (isset($_GET['approveid'])) {
  $sql = "UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
  $qsql = mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn) == 1) {
  ?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Success
        </h3>
        <p>Appointment record Approved successfully.</p>
        <p>
          <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
          <?php echo "<script>setTimeout(\"location.href = 'view-appointments.php';\",1500);</script>"; ?>
        </p>
      </div>
    </div>
<?php
    //echo "<script>alert('Appointment record Approved successfully..');</script>";
    //echo "<script>window.location='view-appointment.php';</script>";
  }
}
?>

<div class="pcoded-content">
  <div class="pcoded-inner-content">

    <div class="main-body">
      <div class="page-wrapper">

        <div class="page-header">
          <div class="row align-items-end">
            <div class="col-lg-8">
              <div class="page-header-title">
                <div class="d-inline">
                  <h4 style="font-family: 'Unbounded', cursive;">Riwayat Kunjungan Pasien</h4>

                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php"> <i class="feather icon-home"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a style="font-family: 'Unbounded', cursive;">Riwayat Kunjungan Pasien</a>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="page-body">

          <div class="card">
            <div class="card-header">
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group row">

                  <div class="col-md-3"><input placeholder="ID Pasien" type="number" class="form-control" name="nNIK" id="nNIK" <?php if (@$_POST['nNIK']) { ?> value='<?php echo $_POST['nNIK'] ?>' <?php } else {
                                                                                                                                                                                                  echo "placeholder='ID Pasien ..'";
                                                                                                                                                                                                } ?>>
                  </div>
                  <div class="col-md-1">
                    <input type="submit" class="btn btn-info" value="Cari">
                  </div>
                </div>
              </form>
              <!-- <h5>DOM/Jquery</h5>
<span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span> -->
            </div>

            <?php
            if ((@$_POST['nNIK'])) {
              $nNIK = $_POST['nNIK'];

              $sqlpasien = "SELECT patientid, patientname,city, gender, dob, address, TIMESTAMPDIFF( YEAR, dob, NOW() ) AS tahun
              , TIMESTAMPDIFF( MONTH, dob, NOW() ) % 12 AS bulan
              , FLOOR( TIMESTAMPDIFF( DAY, dob, NOW() ) % 30.4375 ) AS hari
          FROM 
              patient WHERE patientid = '$nNIK'; 
              ";
              $qsqlpasien = mysqli_query($conn, $sqlpasien);
              $rspx = mysqli_fetch_array($qsqlpasien);
            ?>

              <div class="card-block">
                <div class="table-responsive dt-responsive">
                  <div class="form-group row">
                    <div class="col-md-2">ID Pasien</div>
                    <div class="col-md-5">: <?php echo $rspx['patientid']; ?></div>
                    <div class="col-md-2">Jenis Kelamin</div>
                    <div class="col-md-3">: <?php echo $rspx['gender']; ?></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">Nama Pasien</div>
                    <div class="col-md-5">: <?php echo $rspx['patientname']; ?></div>
                    <div class="col-md-2">Tempat,Tgl Lahir</div>
                    <div class="col-md-3">: <?php echo $rspx['city'] . ", " . date("d-M-Y", strtotime($rspx['dob'])); ?></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">Alamat</div>
                    <div class="col-md-5">: <?php echo $rspx['address']; ?></div>
                    <div class="col-md-2">Umur</div>
                    <div class="col-md-3">: <?php echo $rspx['tahun']." Tahun ".$rspx['bulan']." Bulan ".$rspx['hari']." Hari "; ?></div>
                  </div>
                  <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>Tanggal Kunjungan</th>
                        <th>Dokter</th>
                        <th>Diagnosa</th>
                        <th>Status</th>
                        <th>
                          <div align="center">Tools</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM appointment a
                    JOIN patient b ON b.patientid = a.patientid
                    WHERE b.patientid = '$nNIK' order by a.appointmentid asc";
                      $qsql = mysqli_query($conn, $sql);
                      while ($rs = mysqli_fetch_array($qsql)) {
                        $sqlpat = "SELECT * FROM patient WHERE patientid = '$nNIK'";
                        $qsqlpat = mysqli_query($conn, $sqlpat);
                        $rspat = mysqli_fetch_array($qsqlpat);

                        $sqldoc = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]' and delete_status='0'";
                        $qsqldoc = mysqli_query($conn, $sqldoc);
                        $rsdoc = mysqli_fetch_array($qsqldoc);


                        if (mysqli_num_rows($qsqlpat)) {
                          echo "<tr>   
                      <td>&nbsp;" . date("d-M-Y", strtotime($rs['appointmentdate'])) . " &nbsp; " . date("H:i A", strtotime($rs['appointmenttime'])) . "</td> 
                      <td>&nbsp;$rsdoc[doctorname]</td>
                      <td>&nbsp;$rs[app_reason]</td>
                      <td>&nbsp;$rs[status]</td>
                      <td><div align='center'>";
                          echo "<a href='patientreport.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]'><b><font color='blue'>Hasil Diagnosa</font></b></a>";

                          echo "</center></td></tr>";
                        } else {
                          echo "<tr>   
                      <td>&nbsp;" . isset($rspat['admissiondate']) ? null : date("d-M-Y", strtotime($rs['appointmentdate'])) . " &nbsp; " . date("H:i A", strtotime($rs['appointmenttime'])) . "</td> 
                      <td>&nbsp;$rsdoc[doctorname]</td>
                      <td>&nbsp;$rs[app_reason]</td>
                      <td>&nbsp;$rsapp[status]</td>
                      <td><div align='center'>";

                          echo "<a href='patientreport.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]'>View Report</a>";

                          echo "</center></td></tr>";
                        }
                      }


                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Tanggal Kunjungan</th>
                        <th>Dokter</th>
                        <th>Diagnosa</th>
                        <th>Status</th>
                        <th>
                          <div align="center">Tools</div>
                        </th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            <?php } ?>
          </div>


        </div>

      </div>
    </div>

    <div id="#">
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php include('footer.php'); ?>
<?php if (!empty($_SESSION['success'])) {  ?>
  <div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
      <h3 class="popup__content__title">
        Success
        </h1>
        <p><?php echo $_SESSION['success']; ?></p>
        <p>
          <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
          <!-- <button class="button button--success" data-for="js_success-popup">Close</button> -->
        </p>
    </div>
  </div>
<?php unset($_SESSION["success"]);
} ?>
<?php if (!empty($_SESSION['error'])) {  ?>
  <div class="popup popup--icon -error js_error-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
      <h3 class="popup__content__title">
        Error
        </h1>
        <p><?php echo $_SESSION['error']; ?></p>
        <p>
          <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
          <!--  <button class="button button--error" data-for="js_error-popup">Close</button> -->
        </p>
    </div>
  </div>
<?php unset($_SESSION["error"]);
} ?>
<script>
  var addButtonTrigger = function addButtonTrigger(el) {
    el.addEventListener('click', function() {
      var popupEl = document.querySelector('.' + el.dataset.for);
      popupEl.classList.toggle('popup--visible');
    });
  };

  Array.from(document.querySelectorAll('button[data-for]')).
  forEach(addButtonTrigger);
</script>