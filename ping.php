<?php
/*
 *
 * Use the examples below to add your own servers. Coded by clone1018 [?]
 * https://gist.github.com/k0nsl/733955a3c3093832de49
 *
 */

$title = "Simple Server Status"; // website's title
$servers = array(
    'Jakarta' => array(
        'ip' => '192.168.10.1',
        'port' => 80,
        'info' => 'Router jakarta',
        'purpose' => 'no purpose'
    ),
    'Bandung' => array(
        'ip' => '192.168.10.23',
        'port' => 8888,
        'info' => 'Router Bnadung',
        'purpose' => 'No purpose'
    ),
    'Example Down Host' => array(
        'ip' => '192.168.10.1',
        'port' => 80,
        'info' => 'ShittyWebHost3',
        'purpose' => 'No purpose'
    )
);
if (isset($_GET['host'])) {
    $host = $_GET['host'];
    if (isset($servers[$host])) {
        header('Content-Type: application/json');
        $return = array(
            'status' => test($servers[$host])
        );
        echo json_encode($return);
        exit;
    } else {
        header("HTTP/1.1 404 Not Found");
    }
}
$names = array();
foreach ($servers as $name => $info) {
    $names[$name] = md5($name);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/2.3.2/cosmo/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
        <style type="text/css">
                /* Custom Styles */
        </style>
    </head>
    <body>

        <div class="container">
            <h1><?php echo $title; ?></h1>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Host</th>
                        <th>IP</th>
                        <th>Purpose</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($servers as $name => $server): ?>

                        <tr id="<?php echo md5($name); ?>">
                            <td><i class="icon-spinner icon-spin icon-large"></i></td>
                            <td class="name"><?php echo $name; ?></td>
                            <td><?php echo $server['info']; ?></td>
                             <td><?php echo $server['ip']; ?></td>
                            <td><?php echo $server['purpose']; ?></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript">
            function test(host, hash) {
                // Fork it
                var request;
                // fire off the request to /form.php
                request = $.ajax({
                    url: location.href,
                    type: "get",
                    data: {
                        host: host
                    },
                    beforeSend: function () {
                        $('#' + hash).children().children().css({'visibility': 'visible'});
                    }
                });
                // callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR) {
                    var status = response.status;
                    var statusClass;
                    if (status) {
                        statusClass = 'success';
                    } else {
                        statusClass = 'error';
                    }
                    $('#' + hash).removeClass('success error').addClass(statusClass);
                });
                // callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown) {
                    // log the error to the console
                    console.error(
                        "The following error occured: " +
                            textStatus, errorThrown
                    );
                });
                request.always(function () {
                    $('#' + hash).children().children().css({'visibility': 'hidden'});
                })
            }
            $(document).ready(function () {
                var servers = <?php echo json_encode($names); ?>;
                var server, hash;
                for (var key in servers) {
                    server = key;
                    hash = servers[key];
                    test(server, hash);
                    (function loop(server, hash) {
                        setTimeout(function () {
                            test(server, hash);
                            loop(server, hash);
                        }, 6000);
                    })(server, hash);
                }
            });
        </script>

    </body>
</html>
<?php
/* Misc at the bottom */
function test($server) {
    $socket = @fsockopen($server['ip'], $server['port'], $errorNo, $errorStr, 3);
    if ($errorNo == 0) {
        return true;
    } else {
        return false;
    }
}
function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}
?>								