<?php

    if($geturl3){
        $childcategorysql = mysqli_query($con, "SELECT * FROM `childcategory` WHERE status=1 AND url='$geturl3'");
        $childcategoryrow = mysqli_fetch_assoc($childcategorysql);
        $childcategoryid = $childcategoryrow['id'];

        $productdetailssql = mysqli_query($con, "SELECT * FROM `products` WHERE status=1 AND childcategory='$childcategoryid'");
        $productdetailsrow = mysqli_fetch_assoc($productdetailssql);
        $cattitle = "Product Details";
        $subtitle = $productdetailsrow['title'];
        $productsid = $productdetailsrow['id'];
        $breadcrumbtitle = $subtitle;
        $breadcrumblist = "<li><a href='{$path}{$caturl}'>$cattitle</a> <i class='fa fa-caret-right'></i></li><li>$breadcrumbtitle</li>";

        $productimagessql = mysqli_query($con, "SELECT * FROM `productimages` WHERE proid='$productsid'");

        // Parent category (hero lead line ke liye)
        $parentcatid = $productdetailsrow['category'];
        $parentsql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND id='$parentcatid'");
        $productscatrow = mysqli_fetch_assoc($parentsql);
    }
    else{
        $productscatsql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND url='$geturl2'");
        $productscatrow = mysqli_fetch_assoc($productscatsql);
        $productscatid = $productscatrow['id'];
        $productscaturl = $productscatrow['url'];
        $cattitle = "Our Products";
        $breadcrumbtitle = $subtitle;
        $breadcrumblist = "<li><a href='{$path}{$caturl}'>$cattitle</a> <i class='fa fa-caret-right'></i></li><li>$breadcrumbtitle</li>";

        $productsqlsc = mysqli_query($con, "SELECT * FROM `products` WHERE status=1 AND category='$productscatid'");
    }
?>