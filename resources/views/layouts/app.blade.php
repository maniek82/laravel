<!DOCTYPE html>
<html>
    <head>
        <title>Sample</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
                width:100%;
                height: 90vh;
            }

            .title {
                font-size: 46px;
            }
            .footer {
                margin-top:100px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">
                   @yield("content")
                </div>
            </div>
        
          <div class="content">
             
               @yield("footer")
            
         </div>
      </div>
    </body>
</html>

     
      
     
