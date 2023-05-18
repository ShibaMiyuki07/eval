<?php

use App\Http\Controllers\Disque_DurController;
use App\Http\Controllers\EcranController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Point_VenteController;
use App\Http\Controllers\ProcesseurController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Transfert_Magasin_PV_Controller;
use App\Http\Controllers\Transfert_PV_Magasin_Controller;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Vente_Controller;
use App\Models\Vente;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[UtilisateurController::class,'pageLogin']);

Route::post('/login',[UtilisateurController::class,'login'])->name('utilisateur.login');

Route::get('/indexMagasin',function(){
    return view('Magasin.index');
})->name('magasin.acceuil');

Route::get('/insertref',[ElementController::class,'pageInsertionElement'])->name('page.insertionElement');

Route::get('/insertionLaptop',[LaptopController::class,'pageInsertion'])->name('page.insertionLaptop');

Route::get('/insertionutilisateur',[UtilisateurController::class,'pageInsertion'])->name('page.insertionUtilisateur');

Route::get('/recuMagasin',[Transfert_PV_Magasin_Controller::class,'recu_venant_PV'])->name('recu.magasin');

Route::get('/edit/{idlaptop}',[StockController::class,'pageEdit'])->name('stock.laptop');

Route::get('/listeRam',[RamController::class,'liste'])->name('ram.liste');

Route::get('/listeMarque',[MarqueController::class,'liste'])->name('marque.liste');

Route::get('/listeproc',[ProcesseurController::class,'liste'])->name('proc.liste');

Route::get('/listeEcran',[EcranController::class,'liste'])->name('ecran.liste');

Route::get('/listeDisque',[Disque_DurController::class,'liste'])->name('disque.liste');

Route::get('/listeLaptop',[LaptopController::class,'liste'])->name('laptop.liste');

Route::get('/listeUtilisateur',[UtilisateurController::class,'liste'])->name('utilisateur.liste');

Route::get('/listeStock',[StockController::class,'liste'])->name('stock.liste');

Route::post('/insertRam',[RamController::class,'create'])->name('ram.insert');

Route::post('/insertMarque',[MarqueController::class,'create'])->name('marque.insert');

Route::post('/insertEcran',[EcranController::class,'create'])->name('ecran.insert');

Route::post('/insertProc',[ProcesseurController::class,'create'])->name('processeur.insert');

Route::post('/insertDisque',[Disque_DurController::class,'create'])->name('disque_dur.insert');

Route::post('/insertPoint_Vente',[Point_VenteController::class,'create'])->name('point_vente.insert');

Route::post('/insertLaptop',[LaptopController::class,'create'])->name('laptop.insert');

Route::post('/insertStock',[StockController::class,'create'])->name('stock.insert');

Route::post('/insertUtilisateur',[UtilisateurController::class,'create'])->name('utilisateur.insert');

Route::post('/affectationUtilisateur',[UtilisateurController::class,'affectation'])->name('utilisateur.affectation');

Route::post('/insertionStockPV',[StockController::class,'insertToPV'])->name('pv.insert');

Route::post('/receptionPv',[Transfert_PV_Magasin_Controller::class,'recu'])->name('magasin.reception');












































//-------------------------------------------------------------------------------------------------------------------------------------------------------------------

Route::get('/indexPoint_Vente',[UtilisateurController::class,'pageAcceuilPV'])->name('point_vente.index');

Route::get('/listeTransfert',[Transfert_Magasin_PV_Controller::class,'Reception_par_PV'])->name('page.reception');

Route::get('/pageRenvoi',[Transfert_PV_Magasin_Controller::class,'pageRenvoi'])->name('page.renvoi');

Route::get('/pageVente',[Vente_Controller::class,'pageVente'])->name('page.vente');

Route::get('/listeVente',[Vente_Controller::class,'select'])->name('vente.liste');

Route::post('/insertRecu',[Transfert_Magasin_PV_Controller::class,'recu'])->name('recuPV.insert');

Route::post('/insertVente',[Vente_Controller::class,'create'])->name('vente.insert');

Route::post('/recherchePv',[Point_VenteController::class,'search'])->name('pv.search');

Route::post('/renvoiStock',[Transfert_PV_Magasin_Controller::class,'envoi_Magasin'])->name('stock.renvoi');

Route::get('/deconnexiion',[UtilisateurController::class,'deconnexion'])->name('utilisateur.deconnexion');

Route::get('/export-pdf',[PdfController::class,'exportTest']);