<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeController extends Controller
{
    public function index()
    {
        return view('qr_code_form');
    }

    public function generate()
    {
        $text = $this->request->getGet('text');

        if ($text) {
            $qrCode = Builder::create()
                ->writer(new PngWriter())
                ->data($text)
                ->size(300)
                ->margin(10)
                ->build();

            return $this->response
                ->setHeader('Content-Type', $qrCode->getMimeType())
                ->setBody($qrCode->getString());
        } else {
            return 'No text provided';
        }
    }
}
