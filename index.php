<!DOCTYPE html> 
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title></title>
        </head>
    <body>

        <div class="container">
          <h1>Test Upload</h1>
        </div>

        <div class="container">
        <table>
            <thead>
                <tr>
                <th>ID</th><th>Title</th><th>Author</th><th>Type</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                   <td>23</td>Ghost<td>Mike Myres</td><td>Horror</td>
            </tbody>
        </table>
    </div>
    <?php

        $dbopts = parse_url(getenv('DATABASE_URL'));
        $app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
        array(
            'pdo.server' => array(
            'driver'   => 'pgsql',
            'user' => $dbopts["user"],
            'password' => $dbopts["pass"],
            'host' => $dbopts["host"],
            'port' => $dbopts["port"],
            'dbname' => ltrim($dbopts["path"],'/'))
            )
        );



    ?>

  </body>
</html>
