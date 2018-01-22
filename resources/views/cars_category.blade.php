<ul class="category-choose flex-inline col-7">
        @foreach ($cars as $car)
            <li>
                <a href="{{ $car->uri }}">
                    <div class="category-image flex-inline">
                        <img src="http://busdetal.biz/public/img/products_category/{{ $car->picture_name }}" class="img-responsive" alt="Dolor sit" title=" Dolor sit " width="158" height="64">
                    </div>
                    <span>{{ $car->category_name }}</span>
                </a>
            </li>
        @endforeach
</ul>
