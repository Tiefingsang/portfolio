<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(15);
        $unreadCount = Message::where('is_read', false)->count();

        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);

        // Marquer comme lu si pas encore lu
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['is_read' => true]);

        return back()->with('success', 'Message marqué comme lu');
    }

    public function markAsUnread($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['is_read' => false]);

        return back()->with('success', 'Message marqué comme non lu');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages')->with('success', 'Message supprimé avec succès');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);

        if (!empty($ids)) {
            Message::whereIn('id', $ids)->delete();
            return redirect()->route('admin.messages')->with('success', count($ids) . ' messages supprimés');
        }

        return redirect()->route('admin.messages')->with('error', 'Aucun message sélectionné');
    }

    public function markAllAsRead()
    {
        Message::where('is_read', false)->update(['is_read' => true]);

        return redirect()->route('admin.messages')->with('success', 'Tous les messages ont été marqués comme lus');
    }
}
