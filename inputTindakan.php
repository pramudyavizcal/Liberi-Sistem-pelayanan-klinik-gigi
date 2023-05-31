<?php
error_reporting(E_WARNING); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="libs/style.css">

</head>

<body>

    <?php require_once('check_login.php'); ?>
    <?php include('head.php'); ?>
    <?php include('header.php'); ?>
    <?php include('sidebar.php'); ?>
    <?php include('connect.php');

    if (isset($_POST['btn_submit'])) {
        if (isset($_GET['editid'])) {
            $sql = "UPDATE form_pemeriksaan SET patientid='$_GET[patientid]',appointmentid='$_GET[appointmentid]',a1='$_POST[a1]',a2='$_POST[a2]',a3='$_POST[a3]',a4='$_POST[a4]',a5='$_POST[a5]',a6='$_POST[a6]',a7='$_POST[a7]',a8='$_POST[a8]',a9='$_POST[a9]',szcatatan='$_POST[idlainnya]',a10='$_POST[a10]',a11='$_POST[a11]',a12='$_POST[a12]',a13='$_POST[a13]',
            a14='$_POST[a14]',a15='$_POST[a15]',a16='$_POST[a16]',a17='$_POST[a17]',a18='$_POST[a18]',a19='$_POST[a19]',a20='$_POST[a20]',a21='$_POST[a21]',a22='$_POST[a22]',a23='$_POST[a23]',a24='$_POST[a24]',szkebiasaan='$_POST[idkebiasaanlainnya]',a25='$_POST[a25]',a26='$_POST[a26]',a27='$_POST[a27]',b1='$_POST[b1]',b2='$_POST[b2]',b3='$_POST[b3]',b4='$_POST[b4]',
            b5='$_POST[b5]',b6='$_POST[b6]',b7='$_POST[b7]',b8='$_POST[b8]',b9='$_POST[b9]',b10='$_POST[b10]',b11='$_POST[b11]',b12='$_POST[b12]',b13='$_POST[b13]',b14='$_POST[b14]',b15='$_POST[b15]',c1='$_POST[c1]'
            WHERE appointmentid='$_GET[editid]'";
            if ($qsql = mysqli_query($conn, $sql)) {
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
                            <?php echo "<script>setTimeout(\"location.href = 'view-appointments-approved.php';\",4000);</script>"; ?>
                        </p>
                    </div>
                </div>
            <?php
            } else {
                echo mysqli_error($conn);
            }
        } else {
            $sql = "INSERT INTO form_pemeriksaan(patientid,appointmentid,a1,a2,a3,a4,a5,a6,a7,a8,a9,szcatatan,a10,a11,a12,a13,a14,a15,a16,a17,a18,a19,a20,a21,a22,a23,a24,szkebiasaan,a25,a26,a27,b1,b2,b3,b4,b5,b6,b7,b8,b9,b10,b11,b12,b13,b14,b15,c1) 
            values
            ('$_GET[patientid]','$_GET[appointmentid]','$_POST[a1]','$_POST[a2]','$_POST[a3]','$_POST[a4]','$_POST[a5]','$_POST[a6]','$_POST[a7]','$_POST[a8]','$_POST[a9]','$_POST[idlainnya]','$_POST[a10]','$_POST[a11]',
            '$_POST[a12]','$_POST[a13]','$_POST[a14]','$_POST[a15]','$_POST[a16]','$_POST[a17]','$_POST[a18]','$_POST[a19]','$_POST[a20]','$_POST[a21]','$_POST[a22]','$_POST[a23]','$_POST[a24]','$_POST[idkebiasaanlainnya]','$_POST[a25]','$_POST[a26]','$_POST[a27]','$_POST[b1]','$_POST[b2]','$_POST[b3]','$_POST[b4]','$_POST[b5]'
            ,'$_POST[b6]','$_POST[b7]','$_POST[b8]','$_POST[b9]','$_POST[b10]','$_POST[b11]','$_POST[b12]','$_POST[b13]','$_POST[b14]','$_POST[b15]','$_POST[c1]'
            )";
            if ($qsql = mysqli_query($conn, $sql)) {


                $sql = "UPDATE appointment SET status='Pulang' WHERE appointmentid='$_GET[appointmentid]'";
                $qsql = mysqli_query($conn, $sql);
                //include("insertbillingrecord.php"); 
            ?>
                <div class="popup popup--icon -success js_success-popup popup--visible">
                    <div class="popup__background"></div>
                    <div class="popup__content">
                        <h3 class="popup__content__title">
                            Success
                        </h3>
                        <p>Check Up Record Berhasil Disimpan</p>
                        <p>
                            <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                            <?php echo "<script>setTimeout(\"location.href = 'view-appointments-approved.php';\",4000);</script>"; ?>
                        </p>
                    </div>
                </div>
    <?php
            } else {
                echo mysqli_error($conn);
            }
        }
    }
    if (isset($_GET['editid'])) {
        $sql = "SELECT * FROM form_pemeriksaan WHERE appointmentid='$_GET[editid]' ";
        $qsql = mysqli_query($conn, $sql);
        $rsedit = mysqli_fetch_array($qsql);
    }

    ?>
    <?php
    $sqlpx = "SELECT * FROM patient WHERE patientid='$_GET[patientid]'";
    $qsqlpx = mysqli_query($conn, $sqlpx);
    $rspx = mysqli_fetch_array($qsqlpx);
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
                                        <h4 style="font-family: 'Unbounded', cursive;">Form Pemeriksaan Pasien A/n : <?php echo $rspx['patientname'] . "&nbsp" . "[ ID Pasien: " . $rspx['patientid'] . " ]" ?></h4>
                                        <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a style="font-family: 'Unbounded', cursive;">Form Pemeriksaan Pasien</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                            </div>
                                            <div class="card-block">

                                                <h3 class="title" style="font-family: 'Unbounded', cursive;">Catatan Medis</h3>
                                                <div class="row mb-3">
                                                    <label class="col-sm-4 col-form-label">1. Sedang menerima perawatan medis?</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" name="a1" id="a1">
                                                            <option value="Y" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a1'] == 'Y') {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>>Ya</option>
                                                            <option value="N" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a1'] == 'N') {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>>Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-4 col-form-label">2. Kunjungan terakhir ke dokternya?</label>
                                                    <div class="col-sm-4">
                                                        <input required type="date" class="form-control" name="a2" id="a2" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                if ($rsedit['a2'] != '') {
                                                                                                                                    echo date($rsedit['a2']);
                                                                                                                                }
                                                                                                                            } ?>">
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">3. Tujuannya?</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ketik disini.." class="form-control" name="a3" id="a3" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['a3'];
                                                                                                                                                                            } ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">4. Riwayat Penyakit Sebelumnya?</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a4" name="a4" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a4'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Jantung
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a5" name="a5" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a5'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Alergi
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a6" name="a6" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a6'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Measies
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a7" name="a7" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a7'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Cacar Air
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a8" name="a8" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a8'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Diarrhea
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a9" name="a9" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a9'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Kelainan Darah
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a10" name="a10" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a10'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                lainnya
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" placeholder="Ketik disini.." class="form-control" name="idlainnya" id="idlainnya" disabled value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['szcatatan'];
                                                                                                                                                                            } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a11" name="a11" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a11'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Tidak ada
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">5. Temperature?</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ketik disini.." class="form-control" name="a12" id="a12" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['a12'];
                                                                                                                                                                            } ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">6. Nafsu Makan?</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ketik disini.." class="form-control" name="a13" id="a13" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['a13'];
                                                                                                                                                                            } ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">7. Makan Permen?</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ketik disini.." class="form-control" name="a14" id="a14" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['a14'];
                                                                                                                                                                            } ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">8. Makan Kue?</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ketik disini.." class="form-control" name="a15" id="a15" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['a15'];
                                                                                                                                                                            } ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">9. Makan Waktu Tidur?</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ketik disini.." class="form-control" name="a16" id="a16" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['a16'];
                                                                                                                                                                            } ?>">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-4 col-form-label">10. Bentuk Muka?</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" name="a17" id="a17">
                                                            <option value="Y" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a17'] == 'Y') {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>>Symetri</option>
                                                            <option value="N" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a17'] == 'N') {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>>Asymetri</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">11. Kebiasaan-Kebiasaan?</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a18" name="a18" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a18'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Tangan/lengan sebagai bantalan
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a19" name="a19" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a19'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Bernafas melalui mulut
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a20" name="a20" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a20'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Menggigit bibir/kuku/pipi
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a21" name="a21" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a21'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Menghisap jempol/jari
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a22" name="a22" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a22'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Tongue thrusting
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a23" name="a23" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a23'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Bruxism
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="Y" type="checkbox" id="a24" name="a24" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a24'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                lainnya
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" placeholder="Ketik disini.." class="form-control" name="idkebiasaanlainnya" id="idkebiasaanlainnya" disabled value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['szkebiasaan'];
                                                                                                                                                                            } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="a25" name="a25" value="Y" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a25'] == 'Y') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?>>
                                                            <label class="form-check-label">
                                                                Tidak ada
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-4 col-form-label">12. Apakah pernah mengunjungi dokter gigi?</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="a26" id="a26">
                                                            <option value="Y" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a26'] == 'Y') {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>>Pernah</option>
                                                            <option value="N" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a26'] == 'N') {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>>Tidak Pernah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-4 col-form-label">13. Apakah pernah dirawat di rumah sakit?</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="a27" id="a27">
                                                            <option value="Y" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a27'] == 'Y') {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>>Pernah</option>
                                                            <option value="N" <?php if (isset($_GET['editid'])) {
                                                                                    if ($rsedit['a27'] == 'N') {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>>Tidak Pernah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header"></div>
                                            <div class="card-block">
                                                <div class="card-details">
                                                    <h3 class="title" style="font-family: 'Unbounded', cursive;">Pemeriksaan Rongga Mulut</h3>
                                                    <h5><b>Keadaan jaringan lunak</b></h5>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">1. Bibir/mulut?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b1" id="b1" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b1'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">2. Gingivitis?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b2" id="b2" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b2'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">3. Retraksi gingiva?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b3" id="b3" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b3'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">4. Lidah?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b4" id="b4" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b4'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">5. Sinus?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b5" id="b5" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b5'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <br></br>
                                                    <h5 ><b>Hygiene Mulut</b></h5>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">1. Karang Gigi?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b6" id="b6" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b6'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">2. Sikat Gigi?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b7" id="b7" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b7'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <br></br>
                                                    <h5><b>Okulasi</b></h5>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">1. Garis median normal?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b8" id="b8" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b8'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">2. Gigi muka protrusi/berdesakan?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b9" id="b9" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b9'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">3. Class I?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b10" id="b10" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b10'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">4. Class II?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b11" id="b11" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b11'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">5. Class III?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b12" id="b12" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b12'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">6. Gigitan silang?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b13" id="b13" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b13'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">7. Gigitan terbuka?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b14" id="b14" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b14'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">8. Gigitan dalam?</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="b15" id="b15" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['b15'];
                                                                                                                                                                            } ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                                <br></br>
                                                <div class="card-details">
                                                    <h3 class="title" style="font-family: 'Unbounded', cursive;">Pemeriksaan Lanjutan</h3>
                                                    
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">1. Rencana Perawatan?</label>
                                                            <div class="col-sm-8">
                                                                <textarea type="text" placeholder="Ketik disini.." class="form-control" name="c1" id="c1" ><?php if (isset($_GET['editid'])) {
                                                                                                                echo $rsedit['c1'];
                                                                                                            } ?></textarea>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    if(isset($_GET['editid'])) {?>
                                        <div class="form-group col-sm-12">
                                                            <button hidden type="submit" name="btn_submit" class="btn btn-primary btn-block">SUBMIT</button>
                                                        </div>
                                    <?php }else 
                                    {?>
                                        <div class="form-group col-sm-12">
                                                            <button type="submit" name="btn_submit" class="btn btn-primary btn-block">SUBMIT</button>
                                                        </div>
                                    <?php
                                }?>
                                                        
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include('footer.php'); ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="libs/select2/dist/js/select2.full.min.js"></script>
    <script src="libs/select2/dist/js/select2.min.js"></script>
    <script>
        $(".select2").select2();
    </script>
    <script>
        $(document).ready(function() {
            $('#a1').change(function(event) {
                if ($(this).val() === 'N') {
                    document.getElementById("a2").disabled = true;
                } else {
                    document.getElementById("a2").disabled = false;
                }
            });
        });

        $(document).ready(function() {
            var ckbox = $("input[name='a10']");
            $('input').on('click', function() {
                if (ckbox.is(':checked')) {
                    document.getElementById("idlainnya").disabled = false;
                } else {
                    document.getElementById("idlainnya").disabled = true;
                }
            });
        });

        $(document).ready(function() {
            var ckbox = $("input[name='a24']");
            $('input').on('click', function() {
                if (ckbox.is(':checked')) {
                    document.getElementById("idkebiasaanlainnya").disabled = false;
                } else {
                    document.getElementById("idkebiasaanlainnya").disabled = true;

                }
            });
        });
    </script>

</body>

</html>