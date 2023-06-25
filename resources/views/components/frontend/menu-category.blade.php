@if ($menuType == 'top')    
    @if ($categories->count() > 0)
    <div class="header__menu-level1">
        <ul class="header__menu-level1-list">
            @foreach ($categories as $category)
            <li class="header__menu-level1-item">
                <a href="{{$category->slugUrl}}" class="header__menu-level1-link">{{$category->name}}</a>
                @if ($category->sub->count() > 0)
                <i class="header__menu-level1-icon fa-solid fa-forward"></i>
                    <div class="header__menu-level2">
                        <ul class="header__menu-level2-list">
                            @foreach ($category->sub as $sub)
                            <li class="header__menu-level2-item">
                                <a href="{{$sub->slugUrl}}" class="header__menu-level2-link">{{$sub->name}}</a>
                            </li>
                            @endforeach 
                        </ul>
                    </div>
                @endif
            </li>
            @endforeach   
        </ul>
    </div>
    @endif
@endif

@if ($menuType == 'left')    
    @if ($categories->count() > 0)
    <ul class="dropdown-menu">
        @foreach ($categories as $category)
        <li><a href="{{$category->slugUrl}}" class="header__menu-level1-link {{ $categoryId == $category->id ? 'active-menu' : ''}}">{{$category->name}}</a>
            @if ($category->sub->count() > 0)<i class="icon-menu fas fa-chevron-down"></i>
                <ul class="sub-menu">
                    @foreach ($category->sub as $sub)
                        <li class="header__menu-level2-item">
                            <a href="{{$sub->slugUrl}}" class="header__menu-level2-link {{ $categoryId == $category->id ? 'active-menu' : ''}}">{{$sub->name}}</a>
                        </li>
                    @endforeach 
                </ul>
            @endif
        </li>
        @endforeach 
    </ul>
    @endif
@endif
