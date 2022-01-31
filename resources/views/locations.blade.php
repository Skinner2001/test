@extends ('components.layout')
@section('content')
    <div class="container">
        @foreach ($results as $r)
            <div class="row">
                <div class="col-md-3 text-center">
                    <label>{{$r->name}}</label>
                    <img src="{{$r->image}}" style="width:125px;margin-bottom:4px;border-radius:8px">
                </div>
                <div class="col-md-1">
                    <label>Species</label>
                    <p>{{$r->species}}</p>
                </div>
                <div class="col-md-3">
                    <label>Origin</label>
                    @php
                        $a = explode(",", $r->origin);
                        echo "<p>". $a[0] . "</p>";
                        echo "<p>". $a[1] . "</p>";
                    @endphp
                </div>
                <div class="col-md-4">
                    <label>Episodes</label>
                    <div style="word-wrap: break-word">
                        @php
                            $a = explode(",", $r->episodes);
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
        @endforeach
    </div>
@endsection
