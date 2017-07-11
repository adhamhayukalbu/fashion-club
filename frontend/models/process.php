<?php
    function create($models, $koneksi){
        $sql = '';
        if (!$models){
            echo '<script>window.history.back()</script>';
        }
        else{
            if ($models == 'sale_order'){
                /* List Fields */                
                $amount_untaxed = $_SESSION['order']['amount_untaxed'];
                $amount_tax = $_SESSION['order']['amount_tax'];
                $amount_total = $_SESSION['order']['amount_total'];
                $partner_name = $_POST['partner_name'];
                $partner_phone = $_POST['partner_phone'];
                $partner_address = $_POST['partner_address'];
                $partner_email = $_POST['partner_email'];
                $order_date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO sale_order VALUES (NULL, NULL, '$order_date', '$partner_name', '$partner_address', '$partner_phone', '$partner_email', '$amount_untaxed', '$amount_tax', '$amount_total')";
                $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
                $order_id = mysqli_insert_id($koneksi);
                $order_ref = "SO/17/000".$order_id;
                $sql = "UPDATE sale_order SET name='$order_ref' WHERE id='$order_id'";
                $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

                foreach ($_SESSION["cart_item"] as $item){
                    $product_id = $item['id'];
                    $qty_ordered = $item['qty_ordered'];
                    $price_unit = $item['list_price'];
                    $line_amount_untaxed = $item['amount_untaxed'];
                    $line_amount_tax = $item['amount_tax'];
                    $sql = "INSERT INTO sale_order_line VALUES (NULL, '$order_id', '$product_id', '$qty_ordered', '$price_unit', '$line_amount_untaxed', '$line_amount_tax')";
                    $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
                }
            }
        }
    }
?>