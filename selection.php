<?php
session_start();
require "vendor/autoload.php";
$_SESSION['is_quiz_started'] = false;
unset($_SESSION['Subject']);
unset($_SESSION['answers']);
$_SESSION['current_question_number'] = 1;

if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: login.php');
}


?>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        form{
            
        }
        /*ETHICS*/
        button {
        position: relative;
        display: inline-block;
        cursor: pointer;
        outline: none;
        border: 0;
        vertical-align: middle;
        text-decoration: none;
        background: transparent;
        padding: 0;
        font-size: inherit;
        font-family: inherit;
        }

        button.ethics {
        width: 12rem;
        height: auto;
        }

        button.ethics .circle {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        position: relative;
        display: block;
        margin: 0;
        width: 3rem;
        height: 3rem;
        background: #282936;
        border-radius: 1.625rem;
        }

        button.ethics .circle .icon {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        background: #fff;
        }

        button.ethics .circle .icon.arrow {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        left: 0.625rem;
        width: 1.125rem;
        height: 0.125rem;
        background: none;
        }

        button.ethics .circle .icon.arrow::before {
        position: absolute;
        content: "";
        top: -0.29rem;
        right: 0.0625rem;
        width: 0.625rem;
        height: 0.625rem;
        border-top: 0.125rem solid #fff;
        border-right: 0.125rem solid #fff;
        transform: rotate(45deg);
        }

        button.ethics .button-text {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 0.75rem 0;
        margin: 0 0 0 1.85rem;
        color: #282936;
        font-weight: 700;
        line-height: 1.6;
        text-align: center;
        text-transform: uppercase;
        }

        button:hover .circle {
        width: 100%;
        }

        button:hover .circle .icon.arrow {
        background: #fff;
        transform: translate(1rem, 0);
        }

        button:hover .button-text {
        color: #fff;
        }

        /*UTS*/
        button {
        position: relative;
        display: inline-block;
        cursor: pointer;
        outline: none;
        border: 0;
        vertical-align: middle;
        text-decoration: none;
        background: transparent;
        padding: 0;
        font-size: inherit;
        font-family: inherit;
        }

        button.uts {
        width: 12rem;
        height: auto;
        }

        button.uts .circle {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        position: relative;
        display: block;
        margin: 0;
        width: 3rem;
        height: 3rem;
        background: #282936;
        border-radius: 1.625rem;
        }

        button.uts .circle .icon {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        background: #fff;
        }

        button.uts .circle .icon.arrow {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        left: 0.625rem;
        width: 1.125rem;
        height: 0.125rem;
        background: none;
        }

        button.uts .circle .icon.arrow::before {
        position: absolute;
        content: "";
        top: -0.29rem;
        right: 0.0625rem;
        width: 0.625rem;
        height: 0.625rem;
        border-top: 0.125rem solid #fff;
        border-right: 0.125rem solid #fff;
        transform: rotate(45deg);
        }

        button.uts .button-text {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 0.75rem 0;
        margin: 0 0 0 1.85rem;
        color: #282936;
        font-weight: 700;
        line-height: 1.6;
        text-align: center;
        text-transform: uppercase;
        }

        button:hover .circle {
        width: 100%;
        }

        button:hover .circle .icon.arrow {
        background: #fff;
        transform: translate(1rem, 0);
        }

        button:hover .button-text {
        color: #fff;
        }

        /*CONTEMP WORLD*/
        button {
        position: relative;
        display: inline-block;
        cursor: pointer;
        outline: none;
        border: 0;
        vertical-align: middle;
        text-decoration: none;
        background: transparent;
        padding: 0;
        font-size: inherit;
        font-family: inherit;
        }

        button.cw {
        width: 12rem;
        height: auto;
        }

        button.cw .circle {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        position: relative;
        display: block;
        margin: 0;
        width: 3rem;
        height: 3rem;
        background: #282936;
        border-radius: 1.625rem;
        }

        button.cw .circle .icon {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        background: #fff;
        }

        button.cw .circle .icon.arrow {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        left: 0.625rem;
        width: 1.125rem;
        height: 0.125rem;
        background: none;
        }

        button.cw .circle .icon.arrow::before {
        position: absolute;
        content: "";
        top: -0.29rem;
        right: 0.0625rem;
        width: 0.625rem;
        height: 0.625rem;
        border-top: 0.125rem solid #fff;
        border-right: 0.125rem solid #fff;
        transform: rotate(45deg);
        }

        button.cw .button-text {
        transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 0.75rem 0;
        margin: 0 0 0 1.85rem;
        color: #282936;
        font-weight: 700;
        line-height: 1.6;
        text-align: center;
        text-transform: uppercase;
        }

        button:hover .circle {
        width: 100%;
        }

        button:hover .circle .icon.arrow {
        background: #fff;
        transform: translate(1rem, 0);
        }

        button:hover .button-text {
        color: #fff;
        }
    </style>
</head>
<body>
    <form method="POST" action="selection_post.php" id="selection">
        <button type="submit" Name="topic" Value= "Contemporary_World" class="cw">
            <span class="circle" aria-hidden="true">
            <span class="icon arrow"></span>
            </span>
                <span class="button-text">Contemporary World</span>
        </button>

        <button type="submit" name="topic" value="Ethics" class="ethics" > 
            <span class="circle" aria-hidden="true">
            <span class="icon arrow"></span>
            </span>
            
                <span class="button-text">Ethics</span>
            </button>
            
        <button type="submit" name="topic" value="UTS" class="uts">
            <span class="circle" aria-hidden="true">
            <span class="icon arrow"></span>
            </span>
            
                <span class="button-text">UTS</span>
        
        </button>

            <a href="login.php">LOGOUT</a>
    </form>
</body>
</html>
