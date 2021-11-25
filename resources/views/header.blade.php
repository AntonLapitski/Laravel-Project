<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Karl - Fashion Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>

<body>
@yield('content')

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/active.js') }}"></script>

<script type="text/javascript">

    $('.portfolio-menu button.btn').on('click', function (e) {
        e.preventDefault();

        var btnVal = $(this).val();

        $.ajax({
            url: "{{ route('get.products.by.category') }}",
            type: 'GET',
            data: {_token: '', id: btnVal},
            success: function (data) {
                $('.karl-new-arrivals').html(data);
            }
        });
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).text();
        var categories = getSelectedCategories();
        var colorValues = getSelectedColor();
        var rangeSliderValues = getSelectedPricesRange();
        var sizeValues = getSelectedSize();

        fetch_data(page, categories, colorValues, rangeSliderValues, sizeValues);
    });

    function fetch_data(page, categories, colorValues, rangeSliderValues, sizeValues) {
        $.ajax({
            url: "/get-paginated",
            data: {
                _token: '',
                page: page,
                category_id: categories,
                price: rangeSliderValues,
                color: colorValues,
                size: sizeValues
            },
            success: function (data) {
                $('.shop_grid_product_area .row').html(data);
            }
        });
    }

    $(".slider-range-price").on("slidestop", function(event, ui) {
        event.preventDefault();

        var categories = getSelectedCategories();
        var colorValues = getSelectedColor();
        var rangeSliderValues = getSelectedPricesRange();
        var sizeValues = getSelectedSize();

        $.ajax({
            url: "/get-filtered-data",
            type: 'GET',
            data: {
                _token: '',
                category_id: categories,
                price: rangeSliderValues,
                color: colorValues,
                size: sizeValues
            },
            success: function (data) {
                $('.shop_grid_product_area .row').html(data);
            }
        });
    });

    $(document).on('click', '.menu-list #menu-content2 a', function (event) {
        event.preventDefault();

        if ($(this).closest('li')[0].classList.contains('my-test')) {
            $(this).closest('li').removeClass("my-test");
        } else {
            $(this).closest('li').addClass("my-test");
        }

        var categories = getSelectedCategories();
        var colorValues = getSelectedColor();
        var rangeSliderValues = getSelectedPricesRange();
        var sizeValues = getSelectedSize();

        $.ajax({
            url: "/get-filtered-data",
            type: 'GET',
            data: {
                _token: '',
                category_id: categories,
                price: rangeSliderValues,
                color: colorValues,
                size: sizeValues
            },
            success: function (data) {
                $('.shop_grid_product_area .row').html(data);
            }
        });
    });

    $(document).on('click', '.my-another li', function (event) {
        event.preventDefault();

        if($(this)[0].classList.contains("minux")) {
            $(this).removeClass('minux');
        } else {
            $('.my-another li.minux').removeClass("minux");
            $(this).toggleClass("minux");
        }

        var categories = getSelectedCategories();
        var colorValues = getSelectedColor();
        var rangeSliderValues = getSelectedPricesRange();
        var sizeValues = getSelectedSize();

        $.ajax({
            url: "/get-filtered-data",
            type:'GET',
            data: {
                _token: '',
                category_id: categories,
                price: rangeSliderValues,
                color: colorValues,
                size: sizeValues
            },
            success: function(data) {
                $('.shop_grid_product_area .row').html(data);
            }
        });
    });

    $(document).on('click', '.my-another-two li', function (event) {
        event.preventDefault();

        if($(this)[0].classList.contains("maxum")) {
            $(this).removeClass('maxum');
        } else {
            $('.my-another-two li.maxum').removeClass("maxum");
            $(this).toggleClass("maxum");
        }
        var categories = getSelectedCategories();
        var colorValues = getSelectedColor();
        var rangeSliderValues = getSelectedPricesRange();
        var sizeValues = getSelectedSize();

        $.ajax({
            url: "/get-filtered-data",
            type:'GET',
            data: {
                _token: '',
                category_id: categories,
                price: rangeSliderValues,
                color: colorValues,
                size: sizeValues
            },
            success: function(data) {
                $('.shop_grid_product_area .row').html(data);
            }
        });
    });

    $(document).on('click', '.my-test-btn', function (event) {
        event.preventDefault();

        first_name = $('#first_name').val();
        last_name = $('#last_name').val();
        country = $('#country').val();
        address = $('#street_address').val();
        postcode = $('#postcode').val();
        city = $('#city').val();
        state = $('#state').val();
        phone = $('#phone_number').val();
        email= $('#email_address').val();

        $.ajax({
            url: "/checkout-place-order",
            type:'POST',
            data: {
                _token: '',
                first_name: first_name,
                last_name: last_name,
                country: country,
                address: address,
                postcode: postcode,
                city: city,
                province: state,
                phone: phone,
                email: email
            },
            success: function(data) {
                var obj = JSON.parse(data);
                if (obj['validation'] === 'error') {
                    $('#myModal').modal('show');
                    removeElementsByClass('my-testy');
                    removeElementsByClass('testy2');
                    $('.my-test-body').append('<h2 class="testy2 alert alert-danger">' + 'Validation Errors' + '</h2>');
                    finalData = '<ul class="my-testy">';
                    tmpData = '';
                    for (var key in obj['errors']) {
                        if (obj['errors'].hasOwnProperty(key)) {
                            tmpData += '<li>' + obj['errors'][key] + '</li>';
                        }
                    }
                    finalData = finalData + tmpData + '</ul>';

                    $('.my-test-body').append(finalData);
                }

                if (obj['validation'] === 'success') {
                    $('#modalSuccess').modal('show');
                    setTimeout(function(){ window.location.href = '/'; }, 3000);
                }
            }
        });
    });

    function removeElementsByClass(className){
        const elements = document.getElementsByClassName(className);
        while(elements.length > 0){
            elements[0].parentNode.removeChild(elements[0]);
        }
    }
    //get selected categories
    function getSelectedCategories() {
        var categories = [];
        var elementsLI = document.querySelectorAll('#menu-content2 li');
        var length = document.querySelectorAll('#menu-content2 li').length;
        for (let i = 0; i < length; i++) {
            if (elementsLI[i].classList.contains('my-test')) {
                categories.push(elementsLI[i].value)
            }
        }
        if (categories.length === 0) {
            return null;
        }

        return categories;
    }

    //get selected prices
    function getSelectedPricesRange() {
        return $('.slider-range-price').slider("values");
    }

    //get selected color
    function getSelectedColor() {
        var colorValues = [];
        var colorElementsLI = document.querySelectorAll('.my-another li');
        var colorElementsLength = document.querySelectorAll('.my-another li').length;
        for (let j = 0; j < colorElementsLength; j++) {
            if (colorElementsLI[j].classList.contains('minux')) {
                colorValues.push(colorElementsLI[j].value)
            }
        }
        if(colorValues.length === 0) {
            return null;
        }

        return colorValues;
    }

    //get selected size
    function getSelectedSize() {
        var sizeValues = [];
        var sizeElementsLI = document.querySelectorAll('.my-another-two li');
        var sizeElementsLength = document.querySelectorAll('.my-another-two li').length;
        for (let c = 0; c < sizeElementsLength; c++) {
            if (sizeElementsLI[c].classList.contains('maxum')) {
                sizeValues.push(sizeElementsLI[c].value)
            }
        }

        if(sizeValues.length === 0 ){
            return null;
        }

        return sizeValues;
    }
</script>

</body>
</html>
