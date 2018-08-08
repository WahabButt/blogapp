<!DOCTYPE html>
<html>
<head>
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        h1{
            text-align: center;
        }
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box}
        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        a{
            text-decoration: none;
        }
        /* Add a background color when the inputs get focus */
        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        button:hover {
            opacity:1;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
        }

        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
            float: left;
            width: 50%;
        }

        /* Add padding to container elements */
        .container {
            padding: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: #474e5d;
            padding-top: 50px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* Style the horizontal ruler */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 35px;
            top: 15px;
            font-size: 40px;
            font-weight: bold;
            color: #f1f1f1;
        }

        .close:hover,
        .close:focus {
            color: #f44336;
            cursor: pointer;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

@include('layouts.nav')

<h1>Welcome {{ Session::get('name')  }} <br>|<br> All Blogs <i class="fas fa-sign-out-alt"></i></h1>

<a href="/dashboard"><button  style="width:auto;">View All User</button></a>
<a href="/logout"><button style="width:auto; float: right; border-radius: 5px">Sign Out <i class="fa fa-sign-out"></i></button></a>

<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->title }}</td>
            <td>
                {{ str_limit( $blog->description, 50, ' ....')  }}
                    <a href="/posts/{{ $blog->id }}" target="_blank">
                        <b>Read More</b>
                    </a>
            </td>
            <td>{{ $blog->status }}</td>
            @if($blog->status == 'pending')
            <td><a href="/updatestatus/{{ $blog->id }}/active" onclick="return confirm('Are you sure you want to activate this blog?')"><i class="fa fa-refresh" aria-hidden="true"></i>
             Make Active   </a></td>
            @endif
            @if($blog->status == 'active')
                <td><a href="/updatestatus/{{ $blog->id }}/pending" onclick="return confirm('Are you sure you want to deactivate this blog?')"><i class="fa fa-refresh" aria-hidden="true"></i>
                        Make Pending   </a></td>
            @endif
        </tr>
    @endforeach
</table>


<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
