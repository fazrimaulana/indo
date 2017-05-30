<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Indowebstore</title>

    <!-- CSS-->
    <link href="{{ url('/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/frontend/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/frontend/css/font-awesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ url('/frontend/js/bootstrap.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="header hidden-xs">
      <div class="container header-content">
        <div class="col-md-4 col-sm-4 left">
          <ul class="nav nav-pills">
           @if (Route::has('login'))
            <li role="presentation">
              @if (!Auth::check()) 
                <a href="{{ url('/register') }}" class="account">
                  <i class="fa fa-" aria-hidden="true"></i> Daftar
                </a>
              @endif
            </li>
           
            <li role="presentation">
               @if (Auth::check())             
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
              </button>
              <ul class="dropdown-menu dropdown-custom" role="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-user" aria-hidden="true"></i> My Account
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-cogs" aria-hidden="true"></i> Account Setting
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out
                  </a>
                </li>
              </ul><!--END OF .DROPDOWN-CUSTOM-->
              @else
                  <a href="{{ url('/login') }}">
                    <i class="fa fa-sign-in" aria-hidden="true"></i> Log In
                  </a>
              @endif      
            </li>
            @endif
          </ul><!--END OF .NAV-->
        </div><!--END OF .LEFT-->
        <div class="col-md-4 col-sm-4 mid">
          <div class="logo">
            <a href="#">
              <h1>INDOWEBSTORE</h1>
            </a>
          </div>
        </div><!--END OF .MID-->
        <div class="col-md-4 col-sm-4 right">
           <ul class="nav navbar-nav navbar-right">
             <li>
               <form class="navbar-form">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                      </button>
                    </div>
                  </div>
                </form><!--END OF .NAVBAR-FORM-->
             </li>
             <li>
               <button type="button" class="btn btn-default dropdown-toggle dropdown" data-toggle="dropdown">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge">2</span>
               </button>
               <ul class="dropdown-menu dropdown-custom" role="menu">
                <li>
                  <div class="list-cart">
                    <div class="left-cart col-md-3 col-sm-3">
                      <div class="image">
                        <div class="wr-image">
                          <img src="{{ url('/frontend/images/icon-shop2.jpeg') }}">
                        </div>
                      </div>
                    </div><!--END OF .LEFT-CART-->
                    <div class="right-cart col-md-9 col-sm-9">
                      <div class="heading-item">
                        <div class="title-cart pull-left">
                          <a href="#">
                            <p>Nama Barang</p>
                          </a>
                        </div>
                        <div class="hapus-cart pull-right">
                          <button class="btn">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </button>
                        </div>
                        <div class="clearfix"></div>
                      </div><!--END OF .HEADING-ITEM-->
                      <div class="detail-item">
                        <table>
                          <tr>
                            <td class="code-item">
                              <p>Code: 11111</p>
                            </td>
                            <td class="jumlah-item">
                              <p>X 1</p>
                            </td>
                            <td class="harga-item">
                              <p>Rp.100.000</p>
                            </td>
                          </tr>
                        </table>
                      </div><!--END OF .DETAIL-ITEM-->
                    </div><!--END OF .RIGHT-CART-->
                    <div class="clearfix"></div>
                  </div><!--END OF .LIST-CART-->
                </li>
                <li>
                  <div class="list-cart">
                    <div class="left-cart col-md-3 col-sm-3">
                      <div class="image">
                        <div class="wr-image">
                          <img src="{{ url('/frontend/images/icon-shop1.jpeg') }}">
                        </div>
                      </div>
                    </div><!--END OF .LEFT-CART-->
                    <div class="right-cart col-md-9 col-sm-9">
                      <div class="heading-item">
                        <div class="title-cart pull-left">
                          <a href="#">
                            <p>Nama Barang</p>
                          </a>
                        </div>
                        <div class="hapus-cart pull-right">
                          <button class="btn">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </button>
                        </div>
                        <div class="clearfix"></div>
                      </div><!--END OF .HEADING-ITEM-->
                      <div class="detail-item">
                        <table>
                          <tr>
                            <td class="code-item">
                              <p>Code: 11111</p>
                            </td>
                            <td class="jumlah-item">
                              <p>X 1</p>
                            </td>
                            <td class="harga-item">
                              <p>Rp.100.000</p>
                            </td>
                          </tr>
                        </table>
                      </div><!--END OF .DETAIL-ITEM-->
                    </div><!--END OF .RIGHT-CART-->
                    <div class="clearfix"></div>
                  </div><!--END OF .LIST-CART-->
                </li>
                <li>
                  <div class="view-checkout">
                    <div class="view-cart col-md-6 col-sm-6">
                      <a href="#" class="btn">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> VIEW CART
                      </a>
                    </div>
                     <div class="checkout col-md-6 col-sm-6">
                       <a href="#" class="btn checkout">
                         <i class="fa fa-money" aria-hidden="true"></i> CHECKOUT
                       </a>
                     </div>
                     <div class="clearfix"></div>
                  </div>
                </li>
              </ul><!--END OF .DROPDOWN-CUSTOM-->
             </li>
           </ul><!--END OF .NAVBAR-RIGHT-->
        </div><!--END OF .RIGHT-->
      </div><!--END OF .HEADER-CONTENT-->
    </div><!--END OF .HEADER-->

    <div class="header-fix visible-xs">
      <div class="wr-header-fix container">
        <div class="logo">
          <a href="#">
            <img src="{{ url('/frontend/images/idws-logo.png') }}" class="img-responsive">
          </a>
        </div><!--END OF .LOGO-->
        <div class="navigator">
          <div class="row">
            <div class="navi col-xs-2">
              <button type="button" class="btn" id="show-menu">
                <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
              </button>
            </div><!--END OF .NAVI-->
            <div class="cart col-xs-10">
              <button type="button" class="btn btn-default dropdown-toggle dropdown pull-right" data-toggle="dropdown">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge">2</span>
              </button>
              <ul class="dropdown-menu dropdown-custom" role="menu">
                <li>
                  <div class="list-cart">
                    <div class="left-cart col-xs-3">
                      <div class="image">
                        <div class="wr-image">
                          <img src="{{ url('/frontend/images/icon-shop2.jpeg') }}">
                        </div>
                      </div>
                    </div><!--END OF .LEFT-CART-->
                    <div class="right-cart col-xs-9">
                      <div class="heading-item">
                        <div class="title-cart pull-left">
                          <a href="#">
                            <p>Nama Barang</p>
                          </a>
                        </div>
                        <div class="hapus-cart pull-right">
                          <button class="btn">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </button>
                        </div>
                        <div class="clearfix"></div>
                      </div><!--END OF .HEADING-ITEM-->
                      <div class="detail-item">
                        <table>
                          <tr>
                            <td class="code-item">
                              <p>Code: 11111</p>
                            </td>
                            <td class="jumlah-item">
                              <p>X 1</p>
                            </td>
                            <td class="harga-item">
                              <p>Rp.100.000</p>
                            </td>
                          </tr>
                        </table>
                      </div><!--END OF .DETAIL-ITEM-->
                    </div><!--END OF .RIGHT-CART-->
                    <div class="clearfix"></div>
                  </div><!--END OF .LIST-CART-->
                </li>
                <li>
                  <div class="list-cart">
                    <div class="left-cart col-xs-3">
                      <div class="image">
                        <div class="wr-image">
                          <img src="{{ url('/frontend/images/icon-shop1.jpeg') }}">
                        </div>
                      </div>
                    </div><!--END OF .LEFT-CART-->
                    <div class="right-cart col-xs-9">
                      <div class="heading-item">
                        <div class="title-cart pull-left">
                          <a href="#">
                            <p>Nama Barang</p>
                          </a>
                        </div>
                        <div class="hapus-cart pull-right">
                          <button class="btn">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </button>
                        </div>
                        <div class="clearfix"></div>
                      </div><!--END OF .HEADING-ITEM-->
                      <div class="detail-item">
                        <table>
                          <tr>
                            <td class="code-item">
                              <p>Code: 11111</p>
                            </td>
                            <td class="jumlah-item">
                              <p>X 1</p>
                            </td>
                            <td class="harga-item">
                              <p>Rp.100.000</p>
                            </td>
                          </tr>
                        </table>
                      </div><!--END OF .DETAIL-ITEM-->
                    </div><!--END OF .RIGHT-CART-->
                    <div class="clearfix"></div>
                  </div><!--END OF .LIST-CART-->
                </li>
                <li>
                  <div class="view-checkout">
                    <div class="view-cart col-xs-6">
                      <a href="#" class="btn">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> VIEW CART
                      </a>
                    </div>
                     <div class="checkout col-xs-6">
                       <a href="#" class="btn checkout">
                         <i class="fa fa-money" aria-hidden="true"></i> CHECKOUT
                       </a>
                     </div>
                     <div class="clearfix"></div>
                  </div>
                </li>
              </ul><!--END OF .DROPDOWN-CUSTOM-->
            </div><!--END OF .CART-->
          </div><!--END OF .ROW-->
        </div><!--END OF .NAVIGATOR-->
      </div><!--END OF .WR-HEADER-FIX-->
    </div><!--END OF .HEADER-FIX-->

    <div class="menu hidden-xs" id="menu">
      <div class="wr-menu container">
        <ul class="menu-list">
          <li class="list">
            <a href="#">HOME</a>
          </li>
          <li class="list dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">FASHION</a>
            <ul class="dropdown-menu dropdown-custom" role="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-female" aria-hidden="true"></i> Women
                  </a>
                  <ul class="dropdown-custom-2">
                    <li>
                      <a href="#">Bluss</a>
                    </li>
                    <li>
                      <a href="#">Dress</a>
                    </li>
                    <li>
                      <a href="#">Kemeja</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-male" aria-hidden="true"></i> Men
                  </a>
                </li>
            </ul><!--END OF .DROPDOWN-CUSTOM-->
          </li>
          <li class="list">
            <a href="#">ABOUT</a>
          </li>
          <li class="list">
            <a href="#" class="contact" >CONTACT</a>
          </li>
        </ul><!--END OF .MENU-LIST-->
      </div><!--END OF .WR-MENU-->
    </div><!--END OF .MENU-->

    <div class="menu-fix hidden-xs" id="menu-fix">
      <div class="wr-menu-fix container">
        <div class="row">
          <div class="logo col-md-3 col-sm-3">
            <a href="#">
              <img src="{{ url('/frontend/images/idws-logo.png') }}" class="img-responsive">
            </a>
          </div><!--END OF .LOGO-->
          <div class="menu col-md-9 col-sm-9">
            <ul>
              <li>
                <a href="#">HOME</a>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">FASHION</a>
                <ul class="dropdown-menu dropdown-custom" role="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-female" aria-hidden="true"></i> Women
                      </a>
                      <ul class="dropdown-custom-2">
                        <li>
                          <a href="#">Bluss</a>
                        </li>
                        <li>
                          <a href="#">Dress</a>
                        </li>
                        <li>
                          <a href="#">Kemeja</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-male" aria-hidden="true"></i> Men
                      </a>
                    </li>
                </ul><!--END OF .DROPDOWN-CUSTOM-->
              </li>
              <li>
                <a href="#">ABOUT</a>
              </li>
              <li>
                <a href="#" class="contact">CONTACT</a>
              </li>
            </ul>
          </div><!--END OF .MENU-->
          <div class="clearfix"></div>
        </div><!--END OF .ROW-->
      </div><!--END OF .WR-MENU-FIX-->
    </div><!--END OF .MENU-FIX-->

    <div class="menu-side hidden-lg hidden-md hidden-sm" id="menu-side">
      <div class="heading-menu-side">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search...">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form> 
          <div class="menu-account">
            <a href="#">
              <i class="fa fa-user" aria-hidden="true"></i> ACCOUNT
            </a>
          </div>
          <div class="menu-user">
            <a data-toggle="collapse" href="#dropdown-user">
              <i class="fa fa-user" aria-hidden="true"></i> JOKO
            </a>
            <ul class="dropdown-custom collapse" id="dropdown-user">
              <li>
                <a href="#">
                  <i class="fa fa-user" aria-hidden="true"></i> My Account
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-cogs" aria-hidden="true"></i> Account Setting
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out
                </a>
              </li>
            </ul>
          </div>
      </div>
       <div class="panel-group">
         <div class="panel panel-default">
          <div class="panel-heading">
            <a href="#">HOME</a>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <a data-toggle="collapse" href="#dropdown-fashion">FASHION</a>
          </div>
          <div id="dropdown-fashion" class="panel-collapse collapse dropdown-custom">
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-female" aria-hidden="true"></i> Women
                </a>
                <ul class="dropdown-custom-2">
                  <li>
                    <a href="#">Bluss</a>
                  </li>
                  <li>
                    <a href="#">Dress</a>
                  </li>
                  <li>
                    <a href="#">Kemeja</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-male" aria-hidden="true"></i> Men
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <a href="#">ABOUT</a>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <a href="#">CONTACT</a>
          </div>
        </div>
      </div> 
    </div>

    <div class="banner-slider" id="banner-slider">
      <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Third Slide -->
                <div class="item active">

                    <!-- Slide Background -->
                    <img src="{{ url('/frontend/images/banner1.jpg') }}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_left">
                                <h1 data-animation="animated zoomInRight">NEW COLLECTION <span class="thin">IS AVAILABLE</span></h1>
                                <p data-animation="animated fadeInLeft">Bootstrap carousel now touch enable slide.</p>
                                <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">
                                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> add to cart
                                </a>
                                <a href="http://bootstrapthemes.co/" target="_blank"  class="btn btn-primary" data-animation="animated fadeInRight">
                                  <i class="fa fa-heart-o" aria-hidden="true"></i> wishlist
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{ url('/frontend/images/banner2.jpg') }}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated zoomInRight">NEW COLLECTION <span class="thin">IS AVAILABLE</span></h1>
                        <p data-animation="animated lightSpeedIn">Make Bootstrap Better together.</p>
                        <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInUp">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i> add to cart
                        </a>
                        <a href="http://bootstrapthemes.co/" target="_blank"  class="btn btn-primary" data-animation="animated fadeInDown">
                          <i class="fa fa-heart-o" aria-hidden="true"></i> wishlist
                        </a>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Third Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{ url('/frontend/images/banner3.jpg') }}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_right">
                        <h1 data-animation="animated zoomInRight">NEW COLLECTION <span class="thin">IS AVAILABLE</span></h1>
                        <p data-animation="animated fadeInRight">Lots of css3 Animations to make slide beautiful .</p>
                        <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i> add to cart
                        </a>
                        <a href="http://bootstrapthemes.co/" target="_blank" class="btn btn-primary" data-animation="animated fadeInRight">
                          <i class="fa fa-heart-o" aria-hidden="true"></i> wishlist
                        </a>
                    </div>
                </div>
                <!-- End of Slide -->


            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

      </div> <!-- End  bootstrap-touch-slider Slider -->
    </div><!--END OF .BANNER-SLIDER-->

      <div class="voucher-adv">
        <div class="wr-voucher-adv container">
          <div class="row">
            <div class="content-voucher col-md-9 col-sm-9">
              <div class="wr-content-voucher">
                <div class="heading-content">
                  <ul>
                    <li>
                      <a href="#" class="active">PULSA</a>
                    </li>
                    <li>
                      <a href="#">PAKET DATA</a>
                    </li>
                    <li>
                      <a href="#">TOKEN LISTRIK</a>
                    </li>
                  </ul>
                </div><!--END OF .HEADING-CONTENT-->
                <div class="body-content">
                  <ul>
                    <li>
                      <a>
                        <input type="text" class="form-control" placeholder="Nomor Telepon...">
                      </a>
                    </li>
                    <li>
                    <a>
                        <select class="form-control" id="sel1">
                          <option>
                            <p>Nominal</p>
                          </option>
                          <option>
                            <p>Rp.10.000</p>
                          </option>
                          <option>
                            <p>Rp.20.000</p>
                          </option>
                          <option>
                            <p>Rp.50.000</p>
                          </option>
                          <option>
                            <p>Rp.100.000</p>
                          </option>
                        </select>
                    </a>
                    </li>
                    <li>
                    <a>
                        <button type="button" class="btn">BELI</button>
                    </a>
                    </li>
                  </ul>
                </div><!--END OF .BODY-CONTENT-->
              </div><!--END OF .WR-CONTENT-VOUCHER-->
              <div class="content-adv-promo hidden-xs">
                <div class="wr-content-adv">
                  <img src="http://placehold.it/728x90" class="img-responsive">
                </div>
              </div><!--END OF .CONTENT-ADV-PROMO-->
            </div><!--END OF .CONTENT-VOUCHER-->
            <div class="content-adv col-md-3 col-sm-3">
              <div class="wr-content-adv">
                <img src="http://placehold.it/250x300" class="img-responsive">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div><!--END OF .WR-ADV-->
      </div><!--END OF .ADV-->

      <div class="new-product">
        <div class=" wr-new-product container">
          <div class="row">
                <div class="heading-new-product row">
                    <div class="col-md-9 col-sm-9">
                        <h2>NEW PRODUCTS</h2>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <!-- Controls -->
                        <div class="controls pull-right hidden-xs">
                            <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example" data-slide="prev"></a>
                            <a class="right fa fa-chevron-right btn btn-success" href="#carousel-example" data-slide="next"></a>
                        </div>
                    </div>
                </div>
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-3 col-md-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                                            <div class="action-choice text-center">
                                              <button class="btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </button>
                                            </div>
                                        </div><!--END OF .PHOTO-->
                                        <div class="info">
                                            <div class="images-product-old">
                                                <div class="product-old text-center">
                                                    <p>Sample Product</p>
                                                    <p class="price-text-color">Rp.100.000</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!--END OF .INFO-->
                                    </div><!--END OF .COL-ITEM-->
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                                            <div class="action-choice text-center">
                                              <button class="btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </button>
                                            </div>
                                        </div><!--END OF .PHOTO-->
                                        <div class="info">
                                            <div class="images-product-old">
                                                <div class="product-old text-center">
                                                    <p>Sample Product</p>
                                                    <p class="price-text-color">Rp.100.000</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!--END OF .INFO-->
                                    </div><!--END OF .COL-ITEM-->
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a"/>
                                            <div class="action-choice text-center">
                                              <button class="btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </button>
                                            </div>
                                        </div><!--END OF .PHOTO-->
                                        <div class="info">
                                            <div class="images-product-old">
                                                <div class="product-old text-center">
                                                    <p>Sample Product</p>
                                                    <p class="price-text-color">Rp.100.000</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!--END OF .INFO-->
                                    </div><!--END OF .COL-ITEM-->
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                                            <div class="action-choice text-center">
                                              <button class="btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </button>
                                            </div>
                                        </div><!--END OF .PHOTO-->
                                        <div class="info">
                                            <div class="images-product-old">
                                                <div class="product-old text-center">
                                                    <p>Sample Product</p>
                                                    <p class="price-text-color">Rp.100.000</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!--END OF .INFO-->
                                    </div><!--END OF .COL-ITEM-->
                                </div>
                            </div>
                        </div><!--END OF .ITEM-ACTIVE-->
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-3 col-md-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                                            <div class="action-choice text-center">
                                              <button class="btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </button>
                                            </div>
                                        </div><!--END OF .PHOTO-->
                                        <div class="info">
                                            <div class="images-product-old">
                                                <div class="product-old text-center">
                                                    <p>Sample Product</p>
                                                    <p class="price-text-color">Rp.100.000</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!--END OF .INFO-->
                                    </div><!--END OF .COL-ITEM-->
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                                            <div class="action-choice text-center">
                                              <button class="btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </button>
                                            </div>
                                        </div><!--END OF .PHOTO-->
                                        <div class="info">
                                            <div class="images-product-old">
                                                <div class="product-old text-center">
                                                    <p>Sample Product</p>
                                                    <p class="price-text-color">Rp.100.000</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!--END OF .INFO-->
                                    </div><!--END OF .COL-ITEM-->
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                                            <div class="action-choice text-center">
                                              <button class="btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </button>
                                            </div>
                                        </div><!--END OF .PHOTO-->
                                        <div class="info">
                                            <div class="images-product-old">
                                                <div class="product-old text-center">
                                                    <p>Sample Product</p>
                                                    <p class="price-text-color">Rp.100.000</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!--END OF .INFO-->
                                    </div><!--END OF .COL-ITEM-->
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                                            <div class="action-choice text-center">
                                              <button class="btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                              </button>
                                              <button class="btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </button>
                                            </div>
                                        </div><!--END OF .PHOTO-->
                                        <div class="info">
                                            <div class="images-product-old">
                                                <div class="product-old text-center">
                                                    <p>Sample Product</p>
                                                    <p class="price-text-color">Rp.100.000</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!--END OF .INFO-->
                                    </div><!--END OF .COL-ITEM-->
                                </div>
                            </div>
                        </div><!--END OF .ITEM-->
                    </div><!--END OF .CAROUSEL-INNER-->
                </div><!--END OF .SLIDE-->
            </div>
        </div>
      </div><!--END OF .NEW-PRODUCT-->

      <div class="banner-promo">
        <div class="wr-banner container">
          <div class="row">
            <div class="text-banner col-md-6 col-sm-6 col-xs-6">
              <div class="text-animation">
                <h4>WOMEN COLLECTION</h4>
                <h1>70% OFF</h1>
                <p>HAPPY SHOPPING!!!</p>
                <a href="#" class="btn">
                  <i class="fa fa-eye" aria-hidden="true"></i> VIEW COLLECTION
                </a>
              </div><!--END OF .TEXT-ANIMATION-->
            </div><!--END OF .TEXT-BANNER-->
            <div class="img-banner col-md-6 col-sm-6 col-xs-6">
              <img src="{{ url('/frontend/images/banner2.jpg') }}" class="img-responsive">
            </div><!--END OF .IMG-BANNER-->
            <div class="clearfix"></div>
          </div>
        </div><!--END OF .WR-BANNER-->
      </div><!--END OF .BANNER-PROMO-->

      <div class="pilihan">
        <div class="wr-pilihan container">
          <div class="heading-pilihan">
            <a href="#" class="sale active">
              <h2>ON SALE</h2>
            </a>
            <a href="#" class="popular">
              <h2>POPULAR</h2>
            </a>
          </div>
          <div class="list-item row">
            <div class="col-sm-4 col-md-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                        <div class="action-choice text-center">
                          <button class="btn">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </button>
                        </div>
                    </div><!--END OF .PHOTO-->
                    <div class="info">
                        <div class="images-product-old">
                            <div class="product-old text-center">
                                <p>Sample Product</p>
                                <div class="potongan">
                                  <p class="price-text-color sebelum pull-left">Rp.170.000</p>
                                  <p class="price-text-color pull-right">Rp.100.000</p>
                                  <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--END OF .INFO-->
                </div><!--END OF .COL-ITEM-->
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                        <div class="action-choice text-center">
                          <button class="btn">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </button>
                        </div>
                    </div><!--END OF .PHOTO-->
                    <div class="info">
                        <div class="images-product-old">
                            <div class="product-old text-center">
                                <p>Sample Product</p>
                                <p class="price-text-color">Rp.100.000</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--END OF .INFO-->
                </div><!--END OF .COL-ITEM-->
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                        <div class="action-choice text-center">
                          <button class="btn">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </button>
                        </div>
                    </div><!--END OF .PHOTO-->
                    <div class="info">
                        <div class="images-product-old">
                            <div class="product-old text-center">
                                <p>Sample Product</p>
                                <p class="price-text-color">Rp.100.000</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--END OF .INFO-->
                </div><!--END OF .COL-ITEM-->
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                        <div class="action-choice text-center">
                          <button class="btn">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </button>
                        </div>
                    </div><!--END OF .PHOTO-->
                    <div class="info">
                        <div class="images-product-old">
                            <div class="product-old text-center">
                                <p>Sample Product</p>
                                <p class="price-text-color">Rp.100.000</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--END OF .INFO-->
                </div><!--END OF .COL-ITEM-->
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                        <div class="action-choice text-center">
                          <button class="btn">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </button>
                        </div>
                    </div><!--END OF .PHOTO-->
                    <div class="info">
                        <div class="images-product-old">
                            <div class="product-old text-center">
                                <p>Sample Product</p>
                                <p class="price-text-color">Rp.100.000</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--END OF .INFO-->
                </div><!--END OF .COL-ITEM-->
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" />
                        <div class="action-choice text-center">
                          <button class="btn">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                          </button>
                          <button class="btn">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </button>
                        </div>
                    </div><!--END OF .PHOTO-->
                    <div class="info">
                        <div class="images-product-old">
                            <div class="product-old text-center">
                                <p>Sample Product</p>
                                <p class="price-text-color">Rp.100.000</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--END OF .INFO-->
                </div><!--END OF .COL-ITEM-->
            </div>
            <div class="clearfix"></div>
          </div><!--END OF .LIST-ITEM-->
        </div><!--END OF .WR-PILIHAN-->
      </div><!--END OF .PILIHAN-->

      <div class="latest-post">
        <div class="wr-latest-post container">
          <div class="heading-post">
            <h2>LATEST POST</h2>
          </div>
          <div class="content-post row">
            <div class="post col-md-4 col-sm-4">
              <div class="wr-post">
                <div class="title text-center">
                  <a href="#">
                    <h4>LOREM IPSUM IS SIMPLY DUMMY</h4>
                  </a>
                </div><!--END OF .TITLE-->
                <div class="image">
                  <img class="wrapper-img img-responsive" src="{{ url('/frontend/images/banner3.jpg') }}">
                </div><!--END OF .IMAGE-->
                <div class="date-post">
                  <p class="pull-left">
                    <i class="fa fa-user" aria-hidden="true"></i> Admin
                  </p>
                  <p class="pull-right">
                    <i class="fa fa-calendar" aria-hidden="true"></i> 20/05/2017
                  </p>
                  <div class="clearfix"></div>
                </div><!--END OF .POST-FOOTER-->
                <div class="text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                  </p>
                </div><!--END OF .TEXT-->
                <div class="footer-post">
                  <p class="pull-left">
                    <i class="fa fa-comment-o" aria-hidden="true"></i> 3 Comments
                  </p>
                  <a href="#" class="pull-right">
                    Read More <i class="fa fa-chevron-right" aria-hidden="true"></i> 
                  </a>
                  <div class="clearfix"></div>
                </div><!--END OF .FOOTER-POST-->
              </div><!--END OF .WR-POST-->
            </div><!--END OF .POST-->
            <div class="post col-md-4 col-sm-4">
              <div class="wr-post">
                <div class="title text-center">
                  <a href="#">
                    <h4>LOREM IPSUM IS SIMPLY DUMMY</h4>
                  </a>
                </div><!--END OF .TITLE-->
                <div class="image">
                  <img class="wrapper-img img-responsive" src="{{ url('/frontend/images/banner3.jpg') }}">
                </div><!--END OF .IMAGE-->
                <div class="date-post">
                  <p class="pull-left">
                    <i class="fa fa-user" aria-hidden="true"></i> Admin
                  </p>
                  <p class="pull-right">
                    <i class="fa fa-calendar" aria-hidden="true"></i> 20/05/2017
                  </p>
                  <div class="clearfix"></div>
                </div><!--END OF .POST-FOOTER-->
                <div class="text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                  </p>
                </div><!--END OF .TEXT-->
                <div class="footer-post">
                  <p class="pull-left">
                    <i class="fa fa-comment-o" aria-hidden="true"></i> 3 Comments
                  </p>
                  <a href="#" class="pull-right">
                    Read More <i class="fa fa-chevron-right" aria-hidden="true"></i> 
                  </a>
                  <div class="clearfix"></div>
                </div><!--END OF .FOOTER-POST-->
              </div><!--END OF .WR-POST-->
            </div><!--END OF .POST-->
            <div class="post col-md-4 col-sm-4">
              <div class="wr-post">
                <div class="title text-center">
                  <a href="#">
                    <h4>LOREM IPSUM IS SIMPLY DUMMY</h4>
                  </a>
                </div><!--END OF .TITLE-->
                <div class="image">
                  <img class="wrapper-img img-responsive" src="{{ url('/frontend/images/banner3.jpg') }}">
                </div><!--END OF .IMAGE-->
                <div class="date-post">
                  <p class="pull-left">
                    <i class="fa fa-user" aria-hidden="true"></i> Admin
                  </p>
                  <p class="pull-right">
                    <i class="fa fa-calendar" aria-hidden="true"></i> 20/05/2017
                  </p>
                  <div class="clearfix"></div>
                </div><!--END OF .POST-FOOTER-->
                <div class="text">
                  <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                  </p>
                </div><!--END OF .TEXT-->
                <div class="footer-post">
                  <p class="pull-left">
                    <i class="fa fa-comment-o" aria-hidden="true"></i> 3 Comments
                  </p>
                  <a href="#" class="pull-right">
                    Read More <i class="fa fa-chevron-right" aria-hidden="true"></i> 
                  </a>
                  <div class="clearfix"></div>
                </div><!--END OF .FOOTER-POST-->
              </div><!--END OF .WR-POST-->
            </div><!--END OF .POST-->
            <div class="clearfix"></div>
          </div><!--END OF .CONTENT-POST-->
          <div class="all-post text-center">
            <a href="#" class="btn btn-default">
              <i class="fa fa-eye" aria-hidden="true"></i> VIEW ALL POST
            </a>
          </div><!--END OF .ALL-POST-->
        </div><!--END OF .WR-LATEST-POST-->
      </div><!--END OF .lATEST-POST-->

      <div class="footer">
        <div class="wr-footer container">
          <div class="row">
            <div class="information col-md-3 col-sm-6">
              <div class="heading-content">
                <h3>INFORMATION</h3>
              </div>
              <div class="body-content">
                <ul>
                  <li>
                    <a href="#">ABOUT US</a>
                  </li>
                  <li>
                    <a href="#">CONTACT US</a>
                  </li>
                  <li>
                    <a href="#">HOW TO ORDER</a>
                  </li>
                  <li>
                    <a href="#">PRIVACY POLICY</a>
                  </li>
                  <li>
                    <a href="#">LATEST POST</a>
                  </li>
                </ul>
              </div>
            </div><!--END OF .INFORMATION-->
            <div class="account col-md-3 col-sm-6">
               <div class="heading-content">
                <h3>MY ACCOUNT</h3>
              </div>
               <div class="body-content">
                <ul>
                   <li>
                    <a href="#">MY ACCOUNT</a>
                  </li>
                  <li>
                    <a href="#">LOGIN</a>
                  </li>
                  <li>
                    <a href="#">ORDER HISTORY</a>
                  </li>
                  <li>
                    <a href="#">WISHLIST</a>
                  </li>
                  <li>
                    <a href="#">VIEW CART</a>
                  </li>
                </ul>
              </div>
            </div><!--END OF .ACCOUNT-->
            <div class="tags col-md-3 col-sm-6">
               <div class="heading-content">
                <h3>TAGS</h3>
              </div>
              <div class="body-content">
                <ul>
                  <li><a href="#">VOUCHER</a></li>
                  <li><a href="#">FASHION</a></li>
                  <li><a href="#">TECHNOLOGY</a></li>
                  <li><a href="#">DENIM</a></li>
                  <li><a href="#">BAG</a></li>
                  <li><a href="#">GLASSES</a></li>
                  <li><a href="#">MEN</a></li>
                  <li><a href="#">WOMEN</a></li>
                </ul>
              </div>
            </div><!--END OF .TAGS-->
            <div class="news-letter col-md-3 col-sm-6">
              <div class="wr-news-letter">
                 <div class="heading-content">
                  <h3>NEWS LETTER</h3>
                </div>
                 <div class="body-content">
                  <input type="text" class="form-control" placeholder="Write an email...">
                  <button type="button" class="btn">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> SEND
                  </button>
                </div>
              </div><!--END OF .WR-NEWS-LETTER-->
              <div class="sosmed">
                <ul>
                  <li>
                    <a href="#" class="btn">
                      <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn">
                      <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn">
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="btn">
                      <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div><!--END OF .SOSMED-->
            </div><!--END OF .NEWS-LETTER-->
          </div>
        </div><!--END OF .WR-FOOTER-->
      </div><!--END OF .FOOTER-->

      <div class="copyright">
        <div class="wr-copyright container text-center">
          <small>Indowebster-Store &copy; 2017 - All Right Reserved.</small>
        </div>
      </div>

      <script type="text/javascript">

      // script untuk scroll
      $(document).ready(function() {
          
          // Menentukan elemen yang dijadikan sticky yaitu #cat-menu
          var changeMenu = $('#menu').offset().top;
          var stickyNav = function(){
          var scrolltop = $(window).scrollTop();  
              
            // Kondisi jika discroll maka #cat-menu ditambahkan class sticky dan sebaliknya   
            if (scrolltop > changeMenu) {
              $('#menu').css({ 'display':'none' }); 
              $('#menu-fix').css({ 'position': 'fixed', 'top': 0, 'display':'block', 'z-index': 999 }); 
            } else {
              $('#menu').css({ 'display': 'block' });
              $('#menu-fix').css({ 'display': 'none' });
            }
          };
            
          // Jalankan fungsi stickyNav
          stickyNav();
          $(window).scroll(function() {
            stickyNav();
          });
        });

        // script untuk toggle .show-menu
        $(document).ready(function(){
          $("#menu-side").css({'display': 'none' });
            $("#show-menu").click(function(){
                $("#menu-side").animate({width: 'toggle'});
                $("#menu-side").css({'top':  138, 'position': 'fixed', 'z-index': 900 });
            });
        });


        // SCRIPT SLIDER
      
        (function(a){
          if(typeof define==="function"&&define.amd&&define.amd.jQuery){define(["jquery"],a)
          } else{if(typeof module!=="undefined"&&module.exports){a(require("jquery"))
          } else{a(jQuery)}}}
          (function(f){
            var y="1.6.15",p="left",o="right",e="up",x="down",c="in",A="out",m="none",s="auto",l="swipe",t="pinch",B="tap",j="doubletap",b="longtap",z="hold",E="horizontal",u="vertical",i="all",r=10,g="start",k="move",h="end",q="cancel",a="ontouchstart" in window,v=window.navigator.msPointerEnabled&&!window.navigator.pointerEnabled&&!a,d=(window.navigator.pointerEnabled||window.navigator.msPointerEnabled)&&!a,C="TouchSwipe";
            var n={fingers:1,threshold:75,cancelThreshold:null,pinchThreshold:20,maxTimeThreshold:null,fingerReleaseThreshold:250,longTapThreshold:500,doubleTapThreshold:200,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,pinchIn:null,pinchOut:null,pinchStatus:null,click:null,tap:null,doubleTap:null,longTap:null,hold:null,triggerOnTouchEnd:true,triggerOnTouchLeave:false,allowPageScroll:"auto",fallbackToMouseEvents:true,excludedElements:"label, button, input, select, textarea, a, .noSwipe",preventDefaultEvents:true};
            f.fn.swipe=function(H){var G=f(this),F=G.data(C);
            if(F&&typeof H==="string"){
              if(F[H]){return F[H].apply(this,Array.prototype.slice.call(arguments,1))
              } else{f.error("Method "+H+" does not exist on jQuery.swipe")}
              } else{if(F&&typeof H==="object"){F.option.apply(this,arguments)
              } else{if(!F&&(typeof H==="object"||!H)){return w.apply(this,arguments)}}}return G};
            f.fn.swipe.version=y;
            f.fn.swipe.defaults=n;
            f.fn.swipe.phases={PHASE_START:g,PHASE_MOVE:k,PHASE_END:h,PHASE_CANCEL:q};
            f.fn.swipe.directions={LEFT:p,RIGHT:o,UP:e,DOWN:x,IN:c,OUT:A};
            f.fn.swipe.pageScroll={NONE:m,HORIZONTAL:E,VERTICAL:u,AUTO:s};
            f.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,FOUR:4,FIVE:5,ALL:i};
            function w(F){
              if(F&&(F.allowPageScroll===undefined&&(F.swipe!==undefined||F.swipeStatus!==undefined))){F.allowPageScroll=m}
              if(F.click!==undefined&&F.tap===undefined){F.tap=F.click}
              if(!F){F={}}F=f.extend({},f.fn.swipe.defaults,F);
              return this.each(function(){var H=f(this);var G=H.data(C);
              if(!G){G=new D(this,F);H.data(C,G)}})}function D(a5,au){var au=f.extend({},au);
              var az=(a||d||!au.fallbackToMouseEvents),K=az?(d?(v?"MSPointerDown":"pointerdown"):"touchstart"):"mousedown",ax=az?(d?(v?"MSPointerMove":"pointermove"):"touchmove"):"mousemove",V=az?(d?(v?"MSPointerUp":"pointerup"):"touchend"):"mouseup",T=az?(d?"mouseleave":null):"mouseleave",aD=(d?(v?"MSPointerCancel":"pointercancel"):"touchcancel");
              var ag=0,aP=null,a2=null,ac=0,a1=0,aZ=0,H=1,ap=0,aJ=0,N=null;
              var aR=f(a5);var aa="start";
              var X=0;
              var aQ={};
              var U=0,a3=0,a6=0,ay=0,O=0;
              var aW=null,af=null;try{aR.bind(K,aN);aR.bind(aD,ba)}catch(aj){f.error("events not supported "+K+","+aD+" on jQuery.swipe")}
              this.enable=function(){
                aR.bind(K,aN);aR.bind(aD,ba);
                return aR};this.disable=function(){aK();
                return aR};this.destroy=function(){aK();
                aR.data(C,null);aR=null};
                this.option=function(bd,bc){
                  if(typeof bd==="object"){au=f.extend(au,bd)
                  } else{if(au[bd]!==undefined){
                    if(bc===undefined){return au[bd]
                    } else{au[bd]=bc}
                    } else{if(!bd){return au
                    } else{f.error("Option "+bd+" does not exist on jQuery.swipe.options")}}}
                    return null};function aN(be){if(aB()){
                      return}if(f(be.target).closest(au.excludedElements,aR).length>0){
                        return}var bf=be.originalEvent?be.originalEvent:be;var bd,bg=bf.touches,bc=bg?bg[0]:bf;aa=g;if(bg){X=bg.length
                        } else{if(au.preventDefaultEvents!==false){be.preventDefault()}}ag=0;aP=null;a2=null;aJ=null;ac=0;a1=0;aZ=0;H=1;ap=0;N=ab();S();ai(0,bc);
                        if(!bg||(X===au.fingers||au.fingers===i)||aX()){U=ar();
                        if(X==2){ai(1,bg[1]);a1=aZ=at(aQ[0].start,aQ[1].start)}
                        if(au.swipeStatus||au.pinchStatus){bd=P(bf,aa)}
                        } else{bd=false}if(bd===false){aa=q;P(bf,aa);return bd
                        } else{if(au.hold){af=setTimeout(f.proxy(function(){aR.trigger("hold",[bf.target]);
                        if(au.hold){bd=au.hold.call(aR,bf,bf.target)}},this),au.longTapThreshold)}an(true)}
                        return null}function a4(bf){
                          var bi=bf.originalEvent?bf.originalEvent:bf;if(aa===h||aa===q||al()){return}
                          var be,bj=bi.touches,bd=bj?bj[0]:bi;
                          var bg=aH(bd);a3=ar();
                          if(bj){X=bj.length}if(au.hold){clearTimeout(af)}aa=k;if(X==2){if(a1==0){ai(1,bj[1]);a1=aZ=at(aQ[0].start,aQ[1].start)
                          } else{aH(bj[1]);aZ=at(aQ[0].end,aQ[1].end);aJ=aq(aQ[0].end,aQ[1].end)}H=a8(a1,aZ);ap=Math.abs(a1-aZ)}
                          if((X===au.fingers||au.fingers===i)||!bj||aX()){aP=aL(bg.start,bg.end);a2=aL(bg.last,bg.end);ak(bf,a2);ag=aS(bg.start,bg.end);ac=aM();aI(aP,ag);be=P(bi,aa);
                          if(!au.triggerOnTouchEnd||au.triggerOnTouchLeave){var bc=true;
                          if(au.triggerOnTouchLeave){var bh=aY(this);bc=F(bg.end,bh)}
                          if(!au.triggerOnTouchEnd&&bc){aa=aC(k)
                          } else{if(au.triggerOnTouchLeave&&!bc){aa=aC(h)}}
                          if(aa==q||aa==h){P(bi,aa)}}}else{aa=q;P(bi,aa)}
                          if(be===false){aa=q;P(bi,aa)}}function M(bc){var bd=bc.originalEvent?bc.originalEvent:bc,be=bd.touches;
                          if(be){if(be.length&&!al()){G(bd);return true
                          } else{if(be.length&&al()){return true}}}
                          if(al()){X=ay}a3=ar();ac=aM();if(bb()||!am()){aa=q;P(bd,aa)
                          } else{if(au.triggerOnTouchEnd||(au.triggerOnTouchEnd==false&&aa===k)){
                            if(au.preventDefaultEvents!==false){bc.preventDefault()}aa=h;P(bd,aa)
                            } else{if(!au.triggerOnTouchEnd&&a7()){aa=h;aF(bd,aa,B)
                            } else{if(aa===k){aa=q;P(bd,aa)}}}}an(false);return null}function ba(){X=0;a3=0;U=0;a1=0;aZ=0;H=1;S();an(false)}function L(bc){var bd=bc.originalEvent?bc.originalEvent:bc;
                            if(au.triggerOnTouchLeave){aa=aC(h);P(bd,aa)}}function aK(){aR.unbind(K,aN);aR.unbind(aD,ba);aR.unbind(ax,a4);aR.unbind(V,M);
                            if(T){aR.unbind(T,L)}an(false)}function aC(bg){var bf=bg;var be=aA();var bd=am();var bc=bb();
                            if(!be||bc){bf=q}
                            else{if(bd&&bg==k&&(!au.triggerOnTouchEnd||au.triggerOnTouchLeave)){bf=h}
                            else{if(!bd&&bg==h&&au.triggerOnTouchLeave){bf=q}}}return bf}function P(be,bc){var bd,bf=be.touches;
                            if(J()||W()){bd=aF(be,bc,l)}
                            if((Q()||aX())&&bd!==false){bd=aF(be,bc,t)}
                            if(aG()&&bd!==false){bd=aF(be,bc,j)}
                            else{if(ao()&&bd!==false){bd=aF(be,bc,b)}
                            else{if(ah()&&bd!==false){bd=aF(be,bc,B)}}}if(bc===q){if(W()){bd=aF(be,bc,l)}
                            if(aX()){bd=aF(be,bc,t)}ba(be)}if(bc===h){if(bf){if(!bf.length){ba(be)}}
                            else{ba(be)}}return bd}function aF(bf,bc,be){var bd;
                            if(be==l){aR.trigger("swipeStatus",[bc,aP||null,ag||0,ac||0,X,aQ,a2]);
                            if(au.swipeStatus){bd=au.swipeStatus.call(aR,bf,bc,aP||null,ag||0,ac||0,X,aQ,a2);
                            if(bd===false){return false}}
                            if(bc==h&&aV()){clearTimeout(aW);clearTimeout(af);aR.trigger("swipe",[aP,ag,ac,X,aQ,a2]);
                            if(au.swipe){bd=au.swipe.call(aR,bf,aP,ag,ac,X,aQ,a2);
                            if(bd===false){return false}}switch(aP){case p:aR.trigger("swipeLeft",[aP,ag,ac,X,aQ,a2]);
                            if(au.swipeLeft){bd=au.swipeLeft.call(aR,bf,aP,ag,ac,X,aQ,a2)}break;case o:aR.trigger("swipeRight",[aP,ag,ac,X,aQ,a2]);
                            if(au.swipeRight){bd=au.swipeRight.call(aR,bf,aP,ag,ac,X,aQ,a2)}break;case e:aR.trigger("swipeUp",[aP,ag,ac,X,aQ,a2]);
                            if(au.swipeUp){bd=au.swipeUp.call(aR,bf,aP,ag,ac,X,aQ,a2)}break;case x:aR.trigger("swipeDown",[aP,ag,ac,X,aQ,a2]);
                            if(au.swipeDown){bd=au.swipeDown.call(aR,bf,aP,ag,ac,X,aQ,a2)}break}}}
                            if(be==t){aR.trigger("pinchStatus",[bc,aJ||null,ap||0,ac||0,X,H,aQ]);
                            if(au.pinchStatus){bd=au.pinchStatus.call(aR,bf,bc,aJ||null,ap||0,ac||0,X,H,aQ);
                            if(bd===false){return false}}if(bc==h&&a9()){switch(aJ){case c:aR.trigger("pinchIn",[aJ||null,ap||0,ac||0,X,H,aQ]);
                            if(au.pinchIn){bd=au.pinchIn.call(aR,bf,aJ||null,ap||0,ac||0,X,H,aQ)}break;case A:aR.trigger("pinchOut",[aJ||null,ap||0,ac||0,X,H,aQ]);
                            if(au.pinchOut){bd=au.pinchOut.call(aR,bf,aJ||null,ap||0,ac||0,X,H,aQ)}break}}}
                            if(be==B){if(bc===q||bc===h){clearTimeout(aW);clearTimeout(af);if(Z()&&!I()){O=ar();aW=setTimeout(f.proxy(function(){O=null;aR.trigger("tap",[bf.target]);
                            if(au.tap){bd=au.tap.call(aR,bf,bf.target)}},this),au.doubleTapThreshold)}
                            else{O=null;aR.trigger("tap",[bf.target]);if(au.tap){bd=au.tap.call(aR,bf,bf.target)}}}}
                            else{if(be==j){if(bc===q||bc===h){clearTimeout(aW);clearTimeout(af);O=null;aR.trigger("doubletap",[bf.target]);
                            if(au.doubleTap){bd=au.doubleTap.call(aR,bf,bf.target)}}}
                            else{if(be==b){if(bc===q||bc===h){clearTimeout(aW);O=null;aR.trigger("longtap",[bf.target]);
                            if(au.longTap){bd=au.longTap.call(aR,bf,bf.target)}}}}}return bd}function am(){var bc=true;
                            if(au.threshold!==null){bc=ag>=au.threshold}return bc}function bb(){var bc=false;
                            if(au.cancelThreshold!==null&&aP!==null){bc=(aT(aP)-ag)>=au.cancelThreshold}return bc}function ae(){
                              if(au.pinchThreshold!==null){return ap>=au.pinchThreshold}return true}function aA(){var bc;if(au.maxTimeThreshold){
                                if(ac>=au.maxTimeThreshold){bc=false}
                                else{bc=true}}
                                else{bc=true}return bc}function ak(bc,bd){
                                  if(au.preventDefaultEvents===false){return}if(au.allowPageScroll===m){bc.preventDefault()}
                                  else{var be=au.allowPageScroll===s;switch(bd){case p:if((au.swipeLeft&&be)||(!be&&au.allowPageScroll!=E)){bc.preventDefault()}break;case o:
                                  if((au.swipeRight&&be)||(!be&&au.allowPageScroll!=E)){bc.preventDefault()}break;
                                  case e:if((au.swipeUp&&be)||(!be&&au.allowPageScroll!=u)){bc.preventDefault()}break;
                                  case x:if((au.swipeDown&&be)||(!be&&au.allowPageScroll!=u)){bc.preventDefault()}break}}}function a9(){var bd=aO();var bc=Y();var be=ae();return bd&&bc&&be}
                                  function aX(){return !!(au.pinchStatus||au.pinchIn||au.pinchOut)}
                                  function Q(){return !!(a9()&&aX())}
                                  function aV(){var bf=aA();var bh=am();var be=aO();var bc=Y();var bd=bb();var bg=!bd&&bc&&be&&bh&&bf;return bg}
                                  function W(){return !!(au.swipe||au.swipeStatus||au.swipeLeft||au.swipeRight||au.swipeUp||au.swipeDown)}
                                  function J(){return !!(aV()&&W())}
                                  function aO(){return((X===au.fingers||au.fingers===i)||!a)}
                                  function Y(){return aQ[0].end.x!==0}
                                  function a7(){return !!(au.tap)}
                                  function Z(){return !!(au.doubleTap)}
                                  function aU(){return !!(au.longTap)}
                                  function R(){if(O==null){return false}var bc=ar();return(Z()&&((bc-O)<=au.doubleTapThreshold))}
                                  function I(){return R()}
                                  function aw(){return((X===1||!a)&&(isNaN(ag)||ag<au.threshold))}
                                  function a0(){return((ac>au.longTapThreshold)&&(ag<r))}
                                  function ah(){return !!(aw()&&a7())}
                                  function aG(){return !!(R()&&Z())}
                                  function ao(){return !!(a0()&&aU())}
                                  function G(bc){a6=ar();ay=bc.touches.length+1}
                                  function S(){a6=0;ay=0}
                                  function al(){var bc=false;if(a6){var bd=ar()-a6;if(bd<=au.fingerReleaseThreshold){bc=true}}return bc}
                                  function aB(){return !!(aR.data(C+"_intouch")===true)}
                                  function an(bc){if(!aR){return}if(bc===true){aR.bind(ax,a4);aR.bind(V,M);if(T){aR.bind(T,L)}}else{aR.unbind(ax,a4,false);aR.unbind(V,M,false);if(T){aR.unbind(T,L,false)}}aR.data(C+"_intouch",bc===true)}
                                  function ai(be,bc){var bd={start:{x:0,y:0},last:{x:0,y:0},end:{x:0,y:0}};bd.start.x=bd.last.x=bd.end.x=bc.pageX||bc.clientX;bd.start.y=bd.last.y=bd.end.y=bc.pageY||bc.clientY;aQ[be]=bd;return bd}
                                  function aH(bc){var be=bc.identifier!==undefined?bc.identifier:0;var bd=ad(be);if(bd===null){bd=ai(be,bc)}bd.last.x=bd.end.x;bd.last.y=bd.end.y;bd.end.x=bc.pageX||bc.clientX;bd.end.y=bc.pageY||bc.clientY;return bd}
                                  function ad(bc){return aQ[bc]||null}
                                  function aI(bc,bd){bd=Math.max(bd,aT(bc));N[bc].distance=bd}
                                  function aT(bc){if(N[bc]){return N[bc].distance}return undefined}
                                  function ab(){var bc={};bc[p]=av(p);bc[o]=av(o);bc[e]=av(e);bc[x]=av(x);return bc}
                                  function av(bc){return{direction:bc,distance:0}}
                                  function aM(){return a3-U}
                                  function at(bf,be){var bd=Math.abs(bf.x-be.x);var bc=Math.abs(bf.y-be.y);return Math.round(Math.sqrt(bd*bd+bc*bc))}
                                  function a8(bc,bd){var be=(bd/bc)*1;return be.toFixed(2)}
                                  function aq(){if(H<1){return A}else{return c}}
                                  function aS(bd,bc){return Math.round(Math.sqrt(Math.pow(bc.x-bd.x,2)+Math.pow(bc.y-bd.y,2)))}
                                  function aE(bf,bd){var bc=bf.x-bd.x;var bh=bd.y-bf.y;var be=Math.atan2(bh,bc);var bg=Math.round(be*180/Math.PI);if(bg<0){bg=360-Math.abs(bg)}return bg}
                                  function aL(bd,bc){var be=aE(bd,bc);if((be<=45)&&(be>=0)){return p}else{if((be<=360)&&(be>=315)){return p}else{if((be>=135)&&(be<=225)){return o}else{if((be>45)&&(be<135)){return x}else{return e}}}}}
                                  function ar(){var bc=new Date();return bc.getTime()}
                                  function aY(bc){bc=f(bc);var be=bc.offset();var bd={left:be.left,right:be.left+bc.outerWidth(),top:be.top,bottom:be.top+bc.outerHeight()};return bd}
                                  function F(bc,bd){return(bc.x>bd.left&&bc.x<bd.right&&bc.y>bd.top&&bc.y<bd.bottom)}}}));
                                  !function(n){"use strict";n.fn.bsTouchSlider=function(i){var a=n(".carousel");return this.each(function(){
                                    function i(i){var a="webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";i.each(function(){var i=n(this),t=i.data("animation");i.addClass(t).one(a,function(){i.removeClass(t)})})}var t=a.find(".item:first").find("[data-animation ^= 'animated']");a.carousel(),i(t),a.on("slide.bs.carousel",function(a){var t=n(a.relatedTarget).find("[data-animation ^= 'animated']");i(t)}),n(".carousel .carousel-inner").swipe({swipeLeft:function(n,i,a,t,e){this.parent().carousel("next")},swipeRight:function(){this.parent().carousel("prev")},threshold:0})})}}(jQuery);



        //Initialise Bootstrap Carousel Touch Slider
        // Curently there are no option available.

        $('#bootstrap-touch-slider').bsTouchSlider();


      </script>
    
  </body>
</html>