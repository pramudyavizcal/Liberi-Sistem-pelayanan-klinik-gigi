
<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php'); ?>



<?php
include('connect.php');
$sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
$result = $conn->query($sql);
$row1 = mysqli_fetch_array($result);
?>

<?php
include('connect.php');
if (isset($_GET['updatetpanggil'])) {
    $sql = "UPDATE patient SET tPanggil=1 WHERE patientid='$_GET[updatetpanggil]'";
    $qsql = mysqli_query($conn, $sql);
}
if (isset($_GET['pulangkan'])) {
    $sql = "UPDATE patient SET status='Pulang',tPanggil=0,tDiagnosa=0 WHERE patientid='$_GET[pulangkan]'";
    $qsql = mysqli_query($conn, $sql);
}
?>



<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper full-calender">
                <div class="page-body">
                    <div class="row">

                        <?php if ($_SESSION['user'] == 'admin') { ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-c-green update-card">
                                    <div class="card-block">
                                        <div class="row align-items-end">
                                            <div class="col-8">

                                                <h4 class="text-white">
                                                    <?php
                                                    $sql = "SELECT * FROM patient WHERE status='Active' and delete_status='0' and admissiondate = date(now())";
                                                    $qsql = mysqli_query($conn, $sql);
                                                    echo mysqli_num_rows($qsql);
                                                    ?>
                                                </h4>
                                                <h6 class="text-white m-b-0" style="font-family: 'Unbounded', cursive;">Total Pasien Hari ini</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <canvas id="update-chart-2" height="50"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-c-pink update-card">
                                    <div class="card-block">
                                        <div class="row align-items-end">
                                            <div class="col-8">

                                                <h4 class="text-white">
                                                    <?php
                                                    $sql = "SELECT * FROM doctor WHERE status='Active' and delete_status='0'";
                                                    $qsql = mysqli_query($conn, $sql);
                                                    echo mysqli_num_rows($qsql);
                                                    ?>
                                                </h4>
                                                <h6 class="text-white m-b-0" style="font-family: 'Unbounded', cursive;">Total Dokter</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <canvas id="update-chart-3" height="50"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-c-blue update-card">
                                    <div class="card-block">
                                        <div class="row align-items-end">
                                            <div class="col-8">

                                                <h4 class="text-white">
                                                    <?php
                                                    $sqlbulanini = "SELECT DATE_FORMAT(NOW(), '%Y-%m') AS bulanini;";
                                                    $sqlbulan = mysqli_query($conn, $sqlbulanini);
                                                    while ($rs = mysqli_fetch_array($sqlbulan)) {

                                                        $sql = "SELECT * FROM patient WHERE STATUS='Pulang' AND delete_status='0' AND DATE_FORMAT(admissiondate, '%Y-%m')='$rs[bulanini]';";
                                                        $qsql = mysqli_query($conn, $sql);
                                                        echo mysqli_num_rows($qsql);
                                                    }


                                                    ?>
                                                </h4>
                                                <h6 class="text-white m-b-0" style="font-family: 'Unbounded', cursive;">Total Pasien Bulan ini</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <canvas id="update-chart-2" height="50"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-c-green update-card">
                                    <div class="card-block">
                                        <div class="row align-items-end">
                                            <div class="col-8">

                                                <h4 class="text-white">
                                                    <?php
                                                    $sql = "SELECT * FROM patient WHERE status='Pulang' GROUP BY patientname";
                                                    $qsql = mysqli_query($conn, $sql);
                                                    echo mysqli_num_rows($qsql);
                                                    ?>
                                                </h4>
                                                <h6 class="text-white m-b-0" style="font-family: 'Unbounded', cursive;">Total Pasien Terlayani</h6>
                                            </div>
                                            <div class="col-4 text-right">
                                                <canvas id="update-chart-2" height="50"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php }  ?>

                    </div>

                    <?php if ($_SESSION['user'] == 'admin') { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 style="font-family: 'Unbounded', cursive;">Grafik Jumlah Pasien per Bulan</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="ct-chart1-patient ct-perfect-fourth"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 style="font-family: 'Unbounded', cursive;">Pasien Hari Ini</h2>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th width='5%'>No</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Tanggal Kunjungan</th>
                                                        <th>TTL</th>
                                                        <th>Alamat</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $sqlpat = "SELECT * FROM patient WHERE STATUS = 'Active' AND admissiondate = DATE(NOW()) OR tPanggil = 1 ORDER BY patientid DESC;";
                                                    $qsqlpat = mysqli_query($conn, $sqlpat);
                                                    $a = 0;
                                                    while ($rspat = mysqli_fetch_array($qsqlpat)) {
                                                        $a = $a + 1;
                                                        if (mysqli_num_rows($qsqlpat)) {
                                                            echo "<tr>
                                                            <td>&nbsp;$a</td> 
                                                            <td>&nbsp;$rspat[patientname]</td>   
                                                            <td>&nbsp;" . date("d-M-Y", strtotime($rspat['admissiondate'])) . " &nbsp; " . date("H:i:s", strtotime($rspat['admissiontime'])) . "</td> 
                                                            <td>&nbsp;$rspat[city],  &nbsp;" . date("d-m-Y", strtotime($rspat['dob'])) . "</td>
                                                            <td>&nbsp;$rspat[address]</td>
                                                            <td>&nbsp;$rspat[gender]</td>
                                                            <td>";
                                                            if ($rspat['tPanggil'] == 0) {
                                                                echo "<a href='index.php?updatetpanggil=$rspat[patientid]' class='btn btn-primary'>Panggil</a>";
                                                            } else {
                                                                if ($rspat['tDiagnosa'] == 0) {
                                                                    echo "<a>Sudah Dipanggil</a> &nbsp;";
                                                                    echo "<a class='btn btn-secondary'>Terlayani</a>";
                                                                } else {
                                                                    echo "<a>Sudah Dipanggil</a> &nbsp;";
                                                                    echo "<a href='index.php?pulangkan=$rspat[patientid]' class='btn btn-success'>Terlayani</a>";
                                                                }
                                                            }
                                                            echo "</td></tr>";
                                                        } else {
                                                            echo "<tr>
                                                            <td>&nbsp;$a</td>
                                                            <td>&nbsp;$rspat[patientname]</td>   
                                                            <td>&nbsp;" . isset($rspat['admissiondate']) ? null : date("d-M-Y", strtotime($rspat['admissiondate'])) . " &nbsp; " . date("H:i:s", strtotime($rspat['admissiontime'])) . "</td> 
                                                            <td>&nbsp;$rspat[city],  &nbsp;" . date("d-m-Y", strtotime($rspat['dob'])) . "</td>
                                                            <td>&nbsp;$rspat[address]</td>
                                                            <td>&nbsp;$rspat[gender]</td>
                                                            <td>";
                                                            if ($rspat['tPanggil'] == 0) {
                                                                echo "<a href='index.php?updatetpanggil=$rspat[patientid]' class='btn btn-primary'>Panggil</a>";
                                                            } else {
                                                                echo "<a>Sudah Dipanggil</a> &nbsp;";
                                                                echo "<a href='patient.php?pulangkan=$rspat[patientid]' disabled class='btn btn-success'>Terlayani</a>";
                                                            }
                                                            echo "</td></tr>";
                                                        }
                                                    }

                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th width='5%'>No</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Tanggal Kunjungan</th>
                                                        <th>TTL</th>
                                                        <th>Alamat</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>



                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include('footer.php'); ?>

<link rel="stylesheet" href="files/bower_components/chartist/css/chartist.css" type="text/css" media="all">
<!-- Chartlist charts -->
<script src="files/bower_components/chartist/js/chartist.js"></script>
<script src="files/assets/pages/chart/chartlist/js/chartist-plugin-threshold.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#dom-jqry').DataTable({
            pageLength: 5,
            stateSave: true,
            "bDestroy": true,
            lengthMenu: [
                [5],
                [5]
            ]
        })
    });

    //Second Chat
    var patient = [];
    <?php
    for ($i = 01; $i < 13; $i++) {
        $count_patient = 0;
        $sql = "SELECT * FROM patient WHERE (status !='') and delete_status='0' and MONTH(admissiondate) = '" . $i . "'";
        $qsql = mysqli_query($conn, $sql);
        $count_patient = mysqli_num_rows($qsql);
    ?>
        patient.push(<?php echo $count_patient; ?>);
    <?php } ?>

    new Chartist.Line('.ct-chart1-patient', {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        series: [patient]
    }, {
        showArea: false,

        axisY: {
            onlyInteger: true
        },
        plugins: [
            Chartist.plugins.ctThreshold({
                threshold: 4
            })
        ]
    });

    var defaultOptions = {
        threshold: 0,
        classNames: {
            aboveThreshold: 'ct-threshold-above',
            belowThreshold: 'ct-threshold-below'
        },
        maskNames: {
            aboveThreshold: 'ct-threshold-mask-above',
            belowThreshold: 'ct-threshold-mask-below'
        }
    };
</script>