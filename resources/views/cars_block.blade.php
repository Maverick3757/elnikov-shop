<div class="col-7 flex-inline flex-wrapped brand-choose">
    @foreach ($cars as $car)
        <div class="flex-inline menu-block">
            <div class="flex-column col-7">
                <a href="{{ $car->brandUrl }}" class="menu-block-tittle">
                    <h3>{{ $car->brand_name }}</h3>
                </a>
                <ul class="menu-block-inner">
                    @foreach ($car->getModels($car->model_names) as $car_model)
                        <li><a href="{{ $car->getModelUrlAttribute($car_model) }}">{{ $car_model}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-column col-3" style="background:url('http://busdetal.biz/public/img/car_brands/{{ $car->picture_name }}') right no-repeat;background-size: contain"></div>
        </div>
    @endforeach
</div>
