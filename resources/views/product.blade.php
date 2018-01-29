@php
    $field_values=$product->productFieldsValues;
    $pictures=$product->pictures;
@endphp
<div class="item">
    <div class="item-img">
        <div class="item-img_one">
            <div class="item-img_hidden"></div>
            <img src="{{url("http://busdetal.biz//public/img/products/".$pictures[0])}}" alt="" class="item-img_visible">
        </div>
        <div class="item-img_all">
            @foreach ($pictures as $picture)
                <div class="item-img_min">
                    <div class="item-img_hidden"></div>
                    <img src="{{url("http://busdetal.biz//public/img/products/".$picture)}}" alt="" class="item-img_visible">
                </div>
            @endforeach
        </div>
    </div>
    <div class="item-info">
        <h2 class="item-title">
            {{$product->productTittle}} {{$product->providers_artikul}}
        </h2>
        <div class="item-articul">Артикул: {{$product->providers_artikul}}</div>
        <div class="item-price">
            <span class="item-price_text">Цена:</span>
            <span class="item-price_price">{{$product->productPrice}} грн</span>
        </div>
        <div class="item-characteristics">
            <div class="characteristic">
                <span class="characteristic-text">Название запчасти:</span>
                <span class="characteristic-info name">{{$product->product_name}}</span>
            </div>
            <div class="characteristic">
                <span class="characteristic-text">Группа запчастей:</span>
                <span class="characteristic-info">{{$product->category_name}}</span>
            </div>
            <div class="characteristic">
                <span class="characteristic-text">Автомобиль:</span>
                <span class="characteristic-info">{{$product->car}}</span>
            </div>
            <div class="characteristic">
                <span class="characteristic-text">Номер ОЕ:</span>
                <span class="characteristic-info">{{$product->vin}}</span>
            </div>
            <div class="characteristic">
                <span class="characteristic-text">Производитель:</span>
                <span class="characteristic-info"><img src="img/flag.png" alt="" class="characteristic-flag">GLYCO H1057/5 0.30</span>
            </div>
            <div class="characteristic">
                <span class="characteristic-text">Возможные заменители:</span>
                <span class="characteristic-info">4000896188451</span>
            </div>

            @foreach ($product->productFieldsNames as $index=>$field_name)
                <div class="characteristic">
                    <span class="characteristic-text">{{$field_name}}:</span>
                    <span class="characteristic-info">{{$field_values[$index]}}</span>
                </div>
            @endforeach
        </div>
        <div class="item-buttons">
            <input type="number" class="item-count" name="item_count" placeholder="0" maxlength="5" min="0" max="99999">
            <button class="item-buy">Купить</button>
            <button class="item-favorites">
                В избранное
            </button>
        </div>
    </div>
</div>
