<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\Resources;
use App\Queries\ResourcesQueryBuilder;
use Illuminate\Http\RedirectResponse;

class ParserController extends Controller
{
    /**
     * @param ResourcesQueryBuilder $resources
     * @return RedirectResponse|null
     */
    public function __invoke(ResourcesQueryBuilder $resources): RedirectResponse|null
    {
        $rss = $resources->getResources()->toArray();
        $urls = null;

        foreach ($rss as $rs) {
            $urls[] = $rs['urlName'];
        }

        if ($urls !== null) {
            foreach ($urls as $url) {
                \dispatch(new JobNewsParsing($url)); // Можно и так: JobNewsParsing::dispatch($url);
            }
            Resources::query()->update(['status' => Resources::USED]);
            return redirect()->route('admin.resources.index')
                ->with('success', __('messages.admin.resources.parser.success'));
        }
        return back()->with('error', __('messages.admin.resources.parser.error'));

    }
}
