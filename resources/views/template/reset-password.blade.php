<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>reset password</title>
    <link rel="stylesheet" href="{{ asset('css/user_reset.css') }}" />
<style>@import url("https://fonts.googleapis.com/css2?family=Vollkorn&display=swap");

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        width: 100vw;
        height: 100vh;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1000%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cuse xlink:href='%23SvgjsSymbol1007' x='0' y='0'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsSymbol1007' x='720' y='0'%3e%3c/use%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1000'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cpath d='M-1 0 a1 1 0 1 0 2 0 a1 1 0 1 0 -2 0z' id='SvgjsPath1002'%3e%3c/path%3e%3cpath d='M-3 0 a3 3 0 1 0 6 0 a3 3 0 1 0 -6 0z' id='SvgjsPath1004'%3e%3c/path%3e%3cpath d='M-5 0 a5 5 0 1 0 10 0 a5 5 0 1 0 -10 0z' id='SvgjsPath1001'%3e%3c/path%3e%3cpath d='M2 -2 L-2 2z' id='SvgjsPath1005'%3e%3c/path%3e%3cpath d='M6 -6 L-6 6z' id='SvgjsPath1003'%3e%3c/path%3e%3cpath d='M30 -30 L-30 30z' id='SvgjsPath1006'%3e%3c/path%3e%3c/defs%3e%3csymbol id='SvgjsSymbol1007'%3e%3cuse xlink:href='%23SvgjsPath1001' x='30' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='30' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='30' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='30' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='30' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='30' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='30' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='30' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='30' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='30' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='90' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='90' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='90' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='90' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='90' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='90' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='90' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='90' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='90' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='90' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='150' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='150' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='150' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='150' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='150' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='150' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='150' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='150' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='150' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='150' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='210' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='210' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='210' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='210' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='210' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='210' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='210' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='210' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='210' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='210' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='270' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='270' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='270' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='270' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='270' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='270' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='270' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='270' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='270' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='270' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='330' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='330' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='330' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1006' x='330' y='210' stroke='%231c538e' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='330' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1006' x='330' y='330' stroke='%231c538e' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='330' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='330' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='330' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='330' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='390' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='390' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='390' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='390' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='390' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='390' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='390' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='390' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='390' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='390' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='450' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='450' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='450' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='450' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1006' x='450' y='270' stroke='%231c538e' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='450' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='450' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='450' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='450' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='450' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='510' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='510' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='510' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='510' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='510' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='510' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='510' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1006' x='510' y='450' stroke='%231c538e' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='510' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='510' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='570' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='570' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='570' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='570' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='570' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='570' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='570' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1006' x='570' y='450' stroke='%231c538e' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='570' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='570' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='630' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='630' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='630' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='630' y='210' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='630' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='630' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='630' y='390' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='630' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='630' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='630' y='570' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='690' y='30' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1001' x='690' y='90' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='690' y='150' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1006' x='690' y='210' stroke='%231c538e' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1003' x='690' y='270' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1004' x='690' y='330' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1006' x='690' y='390' stroke='%231c538e' stroke-width='3'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1005' x='690' y='450' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1002' x='690' y='510' stroke='%231c538e'%3e%3c/use%3e%3cuse xlink:href='%23SvgjsPath1006' x='690' y='570' stroke='%231c538e' stroke-width='3'%3e%3c/use%3e%3c/symbol%3e%3c/svg%3e");
        display: flex;
        align-items: center;
        justify-content: center;
    }

    img {
        width: 100%;
        height: auto;
    }

    .l-card {
        width: auto;
        min-width: 360px;
        max-width: 480px;
        height: auto;
        background: #f5f5f5;
        color: #272727;
        padding: 50px;
        box-shadow: 0px 7px 24px rgba(100, 100, 100, 0.4);
    }

    .l-card__text p {
        font-size: 30px;
        font-family: "Vollkorn", serif;
        font-weight: 400;
        color: #3f3f55;
        text-align: left;
    }

    .l-card__text p::after {
        content: "\201D";
        display: inline;
        color: #999;
    }

    .l-card__text p::before {
        content: "\201C";
        display: inline;
        color: #999;
    }

    .l-card__user {
        display: flex;
        flex-direction: row;
        padding-top: 24px;
        margin-top: 12px;
        align-items: center;
    }

    .l-card__userImage {
        width: 42px;
        height: 42px;
        overflow: hidden;
        border-radius: 50%;
    }

    .l-card__userImage img {
        width: 100%;
        height: 100%;
        object-filt: cover;
    }

    .l-card__userInfo {
        display: flex;
        flex-direction: column;
        margin-left: 16px;
    }

    .l-card__userInfo span:nth-child(1) {
        font-weight: bold;
        font-family: sans-serif;
        font-size: 14px;
        color: #3f3f55;
    }

    .l-card__userInfo span:nth-child(2) {
        color: #adada6;
        font-family: sans-serif;
        font-size: 12px;
        margin-top: 2px;
    }

    .button-33 {
        background-color: #c2fbd7;
        border-radius: 100px;
        box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset, rgba(44, 187, 99, .15) 0 1px 2px, rgba(44, 187, 99, .15) 0 2px 4px, rgba(44, 187, 99, .15) 0 4px 8px, rgba(44, 187, 99, .15) 0 8px 16px, rgba(44, 187, 99, .15) 0 16px 32px;
        color: green;
        cursor: pointer;
        display: inline-block;
        font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto, sans-serif;
        padding: 7px 20px;
        text-align: center;
        text-decoration: none;
        transition: all 250ms;
        border: 0;
        font-size: 16px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-33:hover {
        box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
        transform: scale(1.05) rotate(-1deg);
    }

    .md {
        margin-top: 55px;
        margin-left: 55px;
    }
    </style>
</head>
<body>
    <main class="l-card">
        <section class="l-card__text">
            <p>
                Hello {{ $user ? $user['name'] : '' }},
            </p>
            <br>
            <br>
            <div class="ag-courses-item_date-box">
                We've received a request to reset the password.
            </div>
            <br>
            <br>
            <div class="ag-courses-item_date-box">
                You can reset your password by clicking the button below:
            </div>
        </section>

        <section>
            <div class="l-card__userInfo">
                <div class="container md">

                    @csrf

                    <a href="{{ 'http://127.0.0.1:8000/forgot-password/' . $user['token'] }}"
                        class="btn glowing-btn"><button class="button-33" role="button"> your Password</button></a>
                </div>
            </div>
        </section>
        <section class="l-card__user">
            <div class="l-card__userImage">
                <img src="https://avatars.githubusercontent.com/u/20525486?v=4" alt="Naruto">
            </div>
            <div class="l-card__userInfo">
                <span>Sanjay Makwana</span>
                <span>Seventh Hokage</span>
            </div>
        </section>
    </main>
</body>

</html>
