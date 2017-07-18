@extends('layouts.frontend.app')

@section('css')
	



@endsection

@section('content')
	
  
  <div class="general-heading text-center">
        <h1>{{ $product->name }}</h1>
    </div>

    <div class="single-produk">
        <div class="wr-single-produk container">
           <div class="row">
               <div class="left col-md-9 col-sm-9">
                  <div class="produk row">
                    <div class="image-produk col-md-3 col-sm-3">
                      <div class="tab-content tab-custom">
                        @if($product->gallery->count()!=0)

                          @php 
                              $idGalleryUtama = array(); 
                          @endphp

                          @if($product->getGalleryUtama->count()!=0)

                            @foreach($product->getGalleryUtama as $galleryUtama)

                                <div class="tab-pane pane-custom active" id="{{$galleryUtama->id}}">
                                  <img src="{{ url($galleryUtama->path) }}" class="img-responsive">
                                </div>

                                @php 
                                  $idGalleryUtama[] = $galleryUtama->id; 
                                @endphp

                            @endforeach

                            @php $otherGallery = $product->gallery()->whereNotIn('gallery_id', $idGalleryUtama)->get(); @endphp
                            
                            @foreach($otherGallery as $gallery)

                               <div class="tab-pane pane-custom" id="{{$gallery->id}}">
                                  <img src="{{ url($gallery->path) }}">
                                </div>

                            @endforeach

                          @else

                            @foreach($product->gallery as $gallery)
                                <div class="tab-pane pane-custom 
                                    @if($gallery->id == $product->gallery->first()->id)) 
                                      active 
                                    @endif
                                    " id="{{$gallery->id}}">
                                  <img src="{{ url($gallery->path) }}">
                                </div>
                            @endforeach

                          @endif

                        @endif
                      </div><!--END OF .TAB-CUSTOM-->
                      <ul class="nav nav-pills nav-custom" id="tab" data-toggle="buttons-radio">
                        @if($product->gallery->count()!=0)
                          @foreach($product->gallery as $gallery)
                            <li role="presentation"  @if($gallery->pivot->set_utama == 1) class="active" @endif >
                              <a href="#{{ $gallery->id }}" data-toggle="tab">
                                <img src="{{ url($gallery->path) }}">
                              </a>
                            </li>
                          @endforeach
                        @endif
                      </ul><!--END OF .NAV-CUSTOM-->
                    </div><!--END OF .IMAGE-PRODUK-->
                    <div class="nama-produk col-md-9 col-sm-9">
                      <div class="heading-produk">
                        <h4 class="capital">{{ $product->name }}</h4>
                        <div class="rate-wish">
                          <div class="rating pull-left">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                          </div>
                          <button class="btn capslock pull-right">
                            <i class="fa fa-heart" aria-hidden="true"></i> wishlist
                          </button>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                      <div class="body-produk">
                        <h4 class="capital">
                          
                          @if($product->discount!=0 && $product->end_time_discount>=date('Y-m-d H:i:s') && $product->start_time_discount<=date('Y-m-d H:i:s'))
                            Rp. {{ App\Helpers\Money::setRupiah( $product->price - ($product->price*$product->discount/100) ) }}
                          @else

                            Rp. {{ App\Helpers\Money::setRupiah($product->price) }}

                          @endif

                        </h4>
                        <p class="capital">stock : {{ $product->stok }} pcs</p>
                        <p class="capital">masukan jumlah barang</p>
                        <div class="input-group col-md-3 col-sm-3 col-xs-3">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>

                            <form id="addCart-form" method="get" action="{{ url('/add-cart/'.$product->id) }}">
                              <input type="hidden" name="idProduct" value="{{ $product->id }}">
                              <input type="text" name="quant" class="form-control input-number" value="1" min="1" max="10">
                            </form>

                            <form id="addProduct-form" method="get" action="{{ url('/payment/product/'.$product->id) }}">
                              <input type="hidden" name="idProduct" value="{{ $product->id }}">
                              <input type="hidden" name="quant" class="form-control input-number" value="1" min="1" max="10">
                            </form>

                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                      </div>
                      <div class="footer-produk">

                          <a onclick="event.preventDefault();document.getElementById('addProduct-form').submit();">
                            <button class="btn capslock beli">beli sekarang</button>
                          </a>

                          <a onclick="event.preventDefault();document.getElementById('addCart-form').submit();">
                          <button class="btn capslock tambah-cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> tambahkan ke keranjang
                          </button>
                          </a>
                          
                      </div>
                    </div><!--END OF .NAMA-PRODUK-->
                  </div><!--END OF .PRODUK-->

                  <div class="detail-ulasan">
                    <ul class="nav nav-tabs nav-tabs-custom" id="tab" data-toggle="buttons-radio">
                      <li role="presentation" class="active">
                        <a href="#detail-produk" class="capslock" data-toggle="tab">detail produk</a>
                      </li>
                      <li role="presentation">
                        <a href="#ulasan" class="capslock" data-toggle="tab">ulasan</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-custom">
                      <div class="tab-pane active" id="detail-produk">
                        <div class="informasi">
                          <h4 class="capital">informasi</h4>
                          <p class="capital">
                            <i class="fa fa-heart" aria-hidden="true"></i>  difavoritkan   :   1000
                          </p>
                          <p class="capital">
                            <i class="fa fa-eye" aria-hidden="true"></i>  dilihat   :   2000
                          </p>
                          <p class="capital">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>  terjual   :   1500
                          </p>
                        </div>
                        <div class="detail-produk">
                          <h4 class="capital">deskripsi</h4>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                      </div><!--END OF #DETAIL-PRODUK-->
                      <div class="tab-pane" id="ulasan">
                        <div class="list-ulasan">
                          <div class="heading-list-ulasan row">
                            <div class="col-md-1 col-sm-1">
                              <div class="image">
                                <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive">
                              </div>
                            </div>
                            <div class="col-md-11 col-sm-11">
                              <div class="nama-rate">
                                <div class="nama-user pull-left">
                                  <p class="capital">nama user</p>
                                </div>
                                <div class="rating">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                              <div class="date">
                                <p class="capital">rabu, 17 juni 2017 - 10.00 WIB</p>
                              </div>
                            </div>
                          </div>
                          <div class="body-list-ulasan">
                            <p>Fast respon, barang sesuai dengan gambar.</p>
                          </div>
                        </div><!--END OF .LIST-ULASAN-->
                        <div class="list-ulasan">
                          <div class="heading-list-ulasan row">
                            <div class="col-md-1 col-sm-1">
                              <div class="image">
                                <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive">
                              </div>
                            </div>
                            <div class="col-md-11 col-sm-11">
                              <div class="nama-rate">
                                <div class="nama-user pull-left">
                                  <p class="capital">nama user</p>
                                </div>
                                <div class="rating">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                              <div class="date">
                                <p class="capital">rabu, 17 juni 2017 - 10.00 WIB</p>
                              </div>
                            </div>
                          </div>
                          <div class="body-list-ulasan">
                            <p>Fast respon, barang sesuai dengan gambar.</p>
                          </div>
                        </div><!--END OF .LIST-ULASAN-->
                        <div class="view-more text-center">
                          <a href="#" class="capital">view more</a>
                        </div>
                      </div><!--END OF #ULASAN-->
                    </div><!--END OF .TAB-CUSTOM-->
                  </div><!--END OF .DETAIL-ULASAN-->
               </div><!--END OF .LEFT-->
               <div class="right col-md-3 col-sm-3">
                  <div class="pengiriman">
                     <div class="table-responsive">
                       <table>
                        <tr>
                          <td>
                            <p class="capslock">pengiriman</p>
                          </td>
                          <td>
                            <p class="capslock">reguler</p>
                          </td>
                          <td>
                            <p class="capslock">kilat</p>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p class="capslock">jne</p>
                          </td>
                          <td>
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </td>
                          <td>
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p class="capslock">tiki</p>
                          </td>
                          <td>
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </td>
                          <td>
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p class="capslock">pos</p>
                          </td>
                          <td>
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </td>
                          <td>
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p class="capslock">j&t</p>
                          </td>
                          <td>
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </td>
                          <td>
                            <i class="fa fa-check" aria-hidden="true"></i>
                          </td>
                        </tr>
                      </table>
                     </div>
                  </div><!--END OF .PENGIRIMAN-->
               </div><!--END OF .RIGHT-->
           </div><!--END OF .ROW-->
           <div class="related-product">
              <div class="wr-related-product">
                <div class="heading-related-product">
                  <h2 class="capslock">best product</h2>
                </div>
                <div class="list-item row">
                  <div class="col-sm-2 col-md-2">
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
                                      <div class="potongan text-center">
                                          <p class="price-text-color sebelum">Rp.170.000</p>
                                          <p class="price-text-color">Rp.100.000</p>
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="clearfix"></div>
                          </div><!--END OF .INFO-->
                      </div><!--END OF .COL-ITEM-->
                  </div>
                  <div class="col-sm-2 col-md-2">
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
                                      <div class="potongan text-center">
                                          <p class="price-text-color sebelum">Rp.170.000</p>
                                          <p class="price-text-color">Rp.100.000</p>
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="clearfix"></div>
                          </div><!--END OF .INFO-->
                      </div><!--END OF .COL-ITEM-->
                  </div>
                  <div class="col-sm-2 col-md-2">
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
                                      <div class="potongan text-center">
                                          <p class="price-text-color sebelum">Rp.170.000</p>
                                          <p class="price-text-color">Rp.100.000</p>
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="clearfix"></div>
                          </div><!--END OF .INFO-->
                      </div><!--END OF .COL-ITEM-->
                  </div>
                  <div class="clearfix"></div>
                </div><!--END OF .LIST-ITEM-->
              </div><!--END OF .WR-RELATED-PRODUCT-->
            </div><!--END OF .RELATED-PRODUCT-->
        </div><!--END OF .WR-LIST-PRODUCT-->
    </div><!--END OF .LIST-PRODUCT-->	
 

@endsection

@section('javascript')
	
	<script type="text/javascript">
   
    //plugin bootstrap minus and plus
        //http://jsfiddle.net/laelitenetwork/puJ6G/
        $('.btn-number').click(function(e){
            e.preventDefault();
            
            fieldName = $(this).attr('data-field');
            type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if(type == 'minus') {
                    
                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    } 
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if(type == 'plus') {

                    if(currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if(parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {
            
            minValue =  parseInt($(this).attr('min'));
            maxValue =  parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());
            
            name = $(this).attr('name');
            if(valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if(valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            
            
        });
        $(".input-number").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) || 
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                        // let it happen, don't do anything
                        return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

  </script>

@stop