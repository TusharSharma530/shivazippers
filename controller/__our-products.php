<?php

    if($geturl3){
        $g3 = mysqli_real_escape_string($con, $geturl3);

        // Route A (legacy): 3rd segment = child category url -> us child ka product
        $childcategorysql = mysqli_query($con, "SELECT * FROM `childcategory` WHERE status=1 AND url='$g3'");
        $childcategoryrow = ($childcategorysql && mysqli_num_rows($childcategorysql)) ? mysqli_fetch_assoc($childcategorysql) : null;
        $childcategoryid = !empty($childcategoryrow['id']) ? $childcategoryrow['id'] : '';

        $productdetailssql = false;
        if($childcategoryid !== ''){
            $productdetailssql = mysqli_query($con, "SELECT * FROM `products` WHERE status=1 AND childcategory='$childcategoryid' LIMIT 1");
        }

        // Route B: 3rd segment = product url (jab childcategory khaali ho)
        if(!$productdetailssql || !mysqli_num_rows($productdetailssql)){
            $productdetailssql = mysqli_query($con, "SELECT * FROM `products` WHERE status=1 AND url='$g3' LIMIT 1");
        }

        // Some child-category routes (such as /coil-zippers/5) identify a product by its label.
        if((!$productdetailssql || !mysqli_num_rows($productdetailssql)) && $childcategoryrow){
            $childcategorytitle = mysqli_real_escape_string($con, $childcategoryrow['title']);
            $childcategoryparentid = (int)$childcategoryrow['subcat_id'];
            $productdetailssql = mysqli_query($con, "SELECT * FROM `products` WHERE status=1 AND category='$childcategoryparentid' AND LEFT(title, CHAR_LENGTH('$childcategorytitle'))='$childcategorytitle' LIMIT 1");
        }

        $productdetailsrow = ($productdetailssql && mysqli_num_rows($productdetailssql)) ? mysqli_fetch_assoc($productdetailssql) : null;
        $productimagessql = false;

        if($productdetailsrow){
            $cattitle = "Product Details";
            $subtitle = $productdetailsrow['title'];
            $productsid = $productdetailsrow['id'];
            $breadcrumbtitle = $subtitle;
            $breadcrumblist = "<li><a href='{$path}{$caturl}'>$cattitle</a> <i class='fa fa-caret-right'></i></li><li>$breadcrumbtitle</li>";

            $productimagessql = mysqli_query($con, "SELECT * FROM `productimages` WHERE proid='$productsid'");

            // Parent category (hero lead line ke liye)
            $parentcatid = $productdetailsrow['category'];
            $parentsql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND id='$parentcatid'");
            $productscatrow = ($parentsql && mysqli_num_rows($parentsql)) ? mysqli_fetch_assoc($parentsql) : null;
        }else{
            // Product nahi mila -> listing page dikhao (blank detail page ki jagah)
            $geturl3 = '';
        }
    }

    if(empty($geturl3)){
        $productscatsql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND url='$geturl2'");
        $productscatrow = ($productscatsql && mysqli_num_rows($productscatsql)) ? mysqli_fetch_assoc($productscatsql) : null;
        $productscatid = $productscatrow['id'] ?? '';
        $productscaturl = $productscatrow['url'] ?? '';

        // Bare /our-products (koi child category nahi) -> pehli active product category dikhao
        if($productscatid === '' || $productscatid === null){
            $firstsql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND `type` = (SELECT `id` FROM `category` WHERE `url` = 'our-products' LIMIT 1) ORDER BY `order` ASC, `id` ASC LIMIT 1");
            if($firstsql && mysqli_num_rows($firstsql)){
                $productscatrow = mysqli_fetch_assoc($firstsql);
                $productscatid = $productscatrow['id'];
                $productscaturl = $productscatrow['url'];
                $subtitle = $productscatrow['title'];
                $breadcrumbtitle = $subtitle;
            }
        }

        $cattitle = "Our Products";
        $breadcrumbtitle = $subtitle;
        $breadcrumblist = "<li><a href='{$path}{$caturl}'>$cattitle</a> <i class='fa fa-caret-right'></i></li><li>$breadcrumbtitle</li>";

        $productsqlsc = mysqli_query($con, "SELECT * FROM `products` WHERE status=1 AND category='$productscatid'");
        if(!$productsqlsc){
            $productsqlsc = false;
        }
    }
?>