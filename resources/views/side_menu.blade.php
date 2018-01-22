<div class="side-menu">
    <ul class="flex-column">
        @foreach ($categories as $category)
            <li>
                <a class="category-top" href="{{$category->uri}}" title="{{$category->category_name}}">
                    <span>{{$category->category_name}}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
