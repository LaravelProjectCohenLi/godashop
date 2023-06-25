@if ($tags->isNotEmpty())
    <div class="tag">
        @foreach ($tags as $tag)
            <div class="tag{{ $tag->id }}">
                <a href="{{ route($routeName, array_merge($params, ['tag_id' => $tag->id])) }}" class="tag-content">{{ $tag->name }}</a>
            </div>
        @endforeach
    </div>
@endif