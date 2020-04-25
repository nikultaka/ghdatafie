<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title></title>
    </head>
    <body>


        <h2>Hi, {{Auth::user()->name}}</h2>

        <p>Your payment of ${{$amount}} for "{{$title}}" is successfull.</p>

    </body>
</html>

