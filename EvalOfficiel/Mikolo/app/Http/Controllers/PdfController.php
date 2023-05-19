<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    //
    function exportGlobalParMois()
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
        Storage::disk('public')->put('path/to/global.pdf', $dompdf->output());
    
        // Stream the PDF to the user's browser for download
        return $dompdf->stream('global.pdf');
    }


    function exportGlobalParPv(Request $request)
    {
        $statisticsData = Vente::vente_par_mois_par_pv($request);

        // Generate PDF content
        $html = view('Pdf.TotalVenteparPv', ['ventes' => $statisticsData])->render();
    
        // Create a new Dompdf instance
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
    
        // (Optional) Set PDF options
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the HTML as PDF
        $dompdf->render();
    
        // Save the PDF to a file (optional)
        Storage::disk('public')->put('path/to/global_vente.pdf', $dompdf->output());
    
        // Stream the PDF to the user's browser for download
        return $dompdf->stream('global_vente.pdf');
    }

    function benefice_mois_global()
    {
        $pertes = Vente::view_perte_global_par_mois();
        $achats = Vente::view_achat_global_par_mois();
        $ventes = Vente::view_vente_global_par_mois();
        $vente = new Vente();
        $html = view('Pdf.BeneficeGlobal', ['ventes' => $ventes,'pertes'=>$pertes,'achats'=>$achats,'vente'=>$vente])->render();
    
        // Create a new Dompdf instance
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
    
        // (Optional) Set PDF options
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the HTML as PDF
        $dompdf->render();
    
        // Save the PDF to a file (optional)
        Storage::disk('public')->put('path/to/benefice_mois.pdf', $dompdf->output());
    
        // Stream the PDF to the user's browser for download
        return $dompdf->stream('benefice_mois.pdf');
    }

    function benefice_mois_par_pv(Request $request)
    {
        $pertes = Vente::view_perte_global_par_mois_par_pv($request);
        $achats = Vente::view_achat_global_par_mois_par_pv($request);
        $ventes = Vente::view_vente_global_par_mois_par_pv($request);
        $vente = new Vente();
        $html = view('Pdf.BeneficeparPv', ['ventes' => $ventes,'pertes'=>$pertes,'achats'=>$achats,'vente'=>$vente])->render();
    
        // Create a new Dompdf instance
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
    
        // (Optional) Set PDF options
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the HTML as PDF
        $dompdf->render();
    
        // Save the PDF to a file (optional)
        Storage::disk('public')->put('path/to/benefice_mois.pdf', $dompdf->output());
    
        // Stream the PDF to the user's browser for download
        return $dompdf->stream('benefice_mois.pdf');
    }
}
