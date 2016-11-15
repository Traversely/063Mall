<!DOCTYPE html>
<html>
    <head>
        <title>063Mall</title>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 微软雅黑;
                background: #f5f5f5;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 40px;
            }

            .img{
                margin: auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="img">
                    <img src="{{asset('uploads/public/home/noSearch.jpg')}}">
                </div>
                <div class="title">
                    服务器未找到您的请求资源~
                </div>
            </div>
        </div>
    </body>
</html>
