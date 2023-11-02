<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Setting;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class ReportController extends Controller
{
    const MATRIMONIO   = 'Certificado de Matrimonio';
    const BAUTISMO     = 'Certificado de Bautismo';
    const CONFIRMACION = 'Certificado de Confirmación';
    public function matrimonios($matrimonio_id)
    {
        $document = Document::find($matrimonio_id);
        $setting = Setting::first();
        $data['document'] = $document;
        $data['setting'] = $setting;
        $data['created'] = \Carbon\Carbon::now();
        $data['date'] = \Carbon\Carbon::parse($document->date);
        $html = view('reports.matrimonio', $data);

        return self::generateReport($html, self::MATRIMONIO);
    }

    private function generateReport($html, string $type){
        $pdf = new Mpdf();
        $name = "$type-".\Carbon\Carbon::now()->format('d-m-Y_H:i:s');
        $pdf->WriteHTML($html);
        $pdf = new Mpdf(['tempDir'=>storage_path('tempdir')]);
        $pdf->WriteHTML($html);
        header('Content-Type: application/pdf');
        header("Content-Disposition: inline; filename='$name.pdf'");
        return $pdf->Output("$name.pdf", 'I');
    }
}
