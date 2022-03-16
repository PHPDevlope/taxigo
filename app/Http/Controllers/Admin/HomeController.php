<?php

namespace App\Http\Controllers\Admin;

class HomeController
{
    public function index()
    {
        return view('taxigo.admin.home');
    }

    public function dispatcherPanel()
    {
        return view('taxigo.dispatcher-panel');
    }

    public function roleManagement()
    {
        return view('taxigo.role-management');
    }

    public function user() {
        return view('taxigo.user');
    }

    public function myAccount()
    {
        return view('taxigo.my-account');
    }

    public function disputePanel()
    {
        return view('taxigo.dispute-panel');
    }

    public function provider() {
        return view('taxigo.provider');
    }

    public function fleetOwner() {
        return view('taxigo.fleet-owner');
    }

    public function dispatcher() {
        return view('taxigo.dispatcher');
    }

    public function accountManager() {
        return view('taxigo.account-manager');
    }

    public function disputeManager() {
        return view('taxigo.dispute-manager');
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

    public function setting()
    {
        return view('taxigo.m-setting');
    }

    public function siteSetting()
    {
        return view('taxigo.site-setting');
    }

    public function appSetting()
    {
        return view('taxigo.app-setting');
    }

    public function paymentSetting()
    {
        return view('taxigo.payment-setting');
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
