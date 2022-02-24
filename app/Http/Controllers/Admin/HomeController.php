<?php

namespace App\Http\Controllers\Admin;

class HomeController
{
    public function index()
    {
        return view('taxigo.admin.home');
    }

    public function roleManagement()
    {
        return view('taxigo.role-management');
    }

    public function myAccount()
    {
        return view('taxigo.my-account');
    }

    public function disputePanel()
    {
        return view('taxigo.dispute-panel');
    }

    public function members()
    {
        return view('taxigo.members');
    }

    public function settings()
    {
        return view('taxigo.settings');
    }

    public function service()
    {
        return view('taxigo.service');
    }

    public function ratingsReviews()
    {
        return view('taxigo.ratings-reviews');
    }

    public function paymentDetails()
    {
        return view('taxigo.payment-details');
    }

    public function requestHistory() {
        return view('taxigo.request-history');
    }

    public function documents() {
        return view('taxigo.document');
    }

    public function promocodes() {
        return view('taxigo.promocode');
    }

    public function staticPage() {
        return view('taxigo.static-page');
    }

    public function company() {
        return view('taxigo.company');
    }

    public function statements() {
        return view('taxigo.statements');
    }

    public function providerSettlement() {
        return view('taxigo.provider-settlement');
    }

    public function userAlert() {
        return view('taxigo.user-alert');
    }


}
