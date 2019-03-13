
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-3.min.css')}}" rel="stylesheet">
</head>
<body>
<div class="well">
    <h2 style="text-align:center;">{{$title}}</h2>
    <p >Dear {{$name}},</p>
    <p>
        Your investment with transaction no  {{$transaction_no}} is {{$status}} at <?php
        $dateTime = new DateTime('now', new DateTimeZone('Asia/Yangon'));

        echo $dateTime->format("d-M-Y  h:i A"); ?>


    </p>


    <h4>Investment Details</h4>
    <p style="margin-top:-20px;">

        <i>Project Code No</i>    : {{$code_no}}<br>
        <i>Project Name</i>       : {{$project_title}}<br>
        <i>Investment Amount</i>  : {{number_format($amount)}} MMK<br>
        <i>Investment Date</i>    : {{$investment_date}}

    </p>


    Best Regards,<br>
    Crowdfunding Myanmar Team

</div>
</body>
</html>





