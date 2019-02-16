<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Street Food</title>
<!-- Stylesheets -->
<link href="css\style.css" rel="stylesheet">
<link href="css\responsive.css" rel="stylesheet">
<link rel="icon" href="images\icon1.ico" type="image/x-icon">

</head>
<!-- page wrapper -->
<body class="boxed_wrapper">
    <!-- .preloader -->
    <div class="preloader"></div>
    <!-- /.preloader -->
    <?php include "includes/header.php";?>
    <!--Page Title-->
    <section class="page-title centred">
        <div class="container">
            <div class="text">Posts for Street Food Category</div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- blog-side -->
    <section class="blog-side blog-style-one travel-section Street Food-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 content-side">
                    <div class="blog-details-content">
                        <div class="content-box overlay-item">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="images\StreetFood\6.jpg" alt="" width="200" height="400"></figure>
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="post1.php"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content-one sp-two">
                                <div class="top-content centred">
                                    <div class="meta-text"><a href="#">Street Food</a></div>
                                    <div class="title"><h3><a href="post1.php">About Street Food</a></h3></div>
                                    <div class="date"><span>On</span> August 10, 2019 &nbsp;&nbsp;<i class="flaticon-circle"></i>&nbsp;&nbsp;<span>By</span> Enass Gashout</div>
                                </div>
                                <div class="text">
                                    <p>Street Food is a type of prepared food sold on the streets and other public places. It is usually cheaper food than one sold in restaurants and it can be sold from a kiosk, portable food booth, food cart or food truck. ... People sold ready-to-eat food since the earliest civilizations.</p>

                                   <p></p>
                                </div>
                                <ul class="meta-list centred">
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                          <?php
                            global $con;
                            $query = "SELECT blogs.ID as blogID, blogIMG,addDate, FullName,blogTitle, blogDesc FROM blogs INNER JOIN users ON blogs.userID = users.ID WHERE specID = 1";
                            $stmt = $con->prepare($query);
                            $stmt->execute();
                            $results = $stmt->fetchAll();

                            if($stmt->rowCount() > 0) {
                              foreach($results as $result) {
                                 ?>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="content-box overlay-item">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="images\StreetFood\<?php echo $result['blogIMG']; ?>" alt=""></figure>
                                                <div class="overlay-box">
                                                    <div class="overlay-inner">
                                                        <div class="content">
                                                            <a href="post1.php?id=<?php echo $result['blogID']; ?>"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-content-one blog-content-two sp-three">
                                            <div class="top-content centred">
                                                <div class="meta-text"><a href="#">Street Food</a></div>
                                                <div class="title"><h4><a href="post1.php?id=<?php echo $result['blogID']; ?>"><?php echo $result['blogTitle']; ?></a></h4></div>
                                                <div class="date"><span>On</span> <?php echo $result['addDate']; ?> &nbsp;&nbsp;<i class="flaticon-circle"></i>&nbsp;&nbsp;<span>By</span> <?php echo $result['FullName']; ?></div>
                                            </div>
                                            <div class="text" style="height: 103px; overflow: hidden; wrap-text: wrap">
                                            <?php
                                                $desc = "";
                                                if(strlen($result['blogDesc']) > 250) {
                                                    $desc = substr($result['blogDesc'], 0, 250) . "...";
                                                } else {
                                                    $desc = $result['blogDesc'];
                                                }
                                                $desc = strtolower($desc);
                                                $desc = ucfirst($desc);
                                                echo $desc; ?>
                                            </div>
                                            <ul class="meta-list centred">
                                              <?php
                                                $commentsQuery = "SELECT * FROM comments WHERE blogID = :id";
                                                $stmt = $con->prepare($commentsQuery);
                                                $stmt->bindParam(":id", $result['blogID']);
                                                $stmt->execute();
                                                $comments = $stmt->rowCount();

                                                $likesQuery = "SELECT * FROM likes WHERE blogID = :id";
                                                $stmt = $con->prepare($likesQuery);
                                                $stmt->bindParam(":id", $result['blogID']);
                                                $stmt->execute();
                                                $likes = $stmt->rowCount();
                                              ?>
                                                <li>
                                                  <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> &nbsp; <?php echo $comments; ?> &nbsp; Comments </a> &nbsp;

                                                </li>
                                                <li><i class="flaticon-circle"></i> &nbsp; <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo $likes; ?> &nbsp; Likes </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                              }
                            } else { ?>

                              <div class="alert alert-danger">
                                No blogs were found
                              </div>

                            <?php
                            }
                          ?>

                        </div>

                    </div>
                </div>
                <?php include "includes/side-bar.php" ;?>
            </div>
        </div>
    </section>
    <!-- single shop end -->
<?php include "includes/footer.php"?>
<!--jquery js -->
<script type="text/javascript" src="js\jquery-2.1.4.js"></script>
<script src="js\bootstrap.min.js"></script>
<script src="js\owl.carousel.min.js"></script>
<script src="js\wow.js"></script>
<script src="js\validation.js"></script>
<script src="js\jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="js\SmoothScroll.js"></script>
<script src="js\html5lightbox\html5lightbox.js"></script>
<script src="js\bootstrap-select.min.js"></script>
<script src="js\nouislider.js"></script>
<script src="js\imagezoom.js"></script>
<script src="js\jquery.bxslider.min.js"></script>
<script src="js\jquery.bootstrap-touchspin.js"></script>
<script src="js\script.js"></script>
</body><!-- End of .page_wrapper -->
</html>
