@extends('layouts.frontend.app')
@section('css')

@endsection

@section('content')

  @php
    use Modules\Categories\Models\Category;
  @endphp
		
	<div class="general-heading text-center">
        <h1>
          @if(count($category)==1)

            {{ title_case($category->name) }} 

          @else

            @php
              $title = Category::find($category->first()->parent_id);
            @endphp
            {{ title_case($title) }}


          @endif
        </h1>
    </div>

    <div class="list-product">
        <div class="wr-list-product container">
           <div class="row">
               <div class="right col-md-10 col-sm-10 pull-right">
                   <div class="dropdown shorting">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                            SHORT BY <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-custom">
                            <li><a href="#">Price</a></li>
                            <li><a href="#">Best Seller</a></li>
                            <li><a href="#">Date</a></li>
                        </ul>
                   </div> 
                   <div class="list-item row">   

                   @if($category->parent_id!=0)

                      @php
                        $categoryProduct = $category->product()->where('price', '!=', '0')->paginate(10);
                      @endphp

                      @foreach($categoryProduct as $product)
                        <div class="col-sm-3 col-md-3">
                            <div class="col-item">
                                <div class="photo">

                                  @if( $product->gallery->count() != 0 )

                                  @if( $product->getGalleryUtama->count() != 0 )
                                      @foreach($product->getGalleryUtama as $galleryUtama)
                                        <img src="{{ url($galleryUtama->path) }}" class="img-responsive" style="height: 270px; width: 270px;" />
                                      @endforeach
                                  @else
                                      <img src="{{ url($product->gallery->first()->path) }}" class="img-responsive" style="height: 270px; width: 270px;" />
                                  @endif

                                @else

                                  <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive" style="height: 270px; width: 270px;" />

                                @endif

                                    <!-- <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" /> -->
                                    <div class="action-choice text-center">
                                    <a href="{{ url('/add-cart/'.$product->id) }}">
                                    <button class="btn">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </button>
                                    </a>
                                    <button class="btn">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </button>
                                    <a href="{{ url('/product/'.$product->id) }}">
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
                                            @if(strlen($product->name) > 15 )
                                              {{ substr($product->name, 0, 15) }}...
                                            @else
                                              {{ $product->name }}
                                            @endif</p>
                                            <div class="potongan">
                                                @if($product->discount!=0 && $product->end_time_discount>=date('Y-m-d H:i:s') && $product->start_time_discount<=date('Y-m-d H:i:s'))
                                                  <p class="price-text-color sebelum pull-left"><b style="color: maroon;font-size: 11px;">Rp. {{ App\Helpers\Money::setRupiah($product->price) }}</b></p>
                                                  <p class="price-text-color pull-right"><b style="font-size: 12px;">Rp. {{ App\Helpers\Money::setRupiah( $product->price - ($product->price*$product->discount/100) ) }}</b></p>
                                                @else
                                                <p class="price-text-color pull-right"><b style="font-size: 12px;">Rp. {{ App\Helpers\Money::setRupiah( $product->price ) }}</b></p>
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

                        {{ $categoryProduct->render() }}

                    @else

                      @php
                        $childCategory = Category::where('parent_id', $category->id)->get();
                      @endphp

                      @foreach($childCategory as $cat)

                        @php
                          $categoryProduct = $cat->product()->where('price', '!=', '0')->paginate(10);
                        @endphp

                        @foreach($categoryProduct as $product)
                          <div class="col-sm-3 col-md-3">
                            <div class="col-item">
                                <div class="photo">

                                  @if( $product->gallery->count() != 0 )

                                  @if( $product->getGalleryUtama->count() != 0 )
                                      @foreach($product->getGalleryUtama as $galleryUtama)
                                        <img src="{{ url($galleryUtama->path) }}" class="img-responsive" style="height: 270px; width: 270px;" />
                                      @endforeach
                                  @else
                                      <img src="{{ url($product->gallery->first()->path) }}" class="img-responsive" style="height: 270px; width: 270px;" />
                                  @endif

                                @else

                                  <img src="{{ url('/frontend/images/empty.jpg') }}" class="img-responsive" style="height: 270px; width: 270px;" />

                                @endif

                                    <!-- <img src="{{ url('/frontend/images/product.jpg') }}" class="img-responsive" alt="a" /> -->
                                    <div class="action-choice text-center">
                                    <a href="{{ url('/add-cart/'.$product->id) }}">
                                    <button class="btn">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </button>
                                    </a>
                                    <button class="btn">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </button>
                                    <a href="{{ url('/product/'.$product->id) }}">
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
                                            @if(strlen($product->name) > 15 )
                                              {{ substr($product->name, 0, 15) }}...
                                            @else
                                              {{ $product->name }}
                                            @endif</p>
                                            <div class="potongan">
                                                @if($product->discount!=0 && $product->end_time_discount>=date('Y-m-d H:i:s') && $product->start_time_discount<=date('Y-m-d H:i:s'))
                                                  <p class="price-text-color sebelum pull-left"><b style="color: maroon;font-size: 11px;">Rp. {{ App\Helpers\Money::setRupiah($product->price) }}</b></p>
                                                  <p class="price-text-color pull-right"><b style="font-size: 12px;">Rp. {{ App\Helpers\Money::setRupiah( $product->price - ($product->price*$product->discount/100) ) }}</b></p>
                                                @else
                                                <p class="price-text-color pull-right"><b style="font-size: 12px;">Rp. {{ App\Helpers\Money::setRupiah( $product->price ) }}</b></p>
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

                        {{ $categoryProduct->render() }}

                      @endforeach

                    @endif
                  </div><!--END OF .LIST-ITEM-->
               </div><!--END OF .RIGHT-->
               <div class="left col-md-2 col-sm-2 pull-left">
                   <div class="search">
                       <div class="heading-search">
                           <p class="capital">Cari produk disini</p>
                       </div>
                       <div class="body-search">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search...">
                              <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                  <i class="fa fa-search"></i>
                                </button>
                              </div>
                            </div>
                       </div>
                   </div><!--END OF .SEARCH-->
                   <div class="range-harga">
                       <div class="heading-range">
                          <p class="capital">rentang harga</p>
                       </div>
                       <div class="body-range">
                         <input type="text" class="form-control" placeholder="Min">
                         <input type="text" class="form-control" placeholder="Max">
                         <button class="btn capital">Tampilkan</button>
                      </div>
                   </div><!--END OF .RANGE-HARGA-->
                   <div class="pengiriman">
                     <div class="heading-pengiriman">
                       <p class="capital">pengiriman</p>
                     </div>
                     <div class="body-pengiriman">
                       <select class="form-control selectpicker show-tick">
                         <option>
                           <p class="capital">Pilih</p>
                         </option>
                         <option>
                           <p class="capital">JNE</p>
                         </option>
                         <option>
                           <p class="capital">Tiki</p>
                         </option>
                         <option>
                           <p class="capital">Pos Indonesia</p>
                         </option>
                         <option>
                           <p class="capital">Si Cepat</p>
                         </option>
                       </select>
                     </div>
                   </div><!--END OF .PENGIRIMAN-->
                   <div class="produk-pilihan">
                     <div class="heading-produk-pilihan">
                       <p class="capital">Pilihan Produk</p>
                     </div>
                     <div class="body-produk-pilihan">
                       <ul class="pilihan">
                         <li class="list">
                           <input type="checkbox"> <span class="capital">Preorder</span>
                         </li>
                         <li class="list">
                           <input type="checkbox"> <span class="capital">cashback</span>
                         </li>
                         <li class="list">
                           <input type="checkbox"> <span class="capital">limited</span>
                         </li>
                       </ul>
                     </div>
                   </div>
               </div><!--END OF .LEFT-->
           </div><!--END OF .ROW-->
        </div><!--END OF .WR-LIST-PRODUCT-->
    </div><!--END OF .LIST-PRODUCT-->

@endsection

@section('javascript')

@stop