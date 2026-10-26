<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('customers');

        if ($search = $request->query('q')) {
            $like = '%' . $search . '%';
            $query->where(function ($w) use ($like) {
                $w->where('name', 'like', $like)
                    ->orWhere('phone', 'like', $like)
                    ->orWhere('email', 'like', $like);
            });
        }

        $customers = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        return view('admin.customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = db_find_or_404('customers', $id);
        $orders = DB::table('orders')->where('customer_id', $id)->orderBy('created_at', 'desc')->get();

        return view('admin.customers.show', compact('customer', 'orders'));
    }

    public function toggleStatus($id)
    {
        $customer = db_find_or_404('customers', $id);
        $newStatus = $customer->status ? 0 : 1;

        DB::table('customers')->where('id', $id)->update(['status' => $newStatus, 'updated_at' => now()]);

        return response()->json(['status' => $newStatus]);
    }

    /**
     * CSV/Excel export via phpoffice/phpspreadsheet (already a project
     * dependency — downgraded to a PHP 7.3-compatible version in Phase 0).
     */
    public function export()
    {
        $customers = DB::table('customers')->orderBy('name')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Customers');

        $headers = ['ID', 'Name', 'Phone', 'Email', 'Address', 'Taluk', 'District', 'State', 'Pincode', 'Status', 'Registered On'];
        $sheet->fromArray($headers, null, 'A1');

        $row = 2;
        foreach ($customers as $customer) {
            $sheet->fromArray([
                $customer->id,
                $customer->name,
                $customer->phone,
                $customer->email,
                $customer->address,
                $customer->taluk,
                $customer->district,
                $customer->state,
                $customer->pincode,
                $customer->status ? 'Active' : 'Inactive',
                $customer->created_at,
            ], null, 'A' . $row);
            $row++;
        }

        $filename = 'customers-' . now()->format('Y-m-d') . '.xlsx';
        $tempPath = tempnam(sys_get_temp_dir(), 'customers') . '.xlsx';
        (new Xlsx($spreadsheet))->save($tempPath);

        return response()->download($tempPath, $filename)->deleteFileAfterSend(true);
    }
}
