@section('style')
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <style>
        .custom-button {
            background-color: #f1f3f5;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-button:hover {
            background-color: #00204a !important;
            ;
            color: #fff !important;
            ;
        }
    </style>
@stop

@section('script')
    <!-- Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.property-slider').slick({
                slidesToShow: 3, // عدد المنتجات التي تظهر في وقت واحد
                slidesToScroll: 1, // عدد المنتجات التي تتحرك مع كل نقرة
                prevArrow: $('.prev'), // ربط زر Prev
                nextArrow: $('.next'), // ربط زر Next
                infinite: false, // لتعطيل التحريك اللانهائي
            });
        });
    </script>
@stop
