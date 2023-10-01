<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="../../public/imgs/logos/logo1.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../views/css/sass.css">
    <style>
        .button-dropdown, .button {
            box-sizing: border-box;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            height: 2em;
            padding: 1.1em;

            background: #fefefe;
            border: 1px solid #dbdbdb;
            border-radius: .2em;

            font-size: .9rem;
            line-height: 1.5;
            text-align: center;
            color: #363636;

            position: relative;
            vertical-align: top;

            box-shadow: none !important;
            outline: none !important;

            white-space: nowrap;
            touch-action: manipulation;
            cursor: pointer;
        }
        #add:hover{
            background: #efefef;
        }
        #add:active{
            background: #dddddd;
        }

        .button-dropdown:first-of-type
        {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .btn-group .button-dropdown:nth-of-type(2)
        {
            padding-left: 5px;
            padding-right: 5px;
            border-top-left-radius: 0%;
            border-bottom-left-radius: 0%;
            border-left: none;
        }

        .btn-dropdown-options{
            display: none;
            border: 1px solid black;
            border: 1px solid #dbdbdb;
            border-top: none;
            border-bottom-left-radius: .2em;
            border-bottom-right-radius: .2em;

        }
        .btn-dropdown-options ul li{
            padding: 6.5px 1em;
            cursor: pointer;
        }
        .btn-dropdown-options ul li:hover{
            background: #efefef;
        }
        .btn-dropdown-options ul li:active{
            background: #dddddd;
        }
        .show-block
        {
            display: block;
        }
    </style>
</head>

<body>
    <div>
<br>
        <div class="btn-group dropdown" style="position:relative">
            <button type="button" onclick="" id="add" class="button">
                Nuevo
            </button>
            <button type="button" onclick="show_btn_options()" class="button-dropdown">
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="btn-dropdown-options w-100 position-absolute top-100 start-0 ">
                <ul class="list-unstyled m-0">
                    <li>
                        Editar
                    </li>
                    <li>
                        Borrar
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="./js/Utils.js"></script>
</body>

</html>