<ul class="product_list grid col-7">
        @foreach ($products as $product)
        <li>
            <div class="product-container">
                <div class="left-block">
                    <div class="product-image-container">
                        <a class="product_img_link cover-image" href="{{ $product->productUri }}" title="Air Intake Hose for Toyota Camry 2.2L" itemprop="url">
                            <img class="img-responsive" src="http://busdetal.biz/public/img/products/{{ $product->picture_name }}" alt="Air Intake Hose for Toyota Camry 2.2L" title="Air Intake Hose for Toyota Camry 2.2L">
                        </a>
                    </div>
                </div>
                <div class="right-block">
                    <h5 itemprop="name">
                        <a class="product-name name" href="{{ $product->productUri }}" title="Air Intake Hose for Toyota Camry 2.2L" itemprop="url">
                            <span class="list-name">{{ $product->productName }}</span>
                            <span class="grid-name">{{ $product->productName }}</span>
                        </a>
                    </h5>
                    <div class="car_model"><strong>Модель:</strong>{{ $product-> carModel }}</div>
                    <div class="producer">Производитель: <img src="http://buscentr.com.ua/templates/images/flags/16/DE.png" title="Германия">  <em><span class="producer_hint" data-toggle="popover" title="" data-content="" data-original-title="GLYCO">GLYCO</span> {{ $product->providers_artikul }}</em></div>
                    <div class="content_price">
                    <span itemprop="price" class="price product-price">&nbsp;
                        <span class="productSpecialPrice">{{ $product->productPrice }}</span><span class="currency">&nbsp;грн</span>
                        <!--<span class="normalprice">$991.00 </span>-->
                        <!--<span class="productPriceDiscount">-25%</span>-->
                    </span>
                    </div>
                    <span class="availability">
                        <span class="label-danger"></span>
                   </span>
                    <div class="product-flags"></div>
                    <div class="button clearfix">
                        <a class="btn add-to-cart" href="#">
                            <span class="cssButton normal_button button  button_add_to_cart" onmouseover="this.className='cssButtonHover normal_button button  button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton normal_button button  button_add_to_cart'">&nbsp;Купить&nbsp;</span>
                        </a>
                        <a class="btn add-to-cart" href="#">
                            <span class="cssButton normal_button button  button_add_to_cart" onmouseover="this.className='cssButtonHover normal_button button  button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton normal_button button  button_add_to_cart'">&nbsp;В избранное&nbsp;</span>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
</ul>
<script type="text/javascript">
    $('.add-to-cart').click(function() {
        $.ajax({
            type: 'get',
            url: '/ajax',
            data: {'term': 12},
            success: function(result){
                $('body').append(result.data);
            }
        });
    });
</script>

