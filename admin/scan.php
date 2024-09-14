<?php
include 'includes/header.php';
?>
<div class="container-fluid px-4  justify-content-center " style="max-width: 1500px;">
    <?php alertMessage(); ?>



    <div class="row">
        <!-- scaner col -->
        <div class="col-md-12  text-center">
        <div class="shadow p-3 mb-4 bg-body-tertiary rounded-bottom   ">
            <div class="card-borderless text-center">
                
                <h4 class="card-title text-warning mb-3 ">
                <i class="bi bi-upc-scan"></i> The products scanner
                </h4>


                <div class="card-body">
                    <div class="col-md-12">
                        <div class="scanner-container text-center" style="width :990px;">
                            <div id="interactive" class="viewport"></div>
                        </div>

                        <form action="code.php" method="POST" id="form">

                            <input type="hidden" id="id_siswa" name="id_siswa">
                        </form>
                    </div>
                    <p class="text-center fs-5">scann products to create order </p>

                </div>

            </div>
        </div>
        </div>

        <form action="scan-code.php" method="POST">
            <!-- scane result  -->
            <div class="col-md-12">
                <div class="card mt-4 shadow-sm mb-4">
                    <div class="card-header text-bg-primary text-center fs-3">The scan result </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">image</th>
                                    <th scope="col">name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">Total price</th>
                                  
                                </tr>
                            </thead>
                            <tbody id="products-card">
                            </tbody>
                        </table>
                    </div>
                </div>
                <audio id="scan-sound" src="assets/sounds/scan-sound.mp3" preload="auto"></audio>
            </div>

            <div class="col-md-12">
                <div class="card mt-4 shadow-sm mb-4 rounded-4">
                    <div class="card-header text-bg-dark text-center fs-3 ">Create order </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="customer_id">select customer :</label>
                                <select name="customer_id" class="form-select select2 w-50 text-center">
                                    <option value=" ">-select customer-</option>
                                    <?php
                                    $customers = getAll('customers');
                                    if ($customers) {
                                        if (mysqli_num_rows($customers) > 0) {
                                            foreach ($customers as $customer) {
                                    ?>
                                                <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                                    <?php
                                            }
                                        } else {
                                            echo '<option value=""> NO customers found</option>';
                                        }
                                    } else {
                                        echo '<option value="">somthing went wrong</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">select warehouse :</label>
                                <select name="warehouse_id" class="form-select select2 w-50 text-center ">
                                    <option value="">-select warehouse-</option>
                                    <?php
                                    $warehouses = getAll('warehouses');
                                    if ($warehouses) {
                                        if (mysqli_num_rows($warehouses) > 0) {
                                            foreach ($warehouses as $warehouse) {
                                    ?>
                                                <option value="<?= $warehouse['id'] ?>"><?= $warehouse['name'] ?></option>
                                    <?php
                                            }
                                        } else {
                                            echo '<option value=""> NO warehouses found</option>';
                                        }
                                    } else {
                                        echo '<option value="">somthing went wrong</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Select payment mode :</label>
                                <select name="payment_mode" class="form-select select2 w-50 text-center">
                                    <option value="">-Select payment-</option>
                                    <option value="cash">Cash payment</option>
                                    <option value="online">online payment</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <br />
                                <button type="submit" name="createOrder" class="btn btn-warning w-100 rounded-4">proceed to plase order</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>





</div>
<?php include 'includes/footer.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {


        let lastScanTime = 0;
        const delayBetweenScans = 2000;
        const scannedProducts = {};
        const scanSound = document.getElementById('scan-sound');

        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#interactive'),
                constraints: {
                    width: 983,
                    height: 180,
                }
            },
            decoder: {
                readers: ["code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader", "code_39_vin_reader", "codabar_reader", "upc_reader", "upc_e_reader", "i2of5_reader"]
            }
        }, function(err) {
            if (err) {
                console.log(err);
                return;
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });


        Quagga.onDetected(function(result) {

            const currentTime = Date.now();
            var code = result.codeResult.code;

            if (currentTime - lastScanTime < delayBetweenScans) {

                return;
            }




            lastScanTime = currentTime;


            var code = result.codeResult.code;
            console.log(code);
            document.getElementById('id_siswa').value = code;



            $.ajax({
                url: 'scan-code.php',
                type: 'POST',
                data: {
                    id_siswa: code
                },
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 200) {
                        let productDetails = response.data;
                        if (scannedProducts[code]) {
                            scannedProducts[code].quantity += 1; // Increment quantity
                        } else {
                            scannedProducts[code] = {
                                id: productDetails.id,
                                name: productDetails.name,
                                price: productDetails.price,
                                image: productDetails.image,
                               
                                quantity: 1 // Initial quantity
                            };
                        }


                        const totalPrice = scannedProducts[code].quantity * scannedProducts[code].price;
                        const existingRow = $(`#products-card tr[data-id='${code}']`);


                        if (existingRow.length > 0) {
                            // Update quantity 
                            const quantityCell = existingRow.find('.quantity-cell');
                            const totalPriceCell = existingRow.find('.total-price-cell');
                            let currentQuantity = parseInt(quantityCell.text());
                            quantityCell.text(currentQuantity + 1);
                            totalPriceCell.text(totalPrice.toFixed(1) + ' $');
                        } else {

                            $('#products-card').append(`
                        <tr data-id=` + code + `>
                        <td>  <img src="` + response.data.image + `" style="width: 50px; height: 50px; border-radius: 20%;" alt=""></td>
                        <th scope="row">` + response.data.name + `</th>
                        
                        <td>` + response.data.price + ` $</td>
                        <td class="quantity-cell">${scannedProducts[code].quantity}</td>
                        <td class="total-price-cell">${totalPrice.toFixed(1)} $</td>
                      
               
                        <input type="hidden" name="id[` + response.data.id + `]" value="` + response.data.id + `">
                        <input type="hidden" name="quantity[` + response.data.id + `]" value="` + scannedProducts[code].quantity + `">
                        </tr>
                    `);
                        }
                        scanSound.play();
                    } else {
                        alert(response.message)
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error sending data:', error);
                }
            });

        });

    });
</script>