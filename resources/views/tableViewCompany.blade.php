<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Data</title>
    <style>
        #tbs {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #tbs td, #tbs th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #tbs tr:nth-child(even){background-color: #f2f2f2;}

        #tbs tr:hover {background-color: #ddd;}

        #tbs th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Tabel Company</h1>
        <table id="tbs">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                </tr>
            </thead>
            <tbody class="small">
                <?php 
                    $i = 1;
                    foreach($company as $index => $data){ ?> 
                    <tr>
                        <th class="text-center">{{ $i }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->website }}</td>
                    </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</body>
</html>