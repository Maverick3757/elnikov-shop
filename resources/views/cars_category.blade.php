<ul class="category-choose flex-inline col-7">
        @foreach ($categories as $category)
            <li>
                <a href="{{ $category->uri }}">
                    <div class="category-image flex-inline">
                        <img src="http://busdetal.biz/public/img/products_category/{{ $category->picture_name }}" class="img-responsive" alt="Dolor sit" title=" Dolor sit " width="158" height="64">
                    </div>
                    <span>{{ $category->category_name }}</span>
                </a>
            </li>
        @endforeach
</ul>
