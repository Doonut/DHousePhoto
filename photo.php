<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once 'vendor/autoload.php';

	\Cloudinary::config(array(
	  "cloud_name" => "dfnwplhxe",
	  "api_key" => "896959298152149",
	  "api_secret" => "b5FgCepAbTVYIei5Gb3qKw3oMIs"
	));	
    ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dalton House Photo</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="gallery/css/blueimp-gallery.min.css">

    <!-- Custom CSS -->
    <style>

        body {
            padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }

        .img-center {
        	margin: 0 auto;
        }

        footer {
            margin: 50px 0;
        }
    </style>
    <link rel="stylesheet" href="style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DHouse Photo</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="#">Photos</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>

    <!-- Page Content -->
    <div class="container">
        <div id="links">
        <?php
        $api = new \Cloudinary\Api();
        $result = $api->resources(array("max_results" => "500","type" => "upload", "prefix" => "concert/"));
        foreach($result["resources"] as $photo){
            ?>
            <a href="<?php echo $photo["url"] ?>" title="photo">
                <?php
                echo cl_image_tag($photo["public_id"] . ".jpg", array("crop" => "scale", "width" => 0.04));
                echo "\n";
                ?>
            </a>
            <?php
        }
        ?>
        </div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Dalton House 2016</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script type="text/javascript" src="slider/js/jquery-1.9.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="gallery/js/blueimp-gallery.min.js"></script>

    <script type="text/javascript">

document.getElementById('links').onclick = function (event) {
    event = event || window.event;
    var target = event.target || event.srcElement,
        link = target.src ? target.parentNode : target,
        options = {index: link, event: event},
        links = this.getElementsByTagName('a');
    blueimp.Gallery(links, options);
};
</script>
</body>
</html>
