<div class="container">
    <div class="card-body">
        <div class="text-center mb-2">
            Son 4 Öneri
        </div>
        <div class="table-responsive d-flex">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    <?php

                    $cursor = $db->suggestions->find(
                        [
                            "root" => null,
                            "\$or" => [
                                ["suggester.\$oid" => $_SESSION["user"]["_id"]],
                                ["status" => 1]
                            ]
                        ],
                        [
                            "limit" => 4
                        ]
                    );

                    $cache = [];
                    foreach ($cursor as $item) {
                        $id = strval($item["suggester"]);
                        if (!isset($cache[$id])) {
                            $cache[$id] = $db->users->findOne(['_id' => $item["suggester"]], ["username" => 1, "_id" => 0])["username"];
                        }
                        print('<tr>'
                            . '    <div class="col-md-3 col-sm-6 mb-4">'
                            . '        <div class="card border-left-success border-start-3 shadow h-100 py-2">'
                            . '            <div class="card-body">'
                            . '                <div class="row no-gutters align-items-center">'
                            . '                    <div class="col mr-2">'
                            . '                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">'
                            . '                         <a class="" href="admin.php?page=suggest-edit&id='.$item["_id"].'">'
                            . '                            ' . $item["word"] . ''
                            . '                         </a>'
                            . '                        </div>'
                            . '                        <div class="h5 mb-0 font-weight-bold text-gray-800">' . $cache[$id] . '</div>'
                            . '                    </div>'
                            . '                </div>'
                            . '            </div>'
                            . '        </div>'
                            . '    </div>'
                            . '</tr>');
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>