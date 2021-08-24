<ul>
    <li> Sport Title - {{ print_r($oddsData->sport_title) }}</li>
    <li> Home Team - {{ print_r($oddsData->home_team) }}</li>
    <li> Away Team - {{ print_r($oddsData->away_team) }}</li>
    @foreach ($oddsData->bookmakers as $bookmaker)
        <li> Book Maker - {{ print_r($bookmaker->title) }} </li>
        <li> Last Update - {{ print_r($bookmaker->last_update) }} </li>
        @foreach ($bookmaker->markets as $market)
            @if ($market->key == 'h2h')
                @foreach ($market->outcomes as $outcome)
                    <li> Price - {{ print_r($outcome->price) }} </li>
                    <li> Name - {{ print_r($outcome->name) }} </li>
                @endforeach
            @endif
        @endforeach
    @endforeach
</ul>
