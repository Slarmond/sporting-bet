{{-- <ul>
    <li> Sport Title - {{ print_r($oddsData->sport_title) }}</li>
    <li> Home Team - {{ print_r($oddsData->home_team) }}</li>
    <li> Away Team - {{ print_r($oddsData->away_team) }}</li>
    @foreach ($oddsData->bookmakers as $bookmaker)
        <li> Book Maker - {{ print_r($bookmaker->title) }} </li>
        <li> Last Update - {{ print_r($bookmaker->last_update) }} </li>
        @foreach ($bookmaker->markets as $market)
            @if ($market->key == env("MARKETS"))
                @foreach ($market->outcomes as $outcome)
                    <li> Price - {{ print_r($outcome->price) }} </li>
                    <li> Name - {{ print_r($outcome->name) }} </li>
                @endforeach
            @endif
        @endforeach
    @endforeach
</ul> --}}

<ul>
    @foreach ($etherScanTransactions->result as $transaction)

        <li> Block Number - {{ print_r(var_dump($transaction->blockNumber)) }}</li>
    @endforeach

    {{ print_r(array($etherScanTransactions->result[1])) }}
    {{-- <li> Home Team - {{ print_r($oddsData->home_team) }}</li>
    <li> Away Team - {{ print_r($oddsData->away_team) }}</li>
    @foreach ($oddsData->bookmakers as $bookmaker)
        <li> Book Maker - {{ print_r($bookmaker->title) }} </li>
        <li> Last Update - {{ print_r($bookmaker->last_update) }} </li>
        @foreach ($bookmaker->markets as $market)
            @if ($market->key == env("MARKETS"))
                @foreach ($market->outcomes as $outcome)
                    <li> Price - {{ print_r($outcome->price) }} </li>
                    <li> Name - {{ print_r($outcome->name) }} </li>
                @endforeach
            @endif
        @endforeach
    @endforeach --}}
</ul>
