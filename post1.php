﻿<?php include "includes/connect.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>POST DETAILS</title>

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
    <?php include "includes/header.php" ;?>

    <?php if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql = " SELECT blogs.blogIMG , catName , blogs.blogTitle , blogs.addDate , FullName , blogs.blogDesc from blogs
        INNER JOIN users ON blogs.userID = users.ID
        INNER JOIN categories ON blogs.specID = categories.ID where blogs.ID = ? " ;
        global $con ;
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $result = $query->fetch();


     ?>
    <!-- blog side -->
    <section class="blog-side sp-seven blog-style-one standard-post sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 content-side">
                    <div class="blog-details-content">
                        <figure><img src="images\blog\<?php echo $result['blogIMG']; ?>" alt=""></figure>
                        <div class="blog-content-one sp-three">
                            <div class="top-content centred">
                                <div class="meta-text"><?php echo $result['catName'] ; ?></div>
                                <div class="title"><h3><?php echo $result['blogTitle'];?></h3></div>
                                <div class="date"><?php echo $result['addDate'] ?>&nbsp;&nbsp;<i class="flaticon-circle"></i>&nbsp;&nbsp; <?php echo $result['FullName'] ; ?></div>
                            </div>
                            <div class="text-style-one">
                                
                                <p> <?php echo $result['blogDesc'] ;?>
                                </p>
                            </div>
                            
                            <div class="about-content-two">
                            </div>
                            <hr>
                            <ul class=" centred">
                                <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp; 37</a> &nbsp; <i class="flaticon-circle"></i> &nbsp; <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp; 20</a></li>
                                <hr>
                            </ul>
                            
                        </div>
    <?php } ?>
                        <div class="comment-area">
                            <div class="title-text-two" style="border: #f3a28b solid 1px ; padding: 10px"> COMMENTS</div>
                            <div class="single-comment">
                                <div class="img-box"><figure><img src="images\news\c1.jpeg" alt=""></figure></div>
                                <div class="comment-title">ADAM GILGRIST</div>
                                <div class="comment-time">8 MINS AGO</div>
                                <div class="text">
                                    <p>The days are all Happy and Free these days you wanna be where everybody knows your name fish do to no burn on the grill took a whole lotta trying just to get up that wet floor.</p>
                                </div>
                            </div>
                            <div class="single-comment">
                                <div class="img-box"><figure><img src="images\news\c3.jpeg" alt=""></figure></div>
                                <div class="comment-title">NIA JASS</div>
                                <div class="comment-time">5 MINS AGO</div>
                                <div class="text">
                                    <p>The days are all Happy and Free these days you wanna be where everybody knows your name fish do to no burn on the grill took a whole lotta trying just to get up that wet floor.</p>
                                </div>
                            </div>
                            <div class="single-comment">
                                <div class="img-box"><figure><img src="images\news\c4.jpeg" alt=""></figure></div>
                                <div class="comment-title">JASON ROY</div>
                                <div class="comment-time">1 WEEK AGO</div>
                                <div class="text">
                                    <p>The days are all Happy and Free these days you wanna be where everybody knows your as  on the grill took a whole lotta trying just to get up that wet floor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <div class="title-text-two">WRITE YOUR COMMENTS</div>
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea placeholder="Enter your comments here..." name="message" required=""></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                        <input type="text" name="name" value="" placeholder="Name" required="">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                        <input type="email" name="email" value="" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                        <input type="text" name="subject" value="" placeholder="Website" required="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn-one">POST COMMENT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				<?php include "includes/side-bar.php" ;?>
                
            </div>
        </div>
		
    </section>
    <!-- blog side end --> 
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
<script src="js\script.js"></script>
</body><!-- End of .page_wrapper -->
</html>
