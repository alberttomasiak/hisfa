<!-- START PRIME SILOS -->
                <div class="block">
                    
                    <h1 class="block__title">PRIME Silos</h1>

                    <div class="block__body">

                        @foreach( $prime_silos as $p_silo )

                        <a class="silo" href="{{ action('SilosController@edit', [$p_silo->silo->id]) }}">
                            <div class="silo-inner">
                                <div class="silo__image">
                                    @if( intval($p_silo->silo->volume) >= 90 )

                                        <div class="silo__image__top full"></div>
                                        <div class="silo__image__middle full"></div>
                                        <div class="silo__image__bottom full"></div>

                                    @elseif( intval($p_silo->silo->volume) >= 50 )
                                        <div class="silo__image__top default"></div>
                                        <div class="silo__image__middle medium"></div>
                                        <div class="silo__image__bottom medium"></div>
                                    @else
                                        <div class="silo__image__top default"></div>
                                        <div class="silo__image__middle default"></div>
                                        <div class="silo__image__bottom empty"></div>
                                    @endif
                                    <div class="silo__percentage">{{ intval($p_silo->silo->volume) }}%</div>
                                </div>
                                <div class="silo__number">{{$p_silo->silo->number}}</div>
                            </div>
                        </a>

                        @endforeach
                    </div>
                </div>
                <!-- END PRIME SILOS -->