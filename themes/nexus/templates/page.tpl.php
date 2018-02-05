<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<div id="page">
  <header id="header" class="site-header header" role="banner">
    <div class="container">
      <figure class="logo animated fadeInDown delay-07s">
          <a href="#"><img src="images/logo.png" alt=""></a> 
        </figure> 
        <h1 class="animated fadeInDown delay-07s">Welcome To Knight Studios</h1>
        <ul class="we-create animated fadeInUp delay-1s">
          <li>We are a digital agency that loves crafting beautiful websites.</li>
        </ul>
            <a class="link animated fadeInUp delay-1s servicelink" href="#service">Get Started</a>
    </div>
  </header>
  <nav class="main-nav-outer" id="navigation" role="navigation"><!--main-nav-start-->
    <div class="container" id="main-menu">
          <?php 
              if (module_exists('i18n_menu')) {
                $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
              } else {
                $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
              }
              print drupal_render($main_menu_tree);
            ?>
    </div>
  </nav><!--main-nav-end-->


<section class="main-section" id="service"><!--main-section-start-->
  <div class="container">
      <h2>Services</h2>
      <h6>We offer exceptional service with complimentary hugs.</h6>
        <div class="row">
          <div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s">
              <div class="service-list">
                  <div class="service-list-col1">
                      <i class="fa-paw"></i>
                    </div>
                  <div class="service-list-col2">
                        <h3>branding &amp; identity</h3>
                        <p>Proin iaculis purus digni consequat sem digni ssim. Donec entum digni ssim.</p>
                    </div>
                </div>
                <div class="service-list">
                  <div class="service-list-col1">
                      <i class="fa-gear"></i>
                    </div>
                  <div class="service-list-col2">
                        <h3>web development</h3>
                        <p>Proin iaculis purus consequat sem digni ssim. Digni ssim porttitora .</p>
                    </div>
                </div>
                <div class="service-list">
                  <div class="service-list-col1">
                      <i class="fa-apple"></i>
                    </div>
                  <div class="service-list-col2">
                        <h3>mobile design</h3>
                        <p>Proin iaculis purus consequat digni sem digni ssim. Purus donec porttitora entum.</p>
                    </div>
                </div>
                <div class="service-list">
                  <div class="service-list-col1">
                      <i class="fa-medkit"></i>
                    </div>
                  <div class="service-list-col2">
                        <h3>24/7 Support</h3>
                        <p>Proin iaculis purus consequat sem digni ssim. Sem porttitora entum.</p>
                    </div>
                </div>
            </div>
            <figure class="col-lg-8 col-sm-6  text-right wow fadeInUp delay-02s">
              <img src="images/macbook-pro.png" alt="">
            </figure>
        
        </div>
  </div>
</section><!--main-section-end-->

<?php print base_path() . drupal_get_path('theme', 'nexus').'/'; ?> 

<section class="main-section alabaster"><!--main-section alabaster-start-->
  <div class="container">
      <div class="row">
      <figure class="col-lg-5 col-sm-4 wow fadeInLeft">
              <img  src="images/iphone.png" alt="">
            </figure>
          <div class="col-lg-7 col-sm-8 featured-work">
              <h2>featured work</h2>
              <P class="padding-b">Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit.</P>
              <div class="featured-box">
                  <div class="featured-box-col1 wow fadeInRight delay-02s">
                      <i class="fa-magic"></i>
                    </div>  
                  <div class="featured-box-col2 wow fadeInRight delay-02s">
                        <h3>magic of theme development</h3>
                        <p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. </p>
                    </div>    
                </div>
                <div class="featured-box">
                  <div class="featured-box-col1 wow fadeInRight delay-04s">
                      <i class="fa-gift"></i>
                    </div>  
                  <div class="featured-box-col2 wow fadeInRight delay-04s">
                        <h3>neatly packaged</h3>
                        <p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. </p>
                    </div>    
                </div>
                <div class="featured-box">
                  <div class="featured-box-col1 wow fadeInRight delay-06s">
                      <i class="fa-dashboard"></i>
                    </div>  
                  <div class="featured-box-col2 wow fadeInRight delay-06s">
                        <h3>SEO optimized</h3>
                        <p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. </p>
                    </div>    
                </div>
                <a class="Learn-More" href="#">Learn More</a>
            </div>
        </div>
  </div>
</section><!--main-section alabaster-end-->



