<!doctype html>

<title>Rick and Morty</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
    body {
        margin-top:1%;
        height:100%;
        color: black;
        background-color: white;
        margin-bottom:32%;
    }
    .row {
        border:1px solid black;
        border-radius:14px;
        margin-bottom:8px;
        box-shadow: 10px 10px 8px #888888;
        color:white;
        background-color: #343333;
        padding-top:5px;
        padding-bottom:5px;
    }
    input {
        padding: 10px;
    }
    label {
        display:flex;
        flex-direction:column;
    }
    p {
        font-size:1rem;
    }
    h2 {
        color:  white;
        animation-name: example2;
        animation-duration: 2s;
        font-family: "Courier";
        font-weight:bold;
    }
    h4 {
        color:  white;
        animation-name: example;
        animation-duration: 4s;
        padding: 10px;
    }
    h4:first-of-type {
        margin-top:5%;
    }

    input {
        padding: 10px;
    }
    canvas {
        background-color: #5079FA;
    }
    .zoom {
        padding: 50px;
        transition: transform .2s; /* Animation */
        cursor: pointer;
        margin: 0 auto;
    }

    @keyframes example {
        from {color: #66AFF9;}
        to {color: white;}
    }
    @keyframes example2 {
        from {opacity: 0;color:darkred}
        to {opacity: 1;color:white}
    }
    .zoom:hover {
        transform: scale(2.0); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
    image {
        width:50px;
        height:50px;
    }
</style>
<body>
@yield('content')
</body>
