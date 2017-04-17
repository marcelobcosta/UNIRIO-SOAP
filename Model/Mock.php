<?php
namespace SOAP\Model;

use Illuminate\Support\Collection;

class Mock{

    public static function publications() {

        return new Collection([
            new Publication([
                "id" => 1,
                "title" => 'Jujuba',
                'initialPage' => '1',
                'finalPage' => '250',
                'publicationDate' => '2017-03-10 00:00:00'
            ]),
            new Publication([
                "id" => 2,
                "title" => 'Maçã',
                'initialPage' => '1',
                'finalPage' => '643',
                'publicationDate' => '2017-03-08 00:00:00'
            ]),
            new Publication([
                "id" => 3,
                "title" => 'Uva',
                'initialPage' => '1',
                'finalPage' => '34',
                'publicationDate' => '2017-03-01 00:00:00'
            ]),
            new Publication([
                "id" => 4,
                "title" => 'Mamão',
                'initialPage' => '1',
                'finalPage' => '768',
                'publicationDate' => '2017-02-25 00:00:00'
            ]),
            new Publication([
                "id" => 5,
                "title" => 'Pêra',
                'initialPage' => '1',
                'finalPage' => '120',
                'publicationDate' => '2017-01-18 00:00:00'
            ])
        ]);
    }

}