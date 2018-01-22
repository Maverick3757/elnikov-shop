<ul class="packages flex col-7">
    @foreach ($cars as $car)
        <li class="flex-wrapped flex-column">
            <span>{{ $car->build_years }}</span>
            <ul class="packages-block flex-column" style="background-image:url('http://busdetal.biz/public/img/car_packing/{{ $car->picture_name }}')">
                @php
                    $engines_id = $car->getEnginesId($car->engine_id);
                @endphp
                    <li><a href="{{ $car->getEngineUrlAttribute($car->package_id) }}">Любой объем</a></li>
                @foreach ($car->getEngines($car->engine) as $index=>$car_engine)
                    <li><a href="{{ $car->getEngineUrlAttribute($car->package_id.'-'.$engines_id[$index]) }}">{{ $car_engine }}</a></li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>