<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    //
    function exportTest()
    {
        $statisticsData = Vente::vente_par_mois();

        // Generate PDF content
        $html = view('Pdf.TotalVenteparMois', ['ventes' => $statisticsData])->render();
    
        // Create a new Dompdf instance
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
    
        // (Optional) Set PDF options
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the HTML as PDF
        $dompdf->render();
    
        // Save the PDF to a file (optional)
        Storage::disk('public')->put('path/to/statistics.pdf', $dompdf->output());
    
        // Stream the PDF to the user's browser for download
        return $dompdf->stream('statistics.pdf');
    }
}
