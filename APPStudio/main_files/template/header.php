<?php 
   session_start();
   $user = $_SESSION['user'];
   require ('/../inc/lib.php');
	$SA = $_SESSION['SA'];
   $CG = $_SESSION['CG'];
   $DG = $_SESSION['DG'];
   $AG = $_SESSION['AG'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Application Studio</title>

    <!-- Bootstrap Core CSS -->
    <link href="/AppStudio/main_files/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/AppStudio/main_files/bower_components/metisMenu/src/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/AppStudio/main_files/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/AppStudio/main_files/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/AppStudio/main_files/css/image-map-pro.min.css">
    <link rel="stylesheet" href="/AppStudio/main_files/css/squares.min.css">
    <link rel="stylesheet" href="/AppStudio/main_files/css/styles.css">
    <link rel="stylesheet" href="/AppStudio/main_files/css/date.css">
    <script src="/AppStudio/main_files/js/angular.min.js"></script>
    <script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
    <link href="http://www.aafa.org/themes/kfa-new-theme/include/statehonorroll.css" rel="stylesheet" />
    <script type="text/javascript">
        var app = angular.module('ESGApp', [])
        app.controller('ESGController', function ($scope) {
            //This will hide the DIV by default.
            $scope.IsVisible = false;
            $scope.ShowHide = function () {
                //If DIV is visible it will be hidden and vice versa.
                $scope.IsVisible = $scope.ShowGroupInfo;
            }
        });
    </script>
    <style type="text/css">
    	 .custom .date-fields {visibility: hidden;}
 .custom input[value="custom"]:checked ~ .date-fields {visibility: visible;}
 
    	
    	
    </style>
     
</head>
