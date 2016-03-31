<?php namespace Modules\Webcontact\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Webcontact\Entities\WebContact;
use Modules\Webcontact\Http\Requests\CreateWebContactRequest;
use Modules\Webcontact\Http\Requests\UpdateWebContactRequest;
use Modules\Webcontact\Repositories\WebContactRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class WebContactController extends AdminBaseController
{
    /**
     * @var WebContactRepository
     */
    private $webcontact;

    public function __construct(WebContactRepository $webcontact)
    {
        parent::__construct();

        $this->webcontact = $webcontact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $webcontacts = $this->webcontact->all();

        return view('webcontact::admin.webcontacts.index', compact('webcontacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('webcontact::admin.webcontacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateWebContactRequest $request
     * @return Response
     */
    public function store(CreateWebContactRequest $request)
    {
        $this->webcontact->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('webcontact::webcontacts.title.webcontacts')]));

        return redirect()->route('admin.webcontact.webcontact.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  WebContact $webcontact
     * @return Response
     */
    public function edit(WebContact $webcontact)
    {
        return view('webcontact::admin.webcontacts.edit', compact('webcontact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  WebContact $webcontact
     * @param  UpdateWebContactRequest $request
     * @return Response
     */
    public function update(WebContact $webcontact, UpdateWebContactRequest $request)
    {
        $this->webcontact->update($webcontact, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('webcontact::webcontacts.title.webcontacts')]));

        return redirect()->route('admin.webcontact.webcontact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  WebContact $webcontact
     * @return Response
     */
    public function destroy(WebContact $webcontact)
    {
        $this->webcontact->destroy($webcontact);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('webcontact::webcontacts.title.webcontacts')]));

        return redirect()->route('admin.webcontact.webcontact.index');
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param WebContact $webcontact
     * @return Response
     */
    public function view(WebContact $webcontact)
    {
        return view('webcontact::admin.webcontacts.view', compact('webcontact'));
    }
}
