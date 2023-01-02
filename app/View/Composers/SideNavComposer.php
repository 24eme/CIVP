<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use App\Models\Evenement;
use App\Models\Famille;
use App\Models\Organisme;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SideNavComposer
{
    /**
     * @var \App\Models\Famille
     */
    protected $familles;

    /**
     * @var \App\Models\Organisme
     */
    protected $organismes;

    /**
     * @var \App\Models\Tag
     */
    protected $tags;

    /**
     * @var \App\Models\Evenement
     */
    protected $evenements;

    /**
     * @var \App\Models\User
     */
    protected $user;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Models\Famille  $famille
     * @return void
     */
    public function __construct(Famille $famille, Organisme $organisme, Tag $tag, Evenement $evenement)
    {
        // Dependencies are automatically resolved by the service container...
        $this->familles = $famille::all();
        $this->organismes = $organisme::all();
        $this->tags = $tag::all();
        $this->evenements = $evenement::all();
        $this->user = Auth::check() ? Auth::user() : null;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('tags', $this->tags)
             ->with('familles', $this->familles)
             ->with('organismes', $this->organismes)
             ->with('evenements', $this->evenements)
             ->with('user', $this->user);
    }
}
