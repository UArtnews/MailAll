<!DOCTYPE html>
<html>
<head>

    <title>The University of Akron Emailer</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link async rel="StyleSheet" href="{{ URL::to('css/bootstrap.css') }}" type="text/css" />
    <script type="text/javascript">
        document.write("    \<script src='//code.jquery.com/jquery-latest.min.js' type='text/javascript'>\<\/script>");
    </script>

    <style>

        body {
            background-color:#00285e;
            color:#fff;
        }


        .submit {
            color:#000;
            padding:.5em;
        }

        .panel {
            background-color:#4071B3;
            box-shadow:0 0 20px rgba(0,0,0,0.3);
            font-weight:700;
        }

        input {
            color:#222;
            box-shadow:0 0 30px rgba(0,0,0,0.3);
            border:0px;
            padding:1px;
            font-weight:700;
        }

        button {
            color:#222;
            box-shadow:0 0 30px rgba(0,0,0,0.6);
            border:0px;
            padding:1px;
        }

        .error {
            color:red;
            font-weight:bold;
        }

        #logo {
            margin-bottom:1.5em;
            color:white;
        }

        .centerMe {
            margin:0em auto;
            text-align:center;
            margin-bottom:1.5em;
        }

        .logo-image:hover {
            box-shadow: 0 0 30px rgba(255,255,255,.6);
        }
        #viewarchives{
            cursor: pointer;
            height: 15px;
            width:500px;
           margin: 15px 0px 15px 0px;
            
        }
        #archives {
            display:none;
        }
    </style>

</head>
<body>
 <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <br/>
            <br/>
            <h1 class="centerMe"><span class="glyphicon glyphicon-book" aria-hidden="true" style="font-size:400%;">&nbsp;</span>
                <strong>The University of Akron: Publications</strong>
            </h1>
            @include('public.messages')
            <div class="panel panel-default">
                <div class="panel-heading">Please Choose a Publication to View</div>
                <div class="panel-body">
                    <br/>
                    <ul class="list-group">
                    <li class="list-group-item">
                            <a href="{{ URL::secure('editors') }}"><h1>Admin/Editor Login</h1></a>
                        </li>
                        <div id="viewarchives" >+ View Archives</div>
                        <div id="archives">
                    @foreach($instances as $id => $instance)
                        <li class="list-group-item list-group-item-{{ $types[$id%4] }}">
                            <a href="{{ URL::to($instance->name) }}"><h1> {{ $instance->name }} Publication Archives</h1></a>
                        </li>
                    @endforeach
						</div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  
    <script type="text/javascript">
    $("#viewarchives").click(function(){
        $("#archives").toggle();
        if($("#archives").is(":visible")){
        	$("#viewarchives").html("- Hide Archives");
        }else{
        	$("#viewarchives").html("+ View Archives");
        }
     });
    </script>
</body>
</html>