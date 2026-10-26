<?php

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Shared invoice PDF rendering — used by both the customer-facing invoice
 * download (Customer\OrderController) and the ktgadmin one (Admin\OrderController).
 */

if (!function_exists('invoice_logo_data_uri')) {
    // dompdf runs with isRemoteEnabled=false, so the logo must be embedded as
    // a base64 data URI rather than referenced via asset() (an http:// URL).
    function invoice_logo_data_uri()
    {
        $path = dirname(base_path()) . '/images/logo-dark.jpg';

        if (!is_file($path)) {
            return null;
        }

        $mime = @getimagesize($path)['mime'] ?? 'image/png';

        return 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($path));
    }
}

if (!function_exists('render_invoice_pdf_response')) {
    function render_invoice_pdf_response($order, $items)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', false);

        $logoDataUri = invoice_logo_data_uri();

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('customer.orders.invoice-pdf', compact('order', 'items', 'logoDataUri'))->render());
        $dompdf->setPaper('A4');
        $dompdf->render();

        return $dompdf->stream("invoice-{$order->order_number}.pdf", ['Attachment' => true]);
    }
}
