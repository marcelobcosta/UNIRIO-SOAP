<?php
namespace SOAP\Model;

use Illuminate\Support\Collection;

/**
 * Created by PhpStorm.
 * User: marcelobrunocostaesilva
 * Date: 12/04/17
 * Time: 16:25
 */
class Mock{

    public static function publications() {

        return new Collection([
            new Publication([
                "id" => 1,
                "title" => 'Jujuba'
            ]),
            new Publication([
                "id" => 2,
                "title" => 'Maca'
            ]),
            new Publication([
                "id" => 3,
                "title" => 'Uva'
            ]),
            new Publication([
                "id" => 4,
                "title" => 'Mamao'
            ]),
            new Publication([
                "id" => 5,
                "title" => 'Pera'
            ])
        ]);
    }

}