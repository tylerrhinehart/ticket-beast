<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ticket Beast</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ url('css/app.css') }}">

    <script>
      window.App = {
        csrfToken: '{{ csrf_token() }}',
        stripePublicKey: '{{ config('services.stripe.key') }}',
      }
    </script>
</head>
<body>
<div class="row m-xs-b-5">
    <div class="col col-md-6 col-md-offset-3 m-xs-b-4 m-lg-b-0">
        <div class="card">
            <div class="card-section">
                <div class="m-xs-b-5">
                    <h1 class="wt-bold text-ellipsis">{{ $concert->title }}</h1>
                    <span class="wt-medium text-ellipsis">{{ $concert->subtitle }}</span>
                </div>
                <div class="m-xs-b-5">
                    <div class="media-object">
                        <div class="media-left">
                        </div>
                        <div class="media-body p-xs-l-2">
                            <span class="wt-medium">{{ $concert->formatted_date }}</span>
                        </div>
                    </div>
                </div>
                <div class="m-xs-b-5">
                    <div class="media-object">
                        <div class="media-left">
                        </div>
                        <div class="media-body p-xs-l-2">
                            <span class="wt-medium block">Doors at {{ $concert->formatted_start_time }}</span>
                        </div>
                    </div>
                </div>
                <div class="m-xs-b-5">
                    <div class="media-object">
                        <div class="media-left">
                        </div>
                        <div class="media-body p-xs-l-2">
                            <span class="wt-medium block">{{ $concert->ticket_price_in_dollars }}</span>
                        </div>
                    </div>
                </div>
                <div class="text-dark-soft m-xs-b-5">
                    <div class="media-object">
                        <div class="media-left">
                            @icon('location')
                        </div>
                        <div class="media-body p-xs-l-2">
                            <h3 class="text-base wt-medium text-dark">{{ $concert->venue }}</h3>
                            {{ $concert->venue_address }}<br>
                            {{ $concert->city }}, {{ $concert->state }} {{ $concert->zip }}
                        </div>
                    </div>
                </div>
                <div class="text-dark-soft">
                    <div class="media-object">
                        <div class="media-left">
                        </div>
                        <div class="media-body p-xs-l-2">
                            <h3 class="text-base wt-medium text-dark">Additional Information</h3>
                            <p>{{ $concert->additional_information}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t">
                <div id="app" class="card-section">
                    <ticket-checkout
                            :concert-id="{{ $concert->id }}"
                            concert-title="{{ $concert->title }}"
                            :price="{{ $concert->ticket_price }}"
                    ></ticket-checkout>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div id="app">--}}
    {{--<TicketCheckout></TicketCheckout>--}}
{{--</div>--}}
<script src="https://checkout.stripe.com/checkout.js"></script>
<script src="{{ url('js/app.js') }}"></script>
</body>
</html>
