@push('after-scripts')
    <script src="/js/filter_product.js"></script>
@endpush

<div class="price-range">
    <h5>Khoảng giá</h5>
    <ul>
        <li>
            <label for="filter-less-100">
            <input onclick="filterByPrice(0, 100000)" type="radio" id="filter-less-100" name="filter-price" value="0-100000">
            <i class="fa"></i>
            Giá dưới 100.000đ
            </label>
        </li>   
        <li>
            <label for="filter-100-200">
            <input onclick="filterByPrice(100000, 200000)" type="radio" id="filter-100-200" name="filter-price" value="100000-200000">
            <i class="fa"></i>
            100.000đ - 200.000đ
            </label>
        </li>
        <li>
            <label for="filter-200-300">
            <input onclick="filterByPrice(200000, 300000)" type="radio" id="filter-200-300" name="filter-price" value="200000-300000">
            <i class="fa"></i>
            200.000đ - 300.000đ
            </label>
        </li>
        <li>
            <label for="filter-300-500">
            <input onclick="filterByPrice(300000, 500000)" type="radio" id="filter-300-500" name="filter-price" value="300000-500000">
            <i class="fa"></i>
            300.000đ - 500.000đ
            </label>
        </li>
        <li>
            <label for="filter-500-1000">
            <input onclick="filterByPrice(500000, 1000000)" type="radio" id="filter-500-1000" name="filter-price" value="500000-1000000">
            <i class="fa"></i>
            500.000đ - 1.000.000đ
            </label>
        </li>
        <li>
            <label for="filter-greater-1000">
            <input onclick="filterByPrice(1000000, 'greater')" type="radio" id="filter-greater-1000" name="filter-price" value="1000000-greater">
            <i class="fa"></i>
            Giá trên 1.000.000đ 
            </label>
        </li>
    </ul>
</div>
<x-tag-list :categoryId="$categoryId" :categorySlug="$categorySlug"></x-tag-list>