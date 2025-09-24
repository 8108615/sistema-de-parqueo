<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\Facturacion;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function imprimir_factura($id)
    {
        $factura = Facturacion::find($id);
        $ajuste = Ajuste::first();

        $fecha_hora = Carbon::now();

        $qr = "Esta Factura Numero ".$factura->nro_factura." corresponde al Cliente: ".$factura->nombre_cliente." con Numero de Documento: "
        .$factura->nro_documento."Con la Placa del Vehiculo: ".$factura->placa.", por el ".$factura->detalle.", con un costo total de ".$factura->monto;
        $barcodePNG = 'data:image/png;base64,' .DNS2D::getBarcodePNG($qr, 'QRCODE', 4,4);

        $pdf = PDF::loadView('admin.facturacion.factura_pdf', compact('factura', 'ajuste', 'fecha_hora', 'barcodePNG'));

        //Configuracion para impresore termica (80mm de ancho , alto automatico)
        $pdf->setOptions([
            'dpi' => 120,
            'defaultPaperSize' => [0, 0, 226.77, 0], //80mm = 226.77puntos
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'Arial Narrow'
        ]);

        $pdf->setPaper([0,0,226.77,999999]); //80mm de ancho, alto

        return $pdf->stream("factura.pdf");
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facturacion $facturacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facturacion $facturacion)
    {
        //
    }
}
