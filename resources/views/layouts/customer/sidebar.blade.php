<div class="col-lg-3">
    <div class="shop__sidebar">
        @php
            $categories = App\Models\Category::all();
            $brands = App\Models\Brand::all();
        @endphp

        <form action="{{ url("/category/") }}" method="get">
            <div class="filter-container__selected-filter selected-filter-container">
                <div class="filter-container__selected-filter-header clearfix d-flex">
                    <span class="filter-container__selected-filter-header-title">Bạn chọn</span>
                    <a href="javascript:void(0)" class="filter-container__clear-all d-lg-none ml-auto">Bỏ hết</a>
                    <a href="javascript:void(0)" class="filter-container__clear-all close_destop d-none d-lg-block ml-auto">Bỏ hết</a>
                </div>
                <div class="filter-container__selected-filter-list">
                    <ul class="d-flex flex-wrap">
                        {{-- Thêm các mục đã chọn tương tự vào đây --}}
                    </ul>
                </div>
                <div class="filter-container__filter-button">
                    <button type="submit" class="btn btn-primary" id="filterButton">Lọc</button>
                </div>
            </div>

            <div class="shop__sidebar__accordion">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="shop__sidebar__categories">
                                    <ul class="nice-scroll">
                                        @foreach($categories as $item)
                                            <li>
                                                <a href="{{ url("/category", ["category_id" => $item->id]) }}" class="category-item" data-type="category"
                                                    {{ app("request")->input("category_id") == $item->id ? 'class=selected' : '' }}>
                                                    {{ $item->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                        </div>
                        <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="shop__sidebar__price">
                                    <ul>
                                        <li><a href="#" class="filter-price-item" data-type="price">Under $20.00</a></li>
                                        <li><a href="#" class="filter-price-item" data-type="price">$20.00 - $40.00</a></li>
                                        <li><a href="#" class="filter-price-item" data-type="price">$40.00 - $60.00</a></li>
                                        <li><a href="#" class="filter-price-item" data-type="price">$60.00 - $80.00</a></li>
                                        <li><a href="#" class="filter-price-item" data-type="price">Over $80.00</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                        </div>
                        <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="shop__sidebar__brand">
                                    <ul class="nice-scroll">
                                        @foreach($brands as $item)
                                            <li>
                                                <a href="{{ url("/category", ["brand_id" => $item->id]) }}" class="category-item" data-type="brand"
                                                    {{ app("request")->input("brand_id") == $item->id ? 'class=selected' : '' }}>
                                                    {{ $item->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        var selectedCategories = [];
        var selectedPrices = [];
        var selectedBrands = [];

        $('.shop__sidebar__categories ul li a, .shop__sidebar__brand ul li a, .filter-price-item').on('click', function (e) {
            e.preventDefault();
            var itemName = $(this).text().trim();
            var itemType = $(this).data('type');

            updateHiddenInputs(itemType, itemName);
            updateSelectedItems();
        });


        $('#filterButton').on('click', function (e) {
            e.preventDefault();
            filterItems();
        });


        $('.filter-container__clear-all').on('click', function (e) {
            e.preventDefault();
            selectedCategories = [];
            selectedPrices = [];
            selectedBrands = [];
            updateHiddenInputs('category', '');
            updateHiddenInputs('price', '');
            updateHiddenInputs('brand', '');
            updateSelectedItems();
        });

        function updateHiddenInputs(type, value) {
            switch (type) {
                case 'category':
                    selectedCategories = updateSelectedItemsArray(selectedCategories, value);
                    $('#selectedCategories').val(selectedCategories.join(','));
                    break;
                case 'price':
                    selectedPrices = updateSelectedItemsArray(selectedPrices, value);
                    $('#selectedPrices').val(selectedPrices.join(','));
                    break;
                case 'brand':
                    selectedBrands = updateSelectedItemsArray(selectedBrands, value);
                    $('#selectedBrands').val(selectedBrands.join(','));
                    break;
            }
        }

        function updateSelectedItemsArray(array, item) {
            if (array.includes(item)) {
                array = array.filter(function (arrayItem) {
                    return arrayItem !== item;
                });
            } else {
                array.push(item);
            }
            return array;
        }

        function updateSelectedItems() {
            var $selectedFilterList = $('.filter-container__selected-filter-list ul');
            $selectedFilterList.empty();

            selectedCategories.forEach(function (item) {
                $selectedFilterList.append('<li class="filter-container__selected-filter-item" for="filter-category-' + item + '"><a href="javascript:void(0)" onclick="removeFilteredItem(\'category\', \'' + item + '\')"><i class="fa fa-close"></i>' + item + '</a></li>');
            });

            selectedPrices.forEach(function (item) {
                $selectedFilterList.append('<li class="filter-container__selected-filter-item" for="filter-price-' + item + '"><a href="javascript:void(0)" onclick="removeFilteredItem(\'price\', \'' + item + '\')"><i class="fa fa-close"></i>' + item + '</a></li>');
            });

            selectedBrands.forEach(function (item) {
                $selectedFilterList.append('<li class="filter-container__selected-filter-item" for="filter-brand-' + item + '"><a href="javascript:void(0)" onclick="removeFilteredItem(\'brand\', \'' + item + '\')"><i class="fa fa-close"></i>' + item + '</a></li>');
            });

            $('.selected-filter-container').toggle(selectedCategories.length > 0 || selectedPrices.length > 0 || selectedBrands.length > 0);

            var textColor = selectedCategories.length > 0 || selectedPrices.length > 0 || selectedBrands.length > 0 ? $selectedFilterList.find('li').css('color') : '';
            $('.filter-container__clear-all').css('color', textColor);
        }

        function removeFilteredItem(type, item) {
            updateHiddenInputs(type, '');
            updateSelectedItems();
        }

        function filterItems() {
            var url = "{{ url('/category/') }}?selectedCategories=" + selectedCategories.join(',') + "&selectedPrices=" + selectedPrices.join(',') + "&selectedBrands=" + selectedBrands.join(',');
            window.location.href = url;
        }

        updateSelectedItems();
    });
</script>



<style>
    .filter-container__selected-filter-list ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
    }

    .filter-container__selected-filter-item {
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .filter-container__selected-filter-item a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #000;
    }

    .filter-container__selected-filter-item i {
        margin-right: 5px;
        cursor: pointer;
        color: #000;
    }

    .selected-filter-container {
        display: none;
    }
</style>
