@extends('layouts.frontend.app')

@section('content')
  
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
                <div class="heading-content" id="tab">
                  <ul>
                    <li>
                      <a href="#pulsa" data-toggle="tab" id="clickPulsa">PULSA</a>
                    </li>
                    <li>
                      <a href="#paket" data-toggle="tab" id="clickPaketData">PAKET DATA</a>
                    </li>
                    <li>
                      <a href="#listrik" data-toggle="tab" id="clickTokenListrik">TOKEN LISTRIK</a>
                    </li>
                  </ul>
                </div><!--END OF .HEADING-CONTENT-->
                <div class="tab-content">
                  <div class="body-content tab-pane active" id="pulsa">
                    <ul>
                      <li>
                        <a>
                          <form action="{{ url('/buy/pulsa') }}" method="get" accept-charset="utf-8" autocomplete="off">
                          <input type="text" class="form-control" placeholder="Nomor Telepon..." id="no_hp" name="no_hp">
                          @if($errors->has('no_hp'))
                            <span class="help-block"> 
                              <strong style="color: red;"> {{ $errors->first('no_hp') }} </strong> 
                            </span>
                          @endif
                        </a>
                      </li>
                      <li>
                        <a>
                            <select class="form-control" id="selectPulsa" name="product" disabled>
                            
                            </select>
                        </a>
                      </li>
                      <li>
                        <a>
                            <button type="submit" class="btn">BELI</button>
                            </form>
                        </a>
                      </li>
                    </ul>
                  </div><!--END OF .BODY-CONTENT-->
                  <div class="body-content tab-pane" id="paket">
                    <ul>
                      <li>
                        <a>
                          <form action="{{ url('/buy/paket') }}" method="get" accept-charset="utf-8" autocomplete="off">
                          <input type="text" class="form-control" placeholder="Nomor Telepon..." id="noHP_paketData" name="no_hp">
                          @if($errors->has('no_hp'))
                            <span class="help-block"> 
                              <strong style="color: red;"> {{ $errors->first('no_hp') }} </strong> 
                            </span>
                          @endif
                        </a>
                      </li>
                      <li>
                        <a>
                            <select class="form-control" id="selectPaketData" name="product" ">
                              
                            </select>
                        </a>
                      </li>
                      <li>
                        <a>
                            <button type="submit" class="btn">BELI</button>
                            </form>
                        </a>
                      </li>
                    </ul>
                  </div><!--END OF .BODY-CONTENT-->
                  <div class="body-content tab-pane" id="listrik">
                    <ul>
                      <li>
                        <a>
                          <form action="{{ url('/buy/pln') }}" method="get" accept-charset="utf-8" autocomplete="off">
                          <input type="text" class="form-control" name="idPLN" placeholder="Nomor Meter/ID Pelanggan">
                        </a>
                      </li>
                      <li>
                        <a>
                            <select class="form-control" id="sel1" name="product">
                              <option>
                                <p>Nominal</p>
                              </option>
                              @foreach($pln as $PLN)
                                <option value="{{ $PLN->id }}">
                                  <p>{{ $PLN->name }}</p>
                                </option>
                              @endforeach
                            </select>
                        </a>
                      </li>
                      <li>
                        <a>
                            <button type="submit" class="btn">BELI</button>
                            </form>
                            </a>
                        </a>
                      </li>
                    </ul>
                  </div><!--END OF .BODY-CONTENT-->
                </div><!--END OF .TAB-CONTENT-->
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
                        <h2>PRODUCT BARU</h2>
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
                      @foreach($newProducts->chunk(4) as $key => $chunk)
                        <div class="item @if($key==0) active @endif">
                            <div class="row">
                                @foreach($chunk as $newProduct)
                                <div class="col-sm-3 col-md-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            @if( $newProduct->gallery->count() != 0 )

                                              @if( $newProduct->getGalleryUtama->count() != 0 )
                                                @foreach($newProduct->getGalleryUtama as $galleryUtama)
                                                  <img src="{{ url($galleryUtama->path) }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />
                                                @endforeach
                                              @else
                                                <img src="{{ url($newProduct->gallery->first()->path) }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />
                                              @endif

                                            @else

                                              <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />

                                            @endif
                                            <div class="action-choice text-center">
                                              <a href="{{ url('/add-cart/'.$newProduct->id) }}">
                                              <button class="btn">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                              </button>
                                              </a>
                                              <button class="btn">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                              </button>
                                              <a href="{{ url('/product/'.$newProduct->id) }}">
                                              <button class="btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </button>
                                              </a>
                                            </div>
                                        </div><!--END OF .PHOTO-->
                                        <div class="info">
                                            <div class="images-product-old">
                                                <div class="product-old text-center">
                                                    <p>
                                                      @if(strlen($newProduct->name) > 27 )
                                                        {{ substr($newProduct->name, 0, 24) }}...
                                                      @else
                                                        {{ $newProduct->name }}
                                                      @endif
                                                    </p>
                                                    <div class="potongan">
                                                      @if($newProduct->discount!=0 && $newProduct->end_time_discount>=date('Y-m-d H:i:s') && $newProduct->start_time_discount<=date('Y-m-d H:i:s'))
                                                        <p class="price-text-color sebelum pull-left"><b style="color: maroon; font-size: 11px; text-decoration: line-through;">Rp. {{ App\Helpers\Money::setRupiah($newProduct->price) }}</b></p>
                                                        <p class="price-text-color pull-right">Rp. {{ App\Helpers\Money::setRupiah( $newProduct->price - ($newProduct->price*$newProduct->discount/100) ) }}</p>
                                                      @else
                                                        <p class="price-text-color pull-right">Rp. {{ App\Helpers\Money::setRupiah( $newProduct->price ) }}</p>
                                                      @endif
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!--END OF .INFO-->
                                    </div><!--END OF .COL-ITEM-->
                                </div>
                                @endforeach
                            </div>
                        </div><!--END OF .ITEM-ACTIVE-->
                        @endforeach
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
          <div class="heading-pilihan" id="tab">
            <a href="#onsale" data-toggle="tab" id="tabOnsale">
              <h2>DISKON</h2>
            </a>
            <a href="#popular" data-toggle="tab" id="tabPopular">
              <h2>POPULER</h2>
            </a>
          </div>
          <div class="tab-content">
            <div class="list-item row tab-pane active" id="onsale">
              @foreach($saleProducts as $saleProduct)
              <div class="col-sm-4 col-md-3">
                  <div class="col-item">
                      <div class="photo">
                          @if( $saleProduct->gallery->count() != 0 )

                            @if( $saleProduct->getGalleryUtama->count() != 0 )
                              @foreach($saleProduct->getGalleryUtama as $galleryUtama)
                                <img src="{{ url($galleryUtama->path) }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />
                              @endforeach
                            @else
                              <img src="{{ url($saleProduct->gallery->first()->path) }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />
                            @endif

                          @else

                            <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />

                          @endif

                          <div class="action-choice text-center">
                            <a href="{{ url('/add-cart/'.$saleProduct->id) }}">
                            <button class="btn">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>
                            </a>
                            <button class="btn">
                              <i class="fa fa-heart-o" aria-hidden="true"></i>
                            </button>
                            <a href="{{ url('/product/'.$saleProduct->id) }}">
                            <button class="btn">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                            </a>
                          </div>
                      </div><!--END OF .PHOTO-->
                      <div class="info">
                          <div class="images-product-old">
                              <div class="product-old text-center">
                                  <p>
                                    @if(strlen($saleProduct->name) > 27 )
                                      {{ substr($saleProduct->name, 0, 24) }}...
                                    @else
                                      {{ $saleProduct->name }}
                                    @endif
                                  </p>
                                  <div class="potongan">
                                    <p class="price-text-color sebelum pull-left" style="font-size: 90%;">Rp. {{ App\Helpers\Money::setRupiah($saleProduct->price) }}</p>
                                    <p class="price-text-color pull-right">Rp. {{ App\Helpers\Money::setRupiah( $saleProduct->price - ($saleProduct->price*$saleProduct->discount/100) ) }}</p>
                                    <div class="clearfix"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                      </div><!--END OF .INFO-->
                  </div><!--END OF .COL-ITEM-->
              </div>
              @endforeach
              <div class="clearfix"></div>
            </div><!--END OF .LIST-ITEM-->
            <div class="list-item row tab-pane" id="popular">
              @foreach($popularProducts as $popularProduct)
              <div class="col-sm-4 col-md-3">
                  <div class="col-item">
                      <div class="photo">
                          @if( $popularProduct->gallery->count() != 0 )

                            @if( $popularProduct->getGalleryUtama->count() != 0 )
                              @foreach($popularProduct->getGalleryUtama as $galleryUtama)
                                <img src="{{ url($galleryUtama->path) }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />
                              @endforeach
                            @else
                              <img src="{{ url($popularProduct->gallery->first()->path) }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />
                            @endif

                          @else

                            <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive" alt="a" style="height: 270px; width: 270px;" />

                          @endif
                          <div class="action-choice text-center">
                            <a href="{{ url('/add-cart/'.$popularProduct->id) }}">
                            <button class="btn">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>
                            </a>
                            <button class="btn">
                              <i class="fa fa-heart-o" aria-hidden="true"></i>
                            </button>
                            <a href="{{ url('/product/'.$popularProduct->id) }}">
                            <button class="btn">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                            </a>
                          </div>
                      </div><!--END OF .PHOTO-->
                      <div class="info">
                          <div class="images-product-old">
                              <div class="product-old text-center">
                                  <p>
                                  @if(strlen($popularProduct->name) > 27 )
                                    {{ substr($popularProduct->name, 0, 24) }}...
                                  @else
                                    {{ $popularProduct->name }}
                                  @endif
                                  </p>
                                  <div class="potongan">
                                      @if($popularProduct->discount!=0 && $popularProduct->end_time_discount>=date('Y-m-d H:i:s') && $popularProduct->start_time_discount<=date('Y-m-d H:i:s'))
                                        <p class="price-text-color sebelum pull-left"><b style="color: maroon; font-size: 11px; text-decoration: line-through;">Rp. {{ App\Helpers\Money::setRupiah($popularProduct->price) }}</b></p>
                                        <p class="price-text-color pull-right">Rp. {{ App\Helpers\Money::setRupiah( $popularProduct->price - ($popularProduct->price*$popularProduct->discount/100) ) }}</p>
                                      @else
                                      <p class="price-text-color pull-right">Rp. {{ App\Helpers\Money::setRupiah( $popularProduct->price ) }}</p>
                                      @endif
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                      </div><!--END OF .INFO-->
                  </div><!--END OF .COL-ITEM-->
              </div>
              @endforeach
              <div class="clearfix"></div>
            </div><!--END OF .LIST-ITEM-->
          </div>
        </div><!--END OF .WR-PILIHAN-->
      </div><!--END OF .PILIHAN-->

