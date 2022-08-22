<?php

namespace App\Http\Livewire;

use App\Services\Link\LinkService;
use Livewire\Component;

class Main extends Component {

    private $linkService;

    public string $link          = '';
    public string $shortLink     = '';
    public int    $limit         = 7;
    public bool   $unlimited     = false;
    public int    $lifetime      = 24;

    protected array $rules = [
        'link'          => 'required|string|url',
        'limit'         => 'required|numeric|gt:0',
        'lifetime'      => 'nullable|numeric|between:1,24',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->linkService = app(LinkService::class);
    }

    public function render() {
        return view('livewire.main');
    }

    public function save() {
        $this->reset('shortLink');

        $this->validate();

        $result = $this->linkService->store([
            'link'      => $this->link,
            'limit'     => $this->limit,
            'unlimited' => $this->unlimited,
            'lifetime'  => $this->lifetime,
        ]);

        if ($result && $result->count()) {
            $this->shortLink = route('shortLink', $result->hash);
            $this->reset('link', 'limit', 'unlimited', 'lifetime');
        } else {
            $this->addError('error', 'Try again!');
        }
    }
}
