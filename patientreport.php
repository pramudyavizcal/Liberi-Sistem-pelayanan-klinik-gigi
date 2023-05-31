<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php');
if (isset($_GET['delidobat'])) {
  $sql = "DELETE from pasien_obat WHERE nKode='$_GET[delidobat]'";
  $qsql = mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn) == 1) {
?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Success
        </h3>
        <p>Berhasil Disimpan</p>
        <p>
          <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
          <?php echo "<script>setTimeout(\"location.href = 'patientreport.php?patientid=$_GET[patientid]&appointmentid=$_GET[appointmentid]';\",3000);</script>"; ?>
        </p>
      </div>
    </div>
  <?php
    //echo "<script>alert('appointment record deleted successfully..');</script>";
    //echo "<script>window.location='view-pending-appointment.php';</script>";
  }
}

if (isset($_GET['delidtindakan'])) {
  $sql = "DELETE from pasien_tindakan WHERE nKode='$_GET[delidtindakan]'";
  $qsql = mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn) == 1) {
?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Success
        </h3>
        <p>Berhasil Disimpan</p>
        <p>
          <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
          <?php echo "<script>setTimeout(\"location.href = 'patientreport.php?patientid=$_GET[patientid]&appointmentid=$_GET[appointmentid]';\",3000);</script>"; ?>
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
                  <h4 style="font-family: 'Unbounded', cursive;">Hasil Rekap Pemeriksaan</h4>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a style="font-family: 'Unbounded', cursive;">Hasil Rekap Pemeriksaan</a>
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
              <div class="row">
                <div class="col-lg-12">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Biodata Pasien</a>
                      <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#appointment" role="tab">Hasil Diagnosa</a>
                      <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#treatment" role="tab">List Tindakan</a>
                      <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#farmasi" role="tab">List Obat</a>
                      <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" target="_blank" href="inputTindakan.php?editid=<?php echo $_GET['appointmentid'] ?>&patientid=<?php echo $_GET['patientid'] ?>&appointmentid=<?php echo $_GET['appointmentid'] ?>" >Hasil Pemeriksaan</a>
                      <div class="slide"></div>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#billing" role="tab">Billing Pembayaran</a>
                      <div class="slide"></div>
                    </li> -->
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content tabs-left-content card-block">
                    <div class="tab-pane active" id="profile" role="tabpanel">
                      <p class="m-0">
                        <?php
                        $sqlpatient = "SELECT * FROM patient where patientid='$_GET[patientid]'";
                        $qsqlpatient = mysqli_query($conn, $sqlpatient);
                        $rspatient = mysqli_fetch_array($qsqlpatient);
                        ?>

                      <div class="table-responsive dt-responsive">
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                          <tbody>
                            <tr>
                              <th>Nama Pasien</th>
                              <td>&nbsp;<?php echo $rspatient['patientname']; ?></td>
                              <th>ID Pasien</th>
                              <td>&nbsp;<?php echo $rspatient['patientid']; ?></td>
                            </tr>
                            <tr>
                              <th>Alamat</th>
                              <td>&nbsp;<?php echo $rspatient['address']; ?></td>
                              <th>Jenis Kelamin</th>
                              <td> <?php echo $rspatient['gender']; ?></td>
                            </tr>
                            <tr>
                              <th>No. Telepon</th>
                              <td>&nbsp;<?php echo $rspatient['mobileno']; ?></td>
                              <th>Tempat, Tanggal Lahir </th>
                              <td>&nbsp;<?php echo $rspatient['city'] . ", " . date("d-M-Y", strtotime($rspatient['dob'])); ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      </p>
                    </div>
                    <div class="tab-pane" id="appointment" role="tabpanel">
                      <p class="m-0">
                        <?php

                        $sqlappointment = "SELECT * FROM appointment where patientid='$_GET[patientid]' and appointmentid = '$_GET[appointmentid]'";
                        $qsqlappointment = mysqli_query($conn, $sqlappointment);
                        $rsappointment = mysqli_fetch_array($qsqlappointment);

                        $sqldoctor = "SELECT * FROM doctor where doctorid='$rsappointment[doctorid]'";
                        $qsqldoctor = mysqli_query($conn, $sqldoctor);
                        $rsdoctor = mysqli_fetch_array($qsqldoctor);
                        ?>
                      <div class="table-responsive dt-responsive">
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                          <tr>
                            <th>Hasil Diagnosa</th>
                            <td>&nbsp;<?php echo $rsappointment['app_reason']; ?></td>
                          </tr>
                          <tr>
                            <th>DPJP</th>
                            <td>&nbsp;<?php echo $rsdoctor['doctorname']; ?></td>
                          </tr>
                          <tr>
                            <th>Waktu Tindakan</th>
                            <td>&nbsp;<?php echo date("d-M-Y", strtotime($rsappointment['appointmentdate'])) . " &nbsp; " . date("H:i A", strtotime($rsappointment['appointmenttime'])) ; ?></td>
                          </tr>
                         
                         
                        </table>
                      </div>
                      </p>
                    </div>
                    <div class="tab-pane" id="treatment" role="tabpanel">
                      <p class="m-0">
                      <div class="table-responsive dt-responsive">
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                          <tr>
                            <th>Nama Tindakan</th>
                            <th>DPJP</th>
                            <th>Catatan</th>
                            <th>Tarif Tindakan</th>
                            <th>Tools</th>
                          </tr>
                          <?php
                          $sql = "SELECT * FROM pasien_tindakan a
                          JOIN treatment b ON b.treatmentid = a.treatmentid
                          WHERE a.patientid='$_GET[patientid]' AND a.appointmentid='$_GET[appointmentid]' order by b.treatmenttype asc";
                          $qsql = mysqli_query($conn, $sql);
                          $totaltindakan = 0;
                          while ($rs = mysqli_fetch_array($qsql)) {

                            $sqldoc = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
                            $qsqldoc = mysqli_query($conn, $sqldoc);
                            $rsdoc = mysqli_fetch_array($qsqldoc);

                            echo "<tr>
                            <td>&nbsp;$rs[treatmenttype]</td>
                            <td>&nbsp;$rsdoc[doctorname]</td>
                            <td>&nbsp;<b><font color = 'red'>$rs[catatan]</font></b>";
                            echo "</td>";
                            echo "<td><b><font color = 'green'>Rp. $rs[treatment_cost]</font></b>";
                            echo "<td><a href='pasien_tindakan.php?editid=$rs[nKode]&patientid=$rs[patientid]&appointmentid=$rs[appointmentid]' class='btn btn-xs btn-primary'>Edit</a>";
                            echo "&nbsp;<a href='patientreport.php?delidtindakan=$rs[nKode]&patientid=$rs[patientid]&appointmentid=$rs[appointmentid]' class='btn btn-xs btn-danger'>Hapus</a></td>";
                            "</td></tr>";
                            $totaltindakan = $totaltindakan +  $rs['treatment_cost'];
                          }
                          ?>
                          <tr>
                              <th>
                                <div align="right"><b>Total &nbsp;<font color="green">Rp. <?php echo $totaltindakan; ?></font></b> </div>
                              </th>
                             
                            </tr>
                        </table>
                      </div>
                      </p>
                    </div>

                    <div class="tab-pane" id="farmasi" role="tabpanel">
                      <p class="m-0">
                      <div class="table-responsive dt-responsive">
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                          <tr>
                            <th>Nama Obat</th>
                            <th>DPJP</th>
                            <th>Signa</th>
                            <th>Tarif Obat</th>
                            <th>Tools</th>
                          </tr>
                          <?php
                          $sql = "SELECT * FROM pasien_obat a
                          JOIN medicine b ON b.medicineid = a.medicineid
                          WHERE a.patientid='$_GET[patientid]' AND a.appointmentid='$_GET[appointmentid]' order by b.medicinename asc";
                          $qsql = mysqli_query($conn, $sql);
                          $totalobat =0;
                          while ($rs = mysqli_fetch_array($qsql)) {

                            $sqldoc = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
                            $qsqldoc = mysqli_query($conn, $sqldoc);
                            $rsdoc = mysqli_fetch_array($qsqldoc);

                            echo "<tr>
                            <td>&nbsp;$rs[medicinename]</td>
                            <td>&nbsp;$rsdoc[doctorname]</td>
                            <td>&nbsp;<b><font color = 'red'>$rs[catatan]</font></b>";
                            echo "</td>";
                            echo "<td><b><font color = 'green'>Rp. $rs[medicinecost]</font></b>";
                            echo "<td><a href='pasien_obat.php?editid=$rs[nKode]&patientid=$rs[patientid]&appointmentid=$rs[appointmentid]' class='btn btn-xs btn-primary'>Edit</a>";
                            echo "&nbsp;<a href='patientreport.php?delidobat=$rs[nKode]&patientid=$rs[patientid]&appointmentid=$rs[appointmentid]' class='btn btn-xs btn-danger'>Hapus</a></td>";
                            "</td></tr>";
                            $totalobat = $totalobat +  $rs['medicinecost'];
                          }
                          ?>
                           <tr>
                              <th>
                                <div align="right"><b>Total &nbsp;<font color="green">Rp. <?php echo $totalobat; ?></font></b> </div>
                              </th>
                             
                            </tr>
                        </table>
                      </div>
                      </p>
                    </div>

                    <div class="tab-pane" id="billing" role="tabpanel">
                      <p class="m-0">
                        <?php
                        $billappointmentid = $rsappointment[0];
                        $sqlbilling_records = "SELECT * FROM billing WHERE appointmentid='$billappointmentid'";
                        $qsqlbilling_records = mysqli_query($conn, $sqlbilling_records);
                        $rsbilling_records = mysqli_fetch_array($qsqlbilling_records);
                        ?>
                      <div class="table-responsive dt-responsive">
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                          <tbody>
                            <tr>
                              <th scope="col">
                                <div align="right">No. Pembayaran &nbsp; </div>
                              </th>
                              <td> <?php echo $rsbilling_records['billingid']; ?></td>
                            </tr>
                            <tr>
                              <th width="124" scope="col">
                                <div align="right">ID Pasien / Nama Pasien &nbsp; </div>
                              </th>
                              <td width="413"> <?php echo $rspatient['patientid'] . " / " .$rspatient['patientname']; ?>
                              </td>
                            </tr>

                          </tbody>
                        </table>
                      </div>

                      <div class="table-responsive dt-responsive">
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                          <thead>
                            <tr>
                              <th width="97" scope="col">Tanggal</th>
                              <th width="245" scope="col">Nama Tindakan</th>
                              <th width="86" scope="col">Biaya</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql = "SELECT * FROM billing where appointmentid='$_GET[appointmentid]'";
                            $qsql = mysqli_query($conn, $sql);
                            $billamt = 0;
                            while ($rs = mysqli_fetch_array($qsql)) {
                              echo "<tr>
                              <td>&nbsp;$rs[billingdate]</td>
                              <td>&nbsp;";
                              echo " </td><td>&nbsp;Rp. $rs[amount]</td></tr>";
                              $billamt = $billamt +  $rs['amount'];
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>

                      <div class="table-responsive dt-responsive">
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                          <tbody>

                            <tr>
                              <th>
                                <div align="right"><b>Total &nbsp;<font color="green">Rp. <?php echo $billamt; ?></font></b> </div>
                              </th>
                             
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </p>
                    </div>
                    <div class="tab-pane" id="payment" role="tabpanel">
                      <p class="m-0">
                        <?php
                        $billappointmentid = $rsappointment[0];
                        $sqlbilling_records = "SELECT * FROM billing WHERE appointmentid='$_GET[appointmentid]'";
                        $qsqlbilling_records = mysqli_query($conn, $sqlbilling_records);
                        $rsbilling_records = mysqli_fetch_array($qsqlbilling_records);

                        ?>
                      <div class="table-responsive dt-responsive">
                        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                          <tbody>
                            <tr>
                              <th scope="col">
                                <div align="right">No. Pembayaran &nbsp; </div>
                              </th>
                              <td><?php echo $rsbilling_records['billingid']; ?></td>
                              <td>ID Pasien / Nama Pasien &nbsp;</td>
                              <td><?php echo $rspatient['patientid'] . " / " .$rspatient['patientname']; ?></td>
                            </tr>
                            <tr>
                              <th width="442" scope="col">
                                <div align="right">Tanggal Pembayaran &nbsp; </div>
                              </th>
                              <td width="413"><?php echo $rsbilling_records['billingdate']; ?></td>
                            </tr>

                            <tr>
                              <th scope="col">
                                <div align="right"></div>
                              </th>
                              <td></td>
                              <th scope="col">
                                <div align="right">Biaya Tindakan &nbsp; </div>
                              </th>
                              <td><?php
                                  $sql = "SELECT * FROM billing where appointmentid='$_GET[appointmentid]'";
                                  $qsql = mysqli_query($conn, $sql);
                                  $billamt = 0;
                                  while ($rs = mysqli_fetch_array($qsql)) {
                                    $billamt = $billamt +  $rs['amount'];
                                  }
                                  ?>
                                &nbsp;Rp. <?php echo $billamt; ?></td>
                            </tr>
                            <tr>
                              <th width="442" scope="col">
                                <div align="right"></div>
                              </th>
                              <td width="413">&nbsp;</td>
                              <th width="442" scope="col">
                                <div align="right">Tax Amount (5%) &nbsp; </div>
                              </th>
                              <td width="413">&nbsp;Rp. <?php echo $taxamt = 5 * ($billamt / 100); ?></td>
                            </tr>

                            <tr>
                              <th scope="col">
                                <div align="right">Disount reason</div>
                              </th>
                              <td rowspan="4" valign="top"><?php echo $rsbilling_records['discountreason']; ?></td>
                              <th scope="col">
                                <div align="right">Discount &nbsp; </div>
                              </th>
                              <td>&nbsp;Rp. <?php echo $rsbilling_records['discount']; ?></td>
                            </tr>

                            <tr>
                              <th rowspan="3" scope="col">&nbsp;</th>
                              <th scope="col">
                                <div align="right">Grand Total &nbsp; </div>
                              </th>
                              <td>&nbsp;Rp. <?php echo $grandtotal = ($billamt + $taxamt)  - $rsbilling_records['discount']; ?></td>
                            </tr>
                            <tr>
                              <th scope="col">
                                <div align="right">Paid Amount </div>
                              </th>
                              <td>Rp. <?php
                                      $sqlpayment = "SELECT sum(paidamount) FROM payment where appointmentid='$billappointmentid'";
                                      $qsqlpayment = mysqli_query($conn, $sqlpayment);
                                      $rspayment = mysqli_fetch_array($qsqlpayment);
                                      echo $rspayment[0];
                                      ?></td>
                            </tr>
                            <tr>
                              <th scope="col">
                                <div align="right">Balance Amount</div>
                              </th>
                              <td>Rp. <?php echo $balanceamt = $grandtotal - $rspayment[0]; ?></td>
                            </tr>
                          </tbody>
                        </table>

                        <p><strong>Payment report:</strong></p>
                        <?php
                        $sqlpayment = "SELECT * FROM payment where appointmentid='$billappointmentid'";
                        $qsqlpayment = mysqli_query($conn, $sqlpayment);
                        if (mysqli_num_rows($qsqlpayment) == 0) {
                          echo "<strong>No transaction details found..</strong>";
                        } else {
                        ?>
                          <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                              <tbody>
                                <tr>
                                  <th scope="col">Paid Date</th>
                                  <th scope="col">Paid time</th>
                                  <th scope="col">Paid amount</th>
                                </tr>
                                <?php
                                while ($rspayment = mysqli_fetch_array($qsqlpayment)) {
                                ?>
                                  <tr>
                                    <td>&nbsp;<?php echo $rspayment['paiddate']; ?></td>
                                    <td>&nbsp;<?php echo $rspayment['paidtime']; ?></td>
                                    <td>&nbsp;Rp. <?php echo $rspayment['paidamount']; ?></td>
                                  </tr>
                                <?php
                                }
                                ?>

                              </tbody>
                            </table>
                          </div>
                        <?php } ?><br><br>
                        <a class="btn btn-primary" href="paymentdischarge.php?appointmentid=<?php echo $rsappointment[0]; ?>&patientid=<?php echo $_GET['patientid']; ?>">Make Payment</a>
                      </div>
                      </p>
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