<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <title>اداره الجمعيات الخيريه</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700,900&amp;subset=arabic,latin-ext" rel="stylesheet">


    <!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        table.GeneratedTable {
            width: 100%;
            background-color: #ffffff;
            border-collapse: collapse;
            border-width: 2px;
            border-color: #2598C4;
            border-style: dashed;
            color: #000000;
        }

        table.GeneratedTable td, table.GeneratedTable th {
            border-width: 2px;
            border-color: #2598C4;
            border-style: dashed;
            padding: 3px 10px;
        }

        .header {
            background-color: #2598C4;
            color: #fff
        }
        center {
            margin-bottom: 30px

        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            align: 0 auto;
        }
    </style>




</head>
<body>


<h1 style="font-weight: 900;"><strong>وصل صرف تبرع</strong></h1>

<!-- HTML Code: Place this code in the document's body (between the 'body' tags) where the table should appear -->

<table class="GeneratedTable">
    <tbody>
    <tr>
        <td class="header">اسمالشخص</td>
        <td><strong>{{$don2->beneficiary["username"]}}</strong></td>
    </tr>

    <tr>
        <td class="header">رقم التبرع</td>
        <th><strong>{{$don2->id}}</strong></th>
    </tr>
    <tr>
        <td class="header">تاريخ التبرع</td>
        <th><strong>{{ date("Y-m-d h:i:s", strtotime($don2->created_at))}}</strong></th>
    </tr>

    <tr>
        <td class="header">نواع المنتج</td>
        <th><strong>{{ $don2->pro["name"] }}</strong></th>
    </tr>
    <tr>
        <td class="header">السعر او الكميه</td>
        <td><strong>{{ $don2->price }}</strong></td>
    </tr>
    <tr>
        <td class="header">اسم الموظف</td>
        <th><strong>{{$don2->user_rel["name"]}}</strong></th>
    </tr>


    </tbody>
</table>


<br>
<br>


</body>
</html>
