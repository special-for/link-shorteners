<?php

namespace App\Http\Controllers;

use App\Services\Link\LinkService;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    private $linkService;

    public function __construct()
    {
        $this->linkService = app(LinkService::class);
    }

    public function linkManage($hash = '') {

        $abortMessageCode = 1;

        if ($hash) {
            $linkInfo = $this->linkService->getByHash($hash);

            $abortMessageCode = 2;

            if ($linkInfo && ($linkInfo->limit || $linkInfo->unlimited)) {

                $date = Carbon::parse($linkInfo->created_at);
                $now  = Carbon::now();

                if ($date->diffInHours($now) <= $linkInfo->lifetime) {
                    if (!$linkInfo->unlimited) {
                        $this->linkService->counterDecrement($linkInfo->id);
                    }

                    return redirect($linkInfo->link);
                }

                $abortMessageCode = 3;
            }
        }

        abort(404, __('link.errors.error' . $abortMessageCode));
    }
}
