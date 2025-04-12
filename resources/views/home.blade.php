<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Lazy Load Styles */
        .card-image {
            display: block;
            min-height: 20rem;
            /* layout hack */
            background: #fff center center no-repeat;
            background-size: cover;
            filter: blur(3px);
            /* blur the lowres image */
        }

        .card-image>img {
            display: block;
            width: 100%;
            opacity: 0;
            /* visually hide the img element */
        }

        .card-image.is-loaded {
            filter: none;
            /* remove the blur on fullres image */
            transition: filter 1s;
        }




        /* Layout Styles */
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            font-size: 16px;
            font-family: sans-serif;
        }

        .card-list {
            display: block;
            margin: 1rem auto;
            padding: 0;
            font-size: 0;
            text-align: center;
            list-style: none;
        }

        .card {
            display: inline-block;
            width: 90%;
            max-width: 20rem;
            margin: 1rem;
            font-size: 1rem;
            text-decoration: none;
            overflow: hidden;
            box-shadow: 0 0 3rem -1rem rgba(0, 0, 0, 0.5);
            transition: transform 0.1s ease-in-out, box-shadow 0.1s;
        }

        .card:hover {
            transform: translateY(-0.5rem) scale(1.0125);
            box-shadow: 0 0.5em 3rem -1rem rgba(0, 0, 0, 0.5);
        }

        .card-description {
            display: block;
            padding: 1em 0.5em;
            color: #515151;
            text-decoration: none;
        }

        .card-description>h2 {
            margin: 0 0 0.5em;
        }

        .card-description>p {
            margin: 0;
        }
    </style>
</head>

<body>
    <ul class="card-list">






@foreach ($courses as $course )



<li class="card">
    <img  width="320" src="{{asset('Admin/' .$course->image   )}}" alt="">
        <h2>{{$course->title}} </h2>
        <p>{{$course->master}}</p>
    </a>
</li>

@endforeach


    </ul>
</body>

</html>
