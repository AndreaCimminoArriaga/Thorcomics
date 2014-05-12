<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php 
        $title= (isset($global['title'])) ? $global['title'] : $global['site.title'];
        echo $global['site.name'] .' | '. $title;
      ?>
    </title>
    <meta name="description" content="">
    <meta name="author" content="<?php echo $global['author.name']; ?>">
    <link rel="shortcut icon" href="/favicon.ico">	

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $global['assets.prefix'];?>/themes/classic/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $global['assets.prefix'];?>/themes/classic/assets/css/bootstrap-responsive.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
    <link href="<?php echo $global['assets.prefix'];?>/themes/classic/assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if($global['google.analytics']){?>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '<?php echo $global['google.analytics']; ?>']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
      $(function(){
        $('.dropdown-toggle').dropdown()  
      })
  </script>
  <?php }?>
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="<?php if($global["route"] == "/") echo "active";?>">Home</a>
          <a class="blog-nav-item" href="#">New features</a>
          <a class="blog-nav-item" href="#">Press</a>
          <a class="blog-nav-item" href="<?php if($global["route"] == "archives") echo "active";?>">Archives</a>
          <a class="blog-nav-item" href="<?php if($global["route"] == "about") echo "active";?>">About</a>
        </nav>
      </div>
    </div>
	
    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title"><?php echo $global['site.name'];?></h1>
        <p class="lead blog-description"><?php echo $global['site.title'];?></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
          <?php echo $content; ?>
        </div>

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
            <ol class="list-unstyled">
                <?php
                  foreach ($global['categories'] as $slug => $category) {
                    echo '<li><a tabindex="-1" href="/category/'.$slug.'">'. $category .'</a></li>';
                  }
                ?>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->
		
      </div>
    </div>

    <div class="blog-footer">
      <p>Powered by TextPress. &copy; <a href="http://blog.shameerc.com" target="_blank">Shameer C</a> 2013.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <script type="text/javascript" src="<?php echo $global['assets.prefix'];?>/themes/textpress/assets/js/bootstrap.min.js"></script>
  </body>
</html>