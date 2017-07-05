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
                $images = $_FILES['image']['name'];
                $opt_images_2 = $_FILES['optional_image_2']['name'];
                $opt_images_3 = $_FILES['optional_image_3']['name'];
                $opt_images_4 = $_FILES['optional_image_4']['name'];

                $sql = "INSERT INTO product_template VALUES (NULL, 1, NULL, NULL, NULL, '$name', NULL, '$list_price', '$standard_price', '$categ_id', '$sale_ok', '$purchase_ok', '$description_sale', '$product_type_id', NULL, 1, '$website_published', '$default_code', '$images', '$opt_images_2', '$opt_images_3', '$opt_images_4')";
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
                $images = $_FILES['image']['name'];
                $opt_images_2 = $_FILES['optional_image_2']['name'];
                $opt_images_3 = $_FILES['optional_image_3']['name'];
                $opt_images_4 = $_FILES['optional_image_4']['name'];

                $sql = "UPDATE product_template SET name='$name', list_price='$list_price', standard_price='$standard_price', categ_id='$categ_id', product_type_id='$product_type_id', sale_ok='$sale_ok', purchase_ok='$purchase_ok', description_sale='$description_sale', website_published='$website_published', default_code='$default_code', image='$images', optional_image_2='$opt_images_2', optional_image_3='$opt_images_3', optional_image_4='$opt_images_4' WHERE id='$id'";
                $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
            }
        }
    }

    function published($id, $models, $koneksi){
        $sql = '';
        if (!$models){
            echo '<script>window.history.back()</script>';
        }
        else{
            if ($models == 'product_template'){
                $website_published = 1;
                $sql = "UPDATE product_template SET website_published='$website_published' WHERE id='$id'";
                $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
            }
        }
    }

    function unpublished($id, $models, $koneksi){
        $sql = '';
        if (!$models){
            echo '<script>window.history.back()</script>';
        }
        else{
            if ($models == 'product_template'){
                $website_unpublished = 0;
                $sql = "UPDATE product_template SET website_published='$website_unpublished' WHERE id='$id'";
                $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
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