<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePluginRequest;
use App\Http\Requests\UpdatePluginRequest;
use App\Repositories\PluginRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PluginController extends AppBaseController
{
    /** @var  PluginRepository */
    private $pluginRepository;

    public function __construct(PluginRepository $pluginRepo)
    {
        $this->pluginRepository = $pluginRepo;
    }

    /**
     * Display a listing of the Plugin.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $plugins = $this->pluginRepository->all();

        return view('plugins.index')
            ->with('plugins', $plugins);
    }

    /**
     * Show the form for creating a new Plugin.
     *
     * @return Response
     */
    public function create()
    {
        return view('plugins.create');
    }

    /**
     * Store a newly created Plugin in storage.
     *
     * @param CreatePluginRequest $request
     *
     * @return Response
     */
    public function store(CreatePluginRequest $request)
    {
        $input = $request->all();

        dd($input);

        $plugin = $this->pluginRepository->create($input);

        Flash::success('Plugin saved successfully.');

        return redirect(route('plugins.index'));
    }

    /**
     * Display the specified Plugin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $plugin = $this->pluginRepository->find($id);

        if (empty($plugin)) {
            Flash::error('Plugin not found');

            return redirect(route('plugins.index'));
        }

        return view('plugins.show')->with('plugin', $plugin);
    }

    /**
     * Show the form for editing the specified Plugin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $plugin = $this->pluginRepository->find($id);

        if (empty($plugin)) {
            Flash::error('Plugin not found');

            return redirect(route('plugins.index'));
        }

        return view('plugins.edit')->with('plugin', $plugin);
    }

    /**
     * Update the specified Plugin in storage.
     *
     * @param int $id
     * @param UpdatePluginRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePluginRequest $request)
    {
        $plugin = $this->pluginRepository->find($id);

        if (empty($plugin)) {
            Flash::error('Plugin not found');

            return redirect(route('plugins.index'));
        }

        $plugin = $this->pluginRepository->update($request->all(), $id);

        Flash::success('Plugin updated successfully.');

        return redirect(route('plugins.index'));
    }

    /**
     * Remove the specified Plugin from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $plugin = $this->pluginRepository->find($id);

        if (empty($plugin)) {
            Flash::error('Plugin not found');

            return redirect(route('plugins.index'));
        }

        $this->pluginRepository->delete($id);

        Flash::success('Plugin deleted successfully.');

        return redirect(route('plugins.index'));
    }
}
