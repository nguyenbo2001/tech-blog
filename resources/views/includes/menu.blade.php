<div class="col-md-3">
  <ul class="list-group" id="menu">
    <li class="list-group-item menu1 active">
      Danh sách thể loại
    </li>
    @isset($data['term'])
      @foreach($data['term'] as $term)
        @if(count($term->category) > 0)
          <li class="list-group-item category-list">
            {{ $term->name }}
          </li>
          <ul>
            @foreach($term->category as $category)
              <li class="list-group-item">
                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
              </li>
            @endforeach
          </ul>
        @endif
      @endforeach
    @endisset
  </ul>
</div>
