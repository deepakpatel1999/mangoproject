{{-- @extends('layouts.app') --}}
@include('users.header')

@include('users.sitebar')

@include('users.nav')
<style>
    .card-title {
        margin-bottom: 0rem;
        margin-top: 0px;
        margin-left: 60px;
    }

    .manage-card {

        margin-left: 230px;
        margin-top: 0px;
        padding-top: 0px;
    }
</style>


<div class="manage-card">
    @if (\Session::has('create-success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('create-success') !!}</li>
            </ul>
        </div>
    @endif

    @if ($subscriptions)
        <div class="container center">
            <div class="card-deck mb-4 text-center">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Current Active Plan</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"><small class="text-muted"></small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>plane Name: {{ @$subscriptions->name }} </li>
                            <li>Status: Active</li>
                            <li>Create_at: {{ @$subscriptions->created_at }} </li>

                        </ul>
                        <a href="{{ route('canceled') }}" class="btn btn-sm"
                            onclick="return confirm('Do you really want to Canceled List?')"><i
                                class="fa fa-remove btn btn-block btn-outline-primary"
                                style="font-size:20px;color:red">Cancel</i></a>

                    </div>

                </div>
            </div>
        </div>
    @endif
    @if (\Session::has('cancel'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('cancel') !!}</li>
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="card-deck mb-4 text-center">
            @foreach ($plans as $plan)
                <div class="card mb-4 box-shadow col-sm-4">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Choose a Plan</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">${{ $plan->price }} <small class="text-muted">/
                                month</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>plane Name: {{ $plan->title }} </li>
                            <li>Status: Panding</li>

                        </ul>
                        <a class="btn btn-lg btn-block btn-primary"
                            href="{{ route('payments', ['plan' => $plan->identifier]) }}">{{ $plan->title }}</a>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- <script>
    setTimeout(function() {
        $('.alert').addClass('hide').removeClass('show').slideUp();
    }, 2000);
</script> -->
@include('users.footer')
