<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Social Share Buttons In Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        div#social-links{
            margin: 0 auto;
            max-width: 500px;
        }
        div#social-links ul li{
            display: inline-block;
        }
        div#social-links ul li a{
            padding: 10px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 20px;
            color: #222;
            background-color: #ccc;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-5 text-center">Laravel Social Share Example</h2>
        {!! $shareButtons !!}
    </div>
</body>

</html>