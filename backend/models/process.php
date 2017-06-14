<?php
    function create($models, $koneksi){
        $sql = '';
        if (!$models){
            echo '<script>window.history.back()</script>';
        }
        else{
            if ($models == 'product_template'){
                /* List Fields */
                $sale_ok = $_POST['sale_ok'] == 'on' ? 1 : 0;
                $purchase_ok = $_POST['purchase_ok'] == 'on' ? 1 : 0;
                $website_published = $_POST['website_published'] == 'on' ? 1 : 0;
                $name = $_POST['name'];
                $list_price = $_POST['list_price'];
                $standard_price = $_POST['standard_price'];
                $categ_id = $_POST['categ_id'];
                $product_type_id = $_POST['product_type_id'];
                $default_code = $_POST['default_code'];
                $description_sale = $_POST['description_sale'];
                $description_picking = $_POST['description_picking'];

                $sql = "INSERT INTO product_template VALUES (NULL, 1, NULL, NULL, NULL, '$name', NULL, '$list_price', '$standard_price', '$categ_id', '$sale_ok', '$purchase_ok', $description_sale, '$product_type_id', NULL, 1, '$website_published', '$default_code')";
                $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
            }
        }
    }

    function write($id, $models, $koneksi){
        $sql = '';
        if (!$models){
            echo '<script>window.history.back()</script>';
        }
        else{
            if ($models == 'product_template'){
                /* List Fields */
                $sale_ok = $_POST['sale_ok'] == 'on' ? 1 : 0;
                $purchase_ok = $_POST['purchase_ok'] == 'on' ? 1 : 0;
                $website_published = $_POST['website_published'] == 'on' ? 1 : 0;
                $name = $_POST['name'];
                $list_price = $_POST['list_price'];
                $standard_price = $_POST['standard_price'];
                $categ_id = $_POST['categ_id'];
                $product_type_id = $_POST['product_type_id'];
                $default_code = $_POST['default_code'];
                $description_sale = $_POST['description_sale'];
                $description_picking = $_POST['description_picking'];

                $sql = "UPDATE product_template SET name='$name', list_price='$list_price', standard_price='$standard_price', categ_id='$categ_id', product_type_id='$product_type_id', sale_ok='$sale_ok', purchase_ok='$purchase_ok', description_sale='$description_sale', website_published='$website_published', default_code='$default_code' WHERE id='$id'";
                $result = mysqli_query($koneksi, $sql) or die(mysqli_error());
            }
        }
    }

    function delete($id, $models, $koneksi){
        $sql = '';
        if (!$models){
            echo '<script>window.history.back()</script>';
        }
        else{
            $sql = 'DELETE FROM '.$models.' WHERE id='.$id.'';
            $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
        }
    }
?>