<?php

namespace App\Http\Controllers\Admin\Users;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;
use App\DataTables\Admin\UserDataTable;
use App\Http\Requests\Admin\UserRequest;
use App\Services\Utilities\FileUploadService;

class UserController extends Controller
{
    protected $userservice;

    protected $fileUploadService;

    public function __construct(AdminService $userservice, FileUploadService $fileUploadService)
    {
        $this->userservice = $userservice;
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        $page_title = 'User list';

        return $dataTable->render('admin.users.index', compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'User Create';

        return view('admin.users.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        try {
            $this->userservice->storeOrUpdate($data);
            $notify[] = ['success', 'User Create successful'];
            
            return redirect()->route('admin.users.index')->withNotify($notify);

        } catch (\Exception $e) {
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = 'Show User';
        $item = User::find($id);

        return view('admin.users.shows', compact('item', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $item = $this->userservice->get($id);
            $page_title = 'Edit User';

            return view('admin.users.edit', compact('page_title', 'item'));
        } catch (\Exception $e) {
            $notify[] = ['error', 'Something is Wrong'];

            return redirect()->back()->withNotify($notify);
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->validated();
        try {
            $this->userservice->storeOrUpdate($data, $id);
            $notify[] = ['success', 'User Update successful'];

            return redirect()->route('admin.users.index')->withNotify($notify);
        } catch (\Exception $e) {

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $item = User::find($id);
            if ($item->avater !== null) {
                $this->fileUploadService->delete('user/'.$item->avater);
            }
            $item->delete();
            $notify[] = ['success', 'User Delete successfully'];

            return redirect()->route('admin.users.index')->withNotify($notify);
        } catch (\Exception $e) {
            return back();
        }
    }
}
