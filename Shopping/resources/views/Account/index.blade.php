@extends('layout.master')
@section('content')
    
    <div class="page-content">
        @include('Account.account_directory')
        <div class="holder">
            <div class="container">
                <div class="row">
                    @include('Account.account_menu')

                    @if($page=='address')
                    @include('Account.AccountAddress.content')
                    @elseif($page=='details')
                    @include('Account.AccountDetails.content')
                    @elseif($page=='orders')
                    @include('Account.OrderHistory.content')
                    @elseif($page=='wishlist')
                    @include('Account.Wishlist.content')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