<section class="main-section paddind" id="Portfolio"><!--main-section-start-->
  <div class="container">
      <h2>Portfolio</h2>
      <h6>Fresh portfolio of designs that will keep you wanting more.</h6>
      <div class="portfolioFilter">  
        <ul class="Portfolio-nav wow fadeIn delay-02s">
          <li><a href="#" data-filter="*" class="current" >All</a></li>
            <li><a href="#" data-filter=".branding" >Branding</a></li>
            <li><a href="#" data-filter=".webdesign" >Web design</a></li>
            <li><a href="#" data-filter=".printdesign" >Print design</a></li>
            <li><a href="#" data-filter=".photography" >Photography</a></li>
        </ul>
       </div> 
        
  </div>
    <div class="portfolioContainer wow fadeInUp delay-04s">
              <div class=" Portfolio-box printdesign">
                  <a href="#"><img src="images/Portfolio-pic1.jpg" alt=""></a> 
                  <h3>Foto Album</h3>
                    <p>Print Design</p>
                </div>
                <div class="Portfolio-box webdesign">
                  <a href="#"><img src="images/Portfolio-pic2.jpg" alt=""></a> 
                  <h3>Luca Theme</h3>
                    <p>Web Design</p>
                </div>
                <div class=" Portfolio-box branding">
                  <a href="#"><img src="images/Portfolio-pic3.jpg" alt=""></a> 
                  <h3>Uni Sans</h3>
                    <p>Branding</p>
                </div>
                <div class=" Portfolio-box photography" >
                  <a href="#"><img src="images/Portfolio-pic4.jpg" alt=""></a> 
                  <h3>Vinyl Record</h3>
                    <p>Photography</p>
                </div>
                <div class=" Portfolio-box branding">
                  <a href="#"><img src="images/Portfolio-pic5.jpg" alt=""></a> 
                  <h3>Hipster</h3>
                    <p>Branding</p>
                </div>
                <div class=" Portfolio-box photography">
                  <a href="#"><img src="images/Portfolio-pic6.jpg" alt=""></a> 
                  <h3>Windmills</h3>
                    <p>Photography</p>
                </div>
    </div>
</section><!--main-section-end-->


<section class="main-section client-part" id="client"><!--main-section client-part-start-->
  <div class="container">
    <b class="quote-right wow fadeInDown delay-03"><i class="fa-quote-right"></i></b>
      <div class="row">
          <div class="col-lg-12">
              <p class="client-part-haead wow fadeInDown delay-05">It was a pleasure to work with the guys at Knight Studio. They made sure 
we were well fed and drunk all the time!</p>
            </div>
        </div>
      <ul class="client wow fadeIn delay-05s">
          <li><a href="#">
              <img src="images/client-pic1.jpg" alt="">
                <h3>James Bond</h3>
                <span>License To Drink Inc.</span>
            </a></li>
        </ul>
    </div>
</section><!--main-section client-part-end-->
<div class="c-logo-part"><!--c-logo-part-start-->
  <div class="container">
      <ul>
          <li><a href="#"><img src="images/c-liogo1.png" alt=""></a></li>
            <li><a href="#"><img src="images/c-liogo2.png" alt=""></a></li>
            <li><a href="#"><img src="images/c-liogo3.png" alt=""></a></li>
            <li><a href="#"><img src="images/c-liogo4.png" alt=""></a></li>
            <li><a href="#"><img src="images/c-liogo5.png" alt=""></a></li>
      </ul>
  </div>
