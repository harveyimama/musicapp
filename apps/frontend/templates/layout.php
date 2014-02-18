<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <script type="text/javascript">
			$(window).load(function(){
				$('.slider')._TMS({
					duration:800,
					easing:'easeOutQuad',
					preset:'diagonalFade',
					pagination:false,
					slideshow:6000,
					banners:false,
					waitBannerAnimation:false,
					pauseOnHover:true
				});
				$("a[data-gal^='prettyVideo']").prettyPhoto({animation_speed:'normal',theme:'facebook',slideshow:false, autoplay_slideshow: false});
			}); 
		</script>	
    	<!--[if lt IE 7]>
			<div style=' clear: both; text-align:center; position: relative;'>
				<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
					<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
				</a>
			</div>
		<![endif]-->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5.js"></script>
			<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
		<![endif]-->
    </head>
  <body id="page1">
		<div class="extra">
<!--==============================header=================================-->
			<header>
				<div class="main">
					<nav>
						<div class="menu-bg-tail">
							<div class="menu-bg">
								<div class="container_12">
									<div class="grid_12">
										<ul class="menu">
											<li class="item"><a class="active" href="<?php echo url_for('@homepage')?>">Home</a></li>
											<li><a href="<?php echo url_for('@song')?>">Songs</a></li>
											<li><a href="<?php echo url_for('@album')?>">Albums</a></li>
											<li><a href="<?php echo url_for('@story')?>">Stories</a></li>
                                                                                        <li><a href="<?php echo url_for('@playlist')?>">Playlists</a></li>
										</ul>
										<div class="clear"></div>
									</div>
									<div class="clear">
                                                                           
                                                                        </div>
								</div>
							</div>
						</div>
					</nav>
					
				</div>
			</header>
<!--==============================content================================-->
			<section id="content"><div class="ic"></div>
                            <div class="main">
					<div class="bg-2">
                                             <?php echo $sf_content ?>  
						<div class="content-padding-1"> 
                                                  
							<div class="container_12">
                                                            
								<div class="wrapper">
									<article class="grid_4">
                                                                           
										<div class="padding-grid-1">
                                                                                     
										                                                                                
											<div class="wrapper img-indent-bot1">
												
												<div class="extra-wrap">
                                                                                                    
													<div class="indent-top">
														 
													</div>
												</div>
											</div>
											
											
										</div>
									</article>
									
								</div>
							</div>
						</div>
					</div>
						</div>
				<div class="block"></div>
			</section>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="main">
				<div class="footer-bg">
					<div class="container_12">
						<div class="wrapper">
							<div class="grid_12">
								<div class="footer-padding">
									<div class="wrapper">
										<span class="footer-link"><span>mamatech.com &copy; 2011</span> <a rel="nofollow" target="_blank" class="link" href="http://www.mamatech.com/">Webapp by</a> by mamatech.com</span>
										<ul class="list-services">
											<li><a class="tooltips n-1" title="Twitter" href="#"></a></li>
											<li><a class="tooltips n-2" title="Facebook" href="#"></a></li>
											<li class="last"><a class="tooltips n-3" title="Youtube" href="#"></a></li>
										</ul>
									</div>
									<div class="aligncenter">
										<!-- {%FOOTER_LINK} -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<script type="text/javascript"> Cufon.now(); </script>
	</body>
</html>
