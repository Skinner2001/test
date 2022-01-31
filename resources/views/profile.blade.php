@extends ('components.layout')
@section('content')
    <div class="container">
        <div class="row pb-3">
            <div class="col-md-4 text-center">
                <label>{{$name->name}}</label>
                <img src="{{$name->image}}" style="width:400px;margin-bottom:4px;border-radius:8px">
            </div>
            <div class="col-md-1">
                <span>Species</span>
                <p>{{$name->species}}</p>
            </div>
            <div class="col-md-3">
                <span>Origin</span>
                @php
                    $a = explode(",", $name->origin);
                    echo "<p>". $a[0] . "</p>";
                    echo "<p>". $a[1] . "</p>";
                @endphp
            </div>
            <div class="col-md-4">
                <span>Episodes</span>
                <div style="word-wrap: break-word">
                    @php
                        $a = explode(",", $name->episodes);
                        $count = count($a) - 2;
                        for ($x = 0; $x <= $count; $x++) {
                            $lastslash = strrpos($a[$x], "/");
                            $ep = substr($a[$x], $lastslash + 1);
                            if ($x == $count)
                                echo "$ep";
                            else
                                echo "$ep, ";
                        }
                    @endphp
                </div>
            </div>
        </div>

            <div class="col-md-12 text-center">
                <a href="/" class="btn btn-primary mt-3">Home</a>
            </div>


    </div>
@endsection
