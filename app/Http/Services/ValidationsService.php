<?php

namespace App\Http\Services;
use App\Marcas;

use Illuminate\Support\Facades\Storage;

class ValidationsService {

    public $linkFinal, $endName, $extension, $resultImag, $nameImag;
    

    public function __construct()
    {

    }

    public function validateMarcaLink($marcaLink) {
        $resultLink = 1;
        $this->linkFinal = $marcaLink;

        $links = Marcas::pluck('link')->all();
        foreach ($links as $link) {
            if ($link == $marcaLink) {
                $this->linkFinal = $this->linkFinal.'-';
                $resultLink = 2;
            }
        }

        if ($resultLink != 1) {
            while ($resultLink != 1) {
                $add = rand(0, 9);
                $this->linkFinal = $this->linkFinal.$add;

                $links = Marcas::pluck('link')->all();
                foreach ($links as $link) {
                    if ($link == $this->linkFinal) {
                        $add = rand(0, 9);
                        $this->linkFinal = $this->linkFinal.$add;
                        $resultLink = 2;
                    }
                    $resultLink = 1;
                }
            }
        }

        return $this->linkFinal;
    }
    
}