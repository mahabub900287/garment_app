<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\NewsLettersDataTable;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Front\NewsLetterService;
use App\Http\Requests\Front\NewsLetterRequest;

class NewsLetterController extends Controller
{
    protected $newsletterService;

    public function __construct(NewsLetterService $newsletterService)
    {
        $this->newsletterService = $newsletterService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(NewsLettersDataTable $dataTable)
    {
        $page_title = 'Show Newsletter Subscriber List';

        return $dataTable->render('admin.newsletter.index', compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_title = 'Create Newsletter Subscriber';

        return view('admin.newsletter.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsLetterRequest $request)
    {
        $data = $request->validated();
        try {
            $this->newsletterService->storeOrUpdate($data);
            $notify[] = ['success', 'Subscribe successfully'];

            return redirect()->route('admin.newsletter.index')->withNotify($notify);
        } catch (\Exception $e) {
            // Handle the exception
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $item = $this->newsletterService->get($id);
            $page_title = 'Edit Subscriber';
            return view('admin.newsletter.edit', compact('page_title', 'item'));
        } catch (\Exception $e) {
            $notify[] = ['error', 'Something is Wrong'];

            return redirect()->back()->withNotify($notify);
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsLetterRequest $request, $id)
    {
        $data = $request->validated();
        try {
            $this->newsletterService->storeOrUpdate($data, $id);
            $notify[] = ['success', 'Subscriber Update successful'];

            return redirect()->route('admin.newsletter.index')->withNotify($notify);
        } catch (\Exception $e) {

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        NewsLetter::destroy($id);
        $notify[] = ['success', 'Contacts delete successfully'];

        return redirect()->route('admin.newsletter.index')->withNotify($notify);
    }
}
