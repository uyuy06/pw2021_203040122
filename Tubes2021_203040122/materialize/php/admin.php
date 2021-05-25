<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
// menghubungkan dengan file php lain nya
require 'functions.php';
//melakukan query
if (isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $books = query("SELECT * FROM tools WHERE
            Name LIKE '%$keyword%' OR
            Duration LIKE '%$keyword%' OR
            Price LIKE '%$keyword%' 
            ");
} else {
    $books = query("SELECT * FROM tools");
}




?>

<!DOCTYPE html>
<html>
    <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../css/stylee.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>KARAKORAM K2</title>
    </head>

    <body class="black">

        <div class="navbar-fixed">
            <nav class="black">
                <div class="container">
                <div class="nav-wrapper">
                <img src="../assets/img/logo.png" alt="">
                <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#about">About</a></li>
                    <li><a href="#product">Product</a></li>
                    <li><a href="#testimoni">Testimoni</a></li>
                    <li><a href="#booking">Booking</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                </div>
                </div>
            </nav>
        </div>

        <ul class="sidenav black" id="mobile-nav">
            <li><a href="#about">About</a></li>
            <li><a href="#product">Product</a></li>
            <li><a href="#testimoni">Testimoni</a></li>
            <li><a href="#booking">Booking</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>


        <div class="slider">
            <ul class="slides">
                <li>
                <img src="../assets/img/slideshow/Slideshow1.png"> <!-- random image -->
                <div class="caption center-align">
                    <h3>KARAKORAM K2</h3>
                    <h5 class="light grey-text text-lighten-3">United with Nature.</h5>
                </div>
                </li>

                <li>
                    <img src="../assets/img/slideshow/Slideshow2.png"> <!-- random image -->
                    <div class="caption left-align">
                        <h3>KARAKORAM K2</h3>
                        <h5 class="light grey-text text-lighten-3">United with Nature.</h5>
                    </div>
                    </li>

                    <li>
                        <img src="../assets/img/slideshow/Slideshow3.png"> <!-- random image -->
                        <div class="caption right-align">
                            <h3>KARAKORAM K2</h3>
                            <h5 class="light grey-text text-lighten-3">United with Nature.</h5>
                        </div>
                        </li>
            </ul>
            </div>

            <section id="about" class="about scrollspy">
            <div class="container">
                <div class="row">
                    <div class="col m4 white-text">
                        <h4>AVAILABLE.</h4>
                        <h6>Camping tools</h6>
                    </div>
                    <div class="col m8 white-text">
                        <p>Various Tents</p>
                        <div class="progress">
                            <div class="determinate red" style="width: 95%"></div>
                        </div>
                        <p>Sleeping Bag</p>
                        <div class="progress">
                            <div class="determinate red" style="width: 80%"></div>
                        </div>
                        <p>Cooking Equipment</p>
                        <div class="progress">
                            <div class="determinate red" style="width: 85%"></div>
                        </div>
                        <p>Flashlight and Headlamp</p>
                        <div class="progress">
                            <div class="determinate red" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div>
            </section>

            <section id="product" class="product scrollspy">
                <div class="container">
                <div class="add mb-3 waves-effect waves-light btn-small" style=" background-color: white;  width:130px" ;>
                    <a href="tambah.php">Add Data</a>
                </div>
                <form action="" method="get" style="float: right;">
                    <span class="material-icons white-text" style="float: right;">
                        search</span>
                    <button type="submit" name="cari" class="btn btn-outline-success rounded-pill transparent" style=float:right;></button>
                    <input type="text" name="keyword" size="25" class="rounded-pill" placeholder="Search Here!" autofocus style="color: white;">
                </form>
                <div class="float-md-start">
                    <table class="highlight">
                        <thead>
                            <tr class="white">
                                <th scope="col">NO</th>
                                <th scope="col">Opition</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Name</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($books)) : ?>
                                <tr>
                                    <td colspan="7" style="color: white;">
                                        <h1>Data tidak ditemukan</h1>
                                    </td>
                                </tr>
                            <?php else : ?>
                                <?php $i = 1 ?>
                                <?php foreach ($books as $book) : ?>
                                    <tr class="white-text">

                                        <th scope="row"><?= $i ?></th>
                                        <td>
                                            <a href="ubah.php?id=<?= $book['id'] ?>"><button class="waves-effect waves-light btn-small white black-text">Change</button></a>
                                            <a href="hapus.php?id=<?= $book["id"]; ?>" onclick="return confirm('yakin?');"><button class="waves-effect waves-light btn-small black white-text">Delete</button></a>
                                        </td>
                                        <td><img src="../assets/img/product/<?= $book["Picture"]; ?>"></td>
                                        <td><?= $book["Name"] ?></td>
                                        <td><?= $book["Duration"] ?></td>
                                        <td><?= $book["Price"] ?></td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
        </section>


            <section id="testimoni" class="testimoni scrollspy">
                <div class="container">
                    <div class="row">
                        <h4 class="white-text center">Testimoni</h4>
                        <div class="col m4 s12">
                            <img src="../assets/img/testimoni/1.png" class="responsive-img materialboxed" alt="">
                        </div>
                        <div class="col m4 s12">
                            <img src="../assets/img/testimoni/2.png" class="responsive-img materialboxed" alt="">
                        </div>
                        <div class="col m4 s12">
                            <img src="../assets/img/testimoni/3.png" class="responsive-img materialboxed" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m4 s12">
                            <img src="../assets/img/testimoni/4.png" class="responsive-img materialboxed" alt="">
                        </div>
                        <div class="col m4 s12">
                            <img src="../assets/img/testimoni/5.png" class="responsive-img materialboxed" alt="">
                        </div>
                        <div class="col m4 s12">
                            <img src="../assets/img/testimoni/6.png" class="responsive-img materialboxed" alt="">
                        </div>
                    </div>
                </div>
            </section>


            <section id="booking" class="booking scrollspy">
                <div class="container">
                    <h4 class="white-text">Message Below.</h4>
                    <div class="row">
                        <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="Your-name" type="text" class="validate white-text">
                            <label for="your name">Your Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="address" type="text" class="validate white-text">
                            <label for="address">Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="the-item-ordered" type="text" class="validate white-text">
                            <label for="the item ordered">The Item Ordered</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="total-items" type="text" class="validate white-text">
                            <label for="total items">Total Items</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate white-text">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light white-text" type="reset" name="action">Send
                        <i class="material-icons right">send</i>
                    </button>
                    </div>
                        </div>
                        </form>
                    </div>
                </div>
            </section>


            <section id="location" class="location scrollspy">
                <div class="container">
                    <div class="row center">
                        <div class="col m12">
                            <ul class="collection with-header">
                                <li class="collection-header  black">Location</li>
                                <li class="collection-item  black">KARAKORAM K2.</li>
                                <li class="collection-item  black">Jl. Setiabudhi No. 29, Bandung</li>
                                <li class="collection-item  black">West Java, Indonesia</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <div class="footer">
                <p>Karakoram K2.  Copyright 2018.</p>
            </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script>
        const sidenav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sidenav);

        const slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
            indicators: false,
            height: 550,
            transition: 600,
            interval: 3000
        });

        const parallax = document.querySelectorAll('.parallax');
        M.Parallax.init(parallax);

        const materialbox = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(materialbox);

        const scroll = document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(scroll, {
            scrollOffset:70
        });
    </script>
    </body>
</html>