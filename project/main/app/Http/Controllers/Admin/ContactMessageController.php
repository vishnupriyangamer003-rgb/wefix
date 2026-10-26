<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = DB::table('contact_messages')->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.contact-messages.index', compact('messages'));
    }

    public function markRead($id)
    {
        db_find_or_404('contact_messages', $id);
        DB::table('contact_messages')->where('id', $id)->update(['is_read' => 1, 'updated_at' => now()]);

        return back()->with('status', 'Marked as read.');
    }

    public function destroy($id)
    {
        db_find_or_404('contact_messages', $id);
        DB::table('contact_messages')->where('id', $id)->delete();

        return back()->with('status', 'Message deleted.');
    }
}
