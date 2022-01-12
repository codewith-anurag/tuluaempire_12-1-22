<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poketfiller mail</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
     *{margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}html,body{margin:0 auto !important;padding:0 !important;height:100% !important;width:100% !important;background:#f1f1f1;font-family:'Poppins',sans-serif}h1,h2,h3,h4,h5,h6{font-family:'Poppins',sans-serif;color:#030304;margin-top:0;font-weight:500;font-size:32px}.topimg{width:100%;margin:0 auto}.topimg img{margin-top:108px;width:180px}p{color:#030304;font-size:16px;text-align:center}table{border-spacing:0 !important;border-collapse:collapse !important;table-layout:fixed !important;margin:0 auto !important;background-color:#fff;width:700px}.hedding{margin-top:20px;padding:0px 100px}.hedding1{margin-top:27px;margin-bottom:20px;padding:0px 100px}.contain1{margin-top:55px}.contain1 p{font-size:20px;font-weight:300;text-align:left}.contain1 span{font-weight:600}.contain2{margin-top:25px}.contain2 p{font-size:17px;font-weight:300;text-align:justify}.contain3{margin-top:25px}.contain3 p{font-weight:300;text-align:left}.contain4{margin-top:25px}.contain4 p{font-weight:300;text-align:left}.contain4 span{font-size:40px;font-weight:300;text-align:left;line-height:40px}.contain5{margin-top:75px}.contain5 p{font-weight:300;text-align:left}.contain6{margin-top:85px;margin-bottom:75px}.contain6 p{font-weight:300;text-align:left;display:flex}.contain6 ul{list-style:none;display:flex;margin-left:30px}.contain6 ul li{margin-left:10px;margin-top:40px}.footerback{background-color:#01446f}.contain5 a{text-decoration:none;color:#030304}.contain6 ul li a img{width:33px}
    </style>
</head>
<body>
    <table role="presentation" cellspacing="0" cellpadding="0" width="100%" style="margin: auto;">
        <div class="tablestart">
            <tr>
                <td>
                    <div class="topimg">
                        <img src="{{ asset('front/img/logo_1.png') }}" alt="Tulua Empire" width="35%"
                            style="margin: 0px auto; display: flex; padding-top: 70px; width: 250px;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="hedding">
                            <h1 style="text-align: center;">New Contact Message is Comming </h1>
                            <div class="contain1">
                                <p> Hi ,Admin </p>
                            </div>
                        <div class="contain2">
                            <p> New Contact Message Is Coming form User {{$name}}</p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="hedding">
                        <div class="contain2">
                            <label style="font-size:15px !important;font-style:bold !important;">Name : </label> {{$name}}

                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="hedding">
                        <div class="contain2">
                            <label style="font-size:15px !important;font-style:bold !important;">Phone : </label> {{$phone}}

                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="hedding">
                        <div class="contain2">
                            <label style="font-size:15px !important;font-style:bold !important;">Email : </label> {{$email}}

                        </div>
                    </div>
                </td>
            </tr>


            <tr>
                <td>
                    <div class="hedding1">
                        <label style="font-size:15px !important;font-style:bold !important;">Message : </label>
                        <p>{!! $usermessage !!}</p>
                    </div>
                </td>
            </tr>
        </div>
    </table>
</body>
</html>
