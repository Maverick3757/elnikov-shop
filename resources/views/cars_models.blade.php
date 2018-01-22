<ul class="models-choose flex-inline col-7">
    @php
        $pictures = explode('||',$cars->model_picture);
    @endphp
    @unless(count(array_filter($cars->getModels($cars->model_names), function($value) { return $value !== ''; }))==0)
        @foreach ($cars->getModels($cars->model_names) as $index=>$car)
            <li>
                <a href="{{ $cars->getModelUrlAttribute($car) }}">
                    <div class="models-image flex-inline">
                        <img src="http://busdetal.biz/public/img/car_models/{{ $pictures[$index] }}" class="img-responsive" alt="Dolor sit" title=" Dolor sit " width="158" height="64">
                    </div>
                    <span>{{ $car }}</span>
                </a>
            </li>
        @endforeach
    @endunless
</ul>
