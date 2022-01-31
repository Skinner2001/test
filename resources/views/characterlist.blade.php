@extends ('components.layout')
@php
  $name = 0;
@endphp
@section('content')
    <div class="container">
        <div class="fixbar">
            <input type="text" id="search"/>
            <button class="btn btn-md btn-outline" onclick="search()" id="searchbutton">Go</button>
            <div id="message" style="display:none">Not found</div>
        </div>
        @foreach ($results as $r)
            <div class="row" id="row{{$name}}">
                <div class="col-md-3 text-center">
                    <label id="name{{$name}}">{{$r->name}}</label>
                    <a href="profile/{{$name}}">
                    <img src="{{$r->image}}" style="width:125px;margin-bottom:4px;border-radius:8px">
                    </a>
                </div>
                <div class="col-md-1">
                    <span>Species</span>
                    <p>{{$r->species}}</p>
                </div>
                <div class="col-md-3">
                    <span>Origin</span>
                    @php
                        $name++;
                        $a = explode(",", $r->origin);
                        echo "<p>". $a[0] . "</p>";
                        echo "<p>". $a[1] . "</p>";
                    @endphp
                </div>
                <div class="col-md-4">
                    <span>Episodes</span>
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
<script>
    function search() {

        let textSearch = document.getElementById("search").value;
        let aTags = document.getElementsByTagName("label");
        let found = false;
        for (let i = 0; i < aTags.length; i++) {
            let s = aTags[i].textContent;
            if (s.includes(textSearch)) {
                found = true;
                console.log("name" + i);
                document.getElementById("name" + i).scrollIntoView();
                document.getElementById("row" + i).style.borderColor = "red";
                document.getElementById("row" + i).style.borderWidth = "thick";
                document.getElementById("message").style.display = 'none';
                break;
            }
            if (!found)
                document.getElementById("message").style.display = 'block';
        }
    }
</script>
