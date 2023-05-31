<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php');
if (isset($_GET['delid'])) {
  $sql = "UPDATE appointment SET delete_status='1' WHERE appointmentid='$_GET[delid]'";
  $qsql = mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn) == 1) {
?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Success
        </h3>
        <p>Berhasil Dihapus</p>
        <p>
          <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->

        </p>
      </div>
    </div>
  <?php
    //echo "<script>alert('appointment record deleted successfully..');</script>";
    //echo "<script>window.location='view-pending-appointment.php';</script>";
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
                  <h4 style="font-family: 'Unbounded', cursive;">Antrian Pasien Hari Ini</h4>

                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a style="font-family: 'Unbounded', cursive;">Antrian Pasien Hari Ini</a>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="page-body">

          <div class="card">
            <div class="card-header">
              <div class="col-sm-10">
              </div>
              <!-- <h5>DOM/Jquery</h5>
<span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span> -->
            </div>
            <div class="card-block">
              <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th>Nama Pasien</th>
                      <th>Waktu Check Up</th>
                      <th>DPJP</th>
                      <th>Diagnosa</th>
                      <th width="15%">Tools</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM appointment WHERE STATUS is not null AND appointmentdate = DATE(NOW())";
                    if (isset($_SESSION['patientid'])) {
                      $sql  = $sql . " AND patientid='$_SESSION[patientid]'";
                    }
                    $qsql = mysqli_query($conn, $sql);
                    while ($rs = mysqli_fetch_array($qsql)) {
                      $sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
                      $qsqlpat = mysqli_query($conn, $sqlpat);
                      $rspat = mysqli_fetch_array($qsqlpat);

                      $sqldoc = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
                      $qsqldoc = mysqli_query($conn, $sqldoc);
                      $rsdoc = mysqli_fetch_array($qsqldoc);
                      echo "<tr>
                      <td>&nbsp;$rspat[patientname]<br>&nbsp;<strong>ID Pasien :</strong> $rspat[patientid]</td>     
                      <td>&nbsp;" . date("d-M-Y", strtotime($rs['appointmentdate'])) . " &nbsp; " . date("H:i A", strtotime($rs['appointmenttime'])) . "</td> 
                      <td>&nbsp;$rsdoc[doctorname]</td>
                      <td>&nbsp;$rs[app_reason]</td>
                      <td align='center'>";
                        if($rs['status'] == 'Active'){

                          echo "<a href='inputTindakan.php?appointmentid=$rs[appointmentid]&patientid=$rs[patientid]' class='btn btn-xs btn-primary'>Proses</a>";
                        }else{
                          echo "<a href='patientreport.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]' class='btn btn-xs btn-primary'>Lihat hasil</a>";
                          echo "&nbsp;&nbsp;<a href='pasien_tindakan.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]' title='Tambah Tindakan'><i style='font-size: 2em;' class='fas fa-book-medical'></i></a>";
                          echo "&nbsp;&nbsp;<a href='pasien_obat.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]' title='Tambah Obat'><i style='font-size: 2em;' class='fas fa-pills'></i></a>";
                          echo "&nbsp;&nbsp;<a href='appointment.php?editid=$rs[appointmentid]' title='Diagnosa'><i style='font-size: 2em;' class='fas fa-edit'></i></a>";
                        }
                      
                      echo "</td></tr>";
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Nama Pasien</th>
                      <th>Waktu Check Up</th>
                      <th>DPJP</th>
                      <th>Diagnosa</th>
                      <th width="15%">Tools</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
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