<?php session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
} ?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once "../conn/db.php";
include_once "../components/forchild/head.php";
?>

<body>
    <div class="back-to-top"></div>
    <header>
        <?php
        include_once "../components/forchild/navbar.php";
        ?>
    </header>

    <main>
        <div class="page-section counter-section">
            <div class="container">
                <div class="row align-items-center text-center">

                </div>
            </div>
        </div>
    </main>

    <style>
        body {
            margin-top: 20px;
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
        }

        .invoice-container {
            padding: 1rem;
        }

        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #2e323c;
        }

        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }

        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #9fa8b9;
            margin: 0;
        }

        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: #f5f6fa;
        }

        .invoice-container .invoice-details .invoice-num {
            text-align: right;
            font-size: 0.8rem;
        }

        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }

        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #ffffff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }

        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #9fa8b9;
        }

        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }

        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #f5f6fa;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }

        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }


        .custom-table {
            border: 1px solid #e0e3ec;
        }

        .custom-table thead {
            background: #007ae1;
        }

        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }

        .custom-table>tbody tr:hover {
            background: #fafafa;
        }

        .custom-table>tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }

        .custom-table>tbody td {
            border: 1px solid #e6e9f0;
        }


        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .text-success {
            color: #00bb42 !important;
        }

        .text-muted {
            color: #9fa8b9 !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
        }
    </style>
    <div class="container">
        <?php
        $invoice_no = $_GET['invoiceno'];
        $sql = "SELECT * FROM `invoice` WHERE `invoiceno`='$invoice_no'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="container">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="invoice-container">
                                        <div class="invoice-header">
                                            <!-- Row start -->
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    <div class="custom-actions-btns mb-5" onclick="window.print()">
                                                        <a href="#" class="btn btn-secondary">
                                                            <i class="icon-printer"></i> Print
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Row end -->
                                            <!-- Row start -->
                                            <div class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                    <h1>CrockeryPalace</h1>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <address class="text-right">
                                                        Q5MJ+X52, Bistupur Main Rd, 1<br>
                                                        South Park, Bistupur, <br>
                                                        Jamshedpur, Jharkhand 83100
                                                    </address>
                                                </div>
                                            </div>
                                            <!-- Row end -->
                                            <!-- Row start -->
                                            <div class="row gutters">
                                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 text-dark">
                                                    <div class="invoice-details">
                                                        <address style="color:black">
                                                            <?php echo $row['nameaddress']; ?>
                                                            <br>
                                                            Contact No:<?php echo $row['contactno']; ?>
                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                                    <div class="invoice-details">
                                                        <div class="invoice-num">
                                                            <div>Invoice - #<?php echo $invoice_no; ?></div>
                                                            <div> <?php echo Date('F dS Y') ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Row end -->
                                        </div>
                                        <div class="invoice-body">
                                            <!-- Row start -->
                                            <div class="row gutters">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="table-responsive">
                                                        <table class="table custom-table m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Items</th>
                                                                    <th>Product ID</th>
                                                                    <th>Quantity</th>
                                                                    <th>Sub Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php

                                                                $items = explode(",", $row['boughtpdts']);
                                                                for ($i = 1; $i < count($items); $i++) {
                                                                    $subid = explode("-", $items[$i]);
                                                                    $id = $subid[0];
                                                                    $quant = explode("@", $subid[1]);
                                                                    $quantity = $quant[0];
                                                                    $subtotal = $quant[1];
                                                                    $pdt_id = trim($id, '#');
                                                                    $sql2 = "SELECT companies.name AS company_name, products.name AS pdt_name FROM `products` LEFT JOIN `companies` ON companies.reg_id=products.company_id WHERE `pdt_id`='$pdt_id'";
                                                                    $result2 = $conn->query($sql2);
                                                                    if ($result2->num_rows > 0) {
                                                                        while ($row2 = $result2->fetch_assoc()) { ?>

                                                                            <tr>
                                                                                <td>
                                                                                    <?php echo $row2['company_name']; ?>
                                                                                    <p class="m-0 text-muted">
                                                                                        <?php echo $row2['pdt_name']; ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td><?php echo $id; ?></td>
                                                                                <td><?php echo $quantity; ?></td>
                                                                                <td><?php echo $subtotal; ?></td>
                                                                            </tr>

                                                                <?php
                                                                        }
                                                                    } else {
                                                                        return 0;
                                                                    }
                                                                }
                                                                ?>

                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td colspan="2">
                                                                        <p>
                                                                            Subtotal<br>
                                                                            Shipping &amp; Handling Tax<br>
                                                                            Discount<br>
                                                                        </p>
                                                                        <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                                    </td>
                                                                    <td>
                                                                        <p>
                                                                            Rs. <?php echo $row['total'] ?><br>
                                                                            Rs. <?php echo $row['tax'] ?><br>
                                                                            Rs. <?php echo $row['discount'] ?><br>
                                                                        </p>
                                                                        <h5 class="text-success"><strong>Rs. <?php echo $row['finalamt'] ?></strong></h5>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Row end -->
                                        </div>
                                        <div class="invoice-footer">
                                            Thank you for your Business.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
            }
        } else {
            return 0;
        } ?>

                </div>
    </div>
    <?php include_once '../components/forchild/scripts.php'; ?>

</body>

</html>