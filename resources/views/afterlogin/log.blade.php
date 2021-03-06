<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
            @charset "UTF-8";
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

            body {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            line-height: 1.42em;
            color:#A7A1AE;
            background-color:#1F2739;
            }

            h1 {
            font-size:3em; 
            font-weight: 300;
            line-height:1em;
            text-align: center;
            color: #4DC3FA;
            }

            h2 {
            font-size:1em; 
            font-weight: 300;
            text-align: center;
            display: block;
            line-height:1em;
            padding-bottom: 2em;
            color: #FB667A;
            }

            h2 a {
            font-weight: 700;
            text-transform: uppercase;
            color: #FB667A;
            text-decoration: none;
            }

            .blue { color: #185875; }
            .yellow { color: #FFF842; }

            .container th h1 {
                font-weight: bold;
                font-size: 1em;
            text-align: left;
            color: #185875;
            }

            .container td {
                font-weight: normal;
                font-size: 1em;
            -webkit-box-shadow: 0 2px 2px -2px #0E1119;
                -moz-box-shadow: 0 2px 2px -2px #0E1119;
                        box-shadow: 0 2px 2px -2px #0E1119;
            }

            .container {
                text-align: left;
                overflow: hidden;
                width: 80%;
                margin: 0 auto;
            display: table;
            padding: 0 0 8em 0;
            }

            .container td, .container th {
                padding-bottom: 2%;
                padding-top: 2%;
            padding-left:2%;  
            }

            /* Background-color of the odd rows */
            .container tr:nth-child(odd) {
                background-color: #323C50;
            }

            /* Background-color of the even rows */
            .container tr:nth-child(even) {
                background-color: #2C3446;
            }

            .container th {
                background-color: #1F2739;
            }

            .container td:first-child { color: #FB667A; }

            .container tr:hover {
            background-color: #464A52;
            -webkit-box-shadow: 0 6px 6px -6px #0E1119;
                -moz-box-shadow: 0 6px 6px -6px #0E1119;
                        box-shadow: 0 6px 6px -6px #0E1119;
            }

            .container td:hover {
            background-color: #FFF842;
            color: #403E10;
            font-weight: bold;
            
            box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
            transform: translate3d(6px, -6px, 0);
            
            transition-delay: 0s;
                transition-duration: 0.4s;
                transition-property: all;
            transition-timing-function: line;
            }

            @media (max-width: 800px) {
            .container td:nth-child(4),
            .container th:nth-child(4) { display: none; }
            }
    </style>
</head>
<body>
<table class="container">
	<thead>
		<tr>
			<th><h1>Payment id</h1></th>
			<th><h1>status</h1></th>
            <th><h1>created at</h1></th>
            <th><h1>confirmation at</h1></th>
            <th><h1>completed at</h1></th>
			<th><h1>nominal</h1></th>
			<th><h1>reason</h1></th>
            <th><h1>action</h1></th>
		</tr>
	</thead>
	<tbody>
    @foreach($logs as $log)
    <tr>
        <td>
        {{$log->payment_id}}
        </td>
        <td>
        {{$log->status}}
        </td>
        <td>
        {{$log->created_at}}
        </td>
        <td>
        {{$log->confirmation_at}}
        </td>
        <td>
        {{$log->completed_at}}
        </td>
        <td>
        {{$log->nominal}}
        </td>
        <td>
        {{$log->reason}}
        </td>
        <td>
        @if($log->status == 'topup')
        <form method="POST" action="confirmation/{{$log->payment_id}}" enctype="multipart/form-data">
			@csrf
                <div class="form-group">
					<span class="heading-meta">Upload bukti pembayaran</span><Br>
                    @if ($errors->has('image'))
						<span class="text-danger">{{ $errors->first('image') }}</span>
					@endif
				    <input type="file" value="" class="form-control" placeholder="UploadImage" name="image" >
				</div>
				<div class="form-group">
                <br>
					<input type="submit" class="btn btn-primary btn-send-message" value="confirm your payment">
				</div>
		</form>
        @elseif($log->status == 'topup revision')
        <form method="POST" action="confirmationrevision/{{$log->payment_id}}" enctype="multipart/form-data">
			@csrf
                <div class="form-group">
					<span class="heading-meta">Upload bukti pembayaran</span><Br>
                    @if ($errors->has('image'))
						<span class="text-danger">{{ $errors->first('image') }}</span>
					@endif
				    <input type="file" value="" class="form-control" placeholder="UploadImage" name="image" >
				</div>
				<div class="form-group">
                <br>
					<input type="submit" class="btn btn-primary btn-send-message" value="confirm your payment">
				</div>
		</form>
        @elseif($log->status == 'withdraw')
        processing
        @elseif($log->status == 'withdraw completed')
        <img src="{{ URL::to('/images'.$log->image)}}" style="height:100px;width:100px">
        @elseif($log->status == 'topup completed')
        <img src="{{ URL::to('/images'.$log->image)}}" style="height:100px;width:100px">
        @elseif($log->status == 'topup revision completed')
        <img src="{{ URL::to('/images'.$log->image)}}" style="height:100px;width:100px">
        @endif
        </td>
    </tr>
      @endforeach
      </tbody>
</table>