<html>

<body>
    Hi {{Str::title($buyer_name)}},<br>
    Greetings from GLOBAL CARPATICA SL <br><br>
    This Mail is regarding your recent purchase through GLOBAL CARPATICA SL. <br><br>
    Please spare some time to rate your below purchase from {{Str::title($seller_name)}} : <br>
    <br>
    <br>
    Game : {{$game_name}} <br> <br>
    Product : {{$product_name}} <br> <br>
    Bought Quantity : {{$quantity}} <br> <br>
    <br>
    Please click the link below to rate your experience : <br>
    ---------------------------------- <br>
    <!-- <a href="{{ url("rate-purchase?&transaction=$id") }}">{{ url("rate-purchase?&transaction=$id") }}</a> <br> -->
    <a href="https://game3.40bears.com/rate-purchase?&transaction={{$id}}">Click Here</a> <br>
    ---------------------------------- <br>
    <br>
    Thanks and Regards
    GLOBAL CARPATICA SL Ltd.

</body>

</html>