<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class MinesweeperController extends BaseController
{
    public function go()
    {
        $ids = array();
        for($row = 1; $row <= 8; $row++) {
            for($col = 1; $col <= 8; $col++) {
                $ids[] = "cell-" . $row . "x" . $col;
            }
        }
        return view('minesweeper')->with('ids', $ids);
    }
}
