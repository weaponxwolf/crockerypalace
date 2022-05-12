<?php session_start(); ?>
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
                                            <!-- <div class="custom-actions-btns mb-5" onclick="window.print()">
                                                <a href="#" class="btn btn-secondary">
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <a href="#" class="invoice-logo">
                                                CrockeryPalace
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <address class="text-right">
                                                Maxwell admin Inc, 45 NorthWest Street.<br>
                                                Sunrise Blvd, San Francisco.<br>
                                                00000 00000
                                            </address>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                            <div class="invoice-details">
                                                <address>
                                                    <textarea id="nameaddress" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Name and Address"></textarea>
                                                    <br>
                                                    <input id="contact" type="number" placeholder="Contact No">
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                            <div class="invoice-details">
                                                <div class="invoice-num">
                                                    <div>Invoice - #009</div>
                                                    <div>January 10th 2020</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                </div>
                                <br>
                                <div id="enter">

                                    <input type="text" placeholder="Company Name" id="entercompany">
                                    <p style="display: none" id="companyid"></p>
                                    <input type="text" placeholder="Product Name" id="enterproduct">
                                    <p style="display: none" id="productid"></p>
                                    <input type="number" placeholder="Quantity" id="enterquantity">
                                    <button type="button" class="btn btn-primary" id="additem">Add Item</button>
                                    <button type="button" class="btn btn-success" id="total">Total</button>
                                </div>
                                <div>
                                    <ul class="list-group" id="selectfromlist">

                                    </ul>
                                </div>
                                <div class="invoice-body">
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table custom-table m-0" id="listtable">
                                                    <thead>
                                                        <tr>
                                                            <th>Items</th>
                                                            <th>Product ID</th>
                                                            <th>Quantity</th>
                                                            <th>Sub Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="thetable">


                                                    </tbody>

                                                    <!-- <tr id="alltotal">

                                                    </tr> -->
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                </div>
                                <div class="invoice-footer">

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
    <?php include_once '../components/forchild/scripts.php'; ?>
    <script>
        function tablecont() {
            var obj = [];
            var table = document.querySelector("#listtable");
            for (let index = 1; index < table.rows.length; index++) {
                var pdt = {
                    id: table.rows[index].cells[1].innerHTML,
                    quantity: table.rows[index].cells[2].innerHTML,
                    subtotal: table.rows[index].cells[3].innerHTML,
                }
                obj.push(pdt);
            }
            return obj;
        }

        function createInvoice() {
            var nameaddress = $("#nameaddress").val();
            var contactno = $("#contact").val();
            var pdtarray = tablecont();
            var charges = $("#charges").val();
            var discount = $("#discount").val();
            var amt = $("#totalamt").html();
            var finalamt = parseInt(charges) - parseInt(discount) + parseInt(amt);
            console.log(pdtarray);
            $.post('createinvoice.php', {
                products: pdtarray,
                nameadd: nameaddress,
                contact: contactno,
                charges: charges,
                discount: discount,
                totalamt: amt,
                finalamt: finalamt
            }, function(data, status) {
                window.location.href = "invoice.php?invoiceno=" + data;
            });
        }

        function enterComp(params) {
            const myArray = params.id.split("_");
            var id = myArray[1];
            var compName = params.innerHTML;
            $("#entercompany").val(compName);
            $("#companyid").html(id);
            $("#selectfromlist").html('');
        }

        function grandTotal() {
            var charges = $("#charges").val();
            var discount = $("#discount").val();
            var amt = $("#totalamt").html();
            var finalamt = parseInt(charges) - parseInt(discount) + parseInt(amt);
            $("#grandtotalbtn").html(`Final : Rs ${finalamt}`);
            $("#charges").css('display', 'none');
            $("#discount").css('display', 'none');
            $("#morebuttons").append(`<div style="padding: 1rem"><button type="button" class="btn btn-danger" onclick="createInvoice()">Create Invoice</button></div>`);
        }

        function enterProd(params) {
            const myArray = params.id.split("_");
            var id = myArray[1];
            var pdtName = params.innerHTML;
            $("#enterproduct").val(pdtName);
            $("#productid").html(id);
            $("#selectfromlist").html('');
        }
        $(document).ready(function() {
            $("#entercompany").keyup(function() {
                var s = this.value;
                $("#selectfromlist").html('');
                if (s != "") {
                    $.get('../apis/search/companiesbyname.php?name=' + s, function(data, status) {
                        var Companies = JSON.parse(data);
                        Companies.forEach(element => {
                            $("#selectfromlist").append(` <li onclick='enterComp(this)' id='comp_${element.reg_id}' class="list-group-item">${element.name}</li>`);
                        });
                    });
                } else {
                    $("#selectfromlist").html('');
                }
            });
            $("#enterproduct").keyup(function() {
                var s = this.value;
                var comp = $("#companyid").html();
                $("#selectfromlist").html('');
                $.get('../apis/search/productsbynameandcomp.php?data=' + s + '&comp=' + comp, function(data, status) {
                    var Products = JSON.parse(data);
                    Products.forEach(element => {
                        $("#selectfromlist").append(` <li onclick='enterProd(this)' id='prod_${element.product_id}' class="list-group-item">${element.pdt_name}</li>`);
                    });
                });

            });
            $("#additem").click(function() {
                var pdt_id = $("#productid").html();
                var quantity = $("#enterquantity").val();
                $.get('../apis/search/productsbyid.php?data=' + pdt_id, function(data, status) {
                    var Products = JSON.parse(data);
                    Products.forEach(element => {
                        var inventoryvalue = parseInt(element.stockvalue) * parseInt(element.unit_capacity);
                        if (quantity <= inventoryvalue) {
                            var subtotal = (element.ppi * parseInt(quantity)).toString();
                            $("#thetable").append(` <tr>
                                                            <td>
                                                                ${element.company_name}
                                                                <p class="m-0 text-muted">
                                                                    ${element.pdt_name}
                                                                </p>
                                                            </td>
                                                            <td>#${element.product_id}</td>
                                                            <td>${quantity}</td>
                                                            <td class='subtotal'>Rs.${subtotal}</td>
                                                        </tr>`);
                            $("#entercompany").val('');
                            $("#enterproduct").val('');
                            $("#enterquantity").val('');
                        } else {
                            $("#enterquantity").val(inventoryvalue);
                        }
                    });
                });
            });
            $("#total").click(function() {
                var s = document.querySelector("#listtable");
                var total = 0;
                for (let index = 1; index < s.rows.length; index++) {
                    var subtotal = s.rows[index].cells[3].innerHTML;
                    var stArr = subtotal.split(".");
                    var subtotalRs = stArr[1];
                    total = total + parseFloat(subtotalRs);
                }
                $("#enter").html(`<div style="display: flex;" id="morebuttons">
                                        <div style="padding: 1rem"><button type="button" class="btn btn-success">Total: Rs <span id='totalamt'>${total}</span></button></div>
                                        <div style="padding: 1rem"><input type="number" id="charges" placeholder="Extra Charges + TAX"></div>
                                        <div style="padding: 1rem"><input type="number" id="discount" placeholder="Discount"></div>
                                        <div style="padding: 1rem"><button type="button" id="grandtotalbtn" onclick="grandTotal()" class="btn btn-primary">Grand Total</button></div>
                                    </div>`);
            });
        });
    </script>
</body>

</html>