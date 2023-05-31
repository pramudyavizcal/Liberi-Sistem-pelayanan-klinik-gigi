
<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php');
if (isset($_GET['id'])) {
  $sql = "UPDATE patient SET delete_status='1' WHERE patientid='$_GET[id]'";
  $qsql = mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn) == 1) {
?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Success
        </h3>
        <p>Patient record deleted successfully.</p>
        <p>
          <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
          <?php echo "<script>setTimeout(\"location.href = 'view-patient.php';\",1500);</script>"; ?>
        </p>
      </div>
    </div>
<?php
    //echo "<script>alert('Dcctor record deleted successfully..');</script>";
    //echo "<script>window.location='view-patient.php';</script>";
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
                  <h4 style="font-family: 'Unbounded', cursive;">Pasien</h4>

                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a style="font-family: 'Unbounded', cursive;">Pasien</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="page-body">

          <div class="card">
            <div class="card-header">
              <!-- <h5>DOM/Jquery</h5>
<span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span> -->
            </div>
            <div class="card-block">
              <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th>Nama Pasien</th>
                      <th>Kunjungan</th>
                      <th>Alamat</th>
                      <th>Profil Pasien</th>
                      <th>Tools</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM patient where delete_status='0'";
                    $qsql = mysqli_query($conn, $sql);
                    while ($rs = mysqli_fetch_array($qsql)) {

                      echo "<tr>
                      <td>$rs[patientname]<br>
                      <strong>ID Pasien :</strong> $rs[patientid] </td>
                      <td>
                      <strong>Kunjungan Terakhir :</strong> &nbsp;$rs[admissiondate]<br>
                      <strong>Jam Kunjungan :</strong> &nbsp;$rs[admissiontime]</td>
                      <td>$rs[address]<br>
                      <strong>No Telepon :</strong> $rs[mobileno]</td>
                      <td>
                      <strong>Jenis Kelamin :</strong> &nbsp;$rs[gender]<br>
                      <strong>TTL :</strong> $rs[city],  &nbsp;".date("d-m-Y", strtotime($rs['dob']))."</td>
                      <td align='center'>Status : $rs[status] <br>";
                      if ($rs['status'] == 'Active' ) {
                      echo "<a>Pasien Dalam Perawatan</a>";
                      }else{
                        echo "<a href='patient.php?editid=$rs[patientid]' class='btn btn-primary'>Kunjungan Baru</a>";
                      }
                      echo "</td></tr>";
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Nama Pasien</th>
                      <th>Kunjungan</th>
                      <th>Alamat</th>
                      <th>Profil Pasien</th>
                      <th>Tools</th>
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