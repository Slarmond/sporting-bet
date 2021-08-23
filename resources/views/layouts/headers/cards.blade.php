<div class="row">
    @foreach ($oddsData->bookmakers[0]->markets[0]->outcomes as $outcome)
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">
                                {{ print_r($oddsData->sport_title) }}
                            </h5>
                            <span class="h2 font-weight-bold mb-0">{{ print_r($outcome->name) }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                <i class="ni ni-fat-add"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2">
                            {{ print_r($outcome->price) }}</span>
                        {{ print_r($oddsData->bookmakers[0]->title) }}

                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