</div><!--c-logo-part-end-->
<section class="main-section team" id="team"><!--main-section team-start-->
  <div class="container">
        <h2>team</h2>
        <h6>Take a closer look into our amazing team. We won’t bite.</h6>
        <div class="team-leader-block clearfix">
            <div class="team-leader-box">
                <div class="team-leader wow fadeInDown delay-03s"> 
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="images/team-leader-pic1.jpg" alt="">
                    <ul>
                        <li><a href="#" class="fa-twitter"></a></li>
                        <li><a href="#" class="fa-facebook"></a></li>
                        <li><a href="#" class="fa-pinterest"></a></li>
                        <li><a href="#" class="fa-google-plus"></a></li>
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-03s">Walter White</h3>
                <span class="wow fadeInDown delay-03s">Chief Executive Officer</span>
                <p class="wow fadeInDown delay-03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>
            </div>
            <div class="team-leader-box">
                <div class="team-leader  wow fadeInDown delay-06s"> 
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="images/team-leader-pic2.jpg" alt="">
                    <ul>
                        <li><a href="#" class="fa-twitter"></a></li>
                        <li><a href="#" class="fa-facebook"></a></li>
                        <li><a href="#" class="fa-pinterest"></a></li>
                        <li><a href="#" class="fa-google-plus"></a></li>
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-06s">Jesse Pinkman</h3>
                <span class="wow fadeInDown delay-06s">Product Manager</span>
                <p class="wow fadeInDown delay-06s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>
            </div>
            <div class="team-leader-box">
                <div class="team-leader wow fadeInDown delay-09s"> 
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="images/team-leader-pic3.jpg" alt="">
                    <ul>
                        <li><a href="#" class="fa-twitter"></a></li>
                        <li><a href="#" class="fa-facebook"></a></li>
                        <li><a href="#" class="fa-pinterest"></a></li>
                        <li><a href="#" class="fa-google-plus"></a></li>
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-09s">Skyler white</h3>
                <span class="wow fadeInDown delay-09s">Accountant</span>
                <p class="wow fadeInDown delay-09s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>
            </div>
        </div>
    </div>
</section><!--main-section team-end-->



<section class="business-talking"><!--business-talking-start-->
  <div class="container">
        <h2>Let’s Talk Business.</h2>
    </div>
</section><!--business-talking-end-->
<div class="container">
<section class="main-section contact" id="contact">
  
        <div class="row">
          <div class="col-lg-6 col-sm-7 wow fadeInLeft">
              <div class="contact-info-box address clearfix">
                  <h3><i class=" icon-map-marker"></i>Address:</h3>
                  <span>308 Negra Arroyo Lane<br>Albuquerque, New Mexico, 87111.</span>
                </div>
                <div class="contact-info-box phone clearfix">
                  <h3><i class="fa-phone"></i>Phone:</h3>
                  <span>1-800-BOO-YAHH</span>
                </div>
                <div class="contact-info-box email clearfix">
                  <h3><i class="fa-pencil"></i>email:</h3>
                  <span>hello@knightstudios.com</span>
                </div>
              <div class="contact-info-box hours clearfix">
                  <h3><i class="fa-clock-o"></i>Hours:</h3>
                  <span><strong>Monday - Thursday:</strong> 10am - 6pm<br><strong>Friday:</strong> People work on Fridays now?<br><strong>Saturday - Sunday:</strong> Best not to ask.</span>
                </div>
                <ul class="social-link">
                  <li class="twitter"><a href="#"><i class="fa-twitter"></i></a></li>
                    <li class="facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                    <li class="pinterest"><a href="#"><i class="fa-pinterest"></i></a></li>
                    <li class="gplus"><a href="#"><i class="fa-google-plus"></i></a></li>
                    <li class="dribbble"><a href="#"><i class="fa-dribbble"></i></a></li>
                </ul>
            </div>
          <div class="col-lg-6 col-sm-5 wow fadeInUp delay-05s">
              <div class="form">
                  
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control input-text" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control input-text" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-text" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-text text-area" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation"></div>
                        </div>
                        
                        <div class="text-center"><button type="submit" class="input-btn">Send Message</button></div>
                    </form>
                </div>  
            </div>
        </div>
</section>
</div>



  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="fcred col-sm-12">
          <?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>. 
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false    
            
        });
        
    });
</script>

  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
  </script>


<script type="text/javascript">
  $(window).load(function(){
    
    $('.main-nav li a, .servicelink').bind('click',function(event){
      var $anchor = $(this);
      
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top - 102
      }, 1500,'easeInOutExpo');
      /*
      if you don't want to use the easing effects:
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
      }, 1000);
      */
      if ($(window).width() < 768 ) { 
        $('.main-nav').hide(); 
      }
      event.preventDefault();
    });
  })
</script>

<script type="text/javascript">

$(window).load(function(){
  
  
  var $container = $('.portfolioContainer'),
      $body = $('body'),
      colW = 375,
      columns = null;

  
  $container.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colW
    }
  });
  
  $(window).smartresize(function(){
    // check if columns has changed
    var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
    if ( currentColumns !== columns ) {
      // set new column count
      columns = currentColumns;
      // apply width to container manually, then trigger relayout
      $container.width( columns * colW )
        .isotope('reLayout');
    }
    
  }).smartresize(); // trigger resize to set container width
  $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
      
            filter: selector,
         });
         return false;
    });
  
});

</script>