@endsection

@section('javascript')
  
  <script type="text/javascript">
    
        $('#no_hp').val('');
        $('#noHP_paketData').val('');

        $('#selectPulsa').prop('disabled', true);
        $('#selectPaketData').prop('disabled', true);

        function disablePulsa(){
            $('#selectPulsa').empty();
            $('#selectPulsa').prop('disabled', true);
        }

        function checkProviderPulsa(code){

            // var code = $('#no_hp').val();
            var url = "{{ url('/check-provider') }}";
              
              $.ajax({
                url: url+"/"+code,
                type: 'GET',
                data: {custom: code},
                success: function(data){

                  if (data.id!=null) {

                    $.ajax({

                        url:"{{ url('/get-provider') }}"+"/"+data.id,
                        type: 'GET',
                        data: {id: data.id},
                        success: function(datas){

                          $('#selectPulsa').empty();

                          if (datas!="") {

                            $.each(datas, function(index, value){
                              $('#selectPulsa').append(" <option value='" + value.id + "'>"+ value.name + " - Rp. " + value.price +"</option> ");
                            });

                            $('#selectPulsa').prop('disabled', false);

                          }

                          else{

                            $('#selectPulsa').empty();
                            $('#selectPulsa').prop('disabled', true);

                          }

                        }

                    });

                  }
                  else{

                    disablePulsa();

                  }  


                }

              });

        }

        $('#no_hp').keyup(function(){

            if (this.value.length <= 3) {
                disablePulsa();
            }

            if (this.value.length == 4) {
              var code = $(this).val();
              checkProviderPulsa(code);
            }

        });

        $('#no_hp').on('paste', function(e){
            var nohp = e.originalEvent.clipboardData.getData('text');
            if (nohp.length >= 4) {
                var code = nohp.substring(0,4);
                checkProviderPulsa(code);
            }
        });

        $('#clickPulsa').prop("class", "active");

        $('#clickPaketData').on('click', function(){
          $('#clickPulsa').prop("class", "");
          $('#clickTokenListrik').prop("class", "");
          $(this).prop('class','active');
        });

        $('#clickTokenListrik').on('click', function(){
          $('#clickPulsa').prop("class", "");
          $('#clickPaketData').prop("class", "");
          $(this).prop('class','active');
        });

        $('#clickPulsa').on('click', function(){
          $('#clickPaketData').prop("class", "");
          $('#clickTokenListrik').prop("class", "");
          $(this).prop('class','active');
        });

        $('#tabOnsale').prop("class", "sale active");

        $('#tabOnsale').on('click', function(){
            $('#tabPopular').prop("class", "popular");
            $(this).prop('class', 'sale active')
        });

        $('#tabPopular').on('click', function(){
            $('#tabOnsale').prop("class", "sale");
            $(this).prop("class", "popular active")
        });

        function disablePaketData(){
          $('#selectPaketData').empty();
          $('#selectPaketData').prop('disabled', true);
        }

        function checkProviderPaketData(code){
            
              var url = "{{ url('/check-provider/paket-data') }}";
              
              $.ajax({
                url: url+"/"+code,
                type: 'GET',
                data: {custom: code},
                success: function(data){

                  // console.log(data);

                  if (data.id!=null) {

                    $.ajax({

                        url:"{{ url('/get-provider/paket-data') }}"+"/"+data.id,
                        type: 'GET',
                        data: {id: data.id},
                        success: function(datas){

                          $('#selectPaketData').empty();

                          if (datas!="") {

                            $.each(datas, function(index, value){
                              $('#selectPaketData').append(" <option value='" + value.id + "'>"+ value.name + " - Rp. " +value.price +"</option> ");
                            });

                            $('#selectPaketData').prop('disabled', false);

                          }

                          else{

                            $('#selectPaketData').empty();
                            $('#selectPaketData').prop('disabled', true);

                          }

                        }

                    });

                  }
                  else{

                    $('#selectPaketData').empty();
                    $('#selectPaketData').prop('disabled', true);

                  }  


                }

              });
        }


        $('#noHP_paketData').keyup(function(){

            if (this.value.length <= 3) {
                disablePaketData();
            }

            if (this.value.length == 4) {
              var code = $(this).val();
              checkProviderPaketData(code);
            }

        });

        $('#noHP_paketData').on('paste', function(e){
            var nohp = e.originalEvent.clipboardData.getData('text');
            if (nohp.length >= 4) {
                var code = nohp.substring(0,4);
                checkProviderPaketData(code);
            }
        });

  </script>

@stop