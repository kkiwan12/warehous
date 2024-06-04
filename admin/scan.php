<?php
include 'includes/header.php';
?>
<div class="container-fluid px-4 mt-4  justify-content-center ">
    <?php alertMessage(); ?>



    <div class="row">
        <!-- scaner col -->
        <div class="col-md-12 ">
            <div class="card mt-4  shadow-sm">
                <div class="card-header  text-bg-warning fw-bold ">The products scanner </div>


                <div class="card-body">

                    <div class="scanner-container">
                        <div id="interactive" class="viewport"></div>
                    </div>

                    <form action="code.php" method="POST" id="form">

                        <input type="hidden" id="id_siswa" name="id_siswa">
                    </form>

                </div>

            </div>
        </div>

        <!-- scane result  -->
        <div class="col-md-12">
            <div class="card mt-4 shadow-sm mb-4">
                <div class="card-header text-bg-primary">The scan result </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">image</th>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">category</th>
                            </tr>
                        </thead>
                        <tbody id="products-card">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





</div>
<?php include 'includes/footer.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {


        let lastScanTime = 0;
        const delayBetweenScans = 2000;
        const scannedProducts = {};

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
                                        name: productDetails.name,
                                        price: productDetails.price,
                                        image: productDetails.image,
                                        categoryName: productDetails.categoryName,
                                        quantity: 1 // Initial quantity
                                    };
                                }
                        const existingRow = $(`#products-card tr[data-id='${code}']`);
                                if (existingRow.length > 0) {
                                    // Update quantity if product already exists in the table
                                    const quantityCell = existingRow.find('.quantity-cell');
                                    let currentQuantity = parseInt(quantityCell.text());
                                    quantityCell.text(currentQuantity + 1);
                                } else {

                        $('#products-card').append(`
                        <tr data-id=`+code+`>
                        <td>  <img src="` + response.data.image + `" style="width: 50px; height: 50px;" alt=""></td>
                        <th scope="row">` + response.data.name + `</th>
                        
                        <td>` + response.data.price + ` $</td>
                        <td class="quantity-cell">${scannedProducts[code].quantity}</td>
                        <td>` + response.data.categoryName + `</td>
                        <input type="hidden" name="id[`+response.data.id+`]" value="`+response.data.id+`">
                        <input type="hidden" name="quantity[`+response.data.id+`]" value="`+scannedProducts[code].quantity+`">
                        </tr>
                    `);}
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