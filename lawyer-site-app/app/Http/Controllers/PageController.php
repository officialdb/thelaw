<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    protected array $practiceAreas = [
        [
            'title' => 'Corporate & Commercial Law',
            'summary' => 'Business formation, contracts, and day-to-day legal support for companies and entrepreneurs.',
            'icon' => 'briefcase',
        ],
        [
            'title' => 'Civil Litigation',
            'summary' => 'Representation in civil disputes, from pre-action negotiation through to trial.',
            'icon' => 'gavel',
        ],
        [
            'title' => 'Property & Real Estate Law',
            'summary' => 'Title verification, land transactions, tenancy matters, and property disputes.',
            'icon' => 'home',
        ],
        [
            'title' => 'Family Law',
            'summary' => 'Matters including marriage, custody, and estate matters handled with discretion.',
            'icon' => 'users',
        ],
        [
            'title' => 'Criminal Defence',
            'summary' => 'Representation and advisory support at every stage of criminal proceedings.',
            'icon' => 'balance-scale',
        ],
    ];

    // NOTE: Placeholder list - confirm and edit these with the actual practice
    // areas Mr. Nwagwu wants to showcase before this goes live.

    public function home()
    {
        return view('pages.home', [
            'practiceAreas' => array_slice($this->practiceAreas, 0, 4),
        ]);
    }

    public function practiceAreas()
    {
        return view('pages.practice-areas', [
            'practiceAreas' => $this->practiceAreas,
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'message' => ['required', 'string', 'max:4000'],
        ]);

        // Requires mail settings configured in .env (see README).
        Mail::to(config('site.email'))->send(new ContactFormMail($validated));

        return back()->with('status', 'Message sent. We will respond as soon as possible.');
    }
}
