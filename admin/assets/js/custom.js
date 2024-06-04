function filterProductsByCategory() {
    var categoryId = document.getElementById('categorySelect').value;
    window.location.href = 'products.php?category_id=' + categoryId;
}

function getWarehouseById() {
    var warehouseId = document.getElementById('warehouseSelect').value;
    if (warehouseId) {
        window.location.href = 'warehouse-management.php?id=' + warehouseId;
    }
}


$(document).ready(function () {

    alertify.set('notifier', 'position', 'top-center');
    $(document).on('click', '.incremant', function () {
        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.productId').val();
        var currentValue = parseInt($quantityInput.val());

        if (!isNaN(currentValue)) {
            var qtyVal = currentValue + 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal);
        }

    })

    $(document).on('click', '.decremant', function () {
        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.productId').val();
        var currentValue = parseInt($quantityInput.val());

        if (!isNaN(currentValue) && currentValue > 1) {
            var qtyVal = currentValue - 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal);
        }

    })

    function quantityIncDec(productId, qty) {
        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data: {
                'quantityIncDec': true,
                'product_id': productId,
                'quantity': qty,
            },
            success: function (response) {
                var res = JSON.parse(response);
                if (res.status == 200) {
                    //  window.location.reload();
                    $(' #productArea').load(' #productContent');
                    alertify.success(res.message);
                } else {
                    alertify.error(res.message);
                }
            }
        });
    }

    function isNumeric(value) {
        return /^\d+$/.test(value);
    }

    //proceed to order button click
    $(document).on('click', '.proceedToPlace', function () {

        var customerId = $('#customerId').val();
        var payment_mode = $('#payment_mode').val();

        if (payment_mode == '') {

            Swal.fire("Select payment mode", "Select your payment mode", "warning");
            return false;

        }

        if (customerId == '') {

            Swal.fire("Customer ", "Please select a valid customer ", "warning");
            return false;

        }


        var data = {
            'proceedToPlace': true,
            'payment_m ode': payment_mode,
            'customerId': customerId
        };


        $.ajax({
            type: 'POST',
            url: 'orders-code.php',
            data: data,
            success: function (response) {
                var res = JSON.parse(response);
                if (res.status == 200) {
                    window.location.href = "order-summary.php";
                } else if (res.status == 404) {
                    Swal.fire(res.message, res.message, res.status_type, {
                        buttons: {
                            catch: {
                                Text:"Add customer",
                                value:"catch"
                            },
                            cancel: "Cancel",
                        }
                    }).then((value) => {
                      switch(value){
                        case "catch":
                            console.log("POP THE Customer customer add modle ");
                            break;
                        default:    
                      }
                    });
                } else {
                    Swal.fire("Error", "Something went wrong", "error");
                }
            }
        });

    });
});





var fileTag = document.getElementById("filetag"),
    preview = document.getElementById("preview");

fileTag.addEventListener("change", function () {
    changeImage(this);
});

function changeImage(input) {
    var reader = new FileReader();
    reader.onload = function (e) {
        preview.src = e.target.result;
    }
    reader.readAsDataURL(input.files[0]);
}





function changeImage(input) {
    var reader;

    if (input.files && input.files[0]) {
        reader = new FileReader();

        reader.onload = function (e) {
            preview.setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

