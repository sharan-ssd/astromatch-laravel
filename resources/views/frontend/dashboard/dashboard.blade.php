@extends('frontend.template')

@section('content')
<main class="float-start w-100 body-main">
  <section class="listing-page-div">
    <div class="container">
      <div class="comon-heading text-center">
        <h2 class="common-heading mt-0 mb-3">
          {{ __('messages.dashboard') }}
        </h2>
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <a href="newhoroscope.php" class="btn btn-mat profilelist-btns mb-1">
            {{ __('messages.creatematchprofile') }}
          </a>
        </div>
        <div class="col-md-6">
          <a href="matchmaker.php" class="btn btn-mat save-astro profilelist-btns">
            {{ __('messages.savedprofile') }}
          </a>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-3">
          <div class="card dasboard-cards">
            <div class="card-body">
              <h5 class="card-title">{{ __('messages.maleprofiles') }}</h5>
              <p class="card-text">
                {{ __('messages.totalcount') }} {{ $maleProfileCount }}
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card dasboard-cards">
            <div class="card-body">
              <h5 class="card-title">{{ __('messages.femaleprofiles') }}</h5>
              <p class="card-text">
                {{ __('messages.totalcount') }} {{ $femaleProfileCount }}
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card dasboard-cards">
            <div class="card-body">
              <h5 class="card-title">{{ __('messages.matchreport') }}</h5>
              <p class="card-text">
                {{ __('messages.totalmatches') }} {{ $matchCount }}
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card dasboard-cards">
            <div class="card-body">
              <h5 class="card-title">{{ __('messages.currentpackage') }}</h5>
              <p class="card-text">
                @if(isset($recentMatches) && count($recentMatches) > 0)
                  @php $currentPackage = $recentMatches[0]['matchMakingMethod']; @endphp
                  @if($currentPackage === "complete")
                    <span class="method-name complete-report">
                      {{ __('messages.alliancematch') }}
                    </span>
                  @else
                    <span class="method-name premium-report">
                      {{ __('messages.couplematch') }}
                    </span>
                  @endif
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="recentsearch">
        <div class="row">
          <div class="col-md-8">
            <h3 class="common-heading mt-3 mb-3">{{ __('messages.recentmatches') }}</h3>
          </div>
          <div class="col-md-4 mt-2">
            <div class="horoscope-search">
              <label class="keyword-label" for="keyword">Keyword</label>
              <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search" />
              <a title="view all" href="matchlist.php" class="viewall-horoscope">View All</a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row mt-4 mb-3">
        @if(isset($recentMatches))
          @foreach($recentMatches as $match)
          <div class="col-md-6 mb-3">
            <div class="recent-matches">
              <div class="card1">
                <div class="card-body1">
                  <span>{{ $match['mainProfile'] }}</span> -
                  <span>{{ $match['allianceProfile'] }}</span>
                  <span class="match-date">{{ $match['matchDate'] }}</span>
                  @if($match['matchMakingMethod'] == "complete")
                    <span class="method-name complete-report">
                      {{ __('messages.alliancematch') }}
                    </span>
                  @else
                    <span class="method-name premium-report">
                      {{ __('messages.couplematch') }}
                    </span>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
</main>
@endsection
