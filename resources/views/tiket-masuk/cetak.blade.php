<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Masuk</title>
    <link rel="stylesheet" href="{{ asset('asset-print/bootstrap.min.css') }}">
    <style>
    .title {
        font-size: 7pt;
    }
    
    tr{
        line-height: 0.55; 
    }

    .content {        
        font-size: 7pt;
        line-height: 5px; 
    }

    .font-weight {
        font-weight: 600;
    }

    td {        
        height:1px;
        
    }

    .table-border-outer {
        border: 1px solid black !important;
    }

    

    </style>
</head>


<body onload="onload=window.print()" style="margin-top: 0px;">
<script src="{{ asset('js/jsbarcode.all.min.js') }}"></script>
    <div class="col-12">        
            <table border="0" style="layout:fixed;margin-top:0px;">            
                <tr>
                    <td class="content" style="padding-left: 20px; padding-top: 5px">
                        <left><svg id="bar{{ $tiket }}"></svg></left>
                    </td>
                </tr>
            </table>
        </div>
        <script>   
            var countainer = '{{ $tiket }}'                       
                          
            JsBarcode('#bar{{ $tiket }}', countainer, {                
                // format: "pharmacode",                
                width:1.4,
                height:45,
                fontSize:10,
                margin: 0,                
                displayValue: true

            })
         

                  
            
        </script>
    </div>


</body>

</html>
